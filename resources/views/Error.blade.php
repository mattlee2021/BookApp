@extends('components.head')

@if ($errors->any())

<h1 id="TitleMain"> Oops Something Went Wrong There </h1>
<h2 id="TitleSecond"> Please Make sure to enter an input</h2>

<a href="{{route('mainRoute')}}"> <button type="button"> Back to Main Page</button> </a>

@endif