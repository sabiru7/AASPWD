<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id(); // Kolom ID
            $table->string('name')->unique(); // Nama kategori, harus unik
            $table->text('description')->nullable(); // Deskripsi kategori, nullable
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('categories'); // Menghapus tabel categories jika rollback
    }
}