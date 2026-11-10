<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk - {{ $produk->nama }}</title>
    <link
        rel="icon"
        type="image/png"
        href="https://cdn-icons-png.flaticon.com/512/9453/9453183.png">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f3f4f6;
            margin: 0;
            color: #1f2937;
        }

        header {
            background: #2563eb;
            color: white;
            padding: 20px 30px;
        }

        header h2 {
            margin: 0;
        }

        main {
            max-width: 750px;
            margin: 30px auto;
            padding: 0 20px;
        }

        .form-card {
            background: white;
            padding: 28px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            font-weight: bold;
        }

        input,
        textarea {
            width: 100%;
            padding: 11px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            font-size: 14px;
            font-family: Arial, sans-serif;
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        .error {
            color: #dc2626;
            font-size: 13px;
            margin-top: 5px;
        }

        .alert {
            background: #fee2e2;
            color: #991b1b;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 20px;
        }

        .actions {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 25px;
        }

        .btn {
            display: inline-block;
            padding: 11px 18px;
            border: none;
            border-radius: 6px;
            text-decoration: none;
            font-size: 14px;
            cursor: pointer;
        }

        .btn-save {
            background: #2563eb;
            color: white;
        }

        .btn-back {
            background: #6b7280;
            color: white;
        }

        @media (max-width: 600px) {
            .form-card {
                padding: 20px;
            }
        }
    </style>
</head>

<body>
    <header>
        <h2>Edit Produk</h2>
    </header>

    <main>
        <section class="form-card">

            <h3>Ubah Informasi Produk</h3>
            <p>Silakan perbarui data produk di bawah ini.</p>

            @if ($errors->any())
            <div class="alert">
                <strong>Data belum berhasil disimpan!</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('produk.update', $produk->id) }}"
                method="POST">

                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nama">Nama Produk</label>
                    <input
                        type="text"
                        id="nama"
                        name="nama"
                        value="{{ old('nama', $produk->nama) }}"
                        required>
                    @error('nama')
                    <p class="error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <input
                        type="text"
                        id="kategori"
                        name="kategori"
                        value="{{ old('kategori', $produk->kategori) }}"
                        required>
                    @error('kategori')
                    <p class="error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="brand">Brand</label>
                    <input
                        type="text"
                        id="brand"
                        name="brand"
                        value="{{ old('brand', $produk->brand) }}"
                        required>
                    @error('brand')
                    <p class="error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="harga">Harga (Rp)</label>
                    <input
                        type="number"
                        id="harga"
                        name="harga"
                        min="0"
                        step="any"
                        value="{{ old('harga', $produk->harga) }}"
                        required>
                    @error('harga')
                    <p class="error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="gambar">Path Gambar</label>
                    <input
                        type="text"
                        id="gambar"
                        name="gambar"
                        value="{{ old('gambar', $produk->gambar) }}">
                    @error('gambar')
                    <p class="error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea
                        id="deskripsi"
                        name="deskripsi">{{ old('deskripsi', $produk->deskripsi) }}</textarea>
                    @error('deskripsi')
                    <p class="error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="warna">Warna</label>
                    <input
                        type="text"
                        id="warna"
                        name="warna"
                        value="{{ old('warna', $produk->warna) }}">
                    @error('warna')
                    <p class="error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="berat">Berat</label>
                    <input
                        type="text"
                        id="berat"
                        name="berat"
                        value="{{ old('berat', $produk->berat) }}">
                    @error('berat')
                    <p class="error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="stok">Stok</label>
                    <input
                        type="number"
                        id="stok"
                        name="stok"
                        min="0"
                        step="1"
                        value="{{ old('stok', $produk->stok) }}"
                        required>
                    @error('stok')
                    <p class="error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="actions">
                    <button type="submit" class="btn btn-save">
                        Simpan Perubahan
                    </button>

                    <a href="{{ route('produk.show', $produk->id) }}"
                        class="btn btn-back">
                        Batal
                    </a>
                </div>

            </form>
        </section>
    </main>
</body>

</html>