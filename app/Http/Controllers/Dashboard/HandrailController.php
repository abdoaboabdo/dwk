<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;
use App\Door;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class HandrailController extends Controller
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

                $data=Door::all()->whereBetween('category_id' ,[7,9])->load(['images','category']);

            }
            return datatables($data)
                ->addColumn('action',function ($data){
                    $button='<a href="'.route('dashboard.handrails.edit',$data->id).'" class="btn btn-primary btn-sm">تعديل</a>';
                    $button.='<form action="'.route('dashboard.handrails.destroy',$data->id).'" method="post" style="display: inline-block;margin-right:5px">
                                                        '.csrf_field()
                        .method_field('delete').'
                                                        <button class="btn btn-danger delete btn-sm">'.'حذف'.'</button>
                                                    </form>';
                    return $button;
                })->rawColumns(['action'])
                ->make(true);
        }
        $doorCategory=Category::find(14);
        return view('dashboard.handrails.index',compact(['doorCategory']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doorCategory=Category::find(14);
        return view('dashboard.handrails.create')->with(compact(['doorCategory']));
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
            'filename' => 'required',
        ]);
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
        return redirect()->route('dashboard.handrails.index');
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
    public function edit(Door $handrail)
    {
//        dd($door);
        $doorCategory=Category::find(14);
        return view('dashboard.handrails.edit')->with(compact(['doorCategory','handrail']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Door $handrail)
    {
        $request->validate([
            'category_id' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);
        $requestAll=$request->except(['filename']);
//        $files=$request->filename;
        $handrail->update($requestAll);
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.handrails.index');
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
        return redirect()->route('dashboard.handrails.index');
    }
}
