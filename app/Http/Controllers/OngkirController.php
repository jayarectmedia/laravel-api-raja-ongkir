<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OngkirController extends Controller
{
    public function index()
    {
        $response = Http::withHeaders([
            'key' => 'a11f4420836ef5338b665ca99eae40cf'
        ])->get('https://api.rajaongkir.com/starter/city');

        $cities = $response['rajaongkir']['results'];
        return view('cek-ongkir', ['cities' => $cities, 'ongkir' => '']);
    }

    public function cekOnkir(Request $request)
    {
        $response = Http::withHeaders([
            'key' => 'a11f4420836ef5338b665ca99eae40cf'
        ])->get('https://api.rajaongkir.com/starter/city');

        $responseCost = Http::withHeaders([
            'key' => 'a11f4420836ef5338b665ca99eae40cf'
        ])->post('https://api.rajaongkir.com/starter/cost', [
            'origin' => $request->origin,
            'destination' => $request->destination,
            'weight' => $request->weight,
            'courier' => $request->courier,
        ]);


        $cities = $response['rajaongkir']['results'];
        $ongkir = $responseCost['rajaongkir']['results'];
        return view('cek-ongkir', ['cities' => $cities, 'ongkir' => $ongkir]);
    }
}
