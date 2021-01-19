<?php

namespace App\Http\Controllers;

use App\Models\VirtualOffice;
use Illuminate\Http\Request;

class VirtualOfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return VirtualOffice::with('company:id,nama_perusahaan')->get();
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        // $this->validate($request, [
        //     'company_id' => 'required'
        // ]);

        $vo = new VirtualOffice();
        $vo->company_id = $request->company_id;
        $vo->pic = $request->pic;
        $vo->email = $request->email;
        $vo->telepon = $request->telepon;
        $vo->harga_vo = $request->harga_vo;
        $vo->tanggal_aggrement = $request->tanggal_aggrement;
        $vo->tanggal_selesai = $request->tanggal_selesai;
        $vo->fasilitas_meeting_room = $request->fasilitas_meeting_room;
        $vo->fasilitas_konsultasi_pajak = $request->fasilitas_konsultasi_pajak;
        $vo->fasilitas_private_office = $request->fasilitas_private_office;
        $vo->papan_nama_perusahaan = $request->papan_nama_perusahaan;

        $vo->save();

        return response('Data berhasil ditambahkan', 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Company::find($id);
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
        $this->validate($request, [
            'company_id' => 'required',
            'pic' => 'required'
        ]);

        $vo = new VirtualOffice();
        $vo->company_id = $request->company_id;
        $vo->pic = $request->pic;
        $vo->telepon = $request->telepon;
        $vo->email = $request->email;
        $vo->harga_vo = $request->harga_vo;
        $vo->tanggal_aggrement = $request->tanggal_aggrement;
        $vo->tanggal_selesai = $request->tanggal_selesai;
        $vo->fasilitas_meeting_room = $request->fasilitas_meeting_room;
        $vo->fasilitas_konsultasi_pajak = $request->fasilitas_konsultasi_pajak;
        $vo->fasilitas_private_office = $request->fasilitas_private_office;
        $vo->papan_nama_perusahaan = $request->papan_nama_perusahaan;

        $vo->save();

        return response('Data berhasil diupdate', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        VirtualOffice::find($id)->delete();
        return response('Data berhasil dihapus', 200);
    }
}
