@extends('welcome')
@section('login')
<h3>Login</h3>
<style type="text/css">
    table.dangnhap {
        text-align: center;
        height: 400px;
        width: 400px;
        background-color: #2d343b;
        border-radius: 10%;
    }
    table.dangnhap tr td {
        padding: 10px;
    }
    table.dangnhap input[type=text] {
        font-size: 15px;
        height: 40px;
        border: 1px solid red;
    }
    table.dangnhap input[type=password] {
        font-size: 15px;
        height: 40px;
        border: 1px solid red;
    }
    table.dangnhap {
        margin-left: 35%;
    }
    table.dangnhap input[type=submit] {
        width: 150px;
        height: 50px;
        font-size: 15px;
        background-color: red;
        color: white;
    }
    table.dangnhap a
    {
        color: red;
        text-decoration: none;
    }
</style>
<form action="" method="post">
    <table class="dangnhap" width="50%" style="border-collapse: collapse;">
        <tr>
            <td><input type="text" size="40" name="email" placeholder="EMAIL"></td>
        </tr>
        <tr>
            <td><input type="password" size="40" name="matkhau"  placeholder="MẬT KHẨU"></td>
        </tr>
        <tr>
            <td style="color:blue;float:right;"><a href="index.php?quanLy=quenmatkhau">Quên mật khẩu </a></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center;margin-left:20px;"><input type="submit" name="dangnhap" value="Đăng nhập"></td>
        </tr>
        <tr>
            <td> Nếu chưa có tài khoản hãy <a href="index.php?quanLy=dangky">ĐĂNG KÝ </a></td>
        </tr>
    </table>
</form>
@endsection