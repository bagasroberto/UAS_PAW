<head>
    <meta name="viewport" content="width=device-width,
    initial-scale=1" />
    <style>
        table {
            border-collapse: collapse;
            border-spacing: 0;
            width: 100%;
            border: 1px solid #ddd;
        }

        thead {
            background-color: #f2f2f2;
        }

        th,
        td {
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .tambah {
            padding: 8px 16px;
            text-decoration: none;
        }

    </style>
</head>

<body>
    <div style="overflow-x: auto">
        <br />
        <center>
            <h2>Laporan Pendapatan Keuangan</h2>
            <h3>Bulan</h3>
        </center>
        <br />
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $total = 0;
                ?>

                @foreach ($product as $pd)
                    @if ($pd->status == 'diterima')
                        <?php $total += $pd->total_harga; ?>
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap">
                                <div class="text-sm text-gray-500">{{ $no++ }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap">
                                <div class="text-sm text-gray-500">{{ $pd->nama_product }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap">
                                <div class="text-sm text-gray-500">{{ $pd->total_harga }}</div>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td>Total Pendapatan</td>
                    <td></td>
                    <td><?php echo $total; ?></td>
                </tr>
            </tfoot>
        </table>
    </div>
</body>
