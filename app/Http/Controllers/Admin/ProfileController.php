<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Profile');
    }

    /**
     * Display a listing of the resource.
     *

     */
    public function index()
    {
        $profiles = Profile ::latest()->get();
        return view('dashboard.profiles.index', compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('dashboard.profiles.create');
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

        Profile ::create($validator);
        return redirect(route('admin.profiles.index'))->with('success', 'تم الاضافة بنجاح');
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return
     */
    public function edit(Profile $profile)
    {
        return view('dashboard.profiles.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return
     */
    public function update(Request $request, Profile $profile)
    {
        $validator = $request->validate([
            'name' => 'required',
            'image' => 'sometimes'
        ]);
        if ($request->has('image')){
            if ($profile->image) {
                $image = str_replace(url('/') . '/storage/', '', $profile->image);
                \Storage::disk('public')->delete('uploads', $image);
            }
        }

        $profile->update($validator);
        return redirect(route('admin.profiles.index'))->with('success', 'تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return
     */
    public function destroy(Profile $profile)
    {
        if ($profile->image) {
           $image = str_replace(url('/') . '/storage/', '', $profile->image);
            \Storage::disk('public')->delete('uploads', $image);
        }
        $profile->delete();
        return 'Done';
    }
}
