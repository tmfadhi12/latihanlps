<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tagihan;
use App\Models\Penggunaan;
use App\Models\Pelanggan;
use Illuminate\Support\Facades\Validator;

class TagihanController extends Controller
{
    public function index()
    {
        $tagihan = Tagihan::get();

        return view('pages.tagihan.tagihan',compact('tagihan'));
    }

    public function addtagihanview()
    {
        $penggunaan = Penggunaan::get();
        $pelanggan = Pelanggan::get();
        $status = array([
            'value'=>'0',
            'label'=> 'Inactive'
        ],
        [
            'value'=>'1',
            'label'=> 'Active'
        ]);

        // return $status;
        return view('pages.tagihan.addtagihan',compact('penggunaan','pelanggan','status'));
    }

    public function addtagihan(Request $request)
    {
        $rules = array(
            'bulan' => 'required',
            'tahun' => 'required',
            'jumlah_meter' => 'required',
            'id_penggunaan' => 'required',
            'id_pelanggan' => 'required',
            'status' => 'required',
        );

        $cek = Validator::make($request->all(), $rules);

        if ($cek->fails()) {
            return redirect('addtagihan')->with('error', $cek->getMessageBag()->first());
        }else{
            try {
                Tagihan::create([
                    'bulan' => $request->bulan,
                    'tahun' => $request->tahun,
                    'jumlah_meter' => $request->jumlah_meter,
                    'id_penggunaan' => $request->id_penggunaan,
                    'id_pelanggan' => $request->id_pelanggan,
                    'status' => $request->status,
                ]);
            } catch (\Exception $e) {
                return redirect('addtagihan')->with('error', $e->getMessage());
            }

            return redirect('addtagihan')->with('success', 'Data Tagihan Berhasil Dibuat');
        }
    }
}
