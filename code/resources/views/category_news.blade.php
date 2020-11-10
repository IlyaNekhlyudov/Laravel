@extends('layouts.main')

@section('title', 'Category news page')
@section('news', 'active')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">{{ $category->name }}</h1>
        </div>
    </div>

    @forelse ($news as $oneNews)
        <div class="row mt-3">
            <div class="col-md-6">
                <img src="{{ $oneNews->photo }}" class="img-fluid" alt="Responsive image">
            </div>
            <div class="col-md-6 module">
                <h2>
                    <a href="{{ route('news.id', ['id' => $oneNews->id]) }}" class="badge badge-light" 
                            style='white-space: break-spaces;' target="_blank">{{ $oneNews->title }}</a>
                </h2>
                <p class="line-clamp">{{ $oneNews->short_text }}</p>
            </div>
        </div>
        <hr>
    @empty
        <p class='lead' style='text-align:center; margin-top: 100px; margin-bottom: 100px;'>Новостей в данной категории нет. Приходите завтра.</p>
    @endforelse
@endsection
