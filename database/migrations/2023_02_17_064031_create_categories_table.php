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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique()->index();
            $table->string('slug')->default('');
            $table->text('description')->nullable();
            $table->text('image')->nullable();;
            $table->integer('is_parent')->default(0)->comment('0 = Parent');
            $table->unsignedBigInteger('regular_price')->nullable();
            $table->unsignedBigInteger('discount')->nullable();
            $table->integer('is_featured')->default(0)->comment('0 = Disabled, 1 = Enabled');
            $table->integer('status')->default(0)->comment('0 = Inactive, 1 = Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
