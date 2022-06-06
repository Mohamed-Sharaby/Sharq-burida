<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Donate;
use App\Models\Media;
use App\Models\SiteRole;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class SiteRoleController extends Controller
{

    public function index()
    {
        $roles = SiteRole::latest()->get();
        return view('dashboard.site-roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('dashboard.site-roles.create');
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

        SiteRole::create($validator);
        return redirect(route('admin.site-roles.index'))->with('success', 'تم الاضافة بنجاح');
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return
     */
    public function edit($id)
    {
        $role = SiteRole::findOrFail($id);
        return view('dashboard.site-roles.edit', compact('role'));
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
        $role = SiteRole::findOrFail($id);
        $validator = $request->validate([
            'name' => 'required',
            'image' => 'sometimes'
        ]);
        if ($request->has('image')){
            if ($role->image) {
                $image = str_replace(url('/') . '/storage/', '', $role->image);
                \Storage::disk('public')->delete('uploads', $image);
            }
        }

        $role->update($validator);
        return redirect(route('admin.site-roles.index'))->with('success', 'تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return
     */
    public function destroy($id)
    {
        $role = SiteRole::findOrFail($id);
        if ($role->image) {
           $image = str_replace(url('/') . '/storage/', '', $role->image);
            \Storage::disk('public')->delete('uploads', $image);
        }
        $role->delete();
        return 'Done';
    }
}
