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
        Schema::create('furniture', function (Blueprint $table) {
            $table->id();
            $table->string('productname',50);
            $table->integer('price');
            $table->integer('cid');
            $table->string('desc',2000);
            $table->string('primary_material',300)->default("");
            $table->string('dimension',50)->default("");
            $table->string('specification',200)->default("");
            $table->string('weight',50)->default("");



            $table->string('img');
            $table->boolean('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('furniture');
    }
};
