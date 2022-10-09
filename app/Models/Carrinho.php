<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrinho extends Model
{
    use HasFactory;

    public function product(){

        //informa que o produto sempre pertenserá a um usuário
        return $this->belongsTo('App\Models\Product');
    }

    public function user(){

        //informa que o produto sempre pertenserá a um usuário
        return $this->belongsTo('App\Models\User');
    }
}
