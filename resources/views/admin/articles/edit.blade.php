@if($article->review_status === 'draft')
    <form action="{{ route('admin.articles.submit-review', $article) }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-warning">Submit for Review</button>
    </form>
@elseif($article->review_status === 'pending' && auth()->user()->isAdmin())
    <form action="{{ route('admin.articles.publish', $article) }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-success">Publish Article</button>
    </form>
@endif
