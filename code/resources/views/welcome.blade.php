@extends('layouts.main')

@section('title', 'Welcome page')
@section('welcome', 'active')

@section('content')
    <div class="mx-auto" style="margin-top: 300px; margin-bottom: 300px;">
        <h1 class="text-center">Новостной портал</h1><br>
        <p class="text-center"><a href="{{ route('category') }}" class="btn btn-dark btn-lg">Читать</a></p>
    </div>
@endsection
