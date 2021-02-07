@extends('layouts.app')

@section('content')

@if (count($messages) > 0)
    <ul class="list group">
        @foreach($messages as $message)
        
            <li class="list-group-item p-4 m-2"><strong>From : <b>{{$message->userFrom->name}}</b> |*|*| {{$message->userFrom->email}} </strong> <br>Subject :  {{$message->subject}}
                
                <div class="float-right"><a href="read/{{$message->id}}" class="btn btn-primary">READ</a></div>
                <div class="float-right m-2">Day :  {{$message->created_at}}</div>
            </li>
            
        @endforeach 
    </ul>                     
@else
    No messages !                        
@endif

@endsection
