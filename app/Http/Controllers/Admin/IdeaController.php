<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Idea;

class IdeaController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Ideas');
    }

    /**
     * Display a listing of the resource.
     *

     */
    public function index()
    {
        $ideas = Idea ::latest()->get();
        return view('dashboard.ideas.index', compact('ideas'));
    }


    public function destroy(Idea $idea)
    {
        $idea->delete();
        return 'Done';
    }

}
