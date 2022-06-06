<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\File;
use App\Models\Policy;
use Illuminate\Http\Request;

class PolicyController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Policy');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $policies = Policy::latest()->get();
        return view('dashboard.policies.index', compact('policies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.policies.create');
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
        ]);

        $policy = Policy::create($validator);

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $fileName = $file->getClientOriginalName();
                $file->move(storage_path("app/public/uploads"), $fileName);
                $policy->files()->create(['file' => 'uploads/' . $fileName]);
            }
        }

        return redirect(route('admin.policies.index'))->with('success', 'تم الاضافة بنجاح');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return
     */
    public function edit(Policy $policy)
    {
        return view('dashboard.policies.edit', compact('policy'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return
     */
    public function update(Request $request, Policy $policy)
    {
        $validator = $request->validate([
            'name' => 'required',
        ]);

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $fileName = $file->getClientOriginalName();
                $file->move(storage_path("app/public/uploads"), $fileName);
                $policy->files()->create(['file' => 'uploads/' . $fileName]);
            }
        }

        $policy->update($validator);
        return redirect(route('admin.policies.index'))->with('success', 'تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return
     */
    public function destroy(Policy $policy)
    {
        if ($policy->files) {
            foreach ($policy->files as $file)
                deleteImage('uploads', $file->file);
            $file->delete();
        }
        $policy->delete();
        return 'Done';
    }

    public function deleteFile($id)
    {
        $file = File::findOrFail($id);
        deleteImage('uploads', $file->file);
        $file->delete();
        return response()->json([
            'status' => true,
            'id' => $file->id,
        ]);
    }

}
