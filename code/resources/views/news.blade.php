@extends('layouts.main')

@section('title', 'News page')
@section('news', 'active')

@section('content')
    <div class="row">
        <div class="col-md-12" style='display: flex; flex-direction: column;'>
            <h1 class="text-center">{{ $news['title'] }}</h1>
            <img src="{{ $news['photo'] }}" class="img-fluid" alt="Responsive image" style='max-width: 60%; align-self: center; margin-top: 40px;'>
            <p class="text-justify" style='font-family: monospace; font-size: larger; border: 2px dotted #ddd; padding: 10px; margin-top: 40px;'>{{ $news['fullText'] }}</p>
        </div>
    </div>
@endsection
