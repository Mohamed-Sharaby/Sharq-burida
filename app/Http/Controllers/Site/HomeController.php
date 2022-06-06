<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Achievement;
use App\Models\Administration;
use App\Models\Donate;
use App\Models\GuestMessage;
use App\Models\Idea;
use App\Models\Media;
use App\Models\Policy;
use App\Models\Profile;
use App\Models\Rate;
use App\Models\SiteRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index()
    {
        return view('site.index');
    }

    public function achievement()
    {
        $achievements = Achievement::active()->latest()->get();
        return view('site.achievement',compact('achievements'));
    }

    public function profile()
    {
        $profiles = Profile::active()->latest()->get();
        return view('site.profile',compact('profiles'));
    }

    public function administration()
    {
        $administrations = Administration::active()->latest()->get();
        return view('site.administration',compact('administrations'));
    }

    public function ideas()
    {
        return view('site.ideas');
    }

    public function PostIdea(Request $request)
    {
        $vL = Validator::make($request->all(), [
            'type' => 'required|in:idea,complaint',
            'name' => 'required|string|max:100',
            'phone' => 'required',
            'city' => 'required',
            'message' => 'required'
        ]);

        if ($vL->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $vL->errors()->first()
            ]);
        } else {
            Idea::create($request->all());
            return response()->json([
                'status' => true,
            ]);
        }
    }

    public function PostRate(Request $request)
    {
        $vL = Validator::make($request->all(), [
            'programs' => 'required|in:excellent,good,no',
            'provider' => 'required|in:excellent,good,no',
            'site' => 'required|in:excellent,good,no',
            'notes' => 'nullable',
        ],[
            'programs.required'=>'برجاء نحديد اختيار لكل سؤال',
            'provider.required'=>'برجاء نحديد اختيار لكل سؤال',
            'site.required'=>'برجاء نحديد اختيار لكل سؤال'
        ]);

        if ($vL->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $vL->errors()->first()
            ]);
        } else {
            Rate::create($request->all());
            return response()->json([
                'status' => true,
            ]);
        }
    }

    public function policies()
    {
        $policies = Policy::latest()->get();
        return view('site.policies',compact('policies'));
    }

    public function rating()
    {
        return view('site.rating');
    }

    public function mediaSection()
    {
        $media = Media::active()->latest()->get();
        return view('site.media-section',compact('media'));
    }

    public function roles()
    {
        $roles = SiteRole::active()->latest()->get();
        return view('site.roles',compact('roles'));
    }
    public function donate()
    {
        $donates = Donate::active()->latest()->get();
        return view('site.donate',compact('donates'));
    }

}
