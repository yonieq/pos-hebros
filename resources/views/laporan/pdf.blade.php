<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Laporan Pendapatan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">
    <style>
        @page { size: A4 }
    
        table {
            border-collapse: collapse;
            width: 100%;
        }
    
        .table th {
            padding: 8px 8px;
            border:1px solid #000000;
            text-align: center;
        }
    
        .table td {
            padding: 3px 3px;
            border:1px solid #000000;
        }
    
        .text-center {
            text-align: center;
        }
    </style>
</head>
<body>
    <section class="sheet padding-10mm">
        <h3>Laporan Pendapatan</h3>
        <h4>
            Tanggal {{ tanggal_indonesia($awal, false) }}
            s/d
            Tanggal {{ tanggal_indonesia($akhir, false) }}
        </h4>
  
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Tanggal</th>
                    <th>Penjualan</th>
                    <th>Pembelian</th>
                    <th>Pengeluaran</th>
                    <th>Pendapatan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $row)
                    <tr>
                        @foreach ($row as $col)
                            <td class="text-center">{{ $col }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
</body>
</html>