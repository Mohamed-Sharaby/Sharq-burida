<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Achievement;
use App\Models\File;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class AchievementController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Achievements');
    }

    /**
     * Display a listing of the resource.
     *

     */
    public function index()
    {
        $achievements = Achievement::latest()->get();
        return view('dashboard.achievements.index', compact('achievements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('dashboard.achievements.create');
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

        $data = Achievement::create($validator);

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $fileName = $file->getClientOriginalName();
                $file->move(storage_path("app/public/uploads"), $fileName);
                $data->files()->create(['file' => 'uploads/' . $fileName]);
            }
        }

        return redirect(route('admin.achievements.index'))->with('success', 'تم الاضافة بنجاح');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return
     */
    public function edit(Achievement $achievement)
    {
        return view('dashboard.achievements.edit', compact('achievement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return
     */
    public function update(Request $request, Achievement $achievement)
    {
        $validator = $request->validate([
            'name' => 'required',
        ]);

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $fileName = $file->getClientOriginalName();
                $file->move(storage_path("app/public/uploads"), $fileName);
                $achievement->files()->create(['file' => 'uploads/' . $fileName]);
            }
        }

        $achievement->update($validator);
        return redirect(route('admin.achievements.index'))->with('success', 'تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return
     */
    public function destroy(Achievement $achievement)
    {
        if ($achievement->files) {
            foreach ($achievement->files as $file)
                deleteImage('uploads', $file->file);
            $file->delete();
        }
        $achievement->delete();
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
