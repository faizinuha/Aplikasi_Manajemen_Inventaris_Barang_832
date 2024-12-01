@extends('kerangka.master') <!-- Sesuaikan dengan layout Anda -->

@section('content')
<div class="container">
    <h1 class="mb-4">Tambah Transaksi Barang Keluar</h1>

    <!-- Menampilkan error validasi -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('Transactions_out.store') }}" method="POST">
        @csrf
        
        <div class="mb-3">
            <label for="tanggal_keluar" class="form-label">Tanggal Keluar</label>
            <input type="date" name="tanggal_keluar" id="tanggal_keluar" class="form-control" value="{{ old('tanggal_keluar') }}" required>
        </div>

        <div class="mb-3">
            <label for="item_id" class="form-label">Barang</label>
            <select name="item_id" id="item_id" class="form-select" required>
                <option value="">-- Pilih Barang --</option>
                @foreach ($items as $item)
                    <option value="{{ $item->id }}" {{ old('item_id') == $item->id ? 'selected' : '' }}>
                        {{ $item->nama_barang }} (Stok: {{ $item->stock }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="tujuan_keluar" class="form-label">Tujuan</label>
            <input type="text" name="tujuan_keluar" id="tujuan_keluar" class="form-control" value="{{ old('tujuan_keluar') }}" required>
        </div>

        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah</label>
            <input type="number" name="jumlah" id="jumlah" class="form-control" value="{{ old('jumlah') }}" min="1" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('Transactions_out.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
