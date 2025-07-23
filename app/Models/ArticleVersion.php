<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ArticleVersion extends Model
{
    protected $fillable = ['article_id', 'user_id', 'content', 'metadata'];
    
    public function article()
    {
        return $this->belongsTo(KnowledgeBaseItem::class, 'article_id');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
