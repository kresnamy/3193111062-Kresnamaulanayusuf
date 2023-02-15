<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <style>
        .garis{
            border-top: 4px solid black;
            height: 2px;
           
        }
    </style>
</head>
<body>
    <div class="row">
      
        <div class="col-12 text-center">
            <h3>TOKO OLI JAYA MAKMUR</h3>
            <span>Jl. Kapten Tendean No 60CYogyakarta, DI Yogyakarta, 55251</span></br>
            <span>TELP. 62818266400</span>
        </div>
        <div class="col-12 mt-3 mb-5">
            <div class="garis"></div>
        </div>
    </div>
    <table id="example" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>{{ __('No') }}</th>
                <th>{{ __('Nama Pengaju Retur') }}</th>
                <th>{{ __('Nomor Pesanaan') }}</th>
                <th>{{ __('Keterangan Pengembalian') }}</th>
                <th>{{ __('Foto Produk') }}</th>
                <th>{{ __('Status') }}</th>
            </tr>
        </thead>
        <tbody>
            @if (isset($data))
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($data['retur'] as $retur)
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{{ $retur->pesanan->customer->name }}</td>
                            <td>{{ $retur->invoice_number }}</td>
                            <td>{{ $retur->keterangan }}</td>                           
                            <td>
                                <img src="{{ asset('storage/'.$retur->image) }}" alt="" style="width: 100px;">
                            </td>
                            @if ($retur->status == 'accepted')
                            <td><span class="badge badge-success">Diterima</span></td>          
                            @else                 
                            <td><span class="badge badge-danger">Ditolak</span></td>          
                            @endif
                        </tr>
                        @php
                            $no++;
                        @endphp
                    @endforeach
                    @endif
        </tbody>
    </table>

    <div class="row mt-5">
            <div class="col-6 text-center">
               
            </div>
            <div class="col-6 text-center">
                <P>Yogyakarta, <span id="tgl"></span></P>
                <br>
                <br>
                <span>Toko Oli Jaya Makmur</span></br>
            </div>
        </div>

    <script>
        var tw = new Date();
        if (tw.getTimezoneOffset() == 0) (a=tw.getTime() + ( 7 *60*60*1000))
        else (a=tw.getTime());
        tw.setTime(a);
        var tahun= tw.getFullYear ();
        var hari= tw.getDay ();
        var bulan= tw.getMonth ();
        var tanggal= tw.getDate ();
        var hariarray=new Array("Minggu,","Senin,","Selasa,","Rabu,","Kamis,","Jum'at,","Sabtu,");
        var bulanarray=new Array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","Nopember","Desember");
        document.querySelector('#tgl').innerHTML = ' '+tanggal+' '+bulanarray[bulan]+' '+tahun;
        document.querySelector('#thn').innerHTML = tahun;
    </script>

    <script>
        window.print();
    </script>
</body>
</html>