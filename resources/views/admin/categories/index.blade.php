@extends('admin.layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Manage Categories</h3>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.categories.store') }}" class="mb-4">
            @csrf
            <div class="form-group">
                <label>Category Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Category</button>
        </form>

        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Articles</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->knowledge_base_items_count }}</td>
                    <td>
                        <a href="#" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $categories->links() }}
    </div>
</div>
@endsection
