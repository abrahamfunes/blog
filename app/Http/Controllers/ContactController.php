<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Repositories\CommentRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Illuminate\Support\Facades\Mail;
use Response;

class ContactController extends AppBaseController
{
    public function Send(Request $request){
        Mail::send('emails.contact', ['user' => "", 'request' => $request], function ($mail) use ($request) {

            $mail->to('info@bc2.com ', 'Info')
                ->bcc('elfunes@gmail.com ', 'Funes')
                ->subject("Correo de formulario de contacto (bc2.mx)");
        });

        alert()->success("Tu mensaje ha sido enviado, nos pondremos en contacto contigo a la brevedad.", 'Gracias')->persistent("Aceptar");
    }

}