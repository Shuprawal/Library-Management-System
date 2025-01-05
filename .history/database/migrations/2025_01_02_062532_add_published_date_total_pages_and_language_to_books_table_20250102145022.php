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
        Schema::table('books', function (Blueprint $table) {
            $table->date('published_date')->nullable(); // Add published date (nullable)
            $table->integer('total_pages')->unsigned()->nullable(); // Add total page number (nullable, positive)
            $table->string('language', 50)->nullable(); // Add language column with max 50 characters (nullable)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropColumn(['published_date', 'total_pages', 'language']);
        });
    }
};
