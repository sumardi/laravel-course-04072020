@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Article</h1>
    <form action="{{ route('article.update', $article) }}" method="POST">
        <!-- .form-group>label.form-label{Title}+input.form-control[name=title] -->
        @csrf
        <div class="form-group">
            <label for="" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title', $article->title) }}">
            @error('title')
            <div class="invalid-feedback">
                {{ $errors->first('title') }}
            </div>
            @enderror
        </div>
        <!-- .form-group>label.form-label{Body}+textarea.form-control[name=body] -->
        <div class="form-group">
            <label for="" class="form-label">Body</label>
            <textarea name="body" id="" cols="30" rows="10" class="form-control @error('body') is-invalid @enderror">{{ old('body', $article->body) }}</textarea>
            @error('body')
            <div class="invalid-feedback">
                {{ $errors->first('body') }}
            </div>
            @enderror
        </div>
        <!-- button[type=submit].btn.btn-primary{Submit} -->
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection