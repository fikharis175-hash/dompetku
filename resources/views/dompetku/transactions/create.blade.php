@extends('layouts.app')

@section('title', 'DompetKu — Tambah Transaksi')
@section('page_title', 'Tambah Transaksi')

@section('content')
<div class="page-intro">
    <div>
        <h1>Tambah Transaksi</h1>
        <p>Catat pemasukan atau pengeluaran kamu.</p>
    </div>
    <a href="{{ route('dashboard') }}" class="breadcrumb-link"><i class="bi bi-arrow-left"></i><span>Kembali ke Dashboard</span></a>
</div>

<div class="row g-4 align-items-stretch">
    <div class="col-lg-8">
        <section class="content-card h-100" aria-labelledby="form-title">
            <div class="mb-4">
                <h2 class="card-title" id="form-title">Informasi Transaksi</h2>
                <p class="card-subtitle">Lengkapi data transaksi yang ingin dicatat. Kolom bertanda <span class="text-danger">*</span> wajib diisi.</p>
            </div>

            {{-- UI form dahulu. Form belum menyimpan data sebelum route/controller store dibuat. --}}
            <form id="transactionForm" action="#" method="POST">
                @csrf
                <fieldset class="border-0 p-0 m-0">
                    <legend class="form-label mb-2">Jenis Transaksi <span class="required">*</span></legend>
                    <div class="row g-3">
                        <div class="col-sm-6 type-choice">
                            <input type="radio" name="type" id="typeIncome" value="income" checked required>
                            <label for="typeIncome"><span class="type-icon income"><i class="bi bi-arrow-down-left-circle-fill"></i></span><span><span class="type-title d-block">Pemasukan</span><span class="type-desc d-block">Uang masuk ke akun kamu</span></span></label>
                        </div>
                        <div class="col-sm-6 type-choice">
                            <input type="radio" name="type" id="typeExpense" value="expense" required>
                            <label for="typeExpense"><span class="type-icon expense"><i class="bi bi-arrow-up-right-circle-fill"></i></span><span><span class="type-title d-block">Pengeluaran</span><span class="type-desc d-block">Uang keluar dari akun kamu</span></span></label>
                        </div>
                    </div>
                </fieldset>

                <div class="row g-3 mt-3">
                    <div class="col-md-6">
                        <label for="amount" class="form-label">Nominal <span class="required">*</span></label>
                        <div class="input-group"><span class="input-group-text">Rp</span><input type="number" class="form-control" id="amount" name="amount" min="0.01" step="0.01" placeholder="Contoh: 50000" required></div>
                        <div class="help-text">Masukkan angka lebih besar dari 0.</div>
                    </div>
                    <div class="col-md-6">
                        <label for="transaction_date" class="form-label">Tanggal Transaksi <span class="required">*</span></label>
                        <input type="date" class="form-control" id="transaction_date" name="transaction_date" value="{{ date('Y-m-d') }}" required>
                    </div>
                    <div class="col-12">
                        <label for="category" class="form-label">Kategori <span class="required">*</span></label>
                        <select class="form-select" id="category" name="category" required>
                            <option value="" selected disabled>Pilih kategori</option>
                            <optgroup label="Pemasukan"><option>Gaji</option><option>Freelance</option><option>Bonus</option><option>Usaha</option><option>Investasi</option><option>Pemasukan Lainnya</option></optgroup>
                            <optgroup label="Pengeluaran"><option>Makanan & Minuman</option><option>Transportasi</option><option>Belanja</option><option>Tagihan</option><option>Hiburan</option><option>Kesehatan</option><option>Pendidikan</option><option>Pengeluaran Lainnya</option></optgroup>
                        </select>
                        <div class="help-text">Pilihan kategori contoh. Database menyimpan kategori sebagai teks.</div>
                    </div>
                    <div class="col-12">
                        <label for="description" class="form-label">Keterangan <span class="text-muted fw-normal">(Opsional)</span></label>
                        <textarea class="form-control" id="description" name="description" maxlength="2000" placeholder="Contoh: makan siang, gaji bulanan, atau belanja kebutuhan rumah"></textarea>
                        <div class="d-flex justify-content-between gap-2 mt-1"><div class="help-text mt-0">Catatan tambahan untuk membantu mengingat transaksi.</div><div class="help-text mt-0"><span id="descriptionCount">0</span>/2000</div></div>
                    </div>
                </div>

                <div class="form-divider"></div>
                <div class="d-flex flex-wrap justify-content-between align-items-center gap-2">
                    <button type="reset" class="btn btn-outline-senstech"><i class="bi bi-arrow-counterclockwise me-1"></i>Reset</button>
                    <div class="d-flex gap-2 ms-auto"><a href="{{ route('transactions.index') }}" class="btn btn-outline-senstech">Batal</a><button type="submit" class="btn btn-senstech"><i class="bi bi-floppy me-1"></i>Simpan Transaksi</button></div>
                </div>
            </form>
        </section>
    </div>

    <div class="col-lg-4">
        <aside class="side-info h-100" aria-label="Panduan pengisian">
            <div class="info-icon"><i class="bi bi-journal-check"></i></div>
            <h3>Petunjuk Pengisian</h3>
            <p>Pastikan jenis, nominal, kategori, dan tanggal sudah benar sebelum transaksi disimpan.</p>
            <hr class="my-4" style="border-color:#DDEAE2;opacity:1">
            <h3 class="mb-3">Contoh Kategori</h3>
            <div class="category-pills mb-4"><span class="category-pill">Gaji</span><span class="category-pill">Freelance</span><span class="category-pill">Bonus</span><span class="category-pill">Belanja</span><span class="category-pill">Tagihan</span></div>
            <hr class="my-4" style="border-color:#DDEAE2;opacity:1">
            <h3 class="mb-2"><i class="bi bi-lightbulb me-2 text-success"></i>Tips</h3>
            <ul class="info-list"><li>Gunakan nominal yang sesuai.</li><li>Pilih kategori paling relevan.</li><li>Isi keterangan jika diperlukan.</li><li>Periksa kembali data sebelum menyimpan.</li></ul>
        </aside>
    </div>
</div>

<div class="helper-note mt-3"><i class="bi bi-info-circle me-1"></i>Ini masih tampilan awal. Tombol simpan belum terhubung ke backend, jadi data belum masuk database.</div>
@endsection

@push('scripts')
<script>
    const descriptionInput = document.getElementById('description');
    const descriptionCount = document.getElementById('descriptionCount');
    descriptionInput.addEventListener('input', () => descriptionCount.textContent = descriptionInput.value.length);

    document.getElementById('transactionForm').addEventListener('submit', (event) => {
        event.preventDefault();
        alert('Tampilan form sudah siap, bro. Penyimpanan baru aktif setelah route dan controller Laravel dibuat.');
    });
</script>
@endpush