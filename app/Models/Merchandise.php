<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchandise extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'shop_id',
        'day',
        'name',
        'price',
    ];
    
    
    //ユーザに対するリレーション(作成)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
    
}
