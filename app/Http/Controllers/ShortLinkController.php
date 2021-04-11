<?php

namespace App\Http\Controllers;

use App\ShortLink;
use Illuminate\Http\Request;

class ShortLinkController extends Controller
{
    public function index(){
        $urls = ShortLink::all();
        return view('index',compact('urls'));
   }
    public function create(){
        $count = ShortLink::count();
        if($count>=10){
            return 'เกินกำหนด';
        }
        return view('create');
    }
    public function store(Request $request){
//        dd($this->randString());
        $long_url = $request->get('long_url');
        $short_url = $this->randString();
        ShortLink::create([
            'code' => $long_url,
            'link' =>$short_url
        ]);
        return redirect('/')->with('success','shorturl created');



    }
    public function randString(){
        $characters = 'abcdefghijklmnopqrstuvwxyz';
        $numbers = '0123456789';
        $string = "329";
        $charLength = strlen($characters);
        $numLength = strlen($numbers);


        for ($i=0;$i<3;$i++){
            $string.=$characters[rand(0,$charLength-1)];
        }
        for ($i=0;$i<2;$i++){
            $string.=$numbers[rand(0,$numLength-1)];
        }


        return $string;


    }
    public function check($code){
        $result = ShortLink::Where('link',$code)->first();
        if ($result){
            return redirect()->away($result->code);
        }
        return 'ไม่พบ URL นี้';

    }

    //
//    public function index(){
//
//        $shortlinks = ShortLink::all();
//        return view('shortenLink',compact('shortlinks'));
//    }
//    public function store(Request $request){
//        $request->validate([
//            'code'=>'required'
//        ]);
//        $linka = new ShortLink;
//        $linka->code = $request->get('code');
//        $number = rand(10,99);
//        $string = $this->generateRandomString(3);
//        $linka->link="short.local/gt/329$string$number";
//        $linka->save();
//        return redirect('/new')->with('success','shorturl created');
//
//    }
//    function generateRandomString($length = 3) {
//        $characters = 'abcdefghijklmnopqrstuvwxyz';
//        $charactersLength = strlen($characters);
//        $randomString = '';
//        for ($i = 0; $i < $length; $i++) {
//            $randomString .= $characters[rand(0, $charactersLength - 1)];
//        }
//        return $randomString;
//    }
}
