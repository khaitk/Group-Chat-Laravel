@extends('layouts.app')

@section('content')
    <form action="/reply" method="post">
        @csrf
        <div class="form-group">
            <label for="">To : </label>
            <select name="to" id="to">
                <option value="{{$messages->userFrom->id}}">{{ $messages->userFrom->name }} | {{$messages->userFrom->email}}</option>
            </select>
        </div>
        <div class="form-group">
            <label for="">Subject : </label>
            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" value="Reply : {{$messages->subject}}">
        </div>
        <div class="form-group">
            <label for="">Message : </label>
            <textarea class="form-control" name="message" id="message" rows="5" placeholder="Message"></textarea>
        </div>
        <button class="btn btn-danger">Send</button>
    </form>
@endsection