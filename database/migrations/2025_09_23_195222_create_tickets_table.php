<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('folio')->unique();
            $table->string('title');
            $table->text('description');
            $table->foreignId('issue_id')->constrained('issues')->onDelete('cascade');
            $table->foreignId('priority_id')->constrained('priorities')->onDelete('cascade');
            $table->foreignId('responsable_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->foreignId('ticket_status_id')->constrained('ticket_status')->onDelete('cascade')->default(1);
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->nullable();
            $table->timestamp('limit_date')->nullable();
            $table->json('tags')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
