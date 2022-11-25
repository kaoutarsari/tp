<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cookie;

class LangsController extends Controller
{
    public function langs_handler(Request $request){
         
        $this->validate($request, [ 
            'lang' => 'required|alpha|min:2|max:3', 
        ]); 
        Cookie::queue(Cookie::make('lang', $request->lang));
        return back();
    }

}
