@extends('layouts.app')

@section('title', 'Request')
@section('request', 'active')

@section('content')
@if ($result)
    <div class="alert alert-success" role="alert">
        Сообщение успешно отправлено.
    </div>
@endif
<form action="{{ route('request.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="name">Ваше имя</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                </div>
                <div class="form-group">
                    <label for="phone_number">Номер телефона</label>
                    <input type='tel' class="form-control" id="phone_number" name="phone_number" rows="7" required value="{{ old('phone_number') }}">
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type='email' class="form-control" id="email" name="email" rows="7" required value="{{ old('email') }}">
                </div>
                <div class="form-group">
                    <label for="message">Информация, которую вы хотите получить</label>
                    <textarea class="form-control" id="message" name="message" rows="7" required>{{ old('message') }}</textarea>
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
