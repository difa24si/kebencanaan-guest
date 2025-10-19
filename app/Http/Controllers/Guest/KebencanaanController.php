<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KebencanaanController extends Controller
{
       public function index()
    {
        // Data konsisten dengan admin (hanya tampil)
        $kejadian = [
            [
                'jenis_bencana' => '',
                'tanggal' => '',
                'lokasi_text' => '',
                'dampak' => '',
                'status_kejadian' => ''
            ],
            [
                'jenis_bencana' => '',
                'tanggal' => '',
                'lokasi_text' => '',
                'dampak' => '',
                'status_kejadian' => 'st commit'
            ]
        ];

        return view('guest.kejadian.index', compact('kejadian'));
    }
}

    //

