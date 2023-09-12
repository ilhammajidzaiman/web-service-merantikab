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
        Schema::create('districts', function (Blueprint $table) {
            $table->id();
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
        Schema::dropIfExists('districts');
    }
};
