Schema::create('ticket_responses', function (Blueprint $table) {
    $table->id();
    $table->foreignId('ticket_id')->constrained();
    $table->foreignId('user_id')->constrained();
    $table->text('content');
    $table->timestamps();
});
