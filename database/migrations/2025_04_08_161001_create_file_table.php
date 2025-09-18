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
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('name'); // Имя файла или папки
            $table->string('path'); // Путь внутри storage
            $table->bigInteger('size')->default(0); // Размер в байтах, для папок можно оставлять 0
            $table->boolean('is_folder')->default(false); // Это папка или файл
            $table->foreignId('parent_id')->nullable()->constrained('files')->onDelete('cascade'); 
            $table->enum('visibility', ['private', 'family', 'public']);
            $table->json('family_ids')->nullable();
            $table->boolean('virus_checked')->default(false);
            $table->boolean('is_infected')->default(false);
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('file');
    }
};
