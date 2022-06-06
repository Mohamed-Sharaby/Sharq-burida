<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Sliders');
    }

    /**
     * Display a listing of the resource.
     *

     */
    public function index()
    {
        $sliders = Slider ::latest()->get();
        return view('dashboard.sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('dashboard.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'image' => 'required|image'
        ]);

        Slider ::create($validator);
        return redirect(route('admin.sliders.index'))->with('success', 'تم الاضافة بنجاح');
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return
     */
    public function edit(Slider $slider)
    {
        return view('dashboard.sliders.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return
     */
    public function update(Request $request, Slider $slider)
    {
        $validator = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'image' => 'nullable',
        ]);
        if ($request->has('image')){
            if ($slider->image) {
                $image = str_replace(url('/') . '/storage/', '', $slider->image);
                \Storage::disk('public')->delete('uploads', $image);
            }
        }

        $slider->update($validator);
        return redirect(route('admin.sliders.index'))->with('success', 'تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return
     */
    public function destroy(Slider $slider)
    {
        if ($slider->image) {
            $image = str_replace(url('/') . '/storage/', '', $slider->image);
            \Storage::disk('public')->delete('uploads', $image);
        }
        $slider->delete();
        return 'Done';
    }
}
