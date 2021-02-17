<?php

namespace App\Http\Controllers\Api;

Use App\Models\Semesters;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SemestersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $semesters = Semesters::orderBy('id','desc')->paginate(3);

        return response()->json([
            'success' => true,
            'message' => 'Daftar data semester',
            'data'    => $semesters
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
         'id' => 'required',
         'semester' => 'required',
         
        ]);

        $semesters = Semesters::create([
            'id' => $request->id,
            'semester' => $request->semester,
            
            
        ]);

        if($semesters)
        {
            return response()->json([
                'success' => true,
                'message' => 'semester berhasil di tambahkan',
                'data'    => $semesters
            ], 200);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'semester gagal di tambahkan',
                'data'    => $semesters
            ], 409);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $semester = Semesters::where('id', $id)->first();

    return response()->json([
        'success' => true,
        'message' => 'Detail Data semester',
        'data'    => $semester
    ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id' => 'required',
            'semester' => 'required',
        
        ]);
        
        $s = semesters::find($id)->update([
            'id' => $request->id,
            'semester' => $request->semester,
            
        ]);

        return response()->json([
            'success' =>true,
            'message' =>'Post Updated',
            'data' => $s
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cek = semesters::find($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Post Updated',
            'data'    => $cek
        ], 200);
    }
}
