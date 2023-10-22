<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $table = 'items';
    protected $fillable = ['user_id', 'name', 'type_id', 'detail'];
    public function type()
    {
        return $this->belongsTo(Type::class);
        // この商品は一つの種別に属している (逆の関係もTypeモデル内で定義する)
    }
    
}
