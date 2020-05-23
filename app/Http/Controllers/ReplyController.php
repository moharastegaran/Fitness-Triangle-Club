<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Mail\MessageReplied;
use App\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ReplyController extends Controller
{
    public function create($id){
        $contact = Contact::find($id);
        return view('contact.reply')
            ->with(compact('contact'));
    }

    public function send(Request $request,$id){
        $sender_id = auth()->user()->id;
        $content = $request->body;
        $contact = Contact::find($id);

        $data = [
            'replier_id' => $sender_id,
            'contact_id' => $id ,
            'content' => $content
        ];

        Reply::create($data);

        Mail::to($contact->email)->send(new MessageReplied($data));

    }
}
