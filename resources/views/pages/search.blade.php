@extends('welcome')
@section('search')
<?php
if (isset($_POST['timkiem'])) {
    $trip = $_POST['trip-type'];
    $ngaydi = $_POST['ngaydi'];
    $ngayve = $_POST['ngayve'];
    $diemdi = $_POST['diemdi'];
    $diemden = $_POST['diemden'];
    $class = $_POST['travel-class'];
    $adults = $_POST['adults'];
    $child = $_POST['child'];
}
?>
<h3> Từ khóa tìm kiếm: <?php echo $_POST['trip-type'] ?>, <?php echo $_POST['diemdi'] ?><?php
                                                                                        if ($_POST['trip-type'] == "round-trip")  echo ','. $_POST['diemden']
                                                                                        ?></h3>
<ul class="product_list">
    <?php

    ?>
</ul>
@endsection