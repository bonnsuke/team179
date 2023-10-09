<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    
    public function getTypeNameById()
    {
        return DB::table('items')
        ->join('types','items.type_id','=','types.id')
        ->get();
    }
}
