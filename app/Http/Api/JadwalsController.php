<?php

namespace App\Http\Controllers\Api;

Use App\Models\Jadwals;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JadwalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jadwals = Jadwals::orderBy('id','desc')->paginate(3);

        return response()->json([
            'success' => true,
            'message' => 'Daftar data Jadwal',
            'data'    => $jadwals
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
         'jadwal' => 'required',
         'matakuliah_id' => 'required',
         
        ]);

        $jadwals = jadwals::create([
            'id' => $request->id,
            'jadwal' => $request->jadwal,
            'matakuliah_id' => 'required',
            
            
        ]);

        if($jadwals)
        {
            return response()->json([
                'success' => true,
                'message' => 'Jadwal berhasil di tambahkan',
                'data'    => $jadwals
            ], 200);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Jadwal gagal di tambahkan',
                'data'    => $jadwals
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
        $matakuliah = Jadwals::where('id', $id)->first();

    return response()->json([
        'success' => true,
        'message' => 'Detail Data jadwal',
        'data'    => $jadwal
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
            'jadwal' => 'required',
            'matakuliah_id' => 'required',
        
        ]);
        
        $j = Jadwals::find($id)->update([
            'id' => $request->id,
            'jadwal' => $request->jadwal,
            'matakuliah_id' => 'required',
            
        ]);

        return response()->json([
            'success' =>true,
            'message' =>'Post Updated',
            'data' => $j
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
        $cek = Jadwals::find($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Post Updated',
            'data'    => $cek
        ], 200);
    }
}
