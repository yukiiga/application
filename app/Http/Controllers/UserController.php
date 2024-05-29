<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\User;
use App\Models\Flyer;
use App\Http\Requests\UserRequest; // useする
use Cloudinary;
use Illuminate\Support\Facades\Auth; 

class UserController extends Controller
{
    public function index3()//インポートしたShopをインスタンス化して$shopとして使用。
    {
        $user = Auth::user();
        $flyers = $user->flyers()->paginate(1);
        return view('users.index3')->with(['user' => $user, 'flyers' => $flyers]);
    }
}
