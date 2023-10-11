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
        Schema::create('amazens', function (Blueprint $table) {
            $table->id();
            $table->string('sku', 8)->unique();
            $table->string('name')->index();
            $table->text('description')->nullable();
            $table->float('price')->unsigned();
            $table->tinyInteger('rate')->unsigned()->default(0);
            $table->integer('stock')->unsigned()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('amazens');
    }
};
