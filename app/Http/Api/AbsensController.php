<?php

namespace App\Http\Controllers\Api;

Use App\Models\Absens;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AbsensController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $absens = Absens::orderBy('id','desc')->paginate(3);

        return response()->json([
            'success' => true,
            'message' => 'Daftar data Absen',
            'data'    => $absens
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
         'waktu_absen' => 'required',
         'mahasiswa_id' => 'required|unique:absens|max:255',
         'matakuliah_id' => 'required',
         'keterangan' => 'required',
        ]);

        $absens = Absens::create([
            'waktu_absen' => $request->waktu_absen,
            'mahasiswa_id' => $request->mahasiswa_id,
            'matakuliah_id' => $request->matakuliah_id
            
        ]);

        if($absens)
        {
            return response()->json([
                'success' => true,
                'message' => 'Absen berhasil di tambahkan',
                'data'    => $absens
            ], 200);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Absen gagal di tambahkan',
                'data'    => $absens
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
        $absen = Absens::where('id', $id)->first();

    return response()->json([
        'success' => true,
        'message' => 'Detail Data Absen',
        'data'    => $absen
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
         'waktu_absen' => 'required',
         'mahasiswa_id' => 'required|unique:absens|max:255',
         'matakuliah_id' => 'required',
         'keterangan' => 'required',
        ]);
        
        $a = absens::find($id)->update([
         'waktu_absen' => $request->waktu_absen,
         'mahasiswa_id' => $request->mahasiswa_id,
         'matakuliah_id' => $request->matakuliah_id
        ]);

        return response()->json([
            'success' =>true,
            'message' =>'Post Updated',
            'data' => $a
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
        $cek = absens::find($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Post Updated',
            'data'    => $cek
        ], 200);
    }
}
