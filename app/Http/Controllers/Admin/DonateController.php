<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Donate;
use App\Models\Media;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class DonateController extends Controller
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
        $donates = Donate ::latest()->get();
        return view('dashboard.donates.index', compact('donates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('dashboard.donates.create');
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

        Donate ::create($validator);
        return redirect(route('admin.donates.index'))->with('success', 'تم الاضافة بنجاح');
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return
     */
    public function edit($id)
    {
        $donate = Donate::findOrFail($id);
        return view('dashboard.donates.edit', compact('donate'));
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
        $donate = Donate::findOrFail($id);
        $validator = $request->validate([
            'name' => 'required',
            'image' => 'sometimes'
        ]);
        if ($request->has('image')){
            if ($donate->image) {
                $image = str_replace(url('/') . '/storage/', '', $donate->image);
                \Storage::disk('public')->delete('uploads', $image);
            }
        }

        $donate->update($validator);
        return redirect(route('admin.donates.index'))->with('success', 'تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return
     */
    public function destroy($id)
    {
        $donate = Donate::findOrFail($id);
        if ($donate->image) {
           $image = str_replace(url('/') . '/storage/', '', $donate->image);
            \Storage::disk('public')->delete('uploads', $image);
        }
        $donate->delete();
        return 'Done';
    }
}
