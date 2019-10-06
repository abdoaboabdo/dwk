<?php

namespace App\Http\Controllers;

use App\Door;
use App\Kitchen;
use App\Window;
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
        $doors=Door::all()->load(['images','category']);
        return view('frontend.index',compact(['doors']));
    }

    public function doors(Request $request){
        if ($request->ajax()){
//            if ($request->type!==null){
//                if ($request->type === 'wood'){
//                    $doors=Door::where('category_id' ,'=',4)->paginate(15;
//                    return view('frontend.doors_ajax',compact(['doors']))->render();
//                }elseif ($request->type === 'aluminum'){
//                    $doors=Door::where('category_id' ,'=',5)->paginate(15;
//                    return view('frontend.doors_ajax',compact(['doors']))->render();
//                }elseif ($request->type === 'iron'){
//                    $doors=Door::where('category_id' ,'=',6)->paginate(15;
//                    return view('frontend.doors_ajax',compact(['doors']))->render();
//                }
//            }else{
//                $doors=Door::where('category_id' ,'!=',8)->where('category_id' ,'!=',7)->paginate(15;
//                return view('frontend.doors_ajax',compact(['doors']))->render();
//            }
            $doors=Door::where('category_id' ,'!=',8)->where('category_id' ,'!=',7)->paginate(15);
            return view('frontend.doors_ajax',compact(['doors']))->render();

        }
        $doors=Door::where('category_id' ,'!=',8)->where('category_id' ,'!=',7)->paginate(15);
        return view('frontend.doors',compact(['doors']));
    }
    public function doors_woods(Request $request){
        if ($request->ajax()){
            $doors=Door::where('category_id' ,'=',4)->paginate(15);
            return view('frontend.doors_ajax',compact(['doors']))->render();
        }
        $doors=Door::where('category_id' ,'=',4)->paginate(15);
        return view('frontend.doors',compact(['doors']));
    }
    public function doors_aluminums(Request $request){
        if ($request->ajax()){
            $doors=Door::where('category_id' ,'=',5)->paginate(15);
            return view('frontend.doors_ajax',compact(['doors']))->render();
        }
        $doors=Door::where('category_id' ,'=',5)->paginate(15);
        return view('frontend.doors',compact(['doors']));
    }
    public function doors_irons(Request $request){
        if ($request->ajax()){
            $doors=Door::where('category_id' ,'=',6)->paginate(15);
            return view('frontend.doors_ajax',compact(['doors']))->render();
        }
        $doors=Door::where('category_id' ,'=',6)->paginate(15);
        return view('frontend.doors',compact(['doors']));
    }

    public function handrails(Request $request)
    {
        if ($request->ajax()){
            $doors=Door::whereBetween('category_id' ,[7,9]) ->paginate(15);
            return view('frontend.doors_ajax',compact(['doors']))->render();
        }
        $doors=Door::whereBetween('category_id' ,[7,9])->paginate(15);
        return view('frontend.doors',compact(['doors']));
    }
    public function handrails_normal(Request $request){
        if ($request->ajax()){
            $doors=Door::where('category_id' ,'=',7)->paginate(15);
            return view('frontend.doors_ajax',compact(['doors']))->render();
        }
        $doors=Door::where('category_id' ,'=',7)->paginate(15);
        return view('frontend.doors',compact(['doors']));
    }
    public function handrails_stainless(Request $request){
        if ($request->ajax()){
            $doors=Door::where('category_id' ,'=',8)->paginate(15);
            return view('frontend.doors_ajax',compact(['doors']))->render();
        }
        $doors=Door::where('category_id' ,'=',8)->paginate(15);
        return view('frontend.doors',compact(['doors']));
    }
    public function windows(Request $request){
        if ($request->ajax()){
            $windows=Window::paginate(15);
            return view('frontend.windows_ajax',compact(['windows']))->render();
        }
        $windows=Window::paginate(15);
        return view('frontend.windows',compact(['windows']));
    }
    public function windows_zipper(Request $request){
        if ($request->ajax()){
            $windows=Window::where('category_id' ,'=',9)->paginate(15);
            return view('frontend.windows_ajax',compact(['windows']))->render();
        }
        $windows=Window::where('category_id' ,'=',9)->paginate(15);
        return view('frontend.windows',compact(['windows']));
    }
    public function windows_hinge(Request $request){
        if ($request->ajax()){
            $windows=Window::where('category_id' ,'=',10)->paginate(15);
            return view('frontend.windows_ajax',compact(['windows']))->render();
        }
        $windows=Window::where('category_id' ,'=',10)->paginate(15);
        return view('frontend.windows',compact(['windows']));
    }
    public function windows_fixed(Request $request){
        if ($request->ajax()){
            $windows=Window::where('category_id' ,'=',11)->paginate(15);
            return view('frontend.windows_ajax',compact(['windows']))->render();
        }
        $windows=Window::where('category_id' ,'=',11)->paginate(15);
        return view('frontend.windows',compact(['windows']));
    }
    public function windows_inverting(Request $request){
        if ($request->ajax()){
            $windows=Window::where('category_id' ,'=',12)->paginate(15);
            return view('frontend.windows_ajax',compact(['windows']))->render();
        }
        $windows=Window::where('category_id' ,'=',12)->paginate(15);
        return view('frontend.windows',compact(['windows']));
    }
    public function windows_db_action(Request $request){
        if ($request->ajax()){
            $windows=Window::where('category_id' ,'=',15)->paginate(15);
            return view('frontend.windows_ajax',compact(['windows']))->render();
        }
        $windows=Window::where('category_id' ,'=',15)->paginate(15);
        return view('frontend.windows',compact(['windows']));
    }
    public function kitchens(Request $request){
        if ($request->ajax()){
            $kitchens=Kitchen::where('category_id' ,'=',3)->paginate(15);
            return view('frontend.kitchens_ajax',compact(['kitchens']))->render();
        }
        $kitchens=Kitchen::where('category_id' ,'=',3)->paginate(15);
        return view('frontend.kitchens',compact(['kitchens']));
    }
    public function window_item($id){
        $data=Window::find($id)->load(['images','category','aluminum_type']);
        return view('frontend.window_item',compact(['data']));
    }
    public function door_item($id){
        $data=Door::find($id)->load(['images','category']);
        return view('frontend.door_item',compact(['data']));
    }
    public function kitchen_item($id){
        $data=Kitchen::find($id)->load(['images','category']);
        return view('frontend.kitchen_item',compact(['data']));
    }
}
