<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\DB;

class FileController extends Controller {

    #private $fileRepository;

    public function __construct()
    {
        #$this->fileRepository = $fileRepository;
    }

    public function store($files, $reference_id, $reference_type, $category_id, $category_name, $description = '')
    {
        DB::disableQueryLog();

        $saved = [];


        foreach ($files as $file):
            $path = "/images/posts/";
            $filename = uniqid().".".$file->getClientOriginalExtension();
            $pathwithfilename = $path.$filename;
            $content = base64_encode(file_get_contents($file));
            $file_content = file_get_contents($file);


            array_push($saved,
                File::create([
                    'reference_id'   => $reference_id,
                    'reference_type' => $reference_type,
                    'category_id'    => $category_id,
                    'filename'       => $file->getClientOriginalName(),
                    'filesize'       => $file->getClientSize(),
                    'filetype'       => $file->getClientMimeType(),
                    'path'           => $pathwithfilename,
                    'description'    => $description,
                    'content'        => $content,
                    'status_id'      => 1,
                ])->getAttributes()
            );

            $disk = Storage::disk('uploads');

            $path = $disk->putFileAs(
                '/', ($file), $filename
            );
        
        endforeach;

        return $saved;
    }

    public function getFile($id)
    {
        $file = \App\Models\File::where(['status_id' => 1])->find($id);

        if (empty($file))
        {
            return;
        }

        $data = base64_decode($file->content);
        header("Content-type: " . $file->filetype);
        print $data;
    }
}
