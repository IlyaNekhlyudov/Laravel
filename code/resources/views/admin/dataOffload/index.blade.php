@extends('layouts.main')

@section('title', 'Admin News')

@section('content')
    <h1>Заказы</h1>
    <table class="table">
        <thead class="thead-light">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Имя</th>
            <th scope="col">Телефон</th>
            <th scope="col">E-mail</th>
            <th scope="col">Комментарий</th>
            <th scope="col">Действия</th>
        </tr>
        </thead>
        <tbody>
        @forelse($requests as $request)
            <tr>
                <td>{{ $request->id }}</td>
                <td>{{ $request->name }}</td>
                <td>{{ $request->phone_number }}</td>
                <td>{{ $request->email }}</td>
                <td>{{ $request->message }}</td>
                <td>
                    <a href="{{ route('request.edit', ['request' => $request->id]) }}" class="text-dark mr-3"><i class="fa fa-pencil fa-2x" aria-hidden="true"></i></a>
                    <a href="#" class="text-danger delete-button" data-id="{{ $request->id }}" data-type="feedback">
                        <i class="fa fa-trash-o fa-2x" aria-hidden="true"></i>
                    </a>
                </td>
            </tr>
        @empty
            <h1>Нет заказов</h1>
        @endforelse
        {{ $requests->links() }}
        </tbody>
    </table>
@endsection


