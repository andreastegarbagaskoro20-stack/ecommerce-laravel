<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Produk</title>

    <link rel="icon" type="image/png"
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
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }

        header h2 {
            margin: 0;
        }

        main {
            max-width: 1200px;
            margin: 30px auto;
            padding: 0 20px;
        }

        .welcome {
            background: white;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 25px;
        }

        .products {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
        }

        .product-card {
            background: white;
            border-radius: 10px;
            padding: 18px;
            box-shadow: 0 2px 8px #00000010;
        }

        .product-card img {
            width: 100%;
            height: 180px;
            object-fit: contain;
            margin-bottom: 12px;
        }

        .product-card h3 {
            margin: 8px 0;
        }

        .category {
            color: #6b7280;
            font-size: 14px;
        }

        .price {
            color: #2563eb;
            font-weight: bold;
            font-size: 18px;
        }

        .stock {
            font-size: 14px;
            margin-top: 8px;
        }

        button {
            border: none;
            border-radius: 6px;
            padding: 10px 16px;
            cursor: pointer;
            color: white;
        }

        .btn-logout {
            background: #dc2626;
        }

        .btn-delete {
            background: #dc2626;
        }

        .btn-edit {
            display: inline-block;
            background: #f59e0b;
            color: white;
            padding: 10px 16px;
            border-radius: 6px;
            text-decoration: none;
            margin-top: 10px;
        }

        .btn-detail {
            display: inline-block;
            margin-top: 10px;
            background: #2563eb;
            color: white;
            padding: 10px 16px;
            border-radius: 6px;
            text-decoration: none;
        }

        .btn-add {
            background: #16a34a;
            color: white;
            padding: 10px 16px;
            border-radius: 6px;
            text-decoration: none;
        }

        .role {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
            background: #dbeafe;
            color: #1d4ed8;
        }

        .actions {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-top: 8px;
        }
    </style>
</head>

<body>

    <header>
        <h2>Katalog Produk</h2>

        <div style="display: flex; gap: 10px; align-items: center; flex-wrap: wrap;">

            <span>
                {{ auth()->user()->name }}
            </span>

            <span class="role">
                {{ ucfirst(auth()->user()->role) }}
            </span>

            <a href="{{ route('produk.create') }}" class="btn-add">
                + Tambah Produk
            </a>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn-logout">Logout</button>
            </form>

        </div>
    </header>

    <main>

        <section class="welcome">
            <h1>Halo, {{ auth()->user()->name }}!</h1>
            <p>Berikut daftar produk yang tersedia.</p>
            <p>Total produk: {{ $produks->count() }}</p>
        </section>

        <section class="products">

            @forelse ($produks as $produk)

            <article class="product-card">

                @if ($produk->gambar)
                <img
                    src="{{ asset($produk->gambar) }}"
                    alt="{{ $produk->nama }}"
                    onerror="this.style.display='none'">
                @endif

                <h3>{{ $produk->nama }}</h3>

                <p class="category">
                    {{ $produk->kategori }} |
                    {{ $produk->brand }}
                </p>

                <p class="price">
                    Rp {{ number_format($produk->harga, 0, ',', '.') }}
                </p>

                <p class="stock">
                    Stok: {{ $produk->stok }}
                </p>

                <div class="actions">

                    <a href="{{ route('produk.show', $produk->id) }}"
                        class="btn-detail">
                        Lihat Detail
                    </a>

                    <a href="{{ route('produk.edit', $produk->id) }}"
                        class="btn-edit">
                        Edit
                    </a>

                    @if (auth()->user()->role === 'admin')
                    <form action="{{ route('produk.destroy', $produk->id) }}"
                        method="POST"
                        onsubmit="return confirm('Yakin ingin menghapus produk ini?')">

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn-delete">
                            Hapus
                        </button>

                    </form>
                    @endif

                </div>

            </article>

            @empty

            <p>Belum ada produk yang tersedia.</p>

            @endforelse

        </section>

    </main>

</body>

</html>