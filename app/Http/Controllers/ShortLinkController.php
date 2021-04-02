<?php

namespace App\Http\Controllers;

use App\ShortLink;
use Illuminate\Http\Request;

class ShortLinkController extends Controller
{
    //
    public function index(){

        $shortlinks = ShortLink::all();
        return view('shortenLink',compact('shortlinks'));
    }
    public function store(Request $request){
        $request->validate([
            'code'=>'required'
        ]);
        $linka = new ShortLink;
        $linka->code = $request->get('code');
        $number = rand(10,99);
        $string = $this->generateRandomString(3);
        $linka->link="short.local/gt/329$string$number";
        $linka->save();
        return redirect('/new')->with('success','shorturl created');

    }
    function generateRandomString($length = 3) {
        $characters = 'abcdefghijklmnopqrstuvwxyz';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
