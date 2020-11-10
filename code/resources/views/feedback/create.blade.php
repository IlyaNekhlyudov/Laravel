@extends('layouts.main')

@section('title', 'Feedback')

@section('content')
@if ($result)
    <div class="alert alert-success" role="alert">
        Сообщение успешно отправлено.
    </div>
@endif
<form action="{{ route('feedback.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="name">Ваше имя</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                </div>
                <div class="form-group">
                    <label for="message">Комментарий/отзыв</label>
                    <textarea class="form-control" id="comment" name="message" rows="7" required>{{ old('message') }}</textarea>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-light mb-3" style="max-width: 100%;">
                    <div class="card-body">
                        <button type="submit" class="btn btn-dark btn-block">Отправить</button>
                        <a href="{{ route('welcome') }}" class="btn btn-danger btn-block">Отмена</a>
                    </div>
                </div>
            </div>
        </div>
</form>
@endsection