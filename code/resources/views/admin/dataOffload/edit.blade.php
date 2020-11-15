@extends('layouts.app')

@section('title', 'Edit Order')

@section('content')
    <form action="{{ route('request.update', ['request' => $request->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="name">Имя</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $request->name) }}">
                </div>
                <div class="form-group">
                    <label for="phone_number">Телефон</label>
                    <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ old('phone_number', $request->phone_number) }}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" value="{{ old('email', $request->email) }}">
                </div>
                <div class="form-group">
                    <label for="message">Комментарий</label>
                    <textarea class="form-control" id="message" name="message" rows="7">{{ old('message', $request->message) }}</textarea>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-light mb-3" style="max-width: 100%;">
                    <div class="card-body">
                        <button type="submit" class="btn btn-dark btn-block">Сохранить</button>
                        <a href="{{ route('request.index') }}" class="btn btn-danger btn-block">Отмена</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
