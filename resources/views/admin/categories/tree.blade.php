@extends('admin.layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Category Tree</h3>
    </div>
    <div class="card-body">
        <ul class="category-tree">
            @foreach($categories as $category)
                @include('admin.categories.partials.node', ['category' => $category])
            @endforeach
        </ul>
    </div>
</div>
@endsection
