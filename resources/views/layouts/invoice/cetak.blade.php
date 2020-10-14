<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style>
    body{
        font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        color:#333;
        text-align:left;
        font-size:18px;
        margin:0;
    }
    .container{
        margin:0 auto;
        margin-top:35px;
        padding:40px;
        width:750px;
        height:auto;
        background-color:#fff;
    }
    caption{
        font-size:28px;
        margin-bottom:15px;
    }
    table{
        border:1px solid #333;
        /* border-collapse:collapse; */
        margin:0 auto;
        width:100px;
    }
    td, tr, th{
        padding:10px;
        border:1px solid #333;
        width:100px;
    }
    th{
        background-color: #f0f0f0;
    }
    h4, p{
        margin:0px;
    }
    img {
        padding:12px;
        padding-left:35%;

        width:185px;
    }
    * {
box-sizing: border-box;
}

.header {
border: 1px solid red;
padding: 15px;
}

.row::after {
content: "";
clear: both;
/* display: table; */
}

[class*="col-"] {
float: left;
/* padding: 0.5px; */
/* border: 1px solid; */
}

.col-1 {width: 8.33%;}
.col-2 {width: 12%;}
.col-3 {width: 25%;}
.col-4 {width: 36%;}
.col-5 {width: 41.66%;}
.col-6 {width: 50%;}
.col-7 {width: 58.33%;}
.col-8 {width: 66.66%;}
.col-9 {width: 75%;}
.col-10 {width: 83.33%;}
.col-11 {width: 91.66%;}
.col-12 {width: 100%;}
</style>
</head>

<body>
    <h5>----------------------------------------------------------------------------------------------------------------------------------------------</h5>

<H1>ANGGAP SAJA STRUK DARI INDOMART</h1>
    @foreach ($thtn as $item)
<h4>kode pembelian :{{$item->kd_pembelian}}</h4>
@endforeach

<h5>----------------------------------------------------------------------------------------------------------------------------------------------</h5>
<div class="row">
    <div class="col-7"><h4>Nama barang : </h4></div>
    <div class="col-3"><h4>Jml: </h4></div>
    <div class="col"><h4>harga: </h4></div>
</div>
<h5>----------------------------------------------------------------------------------------------------------------------------------------------</h5>

@foreach ($prd as $pri)

<div class="row">
<div class="col-7"><h4>{{$pri->detail_produk->nama}}</h4></div>
<div class="col-3"><h4> {{$pri->jumlah}}</h4></div>
<div  id="harga" class="col"><h4> {{$pri->detail_produk->harga}}</h4></div>
</div>


<h4></h4>
@endforeach
<br>
<br><br>
<h5>----------------------------------------------------------------------------------------------------------------------------------------------</h5>

<br>
@foreach ($thtn as $putih)

<div class="row">
    <div class="col-10"><h4>TOTAL PEMBAYARAN :</h4> </div>
    <div class="col"><h4>{{$item->nilai_transaksi}}</h4></div>
</div>



@endforeach

<br><br>
<br>
<h5>----------------------------------------------------------------------------------------------------------------------------------------------</h5>






</body>
</html>
