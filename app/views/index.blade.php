@extends('app')
@section('title', 'Home page')
@section('content')
<br><br/>

   <div class="text-center"><h2 class="post-listings">Home page</h2><hr></div>
    @if(Session::has('message'))
        <p><strong>Success:</strong> {{{ Session::get('message') }}}</p>
    @endif
@stop