<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function getPaginateByLimit2(int $limit_count = 10)
    {
        return $this->merchandises()->orderBy('day')->paginate($limit_count);
    }
    
    //店舗に対するリレーション(編集)
    public function shops2(){
        //ユーザーは多数の店舗情報を登録
        return $this->belongsToMany(Shop::class); 
    }
    
    public function flyers(){
        //ユーザーは多数のMyチラシを登録
        return $this->belongsToMany(Flyer::class); 
    }
    
    public function merchandises(){
        //ユーザーは多数の買い物リストを登録
        return $this->hasMany(Merchandise::class); 
    }

}
