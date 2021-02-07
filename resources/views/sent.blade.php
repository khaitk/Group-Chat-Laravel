@extends('layouts.app')

@section('content')

@if (count($messages) > 0)
    <ul class="list group">
        @foreach($messages as $message)
            <li class="list-group-item"><strong>From : || <b>{{$message->userTo->name}}</b> || {{$message->userTo->email}} </strong> <br>Subject :  {{$message->subject}}</li>
        @endforeach 
    </ul>
                        
@else
    No messages !                        
@endif

@endsection