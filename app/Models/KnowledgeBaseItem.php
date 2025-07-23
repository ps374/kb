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
