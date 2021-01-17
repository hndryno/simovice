<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Company::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $user = Auth::guard('api')->user(); 
        
        $this->validate($request, [
            'nama_perusahaan' => 'required'
        ]);

        $company = new Company();
        $company->nama_perusahaan = $request->nama_perusahaan;
        // $company->created_by = $user->id; 

        $company->save();

        return response('Data perusahaan baru berhasil ditambahkan', 201);
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
            'nama_perusahaan' => 'required'
        ]);

        $company = Company::find($id);
        $company->nama_perusahaan = $request->nama_perusahaan;

        $company->save();

        return response('Data perusahaan berhasil diupdate', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Company::find($id)->delete();
        return response('Data perusahaan berhasil dihapus', 200);
    }
}
