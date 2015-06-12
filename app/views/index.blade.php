@extends('app')
@section('title', 'Home page')
@section('content')
<br><br/>

   <center> <h2 class="post-listings">Home page</h2><hr></center>
    @if(Session::has('message'))
        <p><strong>Success:</strong> {{{ Session::get('message') }}}</p>
    @endif
@stop