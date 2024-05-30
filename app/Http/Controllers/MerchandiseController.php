<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\User;
use App\Models\Flyer;
use App\Models\Merchandise;
use App\Http\Requests\MerchandiseRequest; // useする
use Illuminate\Support\Facades\Auth;

class MerchandiseController extends Controller
{
    public function index2()
    {
        $user = Auth::user();
        
        return view('merchandises.index2')->with(['merchandises' => $user->getPaginateByLimit2()]);
    }
    
    public function create2(Shop $shop)
    {
        return view('merchandises.create2')->with(['shops' => $shop->get()]);
    }
    
    public function store2(MerchandiseRequest $request, Merchandise $merchandise)
    {
        $input = $request['merchandise'];
        
        $input['user_id'] = auth()->id();
        $merchandise->fill($input)->save();
        return redirect('/mypage');
    }
}
