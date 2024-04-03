
@extends('welcome')
@section('flight')
<style>
    button {
        width: 100px;
        height: 50px;
        background-color: palevioletred;
    }
</style>
<form action="" method="post">
    <div class="form-group" style="color: white;font-weight: bold;">List Flight
        <?php
//         use Illuminate\Support\Facades\Http;
//         function fetchAmadeusData() {
//     $response = Http::get('https://test.api.amadeus.com/v1/reference-data/locations');

//     if ($response->successful()) {
//         // Xử lý dữ liệu ở đây nếu truy vấn thành công
//         $data = $response->json(); // Lấy dữ liệu dưới dạng JSON
//         return $data;
//     } else {
//         // Xử lý khi truy vấn không thành công
//         $statusCode = $response->status(); // Lấy mã trạng thái HTTP
//         $errorMessage = $response->body(); // Lấy thông báo lỗi
//         return "Lỗi khi truy vấn API. Mã lỗi: $statusCode, Thông báo: $errorMessage";
//     }
// }


        ?>
        <select class="form-select" aria-label="Default select example" style="width: 300px;height: 50px;color:black" name="changbay">
            <option selected onclick="">Open this select menu</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
        </select>
        <button class="submit-btn" name="search">Search</button>
    </div>
</form>
<h3>Danh sách chuyến bay mới nhất</h3>
<ul class="product_list">
    @foreach ($flights as $flight)
    <li></li>
    <li>
        <a href="{{ URL::to('/Home/Flight/Detail')}}">
            <img src="">
            <p class="title_product">{{ $flight->departure_airport }} đến {{ $flight->arrival_airport }}</p>
            <p class="price_product">{{ $flight->price }}</p>
        </a>
    </li>
    @endforeach

</ul>
<div style="clear: both;"></div>
<style type="text/css">
    ul.list_trang {
        padding: 0;
        margin: 0;
        list-style: none;
    }

    ul.list_trang li {
        float: left;
        padding: 5px 13px;
        margin: 5px;
        background-color: burlywood;
        display: block;
        /* background-color: brown; */
    }

    ul.list_trang li a {
        color: #000;
        text-align: center;
        text-decoration: none;
    }
</style>
@endsection