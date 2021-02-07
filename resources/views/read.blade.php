@extends('layouts.app')

@section('content')
    <table class="table"> 
        <tr><th>From : </th> <td>{{$messages->userFrom->name}}</td></tr>
        <tr><th>Email : </th> <td>{{$messages->userFrom->email}}</td></tr>
        <tr><th>Subject : </th> <td>{{$messages->subject}}</td></tr>
        <tr><th>Message : </th> <td>{{$messages->body}}</td></tr>
        <tr><td colspan="2"><a href="/reply/{{$messages->id}}" class="btn btn-outline-primary">Reply</a></td></tr>
    </table>
@endsection