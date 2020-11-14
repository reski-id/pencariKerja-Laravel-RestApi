<?php

namespace App\Http\Controllers;

use App\Pendaftar;
use Illuminate\Http\Request;

class ApiDaftarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pendaftar = Pendaftar::all();
        return response()->json($pendaftar);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pendaftar = new Pendaftar;
        $pendaftar->nama = $request->nama;
        $pendaftar->email = $request->email;
        $pendaftar->pekerjaan = $request->pekerjaan;
        $pendaftar->alamat = $request->alamat;
        $pendaftar->resume = $request->resume;
        $pendaftar->save();

        return response()->json([
            'Status' => 'Success',
            'Message' => 'Data berhasil disimpan'
        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pendaftar = Pendaftar::find($id);
        if(!$pendaftar){
            return response()->json([
                'Status' => 'Failed',
                'Message' => 'Data tidak ditemukan'
            ],404);
        }

        return response()->json($pendaftar);
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
        $pendaftar = Pendaftar::find($id);

        if(!$pendaftar){
            return response()->json([
                'Status' => 'Failed',
                'Message' => 'Data tidak ditemukan'
            ],404);
        }

        $pendaftar->nama = $request->nama;
        $pendaftar->email = $request->email;
        $pendaftar->pekerjaan = $request->pekerjaan;
        $pendaftar->alamat = $request->alamat;
        $pendaftar->resume = $request->resume;
        $pendaftar->save();

        return response()->json([
            'Status' => 'Success',
            'Message' => 'Data berhasil diupdate'
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
        $pendaftar = Pendaftar::find($id);
        $pendaftar->delete();

        return response()->json([
            'Status' => 'Success',
            'Message' => 'Data berhasil dihapus'
        ],200);
    }
}
