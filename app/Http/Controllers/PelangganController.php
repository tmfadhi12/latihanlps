<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;
use App\Models\Tarif;
use Illuminate\Support\Facades\Validator;

class PelangganController extends Controller
{
    public function index()
    {
        $pelanggan = Pelanggan::with('tarif')->get();
        // return $pelanggan;
        return view('pages.pelanggan.pelanggan', compact('pelanggan'));
    }

    public function addpelangganview()
    {
        $tarif = Tarif::get();

        return view('pages.pelanggan.addpelanggan', compact('tarif'));
    }

    public function addpelanggan(Request $request)
    {
        $rules = array(
            'username' => 'required',
            'password' => 'required',
            'nomor_kwh' => 'required',
            'nama_pelanggan' => 'required',
            'alamat' => 'required',
            'id_tarif' => 'required',
        );

        $cek = Validator::make($request->all(), $rules);

        if ($cek->fails()) {
            return redirect('addpelanggan')->with('error', $cek->getMessageBag()->first());
        }else{
            try {
                Pelanggan::create([
                    'username' => $request->username,
                    'password' => bcrypt($request->password),
                    'nomor_kwh' => $request->nomor_kwh,
                    'nama_pelanggan' => $request->nama_pelanggan,
                    'alamat' => $request->alamat,
                    'id_tarif' => $request->id_tarif,
                ]);
            } catch (\Exception $e) {
                return redirect('addpelanggan')->with('error', $e->getMessage());
            }

            return redirect('addpelanggan')->with('success', 'Data Pelanggan Berhasil Dibuat');
        }
    }
}
