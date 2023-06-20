<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AgendaKegiatan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agenda_kegiatan', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('jenis_kegiatan');
            $table->date('tgl_kegiatan');
            $table->string('jumlah view');
            $table->binary('gambar');
            $table->date('deleted_at')->nullable();
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
        Schema::dropIfExists('agenda_kegiatan');
    }
}
