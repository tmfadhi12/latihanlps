<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penggunaan;
use App\Models\Pelanggan;
use Illuminate\Support\Facades\Validator;

class PenggunaanController extends Controller
{
    public function index()
    {
        $penggunaan = Penggunaan::get();

        return view('pages.penggunaan.penggunaan', compact('penggunaan'));
    }

    public function addpenggunaanview()
    {
        $pelanggan = Pelanggan::get();
        return view('pages.penggunaan.addpenggunaan', compact('pelanggan'));
    }
    
    public function addpenggunaan(Request $request)
    {
        $rules = array(
            'bulan' => 'required',
            'tahun' => 'required',
            'meter_awal' => 'required',
            'meter_akhir' => 'required',
            'id_pelanggan' => 'required',
        );

        $cek = Validator::make($request->all(), $rules);

        if ($cek->fails()) {
            return redirect('addpenggunaan')->with('error', $cek->getMessageBag()->first());
        }else{
            try {
                Penggunaan::create([
                    'bulan' => $request->bulan,
                    'tahun' => $request->tahun,
                    'meter_awal' => $request->meter_awal,
                    'meter_akhir' => $request->meter_akhir,
                    'id_pelanggan' => $request->id_pelanggan,
                ]);
            } catch (\Exception $e) {
                return redirect('addpenggunaan')->with('error', $e->getMessage());
            }

            return redirect('addpenggunaan')->with('success', 'Data Penggunaan Berhasil Dibuat');
        }
    }

}
