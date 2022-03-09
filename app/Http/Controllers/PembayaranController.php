<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Pelanggan;
use App\Models\Tagihan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PembayaranController extends Controller
{
    public function index()
    {
        $pembayaran = Pembayaran::get();

        return view('pages.pembayaran.pembayaran',compact('pembayaran'));
    }

    public function addpembayaranview()
    {
        $user = User::get();
        $tagihan = Tagihan::get();
        $pelanggan = Pelanggan::get();

        return view('pages.pembayaran.addpembayaran',compact('user','tagihan','pelanggan'));
    }

    public function addpembayaran(Request $request)
    {
        $rules = array(
            'id_tagihan' => 'required',
            'id_pelanggan' => 'required',
            'tanggal_pembayaran' => 'required',
            'bulan_bayar' => 'required',
            'biaya_admin' => 'required',
            'total_bayar' => 'required',
            'id_user' => 'required',
        );

        $cek = Validator::make($request->all(), $rules);

        if ($cek->fails()) {
            return redirect('addpembayaran')->with('error', $cek->getMessageBag()->first());
        }else{
            try {
                Pembayaran::create([
                    'id_tagihan' => $request->id_tagihan,
                    'id_pelanggan' => $request->id_pelanggan,
                    'tanggal_pembayaran' => $request->tanggal_pembayaran,
                    'bulan_bayar' => $request->bulan_bayar,
                    'biaya_admin' => $request->biaya_admin,
                    'total_bayar' => $request->total_bayar,
                    'id_user' => $request->id_user,
                ]);
            } catch (\Exception $e) {
                return redirect('addpembayaran')->with('error', $e->getMessage());
            }

            return redirect('addpembayaran')->with('success', 'Data Pembayaran Berhasil Dibuat');
        }
    }
}
