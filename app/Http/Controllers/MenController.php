<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mantshirt;

class MenController extends Controller
{
    public function index(){
        return view('/men');
    }

    public function tshirts(){

        $tshirts = mantshirt::all(); 

        return view('/category/tshirts' , [ 'tshirts' => $tshirts ]);
    }

    public function model($id){
       
        $tshirt = mantshirt::findOrFail($id);
        $photo = explode(" ", $tshirt->photos);

        return view('/category/model' , [ 'model' => $tshirt ] , [ 'photo' => $photo ]);

    }

    public function buy($id){

        $tshirt = mantshirt::findOrFail($id);
        $photo = explode(" ", $tshirt->photos);
        $size = request('size');
        if($size != ""){
            $tshirt->$size = $tshirt->$size - 1;
            $tshirt->save(); 
            
            echo    '<div class="orders">
                        <div class="order-image">
                            <img src="/img/tshirts/'.$tshirt->image.'">
                        </div> 
                        <div class="order-description">
                            <p>'.$tshirt->brand.'</p>
                        </div>
                        <div class="order-price">
                            <p>'.$tshirt->price.'</p>
                        </div>
                    </div>';
        }
        return view('/category/model' , [ 'model' => $tshirt ] , [ 'photo' => $photo ]);
       // return redirect('/men/tshirts/'.$tshirt->id);
    }
}
