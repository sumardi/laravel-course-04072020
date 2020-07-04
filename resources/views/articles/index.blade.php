@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Article</h1>

    <a href="{{ route('article.create') }}" class="btn btn-primary mb-2">Create Article</a>

    <form class="form-inline mb-2" action="{{ route('article.search') }}" method="GET">
        <input type="text" name="keyword" class="form-control mr-2" placeholder="Search by title..." value="{{ request()->keyword }}">
        <button type="submit" class="btn btn-primary">Search</button>
    </form>

    <div class="text-muted">Showing {{ $articles->count() }} of {{ $articles->total() }} articles</div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @php
            $i = ($articles->currentPage() - 1) * config('app.page_limit');
            @endphp
            @foreach($articles as $article)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $article->title }}</td>
                <td>{{ $article->created_at->diffForHumans() }}</td>
                <td>
                    <a href="{{ url('/articles/edit/' . $article->id) }}" class="btn btn-success">Edit</a>
                    <a href="{{ route('article.delete', $article) }}" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $articles->links() }}
</div>
@endsection