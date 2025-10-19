<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
		$data['dataWarga'] = Warga::all();
		return view('Guest.index',$data);
}
    /**
     * Show the form for creating a new resource.
     */
   public function create(){
		return view('Guest.form-warga');
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all())

		$data['no_ktp'] = $request->first_name;
		$data['nama'] = $request->last_name;
		$data['jenis_kelamin'] = $request->birthday;
		$data['agama'] = $request->gender;
		$data['pekerjaan'] = $request->email;
		$data['phone'] = $request->phone;
        $data['email'] = $request->phone;


		Warga::create($data);

		return redirect()->route('Warga.index')->with('success','Penambahan Data Berhasil!');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
