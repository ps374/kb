<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\KnowledgeBaseItem;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleAdminController extends Controller
{
    public function index()
    {
        return view('admin.articles.index', [
            'articles' => KnowledgeBaseItem::with('category')->latest()->paginate(15)
        ]);
    }

    public function create()
    {
        return view('admin.articles.create', [
            'categories' => Category::all()
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'is_published' => 'boolean'
        ]);

        KnowledgeBaseItem::create($validated);

        return redirect()->route('admin.articles.index')->with('success', 'Article created!');
    }

    public function edit(KnowledgeBaseItem $article)
    {
        return view('admin.articles.edit', [
            'article' => $article,
            'categories' => Category::all()
        ]);
    }
}
