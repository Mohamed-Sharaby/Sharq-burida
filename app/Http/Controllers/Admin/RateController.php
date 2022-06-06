<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rate;

class RateController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Rate');
    }

    /**
     * Display a listing of the resource.
     *

     */
    public function index()
    {
        $rates = Rate ::latest()->get();
        return view('dashboard.rates.index', compact('rates'));
    }


    public function destroy($id)
    {
        $rate = Rate::findOrFail($id);
        $rate->delete();
        return 'Done';
    }

}
