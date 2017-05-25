<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Mail;
use Laracasts\Flash\Flash;

class ContactPageController extends MainController
{
    public function showContactPage(Request $request){

        $cart = $request->session()->get('cart');

        return view('contact', ['menus'=>$this->menu]);

    }

    public function sendMail(Request $request){

        $message = [
            'required' => 'Поле :attribute обязательно к заполнению',
            'email' => 'Поле :attribute должно соответствовать email адресу'
        ];

        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email',
            'comment' => 'required'
        ], $message);

        $data = $request->all();

        Mail::send('email', ['data'=>$data], function($message) use ($data){

            $mail_admin = env('MAIL_ADMIN');
            $message->from($data['email'], $data['name']);
            $message->to($mail_admin, 'Mr_Admin')->subject('question');

        });

            Flash::success('Ваше сообщение успешно отправлено!');

            return redirect('/about');

//            return redirect()->route('main_page')->with('status', 'Ваше сообщение отправлено');


    }
}
