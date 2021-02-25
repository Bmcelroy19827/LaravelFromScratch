@extends('layout')

@section( 'content')

    <div id="wrapper">
        <div id="page" class="container">
            @can('edit_forum')
                <p>You have the ability to Edit the forum </p>
                @else
                    <p>You can't edit the forum</p>
            @endcan
            @can('view_reports')
                <p>You can view reports</p>
            @endcan
            @forelse($articles as $article)

                <div id="content">       
                    <div class="title">
                        <h2><a href=" {{ route('articles.show', $article) }}">{{ $article->title }}</a></h2>
                    </div>
                    <p><img src="/images/banner.jpg" alt="" class="image image-full" /> </p>
                    
                    {!! $article->excerpt !!}
                    
                        <form action="/article/test/{{ $article->id}}" method="POST">
                            @csrf
                            <button
                                type="submit"
                                class="btn p-0 text-muted"
                                >
                                You're 
                                @can('update', $article)
                                Authorized
                                @else
                                UnAuthorized
                                @endcan
                                To Click Here
                            </button>
                        </form>
                </div>
            @empty
                <p>No relevant articles yet.</p>
                
            @endforelse
    </div>

@endsection