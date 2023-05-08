<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article', function (Blueprint $table) {
            $table->id();
            $table->string('judul_artikel');
            $table->string('kategori_artikel');
            $table->string('id_user');
            $table->string('nama_file');
            $table->string('file_revisi')->nullable();
            $table->string('status');
            $table->string('komentar_editor')->default('Belum ada komentar');
            $table->string('komentar_vendor')->default('Belum ada komentar');
            $table->string('vendor')->nullable();
            $table->string('jurnal')->nullable();
            $table->string('cover_file')->nullable();
            $table->string('cv_file')->nullable();
            $table->string('loa_file')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article');
    }
};
