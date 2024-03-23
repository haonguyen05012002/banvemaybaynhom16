@extends('welcome')
@section('content')
<?php
// if(isset($_POST['timkiem']))
// {
// 	$trip = $_POST['trip-type'];
//     $ngaydi = $_POST['ngaydi'];
//     $ngayve = $_POST['ngayve'];
//     $diemdi = $_POST['diemdi'];
//     $diemden = $_POST['diemden'];
//     $class = $_POST['travel-class'];
//     $adults = $_POST['adults'];
//     $child = $_POST['child'];
// 	if($trip==""|| $ngaydi==""||$ngayve==""||$diemdi="")
// 	{
// 		echo "Chua dien day du thong tin can dat ve";
		
// 	}
// }
?>
<div id="booking" class="section">
	<div class="section-center">
		<div class="container">
			<div class="row">
				<div class="booking-form">
					<div class="form-header">
						<h1>Book Your Flight</h1>
					</div>
					<form action="{{URL::to('/Home/Search')}}" method="post">
					@csrf
						<div class="form-group">
							<label for="trip-type" style="color: white;font-weight: bold;">TRIP TYPE:</label>
							<select id="trip-type" onchange="toggleDateInputs()" name="trip-type">
								<option value="one-way">One Way</option>
								<option value="round-trip">Round Trip</option>
							</select>
						</div>
						<div class="form-group">
							<b style="color: white;font-weight: bold;"> NGAY DI: </b><input type="date" name="ngaydi" id="departure-date" class="departure-date" style="width: 200px;height: 50px;color:black">
							<b style="color: white;font-weight: bold;"> NGAY DEN: </b><input type="date" name="ngayve" id="return-date" class="return-date" style="display: none;width: 200px;height: 50px;color:black">

						</div>
						<div class="form-group" style="color: white;font-weight: bold;"> FLYING FROM

							<select class="form-select" aria-label="Default select example" style="width: 559px;height: 50px;color:black" name="diemdi">
								<option selected>Open this select menu</option>
								<option value="1">One</option>
								<option value="2">Two</option>
								<option value="3">Three</option>
							</select>

						</div>
						<div class="form-group" style="color: white;font-weight: bold;"> FLYING TO

							<select class="form-select" aria-label="Default select example" style="width: 559px;height: 50px;color:black" name="diemden">
								<option selected>Open this select menu</option>
								<option value="1">One</option>
								<option value="2">Two</option>
								<option value="3">Three</option>
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
							<button class="submit-btn" name="timkiem">Check availability</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection