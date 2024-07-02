<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flyer extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'maker_id',
        'shop_id',
        'image_url',
        'from_period',
        'to_period',
    ];
    
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
    
    public function getPaginateByLimit(int $limit_count = 10)
    {
        // updated_atで降順に並べたあと、limitで件数制限をかける
        return $this->orderBy('day', 'DESC')->paginate($limit_count);
    }
}
