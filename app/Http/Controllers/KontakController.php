<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class KontakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kontak = Kontak::all();
        $data['messages'] = true;
        $data['result'] = $kontak;
        return response()->json($data, Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required'
        ]);

        $kontak = Kontak::create($validate);
        if($kontak){
            $response['success']= true;
            $response['message']= 'kontak berhasil ditambahkan.';
            $response['result'] = $kontak;
            return response()->json($response,Response::HTTP_CREATED);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($kontak)
    {
        $kontak = Kontak::find($kontak);
        $data['success'] = true;
        $data['message'] = "Detail data kontak";
        $data['result'] = $kontak;
        return response()->json($data, Response::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(kontak $kontak)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'nama' => 'required'
        ]);

        $result = Kontak::where('id',$id)->update($validate);
        if($result){
            $data['success'] = true;
            $data['message'] = "Data Kontak berhasil diupdate";
            $data['result'] = $result;
            return response()->json($data, Response::HTTP_OK);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kontak = Kontak::where('id', $id);
    if(count($kontak->get())){
        $kontak->delete();
        $response['success'] = true;
        $response['message'] = 'kontak berhasil dihapus.';
        return response()->json($response, Response::HTTP_OK);
    } else {
        $response['success'] = false;
        $response['message'] = 'kontak tidak ditemukan.';
        return response()->json($response, Response::HTTP_NOT_FOUND);
    } 
    }
}
