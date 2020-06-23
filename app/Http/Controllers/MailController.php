<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class MailController extends Controller
{
    public function send(Request $request)
    {

        $email = $request->email;
        $full_name = $request->full_name;
        $phone = $request->phone;
        $category = $request->category;
        $comments = $request->comments;
        $emailTo = $request->emailTo;
        Mail::send(['html' => 'mail'], ['full_name' => $full_name, 'phone' => $phone,
            'email' => $email,
            'category' => $category,
            'comments' => $comments,

        ],

            function ($message) use ($email,$emailTo) {
                $message->to($emailTo, $emailTo)->subject('Сайт Lukvis.ru');
                $message->from('tech.platformss@gmail.com', 'Заявка с сайта. Свяжитесь с клиентом');

            });
    }
}
