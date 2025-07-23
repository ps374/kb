@extends('admin.layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Manage Articles</h3>
        <a href="{{ route('admin.articles.create') }}" class="btn btn-primary float-right">New Article</a>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($articles as $article)
                <tr>
                    <td>{{ $article->title }}</td>
                    <td>{{ $article->category->name }}</td>
                    <td>
                        <span class="badge badge-{{ $article->is_published ? 'success' : 'warning' }}">
                            {{ $article->is_published ? 'Published' : 'Draft' }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('admin.articles.edit', $article) }}" class="btn btn-sm btn-primary">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $articles->links() }}
    </div>
</div>
@endsection
