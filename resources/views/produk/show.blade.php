<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail {{ $produk->nama }}</title>
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

        header a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        main {
            max-width: 1000px;
            margin: 35px auto;
            padding: 0 20px;
        }

        .detail-card {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            background: white;
            padding: 28px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        .product-image {
            background: #f9fafb;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 300px;
        }

        .product-image img {
            max-width: 100%;
            max-height: 350px;
            object-fit: contain;
        }

        .category {
            color: #6b7280;
        }

        .price {
            color: #2563eb;
            font-size: 25px;
            font-weight: bold;
        }

        .description {
            line-height: 1.7;
            white-space: pre-line;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        td {
            padding: 12px 8px;
            border-bottom: 1px solid #e5e7eb;
        }

        td:first-child {
            font-weight: bold;
            width: 35%;
        }

        .actions {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 10px;
            margin-top: 25px;
        }

        .actions a {
            display: inline-block;
            padding: 11px 16px;
            border-radius: 6px;
            text-decoration: none;
            color: white;
            font-size: 14px;
        }

        .edit {
            background: #d97706;
        }

        .back {
            background: #6b7280;
        }

        .delete {
            background: #dc2626;
            padding: 11px 16px;
            border: none;
            border-radius: 6px;
            color: white;
            cursor: pointer;
            font-size: 14px;
        }

        .delete:hover {
            background: #b91c1c;
        }

        .edit:hover {
            background: #b45309;
        }

        .back:hover {
            background: #4b5563;
        }

        @media (max-width: 700px) {
            .detail-card {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <header>
        <a href="{{ route('katalog') }}">← Kembali ke Katalog</a>
    </header>

    <main>
        <section class="detail-card">

            <div class="product-image">
                @if ($produk->gambar)
                <img
                    src="{{ asset($produk->gambar) }}"
                    alt="{{ $produk->nama }}"
                    onerror="this.style.display='none'">
                @else
                <p>Gambar tidak tersedia</p>
                @endif
            </div>

            <div>
                <p class="category">
                    {{ $produk->kategori }} · {{ $produk->brand }}
                </p>

                <h1>{{ $produk->nama }}</h1>

                <p class="price">
                    Rp {{ number_format($produk->harga, 0, ',', '.') }}
                </p>

                <h3>Deskripsi Produk</h3>

                <p class="description">{{ $produk->deskripsi ?: 'Belum ada deskripsi produk.' }}</p>

                <h3>Informasi Produk</h3>

                <table>
                    <tr>
                        <td>Brand</td>
                        <td>{{ $produk->brand }}</td>
                    </tr>

                    <tr>
                        <td>Kategori</td>
                        <td>{{ $produk->kategori }}</td>
                    </tr>

                    <tr>
                        <td>Warna</td>
                        <td>{{ $produk->warna ?: '-' }}</td>
                    </tr>

                    <tr>
                        <td>Berat</td>
                        <td>{{ $produk->berat ?: '-' }}</td>
                    </tr>

                    <tr>
                        <td>Stok</td>
                        <td>{{ $produk->stok }} produk</td>
                    </tr>
                </table>


                <div class="actions">

                    <!-- Tombol Edit: Admin dan Staff -->
                    <a
                        href="{{ route('produk.edit', $produk->id) }}"
                        class="edit">
                        Edit Produk
                    </a>

                    <!-- Tombol Hapus: Khusus Admin -->
                    @if (auth()->user()->role === 'admin')
                    <form
                        action="{{ route('produk.destroy', $produk->id) }}"
                        method="POST"
                        onsubmit="return confirm('Yakin ingin menghapus produk ini?')">

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="delete">
                            Hapus Produk
                        </button>
                    </form>
                    @endif

                    <!-- Tombol Kembali -->
                    <a href="{{ route('katalog') }}" class="back">
                        Kembali
                    </a>

                </div>
            </div>

        </section>
    </main>
</body>

</html>