<!DOCTYPE html>
<html>
<head>
	<title>Laporan Data Surat Masuk</title>
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
		<h5>Laporan Data Surat Masuk</h4>
	</center>

	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>No</th>
				<th>Nomor Surat</th>
				<th>Perihal</th>
				<th>Tgl.Surat</th>
				<th>Tgl.Terima</th>
                <th>Pengirim</th>
                <th>Penerima</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($surat as $s)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{$s->no_surat}}</td>
				<td>{{$s->perihal}}</td>
                <td>{{date('d-m-Y', strtotime($s->tgl_surat))}}</td>
                <td>{{date('d-m-Y', strtotime($s->tgl_terima))}}</td>
                <td>{{$s->pengirim}}</td>
                <td>{{$s->penerima}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>

</body>
</html>