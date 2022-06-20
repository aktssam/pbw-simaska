<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kendaraan', function (Blueprint $table) {
            $table->id();
            $table->string('nopol');
            $table->string('merk');
            $table->string('tipe');
            $table->string('tahun_keluaran');
            $table->boolean('bpkb')->default(false);
            $table->string('no_bpkb')->nullable();
            $table->boolean('stnk')->default(false);
            $table->string('no_stnk')->nullable();

            // Foreign key
            $table->foreignId('kategori_id')->constrained('kategori');
            $table->foreignId('department_id')->constrained('department');

            $table->timestamps();
        });

        DB::statement("ALTER TABLE kendaraan ADD blob_gambar MEDIUMBLOB null DEFAULT(null)");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kendaraan');
    }
};
