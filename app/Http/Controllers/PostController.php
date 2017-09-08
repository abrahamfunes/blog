<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Comment;
use App\Repositories\PostRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Models\Post;
use App\Models\FilesCategory;
use App\Models\File;
use App\Http\Controllers\FileController;
use Response;

class PostController extends AppBaseController
{
    /** @var  PostRepository */
    private $postRepository;

    public function __construct(PostRepository $postRepo)
    {
        $this->postRepository = $postRepo;
    }

    /**
     * Display a listing of the Post.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        #dd(\DB::table('posts')->where('status_id', 1));
        if ($request->ajax()) {
//            $data = \DB::table('posts')
//                ->join('categories', 'posts.category_id', '=', 'categories.id')
//                ->join('users', 'posts.author_id', '=', 'users.id')
//                ->where('posts.status_id', '>=', 1)
//                ->select('posts.*', 'categories.name AS categoryname', 'users.name AS authorname');
            #$data = ;
            return \Datatables::queryBuilder(\DB::connection('mysql')->table('view_posts'))->make(true);
        } else {
            return view('posts.index');
        }
    }

    /**
     * Show the form for creating a new Post.
     *
     * @return Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created Post in storage.
     *
     * @param CreatePostRequest $request
     *
     * @return Response
     */
    public function store(CreatePostRequest $request)
    {
        $input = $request->all();

        $input['title_slug'] = str_slug($input['title']);
        $input['author_id'] = \Auth::user()->id;

        #dd($request->file()['archivo_imagen']);

        #\Storage::disk('uploads')->put($filename, $file_content);

        $post = $this->postRepository->create($input);


        $reference_type = "posts";

        $category = FilesCategory::where(['name' => 'posts.image', 'status_id' => 1])->first();
        $file = app(FileController::class)->store(
            [$request->file()['archivo_imagen']], $post->id, $reference_type, $category->id, $category->name, ""
        );

        #$post->thumbnail_id = $file->id;

        Flash::success('Post creado correctamente.');

        return redirect(route('posts.index'));
    }

    /**
     * Display the specified Post.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $post = $this->postRepository->findWithoutFail($id);

        if (empty($post)) {
            Flash::error('Registro NO encontrado');

            return redirect(route('posts.index'));
        }

        return view('posts.show')->with('post', $post);
    }

    public function GetPost($title_slug)
    {
        $post = Post::with('file')->whereTitleSlug($title_slug)->first();

        #dd($post->file->path);

        if (empty($post)) {

            return redirect(route('blog'));
        }

        return view('blog.post')
            #->with('categories', $categories)
            #->with('posts', $posts)
            #->with('recents', $recents)
            ->with('post', $post);
    }

    /**
     * Show the form for editing the specified Post.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $post = $this->postRepository->findWithoutFail($id);

        if (empty($post)) {
            Flash::error('Registro NO encontrado');

            return redirect(route('posts.index'));
        }

        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified Post in storage.
     *
     * @param  int              $id
     * @param UpdatePostRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePostRequest $request)
    {
        $post = $this->postRepository->findWithoutFail($id);


        $request['title_slug'] = str_slug($request->title);
        #$request->attributes->set('title_slug', str_slug($request->title));
        $request['author_id'] = \Auth::user()->id;
        #dd($request->title_slug);

        if (empty($post)) {
            Flash::error('Registro NO encontrado');

            return redirect(route('posts.index'));
        }

        $post = $this->postRepository->update($request->all(), $id);

        if (isset($request->file()['archivo_imagen'])) {
            $reference_type = "posts";
            $category = FilesCategory::where(['name' => 'posts.image', 'status_id' => 1])->first();

            $oldFiles = File::where([
                'reference_id'   => $post->id,
                'reference_type' => $reference_type,
                'category_id'    => $category->id,
            ])->get();

            foreach ($oldFiles as $old):
                $old->status_id = 0;
                $old->update();
            endforeach;

            $file = app(FileController::class)->store(
                [$request->file()['archivo_imagen']], $post->id, $reference_type, $category->id, $category->name, ""
            );

            #dd($file);

            $postNew = Post::where('id', '=', $post->id)->first();
            $fileNew = File::whereReferenceId($post->id)->whereReferenceType('posts')->whereStatusId(1)->first();

            $postNew->thumbnail_id = $fileNew->id;
            $postNew->update();
        }

        Flash::success('Post actualizado con éxito.');

        return redirect(route('posts.index'));
    }

    /**
     * Remove the specified Post from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $post = $this->postRepository->findWithoutFail($id);


        if (empty($post)) {
            Flash::error('Registro NO encontrado');

            return redirect(route('posts.index'));
        }

        $oldComments = Comment::wherePostId($post->id)->get();
        foreach ($oldComments as $old):
            //if($old->path != '') $disk::Delete($old->path);
            $old->status_id = 0;
            $old->update();
        endforeach;


        $oldFiles = File::where(['reference_id' => $post->id, 'reference_type' => 'posts'])->get();

        foreach ($oldFiles as $old):
            //if($old->path != '') $disk::Delete($old->path);
            $old->status_id = 0;
            $old->update();
        endforeach;

        $post->status_id = 0;
        $post->title = $post->title."del-".$post->id;
        $post->title_slug =$post->title_slug."del-".$post->id;
        $post->update();

        Flash::success('Post Eliminado correctamente.');

        return redirect(route('posts.index'));
    }
}
