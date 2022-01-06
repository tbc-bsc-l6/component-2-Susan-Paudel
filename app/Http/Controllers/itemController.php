<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;

class itemController extends Controller
{
    
    public function bookDisplay(){
        $book=product::where('producttype','=','book')->latest()->paginate(8);
        return view('customer/book',['data'=>$book]);
    }
    public function cdDisplay(){
        $cd=product::where('producttype','=','cd')->latest()->paginate(8);
        return view('customer/cd',['data'=>$cd]);
    }
    public function GameDisplay(){
        $game=product::where('producttype','game')->latest()->paginate(8);
        return view('customer/game',['data'=>$game]);
    }
}
