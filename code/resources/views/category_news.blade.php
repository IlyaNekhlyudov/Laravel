@extends('layouts.app')

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
            <div class="col-md-12">
                <h4>{{ $oneNews->title }}</h4>
                <p>{!! $oneNews->short_text !!}</p>
                @if (isset($oneNews->link) && !empty($oneNews->link))
                    <a href="{{ $oneNews->link }}" target="_blank">Читать в источнике</a>
                @else
                    <a href="{{ route('news.id', ['id' => $oneNews->id]) }}" class="btn btn-dark" style="bottom: 20px;" target="_blank">Читать</a>
                @endif
            </div>
        </div>
        <hr>
    @empty
        <p class='lead' style='text-align:center; margin-top: 100px; margin-bottom: 100px;'>Новостей в данной категории нет. Приходите завтра.</p>
    @endforelse
@endsection
