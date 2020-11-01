@extends('layouts.main')

@section('title', 'Feedback')

@section('content')
<div style='display: flex; flex-direction: column; align-items:center;'>
    @if ($result)
        <p>Сообщение успешно отправлено.</p>
    @else
        <p>Возникла ошибка, сообщение не отправлено.</p>
    @endif
    <a href="{{ route('welcome') }}">Вернуться на главную</a>
</div>
@endsection