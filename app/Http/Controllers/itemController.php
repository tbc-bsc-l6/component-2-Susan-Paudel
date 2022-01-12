<?php
//namespace show the link with those controller
namespace App\Http\Controllers;
//use Product Model
use App\Models\Product;

//Itemcontroller inherite the property of controller
class ItemController extends Controller
{
    /**
     * Display a listing of the book resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function bookDisplay()
    {
        /**
         * fetch producttype book from product model
         * latest function display latest add product
         * paginate function help to paginate the product that display only eight product in related pages
         */
        $book = Product::where('producttype', '=', 'book')->latest()->paginate(8);
        return view('customer/book', ['data' => $book]);
    }

    /**
     * Display a listing of the cd resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cdDisplay()
    {
        //select cd from product model
        $cd = Product::where('producttype', '=', 'cd')->latest()->paginate(8);
        //store data into data using key and value pair
        return view('customer/cd', ['data' => $cd]);
    }

    /**
     * Display a listing of the game resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function GameDisplay()
    {
        //select game from product type
        $game = Product::where('producttype', 'game')->latest()->paginate(8);
        //store data into data using key and value pair
        return view('customer/game', ['data' => $game]);
    }
}
