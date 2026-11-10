<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
    <link
        rel="icon"
        type="image/png"
        href="https://cdn-icons-png.flaticon.com/512/9453/9453183.png">

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f3f4f6;
            margin: 0;
            padding: 30px 15px;
            color: #1f2937;
        }

        .container {
            max-width: 700px;
            margin: auto;
            background: white;
            padding: 28px;
            border-radius: 12px;
        }

        h1 {
            margin-top: 0;
        }

        label {
            display: block;
            margin-top: 16px;
            margin-bottom: 6px;
            font-weight: bold;
        }

        input,
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            box-sizing: border-box;
            font: inherit;
        }

        textarea {
            min-height: 100px;
        }

        button,
        .back {
            display: inline-block;
            margin-top: 22px;
            padding: 11px 16px;
            border: none;
            border-radius: 6px;
            text-decoration: none;
            cursor: pointer;
            font: inherit;
        }

        button {
            background: #2563eb;
            color: white;
        }

        .back {
            background: #e5e7eb;
            color: #1f2937;
        }

        .error {
            color: #dc2626;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Tambah Produk</h1>
        <p>Isi informasi produk yang ingin ditambahkan.</p>

        @if ($errors->any())
        <div class="error">
            <p>Periksa kembali data berikut:</p>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('produk.store') }}" method="POST">
            @csrf

            <label for="nama">Nama Produk</label>
            <input id="nama" name="nama" value="{{ old('nama') }}" required>

            <label for="kategori">Kategori</label>
            <input id="kategori" name="kategori" value="{{ old('kategori') }}" required>

            <label for="brand">Brand</label>
            <input id="brand" name="brand" value="{{ old('brand') }}" required>

            <label for="harga">Harga (Rp)</label>
            <input id="harga" type="number" name="harga" min="0" step="any" value="{{ old('harga') }}" required>

            <label for="gambar">Path Gambar</label>
            <input id="gambar" name="gambar" value="{{ old('gambar') }}" placeholder="Contoh: gambar/produk.jpg">

            <label for="deskripsi">Deskripsi</label>
            <textarea id="deskripsi" name="deskripsi">{{ old('deskripsi') }}</textarea>

            <label for="warna">Warna</label>
            <input id="warna" name="warna" value="{{ old('warna') }}">

            <label for="berat">Berat</label>
            <input id="berat" name="berat" value="{{ old('berat') }}" placeholder="Contoh: 500 gram">

            <label for="stok">Stok</label>
            <input id="stok" type="number" name="stok" min="0" value="{{ old('stok', 0) }}" required>

            <button type="submit">Simpan Produk</button>
            <a href="{{ route('katalog') }}" class="back">Kembali</a>
        </form>
    </div>
</body>

</html>