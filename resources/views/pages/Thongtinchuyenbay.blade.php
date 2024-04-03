@extends('welcome')

@section('content')
    <div class="container">
        <h1>Thông Tin Chuyến Bay</h1>
        
        @if(!empty($iataCodeDepartures))
            <div class="row">
                <div class="col-md-12">
                    <h2>Danh sách các chuyến bay</h2>
                    <ul class="flight-list">
                        @foreach($iataCodeDepartures as $key => $iataCodeDeparture)
                            <form method="GET" action="/TTkhach">
                                <li class="flight-item">
                                    <div class="flight-info">
                                        <p class="departure">Sân bay xuất phát: {{ $iataCodeDeparture }}</p>
                                        <p class="departure-time">Thời gian xuất phát: {{ $atDepartures[$key] }}</p>
                                        <p class="arrival">Sân bay đích: {{ $iataCodeArrivals[$key] }}</p>
                                        <p class="arrival-time">Thời gian đến: {{ $atArrivals[$key] }}</p>
                                        <input type="hidden" name="iataCodeDeparture" value="{{ $iataCodeDeparture }}">
                                        <input type="hidden" name="atDepartures" value="{{ $atDepartures[$key] }}">
                                        <input type="hidden" name="iataCodeArrivals" value="{{ $iataCodeArrivals[$key] }}">
                                        <input type="hidden" name="atArrivals" value="{{ $atArrivals[$key] }}">
                                        <div class="row justify-content-end">
                                            <div class="col-md-4 text-right btn-submit">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </form>
                        @endforeach
                    </ul>
                </div>
            </div>
        @else
            <p>Không có thông tin chuyến bay.</p>
        @endif
    </div>
@endsection
