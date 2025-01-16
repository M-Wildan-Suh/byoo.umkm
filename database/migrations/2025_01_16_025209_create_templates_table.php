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
        Schema::create('templates', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('image');
            $table->string('youtube');
            $table->string('template')->default('one');
            $table->integer('price')->nullable();
            $table->string('address')->nullable();
            $table->string('no_tlp')->nullable();
            $table->enum('home_button', ['on', 'off'])->default('on');
            $table->string('status')->default('unactive');
            $table->longText('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('templates');
    }
};
