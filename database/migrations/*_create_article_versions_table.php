<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('article_versions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('article_id')->constrained('knowledge_base_items');
            $table->foreignId('user_id')->constrained();
            $table->text('content');
            $table->json('metadata')->nullable();
            $table->timestamps();
        });
    }
};
