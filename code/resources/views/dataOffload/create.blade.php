@extends('layouts.main')

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
                    <label for="tel">Номер телефона</label>
                    <input type='tel' class="form-control" id="tel" name="tel" rows="7" required>{{ old('tel') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type='email' class="form-control" id="email" name="email" rows="7" required>{{ old('email') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="info">Информация, которую вы хотите получить</label>
                    <textarea class="form-control" id="info" name="info" rows="7" required>{{ old('info') }}</textarea>
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
