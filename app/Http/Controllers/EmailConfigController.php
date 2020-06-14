<?php

namespace App\Http\Controllers;
use Mail;
use Illuminate\Http\Request;

class EmailConfigController extends Controller
{
    public function send_email(Request $request){
		$to_name ='riffat';
		$to_email = 'riffatsiddiqui@gmail.com';
		$data = array('name'=>"crystal Vitalis('Faizan')", 'body' => 'A test mail');


        Mail::send('email.mail',$data, function ($message) {
		$message->from('faizanabid36@gmail.com','Next Door ');
		$message->to('riffatsiddiqui36@gmail.com ');
		$message->subject('laravel try ');
		 });

		 dd($data);
		 return view('email.mail')->compact('data');
    }
}
