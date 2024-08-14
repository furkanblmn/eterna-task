@extends('frontend.layouts.app')
@section('page_title', 'HOME')
@section('content')

    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                @foreach ($blogs as $blog)
                    <div class="post-preview">
                        <a href="{{ $blog->url }}">
                            <h2 class="post-title">{{ $blog->title }}</h2>
                            <h3 class="post-subtitle">{{ $blog->sub_title }}</h3>
                        </a>
                        <p class="post-meta">
                            Posted by
                            <a href="#!">{{ $blog->user->name }}</a>
                            on {{ date_formatting($blog->created_at, 'MMMM DD, Y') }}
                        </p>
                    </div>
                @endforeach
                @include('frontend.layouts.pagination', [
                    'paginator' => $blogs,
                ])
            </div>
        </div>
    </div>
@endsection
