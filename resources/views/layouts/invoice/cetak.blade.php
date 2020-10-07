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
            border-collapse:collapse;
            margin:0 auto;
            width:740px;
        }
        td, tr, th{
            padding:12px;
            border:1px solid #333;
            width:185px;
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
    </style>
</head>

<body>


	
	
	<p><div class="visible-print text-center">
    @foreach($mhsn as $kode)
	<a class='img-responsif' id='kotak2' style='cursor:default'>
    <img src='https://chart.googleapis.com/chart?cht=qr&chl={{ $kode->Nim }}%0A&chs=180x180&choe=UTF-8&chld=L|2' alt=''>
    <!-- <img  src='{{ asset("image/okeeh") }}/{{ $kode->foto }}'> -->
</a>
                     </div></p>
                     
                     

					 <p>Nama : {{ $kode->nama }}</p>
                     <p>Nim : {{ $kode->Nim }}</p>
                     <p>kelas : {{ $kode->jurusan }}</p>

                     

                     @endforeach
					
</body>
</html>

