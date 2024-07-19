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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('organization_id');
            $table->string('firstname');
            $table->string('lastname')->nullable();
            
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullabe();
            $table->string('state')->nullable();
            $table->timestamps();

            // $table->foreignId('organization_id')->on('organisation')->constrained()->onDelete('cascade');
            // $table->string('email')->unique();

            $table->foreign('organization_id')
            ->references('id')
            ->on('organizations')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
