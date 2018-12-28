<!-- index.blade.php -->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Rekap Form C1 Plano</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body>
    <div class="container">
    <br />
    <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Province</th>
        <th>Regency</th>
        <th>District</th>
        <th>Subdistrict</th>
        <th>C1Plano Type</th>
        <th>TPS Number</th>
        <th>File Path</th>
      </tr>
    </thead>
    <tbody>
      @foreach($pdffiles as $pdffile)
      <tr>
        <td>{{$pdffile['id']}}</td>
        <td>{{$pdffile['province_name']}}</td>
        <td>{{$pdffile['city_name']}}</td>
        <td>{{$pdffile['district_name']}}</td>
        <td>{{$pdffile['subdistrict_name']}}</td>
        <td>{{$pdffile['c1plano_type_name']}}</td>
        <td>{{$pdffile['tps_code']}}</td>
        <td>
          @php
            $file_name = $pdffile['file_path'];
            $pathfile = "/storage/c1plano/".rawurlencode($pdffile['file_path']);
            echo "<a href=$pathfile>$file_name</a>";            
          @endphp
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
  </body>
</html>
