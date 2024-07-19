@extends('layouts.app')

@section('title', 'Danh sách bài viết')

@section('content')
    <div class="row">
        <aside class="col-md-3">
            <h2>Thể loại</h2>
            <ul class="list-group">
                @foreach($categories as $category)
                    <li class="list-group-item">
                        <a href="{{ route('articles.index', ['category_id' => $category->id]) }}">{{ $category->name }}</a>
                    </li>
                @endforeach
            </ul>
        </aside>
        
        <main class="col-md-9">
            <h1>Danh sách bài viết</h1>
            <div class="row">
                @foreach($articles as $article)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            @if ($article->image_url)
                                <img src="{{ $article->image_url }}" class="card-img-top" alt="{{ $article->title }}" style="height: 200px; object-fit: cover;">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $article->title }}</h5>
                                <p class="card-text">{{ $article->getExcerpt() }}</p>
                                <a href="{{ route('articles.show', $article->id) }}" class="btn btn-primary">Đọc tiếp</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </main>
    </div>
@endsection
