<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PoskoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index(){
		$data['dataPosko'] = Posko_bencana::all();
		return view('guest.index',$data);
}

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
		return view('guest.form-posko');
}
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data['kejadian_id'] = $request->first_name;
		$data['nama'] = $request->last_name;
		$data['alamat'] = $request->birthday;
		$data['kontak'] = $request->gender;
		$data['penanggung_jawab'] = $request->email;

		Posko::create($data);
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
