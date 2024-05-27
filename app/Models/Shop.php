<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'maker_id',
        'address',
        'open',
        'close',
        'tel',
        'image_url'
    ];
    
    public function getPaginateByLimit(int $limit_count = 1)
    {
        // updated_atで降順に並べたあと、limitで件数制限をかける
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    //ユーザに対するリレーション
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}