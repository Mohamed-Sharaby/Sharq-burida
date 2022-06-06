<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SecondSlider;
use Illuminate\Http\Request;

class SecondSliderController extends Controller
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
        $sliders = SecondSlider::latest()->get();
        return view('dashboard.second-sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('dashboard.second-sliders.create');
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

        SecondSlider::create($validator);
        return redirect(route('admin.second-sliders.index'))->with('success', 'تم الاضافة بنجاح');
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return
     */
    public function edit(SecondSlider $secondSlider)
    {
        return view('dashboard.second-sliders.edit', compact('secondSlider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return
     */
    public function update(Request $request, SecondSlider $secondSlider)
    {
        $validator = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'image' => 'nullable',
        ]);
        if ($request->has('image')){
            if ($secondSlider->image) {
                $image = str_replace(url('/') . '/storage/', '', $secondSlider->image);
                \Storage::disk('public')->delete('uploads', $image);
            }
        }

        $secondSlider->update($validator);
        return redirect(route('admin.second-sliders.index'))->with('success', 'تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return
     */
    public function destroy(SecondSlider $secondSlider)
    {
        if ($secondSlider->image) {
            $image = str_replace(url('/') . '/storage/', '', $secondSlider->image);
            \Storage::disk('public')->delete('uploads', $image);
        }
        $secondSlider->delete();
        return 'Done';
    }
}
