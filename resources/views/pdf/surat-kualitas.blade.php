<html>
<head>
	<title>Surat Kualitas Komoditas</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Surat Uji Kualitas Komoditas</h4>
		<h6><a target="_blank" href="#">www.resigudangkebumen.com</a></h5>
	</center>
 
	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>Komoditas</th>
				<th>Gudang</th>
				<th>Kualitas</th>
				<th>Petani</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>{{$data->kategori_komoditas_detail->keterangan}}</td>
                <td>{{$data->gudang->nama_gudang}} ({{$data->gudang->desa->kecamatan->nama_kecamatan}}-{{$data->gudang->desa->nama_desa}})</td>
				<td>{{$data->verifikasi_kualitas->mutu}}</td>
                <td>{{$data->user_info->nama}}</td>
			</tr>
		</tbody>
	</table>
 
</body>
</html>