<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\KnowledgeBaseItem;
use Illuminate\Http\Request;

class ArticlePublishController extends Controller
{
    public function submitForReview($id)
    {
        $article = KnowledgeBaseItem::findOrFail($id);
        $article->update([
            'review_status' => 'pending',
            'published_at' => null
        ]);
        return back()->with('success', 'Article submitted for review');
    }

    public function publish($id)
    {
        $article = KnowledgeBaseItem::findOrFail($id);
        $article->update([
            'review_status' => 'approved',
            'published_at' => now(),
            'published_by' => auth()->id(),
            'is_published' => true
        ]);
        return back()->with('success', 'Article published');
    }
}
