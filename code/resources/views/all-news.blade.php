@extends('layouts.main')

@section('title', 'All news')
@section('news', 'active')

@section('content')

    @php $counter = 0; @endphp
    {{ $news->links() }}
    @forelse($news as $oneNews)
        @if($counter % 3 == 0)
            <div class="row mb-3">
        @endif
                <div class="col-md-4">
                    <div class="card mx-auto" style="width: 18rem; height: auto">
                        <img src="{{ $oneNews->photo }}" class="card-img-top" alt="{{ $oneNews->title }}">
                        <div class="card-body">
                            <h4 class="card-title">{{ $oneNews->title }}</h4>
                            <p class="card-text">{{ $oneNews->short_text }}</p>
                            <p class="card-text"><small class="text-muted">
                                <a href="{{ route('category.news', ['categoryId' => $oneNews->category_id]) }}" 
                                    class='nav-link' style='padding: inherit;'>Категория: {{ $categories->get($oneNews->category_id)->name }}</a>
                            </small></p>
                            <a href="{{ route('news.id', ['id' => $oneNews->id]) }}" class="btn btn-dark" style="bottom: 20px;" target="_blank">Читать</a>
                        </div>
                    </div>
                </div>
        @php $counter++ @endphp
        @if($counter % 3 == 0)
            </div>
        @endif
    @empty
        <p class='lead' style='text-align: center; margin-top: 100px; margin-bottom: 100px;'>Новостей нет. Приходите завтра.</p>
    @endforelse
    

@endsection
