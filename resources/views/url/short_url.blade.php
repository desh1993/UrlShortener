@extends('layout')

@section('content')
    <h1 class="title">Your code is : </h1>
    <a href="{{url('/short/' . $url -> short)}}" target="_blank">{{$url -> short}}</a>

@endsection