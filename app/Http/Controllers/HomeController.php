<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function file(Request $request)
    {
        $request_data=[];
        if ($request->file) {
            $image = $request->file;  // your base64 encoded
            $image = str_replace('data:image/png;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
            $request_data['file'] = str_random(10).'.'.'png';
            \File::put(public_path('uploads/user_images'). '/' . $request_data['file'], base64_decode($image));
//            $request_data['file']=$request_data['file']->hashname();
//            Image::make($image)
//                ->save(public_path('uploads/user_images/' . $request_data['file']),base64_decode($image));
        }
        return url('uploads/user_images/'.$request_data['file']);
    }
}
