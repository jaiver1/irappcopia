<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('referencia', 50);
            $table->string('nombre', 50);
            $table->double('valor', 12, 2);
            $table->boolean('vencimiento'); 
            $table->string('image', 100)->default("")->nullable();
            $table->unsignedBigInteger('medida_id')->default(1);
            $table->unsignedBigInteger('marca_id')->default(1);
            $table->unsignedBigInteger('tipo_referencia_id')->default(1);         
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('medida_id')->references('id')->on('medidas')->onUpdate('cascade')->onDelete('cascade');                         
            $table->foreign('marca_id')->references('id')->on('marcas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('tipo_referencia_id')->references('id')->on('tipo_referencias')->onUpdate('cascade')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}