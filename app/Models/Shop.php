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
    
    public function getPaginateByLimit(int $limit_count = 10)
    {
        // updated_atで降順に並べたあと、limitで件数制限をかける
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    //ユーザに対するリレーション(編集)
    public function user2()
    {
        return $this->belongsToMany(User::class);
    }
    
    public function flyers()
    {
        return $this->hasMany(Flyer::class);
    }
    
    public function merchandises()
    {
        return $this->hasMany(Merchandises::class);
    }
}
