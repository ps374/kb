<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

Schema::create('tickets', function (Blueprint $table) {
    $table->id();
    $table->string('subject');
    $table->text('description');
    $table->foreignId('user_id')->constrained();
    $table->foreignId('category_id')->constrained('ticket_categories');
    $table->enum('status', ['open','in_progress','resolved','closed'])->default('open');
    $table->enum('priority', ['low','medium','high','critical'])->default('medium');
    $table->timestamps();
});
