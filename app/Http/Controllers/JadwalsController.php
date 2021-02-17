<?php

namespace App\Http\Controllers;
Use App\Models\Jadwals;
use Illuminate\Http\Request;

class JadwalsController extends Controller
{
    public function index()
    {
     $jadwals = Jadwals::orderBy('id')->paginate(5);
     
     return view ('jadwals.index', compact('jadwals'));
    }
    public function create()
    {
     
     return view ('jadwals.create');
    }
    public function store(Request $request)
     {
         // Validate the request...
         $request->validate([
          'nama_matakuliah' => 'required|unique:students|max:255',
          'sks' => 'required|numeric'
      ]);
 
         $jadwals = new jadwals;
 
         $jadwals->jadwal = $request->jadwal;
         $jadwals->matakuliah_id = $request->matakuliah_id;
 
         $jadwals->save();
 
         return redirect('/');
 
    }
    public function show($id)
    {
       $jadwals = Jadwals::where('id',$id)->first();
       return view('jadwals.show', ['jadwals' => $jadwals]);
    }
    public function edit($id)
    {
       $jadwals = Jadwals::where('id',$id)->first();
       return view('jadwals.edit', ['jadwals' => $jadwals]);
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'Jadwal' => 'required|unique:friends|max:255',
            'matakuliah_id' => 'required|numeric'
            
        ]);
   
        Jadwals::find($id)->update([
            'jadwal' => $request->jadwal,
            'matakuliah_id' => $request->matakuliah_id
         ]);
   
         return redirect ('/');
    }
    public function destroy($id)
    {
        Jadwals::find($id)->delete();
       return redirect ('/');
    }

}
