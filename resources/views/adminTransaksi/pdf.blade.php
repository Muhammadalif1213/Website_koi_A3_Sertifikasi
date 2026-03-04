<!DOCTYPE html>
<html>
<head>
    <title>Laporan Riwayat Transaksi</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        h2 { margin: 0; }
        p { margin: 5px 0; }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            border: 1px solid #333;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        .status {
            text-transform: capitalize;
        }
        .total-row {
            font-weight: bold;
            background-color: #e0e0e0;
        }
    </style>
</head>
<body>

    <div class="header">
        <h2>A3 KOI Farm</h2>
        <p>Laporan Riwayat Transaksi (Selesai, Dikirim, Dibatalkan)</p>
        <p>Tanggal Cetak: {{ date('d M Y') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Kode Produk</th>
                <th>Nama Produk</th>
                <th>Qty</th>
                <th>Status</th>
                <th>Total Harga</th>
            </tr>
        </thead>
        <tbody>
            @php $grandTotal = 0; @endphp
            @foreach ($riwayat as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d M Y H:i') }}</td>
                <td>{{ $item->kode_produk }}</td>
                <td>{{ $item->produk->nama_produk ?? 'Produk Dihapus' }}</td>
                <td>{{ $item->qty }}</td>
                <td class="status">{{ $item->status }}</td>
                <td style="text-align: right;">Rp{{ number_format($item->total_harga, 0, ',', '.') }}</td>
            </tr>
            @php $grandTotal += $item->total_harga; @endphp
            @endforeach
            
            {{-- Baris Total Keseluruhan (Opsional) --}}
            <tr class="total-row">
                <td colspan="6" style="text-align: center;">Grand Total Pendapatan</td>
                <td style="text-align: right;">Rp{{ number_format($grandTotal, 0, ',', '.') }}</td>
            </tr>
        </tbody>
    </table>

</body>
</html>