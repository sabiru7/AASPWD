<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id(); // Kolom ID
            $table->string('name'); // Nama menu
            $table->text('description')->nullable(); // Deskripsi menu, nullable
            $table->decimal('price', 8, 2); // Harga menu
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade'); // Foreign key ke tabel categories
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('menus'); // Menghapus tabel menus jika rollback
    }
}