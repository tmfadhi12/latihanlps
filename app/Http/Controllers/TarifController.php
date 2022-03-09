<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Tarif;

class TarifController extends Controller
{
    public function index()
    {
        $tarif = Tarif::get();
        return view('pages.tarif', compact('tarif'));
    }

    public function addtarif(Request $request)
    {
        $rules = array(
            'daya' => 'required',
            'tarifperkwh' => 'required'
        );

        $cek = Validator::make($request->all(), $rules);

        if ($cek->fails()) {
            return redirect('addtarif')->with('error', $cek->getMessageBag()->first());
        }else{
            try {
                Tarif::create([
                    'daya' => $request->daya,
                    'tarifperkwh' => $request->tarifperkwh
                ]);
            } catch (\Exception $e) {
                return redirect('addtarif')->with('error', $e->getMessage());
            }

            return redirect('addtarif')->with('success', 'Data Tarif Berhasil Dibuat');
        }
    }
}
