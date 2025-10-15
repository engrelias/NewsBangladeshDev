<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
        $table->id();
        $table->string('role_title')->unique();
        $table->text('role_description')->nullable();
        $table->enum('role_status', ['1', '0'])
            ->default('1')
            ->comment('1 = active, 0 = inactive');
        $table->integer('role_order')->nullable();
        $table->json('role_permissions')->nullable();
        $table->unsignedBigInteger('role_created_by')->nullable();
        $table->unsignedBigInteger('role_updated_by')->nullable();
        $table->timestamps();
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
