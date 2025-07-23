<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('knowledge_base_items', function (Blueprint $table) {
            $table->timestamp('published_at')->nullable()->after('is_published');
            $table->foreignId('published_by')->nullable()->constrained('users')->after('published_at');
            $table->enum('review_status', ['draft','pending','approved','rejected'])->default('draft')->after('published_by');
        });
    }
};
