<?php

namespace App\Http\Controllers\Api;

Use App\Models\Kontraks;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KontraksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kontraks = Kontraks::orderBy('id','desc')->paginate(3);

        return response()->json([
            'success' => true,
            'message' => 'Daftar data Kontrak',
            'data'    => $kontraks
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
         'mahasiswa_id' => 'required',
         'semester_id' => 'required',
         
        ]);

        $kontraks = Kontraks::create([
            'mahasiswa_id' => $request->mahasiswa_id,
            'semester_id' => $request->semester_id,
            
            
        ]);

        if($kontraks)
        {
            return response()->json([
                'success' => true,
                'message' => 'Kontrak berhasil di tambahkan',
                'data'    => $kontraks
            ], 200);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Kontrak gagal di tambahkan',
                'data'    => $kontraks
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
        $matakuliah = Kontraks::where('id', $id)->first();

    return response()->json([
        'success' => true,
        'message' => 'Detail Data kontrak',
        'data'    => $kontrak
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
            'mahasiswa_id' => 'required',
            'semester_id' => 'required',
        
        ]);
        
        $k = Kontraks::find($id)->update([
            'mahasiswa_id' => $request->mahasiswa_id,
            'semester_id' => $request->semester_id,
            
        ]);

        return response()->json([
            'success' =>true,
            'message' =>'Post Updated',
            'data' => $k
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
        $cek = Kontraks::find($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Post Updated',
            'data'    => $cek
        ], 200);
    }
}
