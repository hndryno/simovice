<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;  

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $company = Company::all();

            return $company;

        }catch(ModelNotFoundException $exception){

            return back()->withError($exception->getMessage())->withInput();

        }
        

        // try{
        //     $company = Company::all();

        //     return response()->json([
        //         status => 'Success',
        //         message => 'Data berhasil ditampilkan',
        //         data => $company
        //     ], 200);
        // }catch(ModelNotFoundException $exception){
        //     return response()->json([
        //         status => 'Error',
        //         message => $e,
        //     ], 400);

        // }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $this->validate($request, [
            'nama_perusahaan' => 'required'
        ]);

        $company = new Company();
        $company->nama_perusahaan = $request->nama_perusahaan;
        $company->pic = $request->pic;
        $company->email = $request->email;
        $company->telepon = $request->telepon;

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
        $company->pic = $request->pic;
        $company->email = $request->email;
        $company->telepon = $request->telepon;

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
