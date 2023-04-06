<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pdf</title>
</head>

<body>
    <style>
        .pdf-con {
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
    </style>
    <div class="pdf-con">
        <h1>Gudang Stok</h1>
        <table border="1">
            <tr>
                <th width="8%">Nama Barang</th>
                <th width="8%">kode Barang</th>
                <th width="8%">Satuan</th>
                <th width="8%">Harga Pokok</th>
                <th width="8%">Harga Satuan</th>
            </tr>
            @foreach ($data as $dt)
                <tr>
                    <td>{{ $dt->kode_barang }}</td>
                    <td>{{ $dt->nama_barang }}</td>
                    <td>{{ $dt->satuan }}</td>
                    <td>{{ $dt->harga_pokok }}</td>
                    <td>{{ $dt->harga_satuan }}</td>
                </tr>
            @endforeach
        </table>
    </div>
</body>

</html>
