<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nota PDF</title>

    <style>
        #header {
            height: 15px;
            width: 100%;
            margin: 20px 0;
            background: #222;
            text-align: center;
            color: white;
            font: bold 15px Helvetica, Sans-Serif;
            text-decoration: uppercase;
            letter-spacing: 20px;
            padding: 8px 0px;
            font-size: 24px;
        }

        table td {
            /* font-family: Arial, Helvetica, sans-serif; */
            font-size: 14px;
        }

        table.data td,
        table.data th {
            border: 1px solid #ccc;
            padding: 5px;
        }

        table.data {
            border-collapse: collapse;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        #customer {
            overflow: hidden;
        }

        #customer-title {
            font-size: 2px;
            /* font-weight: bold; */
            float: left;
        }

        #meta {
            margin-top: 0px;
            width: 300px;
            float: right;
        }

        #meta td {
            text-align: right;
        }

        #meta td.meta-head {
            text-align: left;
            background: #eee;
        }

        #meta td p {
            width: 100%;
            height: 20px;
            text-align: right;
        }

        #meta td.meta-head {
            text-align: left;
            background: #eee;
        }

        #terms {
            text-align: center;
            margin: 20px 0 0 0;
        }

        #terms h5 {
            text-transform: uppercase;
            font: 13px Helvetica, Sans-Serif;
            letter-spacing: 10px;
            border-bottom: 1px solid black;
            padding: 0 0 8px 0;
            margin: 0 0 8px 0;
        }

        #terms p {
            width: 100%;
            text-align: center;
        }
    </style>
</head>

<body>
    <p id="header" style="background: #222;">INVOICE</p>
    <table id="items" width="100%">
        <tr>
            <td rowspan="4" width="60%">
                <img src="{{ public_path($setting->path_logo) }}" alt="{{ $setting->path_logo }}" width="200">
                <br>
                {{ $setting->alamat }}
                <br><br>
                <p>To :</p>
                <p>{{ $penjualan->pelanggan->nama ?? '' }}</p>
            </td>
            <td>DATE</td>
            <td>: {{ tanggal_indonesia(date('Y-m-d')) }}</td>
        </tr>
        <tr>
            @foreach ($detail as $a)
            <td>INVOICE #</td>
            <td>: {{ $a->faktur }}</td>
            @endforeach
        </tr>
        <tr>
            <td>NO. ORDER</td>
            <td>: </td>
        </tr>
        <tr>
            @foreach ($detail as $a)
            <td>PEMBAYARAN</td>
            <td>: {{ $a->status}}</td>
            @endforeach
        </tr>
    </table>

    <table class="data" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>Harga Satuan</th>
                <th>Jumlah</th>
                <th>Diskon</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($detail as $key => $item)
            <tr>
                <td class="text-center">{{ $key+1 }}</td>
                <td>{{ $item->barang->nama_barang }}</td>
                <td>{{ $item->barang->kode_barang }}</td>
                <td class="text-right">{{ format_uang($item->harga_jual) }}</td>
                <td class="text-right">{{ format_uang($item->jumlah) }}</td>
                <td class="text-right">{{ $item->diskon }}</td>
                <td class="text-right">{{ format_uang($item->subtotal) }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="6" class="text-right"><b>Total Harga</b></td>
                <td class="text-right"><b>{{ format_uang($penjualan->total_harga) }}</b></td>
            </tr>
            <tr>
                <td colspan="6" class="text-right"><b>Diskon</b></td>
                <td class="text-right"><b>{{ format_uang($penjualan->diskon) }}</b></td>
            </tr>
            <tr>
                <td colspan="6" class="text-right"><b>Pajak</b></td>
                <td class="text-right"><b>10%</b></td>
            </tr>
            <tr>
                <td colspan="6" class="text-right"><b>Total Bayar</b></td>
                <td class="text-right"><b>{{ format_uang($penjualan->bayar) }}</b></td>
            </tr>
            <tr>
                <td colspan="6" class="text-right"><b>Diterima</b></td>
                <td class="text-right"><b>{{ format_uang($penjualan->diterima) }}</b></td>
            </tr>
            <tr>
                <td colspan="6" class="text-right"><b>Kembali</b></td>
                <td class="text-right"><b>{{ format_uang($penjualan->diterima - $penjualan->bayar) }}</b></td>
            </tr>
        </tfoot>
    </table>

    <table width="100%">
        <tr>
            <td><b>Bank Bukopin</b></td>
        </tr>
        <tr>
            <td><b>Cabang : Kas PLN Area Kalimalang</b></td>
        </tr>
        <tr>
            <td><b>No. Rek : 1001-605-476</b></td>
        </tr>
        <tr>
            <td><b>Atas Nama : HEBROS, PT</b></td>
        </tr>
        <tr>
            <!-- <td><b>Bank Bukopin</b></td> -->
            <td class="text-right">
                Kasir
                <br>
                <br>
                <br>
                Siti Nur Khasanah
            </td>
        </tr>
    </table>
    <div id="terms">
        <h5>THANK YOU FOR YOUR BUSINESS</h5>
        <p><img id="footer" style="height: 30px" src="img/footer.png" alt="logo" /></p>
    </div>
</body>

</html>