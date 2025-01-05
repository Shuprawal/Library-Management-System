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
        Schema::create('books',function(Blueprint $table ){
            $table->id();
            $table->string('name');
            $table->string('isbn');
            $table->string('description');
            $table->integer('available copies');
            $table->string('publisherID');
            $table->binary('image');
            $table->ti('description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
