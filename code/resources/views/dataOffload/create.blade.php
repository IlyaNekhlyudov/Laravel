@extends('layouts.main')

@section('title', 'Feedback')

@section('content')
<div style='display: flex; flex-direction: column; align-items:center;'>
    @if ($result)
        <div class="alert alert-success" role="alert">
            Сообщение успешно отправлено.
        </div>
    @else
        <div class="alert alert-danger" role="alert">
            Возникла ошибка, сообщение не отправлено.
        </div>
    @endif
    <a href="{{ route('welcome') }}">Вернуться на главную</a>
</div>
@endsection