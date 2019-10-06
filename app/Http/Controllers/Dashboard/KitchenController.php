<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;
use App\Door;
use App\Kitchen;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class KitchenController extends Controller
{
    public function __construct()
    {
        $this->middleware('web');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (request()->ajax()){

            $data=Kitchen::all()->load(['images']);

            return datatables($data)
                ->addColumn('action',function ($data){
                    $button='<a href="'.route('dashboard.kitchens.edit',$data->id).'" class="btn btn-primary btn-sm">تعديل</a>';
                    $button.='<form action="'.route('dashboard.kitchens.destroy',$data->id).'" method="post" style="display: inline-block;margin-right:5px">
                                                        '.csrf_field()
                        .method_field('delete').'
                                                        <button class="btn btn-danger delete btn-sm">'.'حذف'.'</button>
                                                    </form>';
                    return $button;
                })->rawColumns(['action'])
                ->make(true);
        }

        return view('dashboard.kitchens.index',compact([]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.kitchens.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());
        $request->validate([
            'price' => 'required',
            'description' => 'required',
            'color' => 'required',
            'filename' => 'required',
        ]);
        $requestAll=$request->except(['filename']);
        $files=$request->filename;
        $kitchen=Kitchen::create($requestAll);
        if ($request->filename){
            $request_data=[];
            foreach ($files as $image){
                if ($image){
                    $image = str_replace('data:image/jpeg;base64,', '', $image);
                    $image = str_replace(' ', '+', $image);
                    $request_data['image'] = str_random(10).'.'.'jpg';
                    \File::put(public_path('uploads/kitchen_images'). '/' . $request_data['image'], base64_decode($image));
                    \Intervention\Image\Facades\Image::make(base64_decode($image))
                        ->resize(600, null, function ($constraint) {
                            $constraint->aspectRatio();
                        })
                        ->save(public_path('uploads/kitchen_images/' . $request_data['image'] ));
                    $kitchen->images()->create($request_data);
                }
            }
        }

//        dd($door);
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.kitchens.index');
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
    public function edit(Kitchen $kitchen)
    {
        return view('dashboard.kitchens.edit',compact(['kitchen']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kitchen $kitchen)
    {
        $request->validate([
            'price' => 'required',
            'description' => 'required',
            'color' => 'required',
        ]);
        $requestAll=$request->except(['filename']);
//        $files=$request->filename;
        $kitchen->update($requestAll);
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.kitchens.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kitchen=Kitchen::findOrFail($id);
        foreach ($kitchen->images as $image){
            Storage::disk('public_uploads')->delete('/kitchen_images/' . $image->image);
            $image->delete();
        }
        $kitchen->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.kitchens.index');
    }
}
