<?php
namespace App\Http\Controllers;
use App\Models\KnowledgeBaseItem;
class KnowledgeBaseController extends Controller {
    public function show($slug) {
        $article = KnowledgeBaseItem::where('slug', $slug)->firstOrFail();
        return view('knowledge-base.show', compact('article'));
    }
}
