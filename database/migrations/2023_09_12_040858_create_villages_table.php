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
        Schema::create('villages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('district_id')
                ->constrained('districts')
                ->cascadeOnUpdate()
                ->restrictOnDelete()
                ->comment('id table district (kecamatan)');
            $table->string('code')
                ->unique()
                ->comment('kode wilayah administrasi kemendagri');
            $table->string('name')
                ->comment('nama kecamatan');
            $table->string('wide')
                ->nullable()
                ->comment('luas wilayah');
            $table->string('lat')
                ->nullable()
                ->comment('latitude');
            $table->string('long')
                ->nullable()
                ->comment('longitude');
            $table->longText('polygon')
                ->nullable()
                ->comment('map area');
            $table->boolean('is_active')
                ->default(1)
                ->comment('status');
            $table->timestamps();
            $table->softDeletes();
        });
    }




    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('villages');
    }
};
