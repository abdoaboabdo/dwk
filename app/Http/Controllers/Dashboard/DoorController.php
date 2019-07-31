<?php

namespace App\Http\Controllers\Dashboard;


use App\AluminumType;
use App\Category;
use App\Door;
use App\WoodType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class DoorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.doors.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $woodTypes=WoodType::all();
        $aluminum_types=AluminumType::all();
        $doorCategory=Category::find(1);
        return view('dashboard.doors.create')->with(compact(['woodTypes','aluminum_types','doorCategory']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->category_id == 4){
            $request->validate([
                'category_id' => 'required',
                'price' => 'required',
                'description' => 'required',
                'wood_type_id' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
        }elseif ($request->category_id == 5){
            $request->validate([
                'category_id' => 'required',
                'price' => 'required',
                'description' => 'required',
                'aluminum_type_id' => 'required',
                'thickness' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
        }else{
            $request->validate([
                'category_id' => 'required',
                'price' => 'required',
                'description' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
        }
        $requestAll=$request->except(['image']);

        if ($request->image) {
            $request_data['image'] = $request->image->hashname();
            //dd($request_data['image'] );
            //dd($request->image);
            Image::make($request->image)
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/doors/' . $request_data['image']));
        }
       $door=Door::create($requestAll);
//        $door->thickness=$request->input('thickness');
//        $door->price=$request->input('price');
//        $door->description=$request->input('description');
//        $door->category_id=$request->input('category_id');
//        $door->aluminum_type_id=$request->input('aluminum_type_id');
//        $door->wood_type_id=$request->input('wood_type_id');
        $door->images()->create($request_data);
        dd($door);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
