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
    Schema::create('menus', function (Blueprint $table) {

        $table->id();

        $table->string('name');

        $table->text('description')->nullable();

        $table->foreignId('type_menu_id')
              ->constrained('type_menus')
              ->cascadeOnDelete();

        $table->foreignId('account_id')
              ->nullable();

        $table->decimal('price', 10, 2);

        $table->string('photo')->nullable();

        $table->boolean('status')->default(true);

        $table->integer('preparation_time');

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
