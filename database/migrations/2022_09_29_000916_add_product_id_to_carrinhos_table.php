<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProductIdToCarrinhosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('carrinhos', function (Blueprint $table) {
             // criando chave estrangeira com o id do produto
             $table->foreignId('product_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('carrinhos', function (Blueprint $table) {
            //deleta os produtos atrelados ao carrinho em cascata
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
        });
    }
}
