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
        /**
         * Laravel solo infiere automáticamente cuando creas la foreign key junto con la tabla.
         * Si lo haces en una migración separada (Schema::table), ya no funciona
         * la inferencia y necesitas pasarle el nombre explícito.
         * constrained() solo funciona automáticamente cuando la foreign key se crea en la misma migración que la tabla.
         */
        Schema::table('vacantes', function (Blueprint $table) {
            $table->string('titulo');
            $table->text('descripcion');
            $table->foreignId('salario_id')->constrained('salarios')->onDelete('cascade');
            $table->foreignId('categoria_id')->constrained('categorias')->onDelete('cascade');
            $table->string('empresa');
            $table->date('ultimo_dia');
            $table->string('imagen');
            $table->string('publicada')->default(1);
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vacantes', function (Blueprint $table) {
            $table->dropForeign('vacantes_salario_id_foreign');
            $table->dropForeign('vacantes_categoria_id_foreign');
            $table->dropForeign('vacantes_user_id_foreign');

            $table->dropColumn(['titulo', 'descripcion', 'salario_id', 'categoria_id', 'empresa', 'ultimo_dia', 'imagen', 'publicada', 'user_id']);
        });
    }
};
