<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\scholarship;
use App\User;
use Auth;
use Storage;

class UserController extends Controller
{
    public function readScholarship()
    {
        $readScholarship = scholarship::orderBy('created_at', 'desc')->get();
        return view('/index', compact('readScholarship'));
        return view('/home', compact('readScholarship'));
    }

    public function viewProfile()
    {
        $user       = Auth::user();
        $viewProfile = $user->get();
        return view('editProfile', compact('viewProfile', 'user'));
    }

    public function updateProfile(Request $request)
    {
        // dd()
        $user = Auth::user();
        // dd($user);        
        $user->update([
            'name'          => $request->input('name'),
            'email'         => $request->input('email'),
            'nim'           => $request->input('nim'),
            'department'    => $request->input('department'),
            'faculty'       => $request->input('faculty'),
            'gda'           => $request->input('gda'),
            'semester'      => $request->input('semester'),
            'program'       => $request->input('program'),
            'telephon'      => $request->input('telephon'),
        ]);
        session()->flash('success', 'Edit Profile Succesful!');
        return redirect()->back();
    }

    public function viewDescription($id)
    {
        // dd(haaa\);
        $scholarships   = scholarship::find($id);
        // dd($scholarships)
        // $requirements   = $scholarships->requirement;
        $requirements   = $scholarships->requirement;
        // $array_require = json_decode(json_encode($requirements), True);
        // dd($scholarships->tags());
        return view('description', compact('scholarships', 'requirements'));
    }
}
