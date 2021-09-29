@extends('layouts.app')
@section('content')
 <h1>create Post</h1>
 <form action="/User" method="POST">
    @csrf
    <label for="name">Your Name:</label>
    <input type="text" name="name" id="name">
    <label for="Email">The Email:</label>
    <input type="email" name="email" id="email">
    <label for="password">The password:</label>
    <input type="text" name="password" id="password">

    <input type="submit" value="Add User" class="btn btn-success btn-block">

</form>



{{-- <p class="mssg">{{session('mssg')}}</p> --}}
@endsection
