@extends('layout')
@section('content')
    <h1 class="title">Edit URL</h1>
     <form action="/short" method="post">
        @csrf
        <div class="field">
            <label>URL:</label>
            <input type="text" name="url" id="url">
        </div>
        <div class="field">
            <button type="submit" name="submit" class="button is-success">Shorten URL</button>
        </div>
    </form>
@endsection