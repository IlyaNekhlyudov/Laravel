@extends('layouts.app')

@section('title', 'Add Parser')

@section('content')
    <form action="{{ route('parser.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="title">Название источника</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                </div>
                <div class="form-group">
                    <label for="photo">Ссылка на RSS</label>
                    <input type="text" class="form-control" id="link" name="link" placeholder="Ссылка..." value="{{ old('link') }}">
                </div>
                <ul class="list-group list-group-flush" style='width: 200px;'>
                    <li class="list-group-item"><button type="submit" class="btn btn-dark btn-block">Сохранить</button></li>
                    <li class="list-group-item"><a href="{{ route('parser') }}" class="btn btn-danger btn-block">Отмена</a></li>
                </ul>
        </div>
    </form>
@endsection
