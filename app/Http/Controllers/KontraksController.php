<?php

namespace App\Http\Controllers;
Use App\Models\Kontraks;
use Illuminate\Http\Request;

class KontraksController extends Controller
{
    public function index()
    {
     $kontraks = Kontraks::orderBy('id')->paginate(5);
     
     return view ('kontraks.index', compact('kontraks'));
    }
    public function create()
    {
     
     return view ('kontraks.create');
    }
    public function store(Request $request)
     {
         // Validate the request...
         $request->validate([
          'mahasiswa' => 'required|unique:students|max:255',
          'semester' => 'required|numeric'
      ]);
 
         $kontraks = new kontraks;
 
         $kontraks->mahasiswa = $request->mahasiswa_id;
         $kontraks->semester = $request->semester_id;
 
         $kontraks->save();
 
         return redirect('/');
 
    }
    public function show($id)
    {
       $kontraks = Kontraks::where('id',$id)->first();
       return view('kontraks.show', ['kontraks' => $kontraks]);
    }
    public function edit($id)
    {
       $kontraks = Kontraks::where('id',$id)->first();
       return view('kontraks.edit', ['kontraks' => $kontraks]);
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'mahasiswa' => 'required|unique:friends|max:255',
            'semester' => 'required|numeric'
            
        ]);
   
        Kontraks::find($id)->update([
            'mahasiswa' => $request->mahasiswa_id,
            'semester' => $request->semester_id
         ]);
   
         return redirect ('/');
    }
    public function destroy($id)
    {
        Kontraks::find($id)->delete();
       return redirect ('/');
    }

}