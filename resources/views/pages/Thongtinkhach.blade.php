@extends('welcome')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt Chuyến Bay</title>
    <style>
        /* Thêm CSS của bạn ở đây */
    </style>
</head>
<body>
    <div class="container">
        <h1>Thông Tin Chuyến Bay</h1>
        
        <div class="booking-form">
            <h2>Đặt Chuyến Bay</h2>
            <form method="GET" action="/Datchuyenbay">
                @csrf
                <div class="form-group">
                    <label for="fullname">Họ và Tên:</label>
                    <input type="text" id="fullname" name="fullname" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="phone">Số Điện Thoại:</label>
                    <input type="tel" id="phone" name="phone" required>
                </div>
                <div class="form-group">
                    <label for="departure-date">Ngày Khởi Hành:</label>
                    <input type="text" id="departure-date" name="departure_date" value="{{ $atDepartures }}" required>
                </div>
                <div class="form-group">
                    <label for="departure-airport">Sân Bay Xuất Phát:</label>
                    <input type="text" id="departure-airport" name="departure_airport" value="{{ $iataCodeDepartures }}" required>
                </div>
                <div class="form-group">
                    <label for="destination-airport">Sân Bay Đích:</label>
                    <input type="text" id="destination-airport" name="destination_airport" value="{{ $iataCodeArrivals }}" required>
                </div>
                <div class="form-group">
                    <label for="flight-class">Hạng Ghế:</label>
                    <select id="flight-class" name="flight_class" required>
                        <option value="economy">Phổ Thông</option>
                        <option value="business">Hạng Thương Gia</option>
                        <!-- Thêm các hạng ghế khác nếu cần -->
                    </select>
                </div>
                <div class="form-group">
                    <label for="passenger-count">Số Hành Khách:</label>
                    <input type="number" id="passenger-count" name="passenger_count" min="1" max="10" required>
                </div>
                <div class="form-group">
                    <button type="submit">Đặt Chuyến Bay</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

@endsection
