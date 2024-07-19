@extends('layouts.app')

@section('title', $article->title)

@section('content')
    <div class="container">
        <h1>{{ $article->title }}</h1>
        @if ($article->image_url)
            <div class="text-center mb-3">
                <img src="{{ $article->image_url }}" alt="{{ $article->title }}" class="img-fluid">
            </div>
        @endif
        <p>{{ $article->content }}</p>
        
        <!-- Phần bài viết cùng loại -->
        @if ($relatedArticles->count() > 0)
            <div class="related-articles mt-5">
                <h3>Bài viết cùng loại</h3>
                <div class="row">
                    @foreach($relatedArticles as $relatedArticle)
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                @if ($relatedArticle->image_url)
                                    <img src="{{ $relatedArticle->image_url }}" class="card-img-top" alt="{{ $relatedArticle->title }}">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{ $relatedArticle->title }}</h5>
                                    <p class="card-text">{{ $relatedArticle->getExcerpt() }}</p>
                                    <a href="{{ route('articles.show', $relatedArticle->id) }}" class="btn btn-primary">Đọc tiếp</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
@endsection
