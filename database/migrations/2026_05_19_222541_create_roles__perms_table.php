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
        Schema::create('roles_perms', function (Blueprint $table) {
            // $table->uuid("uuid")->primary();
            $table->foreignUuid('role_id')->references("id")->on('types_users')->cascadeOnDelete();
            $table->foreignUuid('perm_id')->references("id")->on('perms')->cascadeOnDelete();
            $table->unique(['role_id', 'perm_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles_perms');
    }
};
