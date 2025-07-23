#!/bin/bash

# ===== MODELS =====
cat > app/Models/KnowledgeBaseItem.php << 'MODEL'
<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class KnowledgeBaseItem extends Model {
    protected $fillable = ['title','slug','content','category_id','is_published'];
    
    public function category() {
        return $this->belongsTo(\App\Models\Category::class);
    }
    
    // Add other methods from our previous discussions
}
MODEL

# ===== MIGRATION =====
cat > database/migrations/$(date +"%Y_%m_%d_000000")_create_knowledge_base_items_table.php << 'MIGRATION'
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('knowledge_base_items', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('content');
            $table->foreignId('category_id')->constrained();
            $table->boolean('is_published')->default(true);
            $table->timestamps();
        });
    }
};
MIGRATION

# ===== CONTROLLER =====
cat > app/Http/Controllers/KnowledgeBaseController.php << 'CONTROLLER'
<?php
namespace App\Http\Controllers;
use App\Models\KnowledgeBaseItem;
class KnowledgeBaseController extends Controller {
    public function show($slug) {
        $article = KnowledgeBaseItem::where('slug', $slug)->firstOrFail();
        return view('knowledge-base.show', compact('article'));
    }
}
CONTROLLER

# ===== VIEW =====
mkdir -p resources/views/knowledge-base
cat > resources/views/knowledge-base/show.blade.php << 'VIEW'
@extends('layouts.app')
@section('content')
    <h1>{{ $article->title }}</h1>
    <div>{!! $article->content !!}</div>
@endsection
VIEW

echo "✅ Knowledge Base system generated! Run:"
echo "composer install && npm install && git add . && git commit -m 'Added KB system' && git push"
