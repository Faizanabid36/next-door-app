<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmailConfigController extends Controller
{
    public function send_email(Request $request){
        Mail::send('emails.contact',$data, function ($message) {
		$message->from('faizanabid36@gmail.com','Next Door ');
		$message->to('riffatsiddiqui36@gmail.com ');
		$message->subject('laravel try ');
 		});
    }
}
