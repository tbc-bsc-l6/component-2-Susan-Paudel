<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;

class itemController extends Controller
{
    
    public function bookDisplay(){
        $book=product::where('producttype','=','book')->latest()->paginate(6);
        return view('own/book',['data'=>$book]);
    }
    public function cdDisplay(){
        $cd=product::where('producttype','=','cd')->latest()->paginate(6);
        return view('own/cd',['data'=>$cd]);
    }
    public function GameDisplay(){
        $game=product::where('producttype','game')->latest()->paginate(6);
        return view('own/game',['data'=>$game]);
    }
}
