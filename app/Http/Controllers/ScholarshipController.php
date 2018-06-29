<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\scholarship;
use App\requirement;
use App\Tag;
use Alert;
use Illuminate\Support\Facades\DB;
use Session, Redirect;
use View;
use Storage;
use Auth;
use Carbon\Carbon;
use App\Notifications\TutorialPublished;
use Illuminate\Support\Collection;
use App\Userinfo;
session()->regenerate();
error_reporting(0);


class ScholarshipController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function read()
    {
        $readScholarship = scholarship::orderBy('id')->get();

        return view('/scholarship', compact('readScholarship'));
    }
    public function create()
    {
        $tags   = tag::all();
        return view('/addScholarship', compact('tags'));
    }

    public function store(Request $request)
    {
        $this->validate($request, array(
            'name'   =>  'required|min:9|max:191'
        ));


        
        $faculty    = implode(",", $request->faculties);
        $program    = implode(";", $request->programs);
        $semester   = implode(",", $request->semesters);
        $tanggal    = $request->deadline;

        $date       = date("Y-m-d", strtotime($tanggal));

        if($request->file('image') != null){
            $image  = $request->file('image')->store('beasiswa');
        } else{
            $image  = null;
        }

        $scholarships   = scholarship::create([
            'name'          => $request->input('name'),
            'firm'          => $request->input('firm'),
            'description'   => $request->input('description'),
            'applyOnline'   => 1,
            'image'         => $image,
            'admin_id'      => Auth::user()->id,
        ]);

        $scholarships->requirement()->create([
            'gda'        => $request->input('gda'),
            'semester'   => $semester,
            'deadline'   => $date,
            'faculty'    => $faculty,
            'program'    => $program
        ]);

        $scholarships->tags()->sync($request->tags, false);

        session()->flash('success', 'Scholarship succesful added!');
        return redirect()->route('scholarship.read');
    }

    public function edit($id)
    {
        $scholarships   = scholarship::find($id);
        $requirements   = $scholarships->requirement;
        
        $faculty        = $requirements->faculty;
        $faculties      = explode(',', $faculty);

        $program        = $requirements->program;
        $programs       = explode(';', $program);

        $semester       = $requirements->semester;
        $semesters      = explode(',', $semester);
        $tags = Tag::all();

        return view('/editScholarship', compact('scholarships', 'requirements','tags', 'faculties','programs', 'semesters'));

    }

    public function update(Request $request, $id)
    {
        // find scholarship
        $updateScholarship = scholarship::find($id);

        if($request->file('image') != null){
            Storage::delete($updateScholarship->image);
            $image  = $request->file('image')->store('beasiswa');
        } else{
            $image  = $updateScholarship->image;
        }

        $updateScholarship->update([
            'name'          => $request->input('name'),
            'firm'          => $request->input('firm'),
            'description'   => $request->input('description'),
            'applyOnline'   => 1,
            'image'         => $image
        ]);

        $updateScholarship->requirement->update([
            'gda'               => $request->input('gda'),
            'semester'          => $request->input('semester'),
            'deadline'          => $request->input('deadline'),
            'faculty'           => $request->input('faculty'),
            'program'           => $request->input('program'),
        ]);

        if (isset($request->tags)) {
            $updateScholarship->tags()->sync($request->tags);
        } else {
            $updateScholarship->tags()->sync(array());
        }

        session()->flash('notif', 'Edit Succesful!');

        return redirect()->route('scholarship.view', compact('id'));
    }

    public function destroy($id)
    {
        $scholarships   = scholarship::find($id);
        if($scholarships->requirements != null){
             $scholarships->requirement->delete();
        }
       
        $scholarships->tags()->detach();
        $scholarships->delete();
        session()->flash('deleteNotif', 'Delete Succesful!');
        return redirect()->route('scholarship.read');
    }

    public function view($id)
    {
        $scholarships   = scholarship::find($id);
        $requirements   = $scholarships->requirement;
        // $array_require = json_decode(json_encode($requirements), True); 
        return view('admin.scholarshipView', compact('scholarships', 'requirements'));
    }

    public function test($type)
    {
        switch ($type) {
            case 'message':
                alert()->message('Sweet Alert with message.');
                break;
            case 'basic':
                alert()->basic('Sweet Alert with basic.','Basic');
                break;
            case 'info':
                alert()->info('Sweet Alert with info.');
                break;
            case 'success':
                alert()->success('Sweet Alert with success.','Welcome to ItSolutionStuff.com')->autoclose(3500);
                break;
            case 'error':
                alert()->error('Sweet Alert with error.');
                break;
            case 'warning':
                alert()->warning('Sweet Alert with warning.');
                break;
            default:
                # code...
                break;
        }

        // alert()->message('Sweet Alert with message.');
        return view('/test');
    }

}
