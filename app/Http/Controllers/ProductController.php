<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private ?array $products = null;

    public function index(){
        if(!$this->products){
            $this->products = Product::all()->toArray();
        }

        return view('dashboard')->with('products', $this->products);
    }

    public function __get($property){
        if(!property_exists($this, $property)){
            return null;
        }
        
        return $this->$property;
    }

}
