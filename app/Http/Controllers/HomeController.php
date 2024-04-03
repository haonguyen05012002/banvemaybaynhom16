<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Route;

class HomeController extends Controller 
{
    public function index()
    {
        return view('pages.content');
    }
    public function search()
    {
        return view('pages.search');
    }
    public function login()
    {
        return view('pages.login');
    }
    public function contact()
    {
        return view('pages.contact');
    }
    public function flight()
    {
        return view('pages.flight');
    }
    public function detail()
    {
        return view('pages.detail');
    }
    //  public function Thongtinchuyenbay()
    // {
    //     return view('pages.Thongtinchuyenbay');
    // }
   public function TTchuyenbay(Request $request)
{
    try {
        $diemdi = $request->diemdi;
        $diemden = $request->diemden;
        $ngaydi = $request->ngaydi;

        $apiKey = 'w224jTdyyzJCJ8yZbikwDefir6jD';

        $client = new Client([
            'verify' => false,
        ]);

        $url = 'https://test.api.amadeus.com/v2/shopping/flight-offers?'
            . 'originLocationCode=' . $diemdi
            . '&destinationLocationCode=' . $diemden
            . '&departureDate=' . $ngaydi
            . '&adults=1'
            . '&nonStop=false';

        $response = $client->request('GET', $url, [
            'headers' => [
                'Authorization' => 'Bearer ' . $apiKey,
                'Accept' => 'application/json',
            ],
        ]);
        
        $data = $response->getBody()->getContents();

        // Chuyển JSON thành mảng
        $flightData = json_decode($data, true);

        // Kiểm tra nếu có dữ liệu trả về
        if (isset($flightData['data'])) {
            // Lấy phần tử 'data' từ mảng
            $dataArray = $flightData['data'];
           // dd($dataArray);
            // Lặp qua từng phần tử trong mảng 'data'
            foreach ($dataArray as $item) {
                // Lấy ra itineraries của phần tử hiện tại
                $itineraries = $item['itineraries'];

                // Lặp qua từng chuyến bay trong itineraries
                foreach ($itineraries as $itinerary) {
                    // Lấy ra các segment của chuyến bay
                    $segments = $itinerary['segments'];

                    // Lặp qua từng segment
                  foreach ($segments as $segment) {
            // Lấy ra iataCode của sân bay xuất phát
                    $iataCodeDeparture = $segment['departure']['iataCode'];
                    $iataCodeDepartures[] = $iataCodeDeparture;
                    //echo "Sân bay xuất phát: " . $iataCodeDeparture . "<br>";
                     $atDeparture = $segment['departure']['at'];
                     $atDepartures[] = $atDeparture;
                    //echo "Sân bay xuất phát: " . $atDeparture . "<br>";

                    // Lấy ra iataCode của sân bay đích
                    $iataCodeArrival = $segment['arrival']['iataCode'];
                    $iataCodeArrivals[] = $iataCodeArrival;
                   // echo "Sân bay đích: " . $iataCodeArrival . "<br>";
                    $atArrival = $segment['arrival']['at'];
                    $atArrivals[] = $atArrival;
                    //echo "Sân bay đích: " . $atArrival . "<br>";
                     
                }
                }
                
            }
            
           return view('pages.Thongtinchuyenbay')->with([
            'iataCodeDepartures' => $iataCodeDepartures,
            'atDepartures' => $atDepartures,
            'iataCodeArrivals' => $iataCodeArrivals,
            'atArrivals' => $atArrivals
        ]);
        } else {
            return response()->json([
                'error' => 'Không có dữ liệu trả về từ API.',
            ], 404);
        }
    } catch (\Exception $e) {
        return response()->json([
            'error' => $e->getMessage(),
        ], 500);
    }
   
        }
     public function Datchuyenbay(Request $request)
    {
        $fullname=$request->fullname;
        $email=$request->email;
        $phone=$request->phone;
        $departure_date=$request->departure_date;
        echo $departure_date;

    }
      public function TTkhach()
    {
        $iataCodeDeparture=$_GET['iataCodeDeparture'];
        $atDepartures=$_GET['atDepartures'];
        
        list($date, $time) = explode('T', $atDepartures);
        
        echo "Giờ: $time";
        $formattedDate = date("m/d/Y", strtotime($date));
        echo "Ngày: $formattedDate<br>";
        $iataCodeArrivals=$_GET['iataCodeArrivals'];
        $atArrivals=$_GET['atArrivals'];
        return view('pages.Thongtinkhach')->with([
            'formattedDate'=>$formattedDate,
            'iataCodeDepartures' => $iataCodeDeparture,
            'atDepartures' => $atDepartures,
            'iataCodeArrivals' => $iataCodeArrivals,
            'atArrivals' => $atArrivals
        ]);
        //echo $iataCodeDeparture;
        // return view('pages.Thongtinkhach');
    }

}
