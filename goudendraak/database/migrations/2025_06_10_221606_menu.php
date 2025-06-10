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
        Schema::create('menu', function (Blueprint $table) {
            $table->id();
            $table->integer('menunummer')->nullable();;
            $table->string('menu_toevoeging')->nullable();
            $table->string('naam');
            $table->decimal('price',8,2);
            $table->string('soortgerecht');
            $table->string('beschrijving')->nullable();
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
