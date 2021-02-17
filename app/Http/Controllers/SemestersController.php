<?php

namespace App\Http\Controllers;
Use App\Models\Semesters;
use Illuminate\Http\Request;

class SemestersController extends Controller
{
    public function index()
    {
     $semesters = Semesters::orderBy('id')->paginate(5);
     
     return view ('semesters.index', compact('semesters'));
    }
    public function create()
    {
     
     return view ('semesters.create');
    }
    public function store(Request $request)
     {
         // Validate the request...
         $request->validate([
          'Id' => 'required|unique:students|max:255',
          'Semester' => 'required|numeric'
      ]);
 
         $semesters = new semesters;
 
         $semesters->id = $request->id;
         $semesters->semester = $request->semester;
 
         $semesters->save();
 
         return redirect('/');
 
    }
    public function show($id)
    {
       $semesters = Semesters::where('id',$id)->first();
       return view('semesters.show', ['semesters' => $semesters]);
    }
    public function edit($id)
    {
       $semesters = Semesters::where('id',$id)->first();
       return view('semesters.edit', ['semesters' => $semesters]);
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'id' => 'required|unique:friends|max:255',
            'semesters' => 'required|numeric'
            
        ]);
   
        Semesters::find($id)->update([
            'id' => $request->id,
            'semester' => $request->semester
         ]);
   
         return redirect ('/');
    }
    public function destroy($id)
    {
       Semesters::find($id)->delete();
       return redirect ('/');
    }

}
