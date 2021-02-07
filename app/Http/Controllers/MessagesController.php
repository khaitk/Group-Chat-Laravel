<?php

namespace App\Http\Controllers;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class MessagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $messages = Message::with('userFrom')->where('user_id_to', Auth::id())->orderBy('id', 'DESC')->get();
        // dd($messages);
        return view('home')->with('messages', $messages);
    }

    public function create()
    {
        $users = User::where('id', '!=', Auth::id())->get();
        return view('create')->with('users', $users);
    }


    public function send(Request $request)
    {
        $this->validate($request, [
            'subject' => 'required',
            'message' => 'required'
        ]);

        $message = new Message();
        $message->user_id_from = Auth::id();
        $message->user_id_to = $request->input('to');
        $message->subject = $request->input('subject');
        $message->body = $request->input('message');

        $message->save();

        return redirect()->to('/home')->with('status', 'Message sent successfully');
    }

    public function sent()
    {
        $message = Message::with('userTo')->where('user_id_from', Auth::id())->get();

        return view('sent')->with('messages', $message);
    }
    
    public function read($id)
    {
        $message = Message::with('userFrom')->find($id);

        return view('read')->with('messages', $message);
    }

    public function reply($id)
    {
        $message = Message::with('userFrom')->find($id);

        return view('reply')->with('messages', $message);
    }

    public function replymessage(Request $request)
    {
        $this->validate($request, [
            'subject' => 'required',
            'message' => 'required'
        ]);

        $message = new Message();
        $message->user_id_from = Auth::id();
        $message->user_id_to = $request->input('to');
        $message->subject = $request->input('subject');
        $message->body = $request->input('message');

        $message->save();

        return redirect()->to('/home')->with('status', 'Message sent successfully');
    }

}
