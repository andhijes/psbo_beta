<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\scholarship;
use App\User;
use Auth;
use Storage;
use App\Tag;
use App\Rules\ValidPhone;

class UserController extends Controller
{
    public function readScholarship()
    {
        $readScholarship = scholarship::orderBy('created_at', 'desc')->get();
        $tags   = tag::all();
        // dd($tags);
        return view('/index', compact('readScholarship', 'tags'));
        return view('/home', compact('readScholarship', 'tags'));
    }

    public function scholarshipExplore($id)
    {
        $tag    = Tag::find($id);
        $tags   = tag::all();

        $a= $tag->scholarships;
        $jumlah = count($a);
        // dd($b);
        // dd($tag->scholarships);
        return view('/scholarshipExplore', compact('tag', 'tags','jumlah'));
    }

    public function viewProfile()
    {
        $user       = Auth::user();
        $viewProfile = $user->get();
        return view('editProfile', compact('viewProfile', 'user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();   

        $this->validate($request, array(
            'name'          => 'required|max:100',
            'email'         => 'required|unique:users,email,'.$user->id,
            'nim'           => 'required|unique:users,nim,'.$user->id,
            'department'    => 'required',
            'faculty'       => 'required',
            'gda'           => 'required',
            'semester'      => 'required',
            'program'       => 'required',
            'telephon'      => ['required', new ValidPhone],
        ));

        if($request->file('avatar') != null){
            Storage::delete($user->avatar);
            $image  = $request->file('avatar')->store('avatar/students');
        } else{
            $image  = $user->avatar;
        }


        
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
            'avatar'        => $image,
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
        $tags    = Tag::all();
        // $array_require = json_decode(json_encode($requirements), True);
        // dd($scholarships->tags());
        return view('description', compact('scholarships', 'requirements', 'tags'));
    }
}
