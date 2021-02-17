<?php

namespace App\Http\Controllers;
Use App\Models\Matakuliahs;
use Illuminate\Http\Request;

class MatakuliahsController extends Controller
{
    public function index()
    {
     $matakuliahs = Matakuliahs::orderBy('id')->paginate(5);
     
     return view ('matakuliahs.index', compact('matakuliahs'));
    }
    public function create()
    {
     
     return view ('matakuliahs.create');
    }
    public function store(Request $request)
     {
         // Validate the request...
         $request->validate([
          'nama_matakuliah' => 'required|unique:students|max:255',
          'sks' => 'required|numeric'
      ]);
 
         $matakuliahs = new matakuliahs;
 
         $matakuliahs->nama_matakuliah = $request->nama_matakuliah;
         $matakuliahs->sks = $request->sks;
 
         $matakuliahs->save();
 
         return redirect('/');
 
    }
    public function show($id)
    {
       $matakuliahs = Matakuliahs::where('id',$id)->first();
       return view('matakuliahs.show', ['matakuliahs' => $matakuliahs]);
    }
    public function edit($id)
    {
       $matakuliahs = Matakuliahs::where('id',$id)->first();
       return view('matakuliahs.edit', ['matakuliahs' => $matakuliahs]);
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'nama_matakuliah' => 'required|unique:friends|max:255',
            'sks' => 'required|numeric'
            
        ]);
   
        Matakuliahs::find($id)->update([
            'nama_matakuliah' => $request->nama,
            'sks' => $request->sks
         ]);
   
         return redirect ('/');
    }
    public function destroy($id)
    {
       Matakuliahs::find($id)->delete();
       return redirect ('/');
    }

}
