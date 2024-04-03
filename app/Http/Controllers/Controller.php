<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Psy\Readline\Hoa\Console;



class flightController extends Controller
{
    public function searchFlights(Request $request)
    {
        
        try {
            $departureAirport = $request->input('diemdi');
            $ngayDi = $request->input('ngaydi');
            $diemDen = $request->input('diemden');

            $apiKey = 'W9yQ55p9jfuYnWKp5d5X2hngXrqb';

            $client = new Client();

            $url = 'https://test.api.amadeus.com/v2/shopping/flight-offers?'
                . 'originLocationCode=' . $departureAirport
                . '&destinationLocationCode=' . $diemDen
                . '&departureDate=' . $ngayDi
                . '&adults=1'
                . '&nonStop=false';

            $response = $client->request('GET', $url, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $apiKey,
                    'Accept' => 'application/json',
                ],
            ]);

            $data = $response->getBody()->getContents();

            $flightData = json_decode($data, true);
            // Trong phương thức searchFlights
            Session::put('flightData', $flightData);
            return response()->json($flightData);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
