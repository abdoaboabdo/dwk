<?php

namespace App\Http\Controllers\Dashboard;

use App\AluminumType;
use App\Category;
use App\Color;
use App\Door;
use App\Window;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class WindowController extends Controller
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

                $data=Window::all()->load(['images','category'])->when($request->category_id,function ($q) use ($request){
                    return $q->where('category_id',$request->category_id);
                });
            }else{

                $data=Window::all()->load(['images','category']);
            }
            return datatables($data)
                ->addColumn('action',function ($data){
                    $button='<a href="'.route('dashboard.windows.edit',$data->id).'" class="btn btn-primary btn-sm">تعديل</a>';
                    $button.='<form action="'.route('dashboard.windows.destroy',$data->id).'" method="post" style="display: inline-block;margin-right:5px">
                                                        '.csrf_field()
                        .method_field('delete').'
                                                        <button class="btn btn-danger delete btn-sm">'.'حذف'.'</button>
                                                    </form>';
                    return $button;
                })->rawColumns(['action'])
                ->make(true);
        }
        $windowCategory=Category::find(2);
        return view('dashboard.windows.index',compact(['windowCategory']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $windowCategory=Category::find(2);
        $aluminum_types=AluminumType::all();
        $color=Color::all();
        return view('dashboard.windows.create',compact(['windowCategory','aluminum_types','color']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'price' => 'required',
            'description' => 'required',
            'thickness' => 'required',
            'color' => 'required',
            'aluminum_type_id' => 'required',
            'filename' => 'required',
        ]);
//        dd($request->filename);
        $requestAll=$request->except(['filename']);
        $files=$request->filename;
        $window=Window::create($requestAll);
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
                        ->save(public_path('uploads/window_images/' . $request_data['image'] ));
                    $window->images()->create($request_data);
                }
            }
        }
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.windows.index');
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
    public function edit(Window $window)
    {
        $windowCategory=Category::find(2);
        $aluminum_types=AluminumType::all();
        $color=Color::all();
        return view('dashboard.windows.edit',compact(['windowCategory','window','aluminum_types','color']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Window $window)
    {
        $request->validate([
            'category_id' => 'required',
            'price' => 'required',
            'description' => 'required',
            'thickness' => 'required',
            'color' => 'required',
            'filename' => 'required',
        ]);
        $requestAll=$request->except(['filename']);
        $window->update($requestAll);
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.windows.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $window=Window::findOrFail($id);
        foreach ($window->images as $image){
            Storage::disk('public_uploads')->delete('/window_images/' . $image->image);
            $image->delete();
        }
        $window->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.windows.index');
    }
}
