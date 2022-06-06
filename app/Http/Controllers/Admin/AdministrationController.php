<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Administration;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class AdministrationController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Administrations');
    }

    /**
     * Display a listing of the resource.
     *

     */
    public function index()
    {
        $administrations = Administration ::latest()->get();
        return view('dashboard.administrations.index', compact('administrations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('dashboard.administrations.create');
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
            'name' => 'required',
            'image' => 'required'
        ]);

        Administration ::create($validator);
        return redirect(route('admin.administrations.index'))->with('success', 'تم الاضافة بنجاح');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return
     */
    public function edit(Administration $administration)
    {
        return view('dashboard.administrations.edit', compact('administration'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return
     */
    public function update(Request $request, Administration $administration)
    {
        $validator = $request->validate([
            'name' => 'required',
            'image' => 'sometimes'
        ]);
        if ($request->has('image')){
            if ($administration->image) {
                $this->deleteImage($administration->image);
            }
        }

        $administration->update($validator);
        return redirect(route('admin.administrations.index'))->with('success', 'تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return
     */
    public function destroy(Administration $administration)
    {
        if ($administration->image) {
          $this->deleteImage($administration->image);
        }
        $administration->delete();
        return 'Done';
    }


    public function deleteImage($img)
    {
        $image = str_replace(url('/') . '/storage/', '', $img);
        \Storage::disk('public')->delete('uploads', $image);
    }
}
