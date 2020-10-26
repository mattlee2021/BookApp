@extends('components.head')
<h1 id="TitleMain"> Update Author for Book Titled {{$data['Title']}}</h1>
<form action="/edit" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{$data['id']}}" >
    <input type="text" name="authorEdit" placeHolder= "Update Author Name"> 
    <span id="error">@error('authorEdit'){{$message}}@enderror</span>
    <br><br>
    <button type="submit"> Update </button>
</form>