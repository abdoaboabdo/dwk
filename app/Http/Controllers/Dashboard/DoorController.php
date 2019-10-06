<?php

namespace App\Http\Controllers\Dashboard;


use App\AluminumType;
use App\Category;
use App\Door;
use App\Image;
use App\WoodType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DoorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if (request()->ajax()){
            if ($request->category_id !== null){

                $data=Door::all()->load(['images','category'])->when($request->category_id,function ($q) use ($request){
                    return $q->where('category_id',$request->category_id);
                });
            }else{

                $data=Door::all()->where('category_id' ,'!=',8)->where('category_id' ,'!=',7)->load(['images','category']);
            }
            return datatables($data)
                ->addColumn('action',function ($data){
                    $button='<a href="'.route('dashboard.doors.edit',$data->id).'" class="btn btn-primary btn-sm">تعديل</a>';
                    $button.='<form action="'.route('dashboard.doors.destroy',$data->id).'" method="post" style="display: inline-block;margin-right:5px">
                                                        '.csrf_field()
                                                        .method_field('delete').'
                                                        <button class="btn btn-danger delete btn-sm">'.'حذف'.'</button>
                                                    </form>';
                    return $button;
                })->rawColumns(['action'])
                ->make(true);
        }
        $doorCategory=Category::find(1);
        return view('dashboard.doors.index',compact(['doorCategory']));
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
                'filename' => 'required',
                ]);
            $request->aluminum_type_id=null;
            $request->thickness=null;
        }elseif ($request->category_id == 5){
            $request->validate([
                'category_id' => 'required',
                'price' => 'required',
                'description' => 'required',
                'aluminum_type_id' => 'required',
                'thickness' => 'required',
                'filename' => 'required',
            ]);
            $request->wood_type_id=null;
        }else{
            $request->validate([
                'category_id' => 'required',
                'price' => 'required',
                'description' => 'required',
                'filename' => 'required',
            ]);
            $request->aluminum_type_id=null;
            $request->thickness=null;
            $request->wood_type_id=null;
        }
        $requestAll=$request->except(['filename']);
        $files=$request->filename;
        $door=Door::create($requestAll);
        if ($request->filename){
            $request_data=[];
            foreach ($files as $image){
                if ($image){
                    $image = str_replace('data:image/jpeg;base64,', '', $image);
                    $image = str_replace(' ', '+', $image);
                    $request_data['image'] = str_random(10).'.'.'jpg';
//                    \File::put(public_path('uploads/door_images'). '/' . $request_data['image'], base64_decode($image));
                    \Intervention\Image\Facades\Image::make(base64_decode($image))
                        ->resize(600, null, function ($constraint) {
                            $constraint->aspectRatio();
                        })
                        ->save(public_path('uploads/door_images/' . $request_data['image'] ));
                    $door->images()->create($request_data);
                }
            }
        }

//        dd($door);
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.doors.index');
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
    public function edit(Door $door)
    {
        $woodTypes=WoodType::all();
        $aluminum_types=AluminumType::all();
        $doorCategory=Category::find(1);
        return view('dashboard.doors.edit')->with(compact(['woodTypes','aluminum_types','doorCategory','door']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Door $door)
    {

        if ($request->category_id == 4){
            $request->validate([
                'category_id' => 'required',
                'price' => 'required',
                'description' => 'required',
                'wood_type_id' => 'required',
            ]);
            $request->aluminum_type_id=null;
            $request->thickness=null;
        }elseif ($request->category_id == 5){
            $request->validate([
                'category_id' => 'required',
                'price' => 'required',
                'description' => 'required',
                'aluminum_type_id' => 'required',
                'thickness' => 'required',
            ]);
            $request->wood_type_id=null;
        }else{
            $request->validate([
                'category_id' => 'required',
                'price' => 'required',
                'description' => 'required',
            ]);
            $request->aluminum_type_id=null;
            $request->thickness=null;
            $request->wood_type_id=null;
        }
        $requestAll=$request->except(['filename']);
//        $files=$request->filename;
        $door->update($requestAll);


        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.doors.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $door=Door::findOrFail($id);
        foreach ($door->images as $image){
            Storage::disk('public_uploads')->delete('/door_images/' . $image->image);
            $image->delete();
        }
        $door->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.doors.index');
    }
    public function destroyImage($id){
        $image=Image::findOrFail($id);
        $type='';
        if ($image->door_id != null && $image->window_id == null && $image->kitchen_id ==null){
            $type='door';
        }elseif ($image->door_id == null && $image->window_id == null && $image->kitchen_id != null){
            $type='kitchen';
        }elseif ($image->door_id == null && $image->window_id != null && $image->kitchen_id == null){
            $type='window';
        }
        Storage::disk('public_uploads')->delete('/'.$type.'_images/' . $image->image);
        $image->delete();
        return 'Success';

    }
    public function editImage(Request $request,$id){

        $myImage=Image::findOrFail($id);

        $type='';
        if ($myImage->door_id != null && $myImage->window_id == null && $myImage->kitchen_id ==null){
            $type='door';
        }elseif ($myImage->door_id == null && $myImage->window_id == null && $myImage->kitchen_id != null){
            $type='kitchen';
        }elseif ($myImage->door_id == null && $myImage->window_id != null && $myImage->kitchen_id == null){
            $type='window';
        }
        Storage::disk('public_uploads')->delete('/'.$type.'_images/' . $myImage->image);

        $request_data=[];
        $image=$request->dataImg;
        $image = str_replace('data:image/jpeg;base64,', '', $image);
        $image = str_replace('data:image/jpeg;base64,', '', $image);
        $image = str_replace(' ', '+', $image);
        $request_data['image'] = str_random(10).'.'.'jpg';
//        \File::put(public_path('uploads/door_images'). '/' . $request_data['image'], base64_decode($image));
        \Intervention\Image\Facades\Image::make(base64_decode($image))
            ->resize(600, null, function ($constraint) {
                $constraint->aspectRatio();
            })
            ->save(public_path('uploads/'.$type.'_images/' . $request_data['image'] ));
        $myImage->image=$request_data['image'];
        $myImage->save();
        return 'Success';
    }
    public function addImage(Request $request){
        $request_data=$request->except(['filename']);
        $image=$request->image;
        $image = str_replace('data:image/jpeg;base64,', '', $image);
        $image = str_replace(' ', '+', $image);
        $request_data['image'] = str_random(10).'.'.'jpg';
//        \File::put(public_path('uploads/door_images'). '/' . $request_data['image'], base64_decode($image));
        $type='';
       if ($request->door_id != null && $request->window_id == null && $request->kitchen_id ==null){
           $type='door';
       }elseif ($request->door_id == null && $request->window_id == null && $request->kitchen_id != null){
           $type='kitchen';
       }elseif ($request->door_id == null && $request->window_id != null && $request->kitchen_id == null){
           $type='window';
       }
        \Intervention\Image\Facades\Image::make(base64_decode($image))
            ->resize(600, null, function ($constraint) {
                $constraint->aspectRatio();
            })
            ->save(public_path('uploads/'.$type.'_images/' . $request_data['image'] ));
        $request_image=[
            'door_id'=>$request->door_id,
            'kitchen_id'=>$request->kitchen_id,
            'window_id'=>$request->window_id,
            'image'=>$request_data['image'],

        ];
//        dd($request_image);
        $image=Image::create($request_image);
//        $myImage=Image::create([
//            'image'=>$request_data['image'],
//            'door_id'=>(int)$request->door_id
//        ]);//door_id
        return $image;
    }
}
