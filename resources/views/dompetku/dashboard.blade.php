@extends('layouts.app')

@section('title', 'DompetKu — Dashboard')
@section('page_title', 'Dashboard')
@section('content_wrapper_class', 'dashboard-content')

@section('content')
<section class="welcome-card" aria-labelledby="welcome-title">
    <div class="position-relative" style="z-index:1">
        <div class="welcome-kicker">Ringkasan Keuangan</div>
        <h2 id="welcome-title">Halo, User! <i class="bi bi-hand-wave" style="color:var(--st-lime);font-size:1.2rem"></i></h2>
        <p>Pantau pemasukan dan pengeluaranmu dengan lebih teratur.</p>
    </div>
    <div class="welcome-date"><i class="bi bi-calendar3 me-2"></i>Ringkasan bulan ini</div>
</section>

<section aria-labelledby="stats-heading">
    <div class="section-heading">
        <div>
            <h2 id="stats-heading">Statistik Keuangan</h2>
            <p>Ringkasan transaksi bulan ini</p>
        </div>
        <span class="subtle-link">Data contoh</span>
    </div>

    {{-- Angka di bawah masih data contoh, belum dihitung dari database. --}}
    <div class="row g-3">
        <div class="col-12 col-md-4">
            <article class="stat-card">
                <div class="stat-icon income"><i class="bi bi-arrow-down-left"></i></div>
                <div class="min-w-0">
                    <div class="stat-label">Total Pemasukan</div>
                    <div class="stat-value">Rp 5.000.000</div>
                    <div class="stat-foot"><i class="bi bi-calendar3 me-1"></i>Bulan ini</div>
                </div>
            </article>
        </div>
        <div class="col-12 col-md-4">
            <article class="stat-card">
                <div class="stat-icon expense"><i class="bi bi-arrow-up-right"></i></div>
                <div class="min-w-0">
                    <div class="stat-label">Total Pengeluaran</div>
                    <div class="stat-value">Rp 3.250.000</div>
                    <div class="stat-foot"><i class="bi bi-calendar3 me-1"></i>Bulan ini</div>
                </div>
            </article>
        </div>
        <div class="col-12 col-md-4">
            <article class="stat-card">
                <div class="stat-icon balance"><i class="bi bi-wallet2"></i></div>
                <div class="min-w-0">
                    <div class="stat-label">Saldo Saat Ini</div>
                    <div class="stat-value">Rp 1.750.000</div>
                    <div class="stat-foot"><i class="bi bi-info-circle me-1"></i>Pemasukan dikurangi pengeluaran</div>
                </div>
            </article>
        </div>
    </div>
</section>

<section class="mt-4" aria-label="Transaksi terbaru dan akses cepat">
    <div class="row g-3 align-items-stretch">
        <div class="col-12 col-xl-8">
            <div class="content-card">
                <div class="card-heading">
                    <div>
                        <h3>Transaksi Terbaru</h3>
                        <p>Aktivitas keuangan yang terakhir dicatat</p>
                    </div>
                    <div class="d-flex gap-2 flex-wrap">
                        <a class="btn btn-outline-senstech" href="{{ route('transactions.index') }}"><i class="bi bi-list-ul me-1"></i>Lihat Semua</a>
                        <a class="btn btn-senstech" href="{{ route('transactions.create') }}"><i class="bi bi-plus-lg me-1"></i>Tambah</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table transaction-table align-middle mb-0">
                        <thead><tr><th>Transaksi</th><th>Tanggal</th><th>Jenis</th><th class="text-end">Nominal</th></tr></thead>
                        <tbody>
                            <tr>
                                <td><div class="transaction-name"><span class="transaction-symbol"><i class="bi bi-wallet2"></i></span><span><span class="d-block transaction-title">Gaji Bulanan</span><span class="d-block transaction-subtitle">Gaji</span></span></div></td>
                                <td>12 Okt 2026</td><td><span class="type-badge type-income">Pemasukan</span></td><td class="text-end"><span class="amount-income">+ Rp 5.000.000</span></td>
                            </tr>
                            <tr>
                                <td><div class="transaction-name"><span class="transaction-symbol"><i class="bi bi-cart3"></i></span><span><span class="d-block transaction-title">Belanja Bulanan</span><span class="d-block transaction-subtitle">Belanja</span></span></div></td>
                                <td>10 Okt 2026</td><td><span class="type-badge type-expense">Pengeluaran</span></td><td class="text-end"><span class="amount-expense">− Rp 350.000</span></td>
                            </tr>
                            <tr>
                                <td><div class="transaction-name"><span class="transaction-symbol"><i class="bi bi-cup-hot"></i></span><span><span class="d-block transaction-title">Makan Siang</span><span class="d-block transaction-subtitle">Makanan & Minuman</span></span></div></td>
                                <td>08 Okt 2026</td><td><span class="type-badge type-expense">Pengeluaran</span></td><td class="text-end"><span class="amount-expense">− Rp 45.000</span></td>
                            </tr>
                            <tr>
                                <td><div class="transaction-name"><span class="transaction-symbol"><i class="bi bi-car-front"></i></span><span><span class="d-block transaction-title">Transportasi</span><span class="d-block transaction-subtitle">Transportasi</span></span></div></td>
                                <td>05 Okt 2026</td><td><span class="type-badge type-expense">Pengeluaran</span></td><td class="text-end"><span class="amount-expense">− Rp 100.000</span></td>
                            </tr>
                            <tr>
                                <td><div class="transaction-name"><span class="transaction-symbol"><i class="bi bi-laptop"></i></span><span><span class="d-block transaction-title">Proyek Freelance</span><span class="d-block transaction-subtitle">Freelance</span></span></div></td>
                                <td>03 Okt 2026</td><td><span class="type-badge type-income">Pemasukan</span></td><td class="text-end"><span class="amount-income">+ Rp 1.200.000</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="table-footer"><span>Menampilkan 5 transaksi contoh</span><a href="{{ route('transactions.index') }}" class="subtle-link">Lihat semua <i class="bi bi-arrow-right ms-1"></i></a></div>
            </div>
        </div>

        <div class="col-12 col-xl-4">
            <div class="content-card">
                <div class="card-heading"><div><h3>Akses Cepat</h3><p>Aksi yang sering digunakan</p></div></div>
                <div class="quick-actions">
                    <a href="{{ route('transactions.create') }}" class="quick-action"><span class="quick-icon"><i class="bi bi-plus-lg"></i></span><span><span class="d-block quick-title">Tambah Transaksi</span><span class="d-block quick-desc">Catat pemasukan atau pengeluaran</span></span><i class="bi bi-chevron-right quick-arrow"></i></a>
                    <a href="{{ route('transactions.index') }}" class="quick-action"><span class="quick-icon"><i class="bi bi-list-ul"></i></span><span><span class="d-block quick-title">Lihat Semua Transaksi</span><span class="d-block quick-desc">Periksa riwayat keuangan</span></span><i class="bi bi-chevron-right quick-arrow"></i></a>
                </div>
                <div class="note-box"><i class="bi bi-lightbulb"></i>Catat transaksi secara rutin agar ringkasan keuanganmu tetap akurat.</div>
            </div>
        </div>
    </div>
</section>

<footer class="text-center pt-4 pb-1 small" style="color:#9AA7A0">DompetKu · Catat. Pantau. Kelola.</footer>
@endsection