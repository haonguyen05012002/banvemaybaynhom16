<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

// action="{{ URL::to('/Home/Search') }}" method="post"
?>
@extends('welcome')
 @section('content')
<div id="booking" class="section">
	<div class="section-center">
		<div class="container">
			<div class="row">
				<div class="booking-form">
					<div class="form-header">
						<h1>Book Your Flight</h1>
					</div>
					<form method="GET" action="/TTchuyenbay">
						@csrf
						<div class="form-group">
							<label for="trip-type" style="color: white;font-weight: bold;">TRIP TYPE:</label>
							<select id="trip-type" onchange="toggleDateInputs()" name="trip-type">
								<option value="one-way">One Way</option>
								<option value="round-trip">Round Trip</option>
							</select>
						</div>
						<div class="form-group">
							<b style="color: white;font-weight: bold;">NGAY DI: </b><input type="date" name="ngaydi" id="departure-date" class="departure-date" style="width: 200px;height: 50px;color:black">
							<b style="color: white;font-weight: bold;">NGAY VE: </b><input type="date" name="ngayve" id="return-date" class="return-date" style="display: none;width: 200px;height: 50px;color:black">
						</div>
						<div class="form-group" style="color: white;font-weight: bold;">
							FLYING FROM
							<select class="form-select" aria-label="Default select example" style="width: 559px;height: 50px;color:black" name="diemdi" id="diemdi">
								<option value="SGN">Sân bay Tân Sơn Nhất (TPHCM) - SGN</option>
									<option value="HAN">Sân bay Nội Bài (Hà Nội) - HAN</option>
									<option value="DAD">Sân bay Đà Nẵng - DAD</option>
									<option value="CXR">Sân bay Cam Ranh (Nha Trang) - CXR</option>
									<option value="PQC">Sân bay Phú Quốc - PQC</option>
									<option value="VCA">Sân bay Cần Thơ - VCA</option>
									<option value="VCL">Sân bay Chu Lai (Quảng Nam) - VCL</option>
									<option value="UIH">Sân bay Phù Cát (Quy Nhơn) - UIH</option>
									<option value="VDH">Sân bay Đồng Hới (Quảng Bình) - VDH</option>
							</select>
						</div>
						
						<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
						{{-- <script>
							$(document).ready(function() {
								var baseUrl = '/api/flights';
								var airports = [
									{ value: "SGN", city: "Ho Chi Minh City (Tan Son Nhat)" },
									{ value: "HAN", city: "Ha Noi (Noi Bai)" },
									{ value: "DAD", city: "Da Nang" },
									{ value: "CXR", city: "Nha Trang (Cam Ranh)" },
									{ value: "PQC", city: "Phu Quoc" },
									// Add more airports as needed
								];
						
								function populateDropdown(data) {
									$("#diemdi").empty();
									$.each(data, function(index, airport) {
										$("#diemdi").append($('<option></option>').val(airport.value).text(airport.city));
									});
								}
						
								populateDropdown(airports);
						
								$('#diemdi').change(function() {
									var ngayDi = $('#departure-date').val(); // Get departure date value
									var selectedAirport = $(this).val();
								
									var diemDen = $('select[name="diemden"]').val(); // Get destination value
						
									console.log(selectedAirport);
									console.log(ngayDi); // Log departure date
									console.log(diemDen); // Log destination
						
									$.ajax({
										url: baseUrl,
										type: 'POST',
										data: {
											ngayDi: ngayDi, // Include departure date in data
											departureAirport: selectedAirport,
											
											diemDen: diemDen // Include destination in data
										},
										success: function(response) {
											console.log(response);
										},
										error: function(xhr, status, error) {
											console.error(error);
										}
									});
								});
							});
						</script> --}}
						
						
						<div class="form-group" style="color: white;font-weight: bold;"> FLYING TO
							<select class="form-select" aria-label="Default select example" style="width: 559px;height: 50px;color:black" name="diemden">
								<option selected>Open this select menu</option>
									<option value="SGN">Sân bay Tân Sơn Nhất (TPHCM) - SGN</option>
									<option value="HAN">Sân bay Nội Bài (Hà Nội) - HAN</option>
									<option value="DAD">Sân bay Đà Nẵng - DAD</option>
									<option value="CXR">Sân bay Cam Ranh (Nha Trang) - CXR</option>
									<option value="PQC">Sân bay Phú Quốc - PQC</option>
									<option value="VCA">Sân bay Cần Thơ - VCA</option>
									<option value="VCL">Sân bay Chu Lai (Quảng Nam) - VCL</option>
									<option value="UIH">Sân bay Phù Cát (Quy Nhơn) - UIH</option>
									<option value="VDH">Sân bay Đồng Hới (Quảng Bình) - VDH</option>
							</select>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<select class="form-control" name="travel-class">
										<option>Economy class</option>
										<option>Business class</option>
										<option>First class</option>
									</select>
									<span class="select-arrow"></span>
									<span class="form-label">Travel class</span>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<select class="form-control" name="adults">
										<option>1</option>
										<option>2</option>
										<option>3</option>
									</select>
									<span class="select-arrow"></span>
									<span class="form-label">Adults</span>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<select class="form-control" name="child">
										<option>0</option>
										<option>1</option>
										<option>2</option>
									</select>
									<span class="select-arrow"></span>
									<span class="form-label">Children</span>
								</div>
							</div>
						</div>
						<div class="form-btn">
							<button class="submit_btn" id="checkAvailabilityBtn">Check availability</button>
						</div>
                        <div id="flightResults"></div>
						
						
						{{-- <script>
							// Define the toggleReturnDate function
							function toggleReturnDate() {
								var tripType = $('#trip-type').val();
								if (tripType === 'round-trip') {
									$('#return-date').show();
								} else {
									$('#return-date').hide();
								}
							}
						
							$(document).ready(function() {
								var baseUrl ="/search-flights";
						
								// Call the function initially to set the initial state
								toggleReturnDate();
						
								// Handle the trip type selection change
								$('#trip-type').change(function() {
									toggleReturnDate();
								});
						
								var airports = [
									{ value: "SGN", city: "Ho Chi Minh City (Tan Son Nhat)" },
									{ value: "HAN", city: "Ha Noi (Noi Bai)" },
									{ value: "DAD", city: "Da Nang" },
									{ value: "CXR", city: "Nha Trang (Cam Ranh)" },
									{ value: "PQC", city: "Phu Quoc" },
									// Add more airports as needed
								];
						
								function populateDropdown(data) {
									$("#diemdi").empty();
									$.each(data, function(index, airport) {
										$("#diemdi").append($('<option></option>').val(airport.value).text(airport.city));
									});
								}
						
								populateDropdown(airports);
						
								// Handle click event for the submit button
								$('#checkAvailabilityBtn').click(function(event) {
									event.preventDefault();
									// Retrieve input values from the form
									var ngayDi = $('#departure-date').val();
									var selectedAirport = $('#diemdi').val();
									var diemDen = $('select[name="diemden"]').val();
                                    console.log("Selected destination: " + diemDen);
                                     console.log("Selected ngayDi: " + ngayDi);
                                      console.log("Selected selectedAirport: " + selectedAirport);
									
						
									// Create data object to send with the request
									var apiUrl = 'https://test.api.amadeus.com/v2/shopping/flight-offers?' +
                'originLocationCode=' + selectedAirport +
                '&destinationLocationCode=' + diemDen +
                '&departureDate=' + ngayDi +
                '&adults=1' +
                '&nonStop=false';
                var apiKey = 'liqp7mgdhxqkvVjVyiBVyHOkEhGp';
            var headers = {
                'Authorization':'Bearer ' + apiKey,
                'Accept': 'application/json'
            };
						
									// Send AJAX POST request to the Laravel route
									$.ajax({
                url: apiUrl,
                type: 'GET',
                headers: headers,
                success: function(response) {
                var chuyenbay = response
                // Chuyển trang và kèm theo dữ liệu trong query string
window.location.href = '/Thongtinchuyenbay?chuyenbay=' + JSON.stringify(chuyenbay);
                   // Log the response data
                    // Process the response data here
                },
                error: function(xhr, status, error) {
                    console.error(error); // Log any errors
                    // Handle errors here
                }
            });
        });
    });
						</script>
						 --}}

						
						
						
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection 