<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Media');
    }

    /**
     * Display a listing of the resource.
     *

     */
    public function index()
    {
        $media = Media ::latest()->get();
        return view('dashboard.media.index', compact('media'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('dashboard.media.create');
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

        Media ::create($validator);
        return redirect(route('admin.media.index'))->with('success', 'تم الاضافة بنجاح');
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return
     */
    public function edit($id)
    {
        $media = Media::findOrFail($id);
        return view('dashboard.media.edit', compact('media'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return
     */
    public function update(Request $request, $id)
    {
        $media = Media::findOrFail($id);
        $validator = $request->validate([
            'name' => 'required',
            'image' => 'sometimes'
        ]);
        if ($request->has('image')){
            if ($media->image) {
                $image = str_replace(url('/') . '/storage/', '', $media->image);
                \Storage::disk('public')->delete('uploads', $image);
            }
        }

        $media->update($validator);
        return redirect(route('admin.media.index'))->with('success', 'تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return
     */
    public function destroy($id)
    {
        $media = Media::findOrFail($id);
        if ($media->image) {
           $image = str_replace(url('/') . '/storage/', '', $media->image);
            \Storage::disk('public')->delete('uploads', $image);
        }
        $media->delete();
        return 'Done';
    }
}
