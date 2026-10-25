@extends('layouts.app')

@section('title', 'DompetKu — Transaksi')
@section('page_title', 'Transaksi')

@section('content')
<div class="page-intro">
    <div><h1>Daftar Transaksi</h1><p>Periksa dan cari riwayat pemasukan serta pengeluaranmu.</p></div>
    <a href="{{ route('transactions.create') }}" class="btn btn-senstech"><i class="bi bi-plus-lg me-1"></i>Tambah Transaksi</a>
</div>

<div class="row g-3 mb-4">
    <div class="col-12 col-md-4"><div class="panel"><div class="d-flex align-items-center gap-3"><span class="stat-icon income-bg"><i class="bi bi-arrow-down-left"></i></span><div><div class="stat-label">Total Pemasukan</div><div class="stat-value">Rp 6.200.000</div><div class="stat-sub">Data contoh</div></div></div></div></div>
    <div class="col-12 col-md-4"><div class="panel"><div class="d-flex align-items-center gap-3"><span class="stat-icon expense-bg"><i class="bi bi-arrow-up-right"></i></span><div><div class="stat-label">Total Pengeluaran</div><div class="stat-value">Rp 1.045.000</div><div class="stat-sub">Data contoh</div></div></div></div></div>
    <div class="col-12 col-md-4"><div class="panel"><div class="d-flex align-items-center gap-3"><span class="stat-icon balance-bg"><i class="bi bi-wallet2"></i></span><div><div class="stat-label">Saldo Bersih</div><div class="stat-value">Rp 5.155.000</div><div class="stat-sub">Data contoh</div></div></div></div></div>
</div>

<section class="content-card" aria-labelledby="transaction-list-title">
    <div class="card-heading"><div><h3 id="transaction-list-title">Semua Transaksi</h3><p>Gunakan pencarian dan filter untuk menemukan transaksi.</p></div><span id="resultCount" class="badge rounded-pill text-bg-light">8 transaksi</span></div>

    <div class="filters mb-3">
        <div class="input-group"><span class="input-group-text"><i class="bi bi-search"></i></span><input id="searchInput" class="form-control" type="search" placeholder="Cari transaksi atau keterangan..."></div>
        <select id="typeFilter" class="form-select" aria-label="Filter jenis"><option value="all">Semua jenis</option><option value="income">Pemasukan</option><option value="expense">Pengeluaran</option></select>
        <select id="categoryFilter" class="form-select" aria-label="Filter kategori"><option value="all">Semua kategori</option><option>Gaji</option><option>Freelance</option><option>Makanan & Minuman</option><option>Belanja</option><option>Tagihan</option><option>Transportasi</option><option>Hiburan</option></select>
        <select id="sortFilter" class="form-select" aria-label="Urutkan transaksi"><option value="newest">Tanggal terbaru</option><option value="oldest">Tanggal terlama</option><option value="amountHigh">Nominal terbesar</option><option value="amountLow">Nominal terkecil</option></select>
    </div>

    <div class="table-responsive">
        <table id="transactionsTable" class="table transaction-table align-middle mb-0">
            <thead><tr><th>Tanggal</th><th>Jenis</th><th>Kategori</th><th>Transaksi / Keterangan</th><th class="text-end">Nominal</th><th class="text-center">Aksi</th></tr></thead>
            <tbody id="transactionRows">
                <tr data-type="income" data-category="Gaji" data-date="2026-10-12" data-amount="5000000"><td class="text-nowrap">12 Okt 2026</td><td><span class="type-badge type-income">Pemasukan</span></td><td><span class="transaction-icon me-2"><i class="bi bi-wallet2"></i></span><span class="category-name">Gaji</span></td><td><div class="transaction-name">Gaji Bulanan</div><div class="transaction-subtitle">Gaji bulan Oktober</div></td><td class="text-end"><span class="amount-income">+ Rp 5.000.000</span></td><td class="text-center"><div class="dropdown transaction-actions d-inline-block">
                    <button class="row-action dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Aksi transaksi">
                        <i class="bi bi-three-dots-vertical"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><button class="dropdown-item js-edit-transaction" type="button"><i class="bi bi-pencil-square me-2"></i>Edit</button></li>
                        <li><hr class="dropdown-divider my-1"></li>
                        <li><button class="dropdown-item text-danger js-delete-transaction" type="button"><i class="bi bi-trash3 me-2"></i>Delete</button></li>
                    </ul>
                </div></td></tr>
                <tr data-type="expense" data-category="Belanja" data-date="2026-10-10" data-amount="350000"><td class="text-nowrap">10 Okt 2026</td><td><span class="type-badge type-expense">Pengeluaran</span></td><td><span class="transaction-icon me-2"><i class="bi bi-basket3"></i></span><span class="category-name">Belanja</span></td><td><div class="transaction-name">Belanja Bulanan</div><div class="transaction-subtitle">Kebutuhan rumah</div></td><td class="text-end"><span class="amount-expense">− Rp 350.000</span></td><td class="text-center"><div class="dropdown transaction-actions d-inline-block">
                    <button class="row-action dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Aksi transaksi">
                        <i class="bi bi-three-dots-vertical"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><button class="dropdown-item js-edit-transaction" type="button"><i class="bi bi-pencil-square me-2"></i>Edit</button></li>
                        <li><hr class="dropdown-divider my-1"></li>
                        <li><button class="dropdown-item text-danger js-delete-transaction" type="button"><i class="bi bi-trash3 me-2"></i>Delete</button></li>
                    </ul>
                </div></td></tr>
                <tr data-type="expense" data-category="Makanan & Minuman" data-date="2026-10-08" data-amount="45000"><td class="text-nowrap">08 Okt 2026</td><td><span class="type-badge type-expense">Pengeluaran</span></td><td><span class="transaction-icon me-2"><i class="bi bi-cup-hot"></i></span><span class="category-name">Makanan & Minuman</span></td><td><div class="transaction-name">Makan Siang</div><div class="transaction-subtitle">Makan siang di luar</div></td><td class="text-end"><span class="amount-expense">− Rp 45.000</span></td><td class="text-center"><div class="dropdown transaction-actions d-inline-block">
                    <button class="row-action dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Aksi transaksi">
                        <i class="bi bi-three-dots-vertical"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><button class="dropdown-item js-edit-transaction" type="button"><i class="bi bi-pencil-square me-2"></i>Edit</button></li>
                        <li><hr class="dropdown-divider my-1"></li>
                        <li><button class="dropdown-item text-danger js-delete-transaction" type="button"><i class="bi bi-trash3 me-2"></i>Delete</button></li>
                    </ul>
                </div></td></tr>
                <tr data-type="expense" data-category="Transportasi" data-date="2026-10-05" data-amount="100000"><td class="text-nowrap">05 Okt 2026</td><td><span class="type-badge type-expense">Pengeluaran</span></td><td><span class="transaction-icon me-2"><i class="bi bi-car-front"></i></span><span class="category-name">Transportasi</span></td><td><div class="transaction-name">Transportasi</div><div class="transaction-subtitle">Perjalanan harian</div></td><td class="text-end"><span class="amount-expense">− Rp 100.000</span></td><td class="text-center"><div class="dropdown transaction-actions d-inline-block">
                    <button class="row-action dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Aksi transaksi">
                        <i class="bi bi-three-dots-vertical"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><button class="dropdown-item js-edit-transaction" type="button"><i class="bi bi-pencil-square me-2"></i>Edit</button></li>
                        <li><hr class="dropdown-divider my-1"></li>
                        <li><button class="dropdown-item text-danger js-delete-transaction" type="button"><i class="bi bi-trash3 me-2"></i>Delete</button></li>
                    </ul>
                </div></td></tr>
                <tr data-type="income" data-category="Freelance" data-date="2026-10-03" data-amount="1200000"><td class="text-nowrap">03 Okt 2026</td><td><span class="type-badge type-income">Pemasukan</span></td><td><span class="transaction-icon me-2"><i class="bi bi-laptop"></i></span><span class="category-name">Freelance</span></td><td><div class="transaction-name">Proyek Freelance</div><div class="transaction-subtitle">Pengerjaan proyek</div></td><td class="text-end"><span class="amount-income">+ Rp 1.200.000</span></td><td class="text-center"><div class="dropdown transaction-actions d-inline-block">
                    <button class="row-action dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Aksi transaksi">
                        <i class="bi bi-three-dots-vertical"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><button class="dropdown-item js-edit-transaction" type="button"><i class="bi bi-pencil-square me-2"></i>Edit</button></li>
                        <li><hr class="dropdown-divider my-1"></li>
                        <li><button class="dropdown-item text-danger js-delete-transaction" type="button"><i class="bi bi-trash3 me-2"></i>Delete</button></li>
                    </ul>
                </div></td></tr>
                <tr data-type="expense" data-category="Hiburan" data-date="2026-10-02" data-amount="75000"><td class="text-nowrap">02 Okt 2026</td><td><span class="type-badge type-expense">Pengeluaran</span></td><td><span class="transaction-icon me-2"><i class="bi bi-controller"></i></span><span class="category-name">Hiburan</span></td><td><div class="transaction-name">Langganan streaming</div><div class="transaction-subtitle">Hiburan bulanan</div></td><td class="text-end"><span class="amount-expense">− Rp 75.000</span></td><td class="text-center"><div class="dropdown transaction-actions d-inline-block">
                    <button class="row-action dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Aksi transaksi">
                        <i class="bi bi-three-dots-vertical"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><button class="dropdown-item js-edit-transaction" type="button"><i class="bi bi-pencil-square me-2"></i>Edit</button></li>
                        <li><hr class="dropdown-divider my-1"></li>
                        <li><button class="dropdown-item text-danger js-delete-transaction" type="button"><i class="bi bi-trash3 me-2"></i>Delete</button></li>
                    </ul>
                </div></td></tr>
                <tr data-type="expense" data-category="Tagihan" data-date="2026-10-01" data-amount="150000"><td class="text-nowrap">01 Okt 2026</td><td><span class="type-badge type-expense">Pengeluaran</span></td><td><span class="transaction-icon me-2"><i class="bi bi-lightning-charge"></i></span><span class="category-name">Tagihan</span></td><td><div class="transaction-name">Tagihan listrik</div><div class="transaction-subtitle">Kebutuhan rumah</div></td><td class="text-end"><span class="amount-expense">− Rp 150.000</span></td><td class="text-center"><div class="dropdown transaction-actions d-inline-block">
                    <button class="row-action dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Aksi transaksi">
                        <i class="bi bi-three-dots-vertical"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><button class="dropdown-item js-edit-transaction" type="button"><i class="bi bi-pencil-square me-2"></i>Edit</button></li>
                        <li><hr class="dropdown-divider my-1"></li>
                        <li><button class="dropdown-item text-danger js-delete-transaction" type="button"><i class="bi bi-trash3 me-2"></i>Delete</button></li>
                    </ul>
                </div></td></tr>
                <tr data-type="expense" data-category="Belanja" data-date="2026-09-29" data-amount="120000"><td class="text-nowrap">29 Sep 2026</td><td><span class="type-badge type-expense">Pengeluaran</span></td><td><span class="transaction-icon me-2"><i class="bi bi-bag"></i></span><span class="category-name">Belanja</span></td><td><div class="transaction-name">Perlengkapan rumah</div><div class="transaction-subtitle">Kebutuhan rumah</div></td><td class="text-end"><span class="amount-expense">− Rp 120.000</span></td><td class="text-center"><div class="dropdown transaction-actions d-inline-block">
                    <button class="row-action dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Aksi transaksi">
                        <i class="bi bi-three-dots-vertical"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><button class="dropdown-item js-edit-transaction" type="button"><i class="bi bi-pencil-square me-2"></i>Edit</button></li>
                        <li><hr class="dropdown-divider my-1"></li>
                        <li><button class="dropdown-item text-danger js-delete-transaction" type="button"><i class="bi bi-trash3 me-2"></i>Delete</button></li>
                    </ul>
                </div></td></tr>
            </tbody>
        </table>
        <div id="emptyState" class="empty-state"><i class="bi bi-search d-block mb-2"></i><strong class="d-block mb-1">Transaksi tidak ditemukan</strong><span class="small">Coba ubah kata kunci atau filter kamu.</span></div>
    </div>
    <div class="table-foot d-flex align-items-center justify-content-between flex-wrap gap-3 mt-3"><div class="small text-secondary" id="showingText">Menampilkan 8 dari 8 transaksi contoh</div><span class="small text-secondary">Data contoh · Pagination belum dibuat</span></div>
</section>
<!-- MODAL EDIT TRANSAKSI: bekerja pada data contoh di browser -->
<div class="modal fade" id="editTransactionModal" tabindex="-1" aria-labelledby="editTransactionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="editTransactionForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="editTransactionModalLabel">Edit Transaksi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-info small py-2">Perubahan ini hanya berlaku pada data contoh di halaman browser, belum tersimpan ke database.</div>
                    <input type="hidden" id="editRowIndex">
                    <div class="mb-3">
                        <label for="editType" class="form-label">Jenis Transaksi</label>
                        <select class="form-select" id="editType" required>
                            <option value="income">Pemasukan</option>
                            <option value="expense">Pengeluaran</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="editCategory" class="form-label">Kategori</label>
                        <select class="form-select" id="editCategory" required>
                            <option>Gaji</option><option>Freelance</option><option>Makanan &amp; Minuman</option><option>Belanja</option><option>Tagihan</option><option>Transportasi</option><option>Hiburan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="editName" class="form-label">Nama Transaksi</label>
                        <input type="text" class="form-control" id="editName" maxlength="100" required>
                    </div>
                    <div class="mb-3">
                        <label for="editDescription" class="form-label">Keterangan</label>
                        <input type="text" class="form-control" id="editDescription" maxlength="255">
                    </div>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="editAmount" class="form-label">Nominal (Rp)</label>
                            <input type="number" class="form-control" id="editAmount" min="1" step="1" required>
                        </div>
                        <div class="col-md-6">
                            <label for="editDate" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" id="editDate" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-senstech"><i class="bi bi-check-lg me-1"></i>Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- MODAL KONFIRMASI HAPUS -->
<div class="modal fade" id="deleteTransactionModal" tabindex="-1" aria-labelledby="deleteTransactionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-body p-4">
                <div class="d-flex align-items-start gap-3 mb-3">
                    <span class="delete-warning-icon"><i class="bi bi-trash3"></i></span>
                    <div>
                        <h5 class="mb-1" id="deleteTransactionModalLabel">Hapus transaksi?</h5>
                        <p class="text-secondary small mb-0">Transaksi <strong id="deleteTransactionName">ini</strong> akan dihapus dari daftar contoh pada halaman ini.</p>
                    </div>
                </div>
                <p class="small text-secondary mb-0">Aksi ini belum menghapus data dari database.</p>
            </div>
            <div class="modal-footer p-3">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteTransaction"><i class="bi bi-trash3 me-1"></i>Ya, Hapus</button>
            </div>
        </div>
    </div>
</div>

<div class="helper-note mt-3"><i class="bi bi-info-circle me-1"></i>Daftar ini masih memakai data contoh. Cari, filter, urutkan, edit, dan hapus hanya bekerja di browser; perubahan belum tersimpan ke database.</div>
@endsection

@push('scripts')
<script>
    const searchInput = document.getElementById('searchInput');
    const typeFilter = document.getElementById('typeFilter');
    const categoryFilter = document.getElementById('categoryFilter');
    const sortFilter = document.getElementById('sortFilter');
    const tbody = document.getElementById('transactionRows');
    const emptyState = document.getElementById('emptyState');
    const resultCount = document.getElementById('resultCount');
    const showingText = document.getElementById('showingText');

    function applyFilters() {
        const query = searchInput.value.trim().toLowerCase();
        const type = typeFilter.value;
        const category = categoryFilter.value;
        const rows = Array.from(tbody.querySelectorAll('tr'));

        rows.sort((a, b) => {
            if (sortFilter.value === 'newest') return b.dataset.date.localeCompare(a.dataset.date);
            if (sortFilter.value === 'oldest') return a.dataset.date.localeCompare(b.dataset.date);
            if (sortFilter.value === 'amountHigh') return Number(b.dataset.amount) - Number(a.dataset.amount);
            if (sortFilter.value === 'amountLow') return Number(a.dataset.amount) - Number(b.dataset.amount);
            return 0;
        });

        rows.forEach((row) => {
            const matchesText = row.innerText.toLowerCase().includes(query);
            const matchesType = type === 'all' || row.dataset.type === type;
            const matchesCategory = category === 'all' || row.dataset.category === category;
            row.style.display = matchesText && matchesType && matchesCategory ? '' : 'none';
            tbody.appendChild(row);
        });

        const visible = rows.filter((row) => row.style.display !== 'none').length;
        emptyState.style.display = visible === 0 ? 'block' : 'none';
        document.getElementById('transactionsTable').style.display = visible === 0 ? 'none' : 'table';
        resultCount.textContent = visible + ' transaksi';
        showingText.textContent = 'Menampilkan ' + visible + ' dari ' + rows.length + ' transaksi contoh';
    }

    [searchInput, typeFilter, categoryFilter, sortFilter].forEach((element) => {
        element.addEventListener('input', applyFilters);
        element.addEventListener('change', applyFilters);
    });

    const editModalElement = document.getElementById('editTransactionModal');
    const deleteModalElement = document.getElementById('deleteTransactionModal');
    const editModal = new bootstrap.Modal(editModalElement);
    const deleteModal = new bootstrap.Modal(deleteModalElement);
    let activeRow = null;

    const monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];

    function formatDateIndonesia(value) {
        const parts = value.split('-').map(Number);
        if (parts.length !== 3 || !parts[0] || !parts[1] || !parts[2]) return value;
        return String(parts[2]).padStart(2, '0') + ' ' + monthNames[parts[1] - 1] + ' ' + parts[0];
    }

    function formatRupiah(value) {
        return new Intl.NumberFormat('id-ID', { maximumFractionDigits: 0 }).format(Number(value));
    }

    function refreshCategoryOptions() {
        const currentCategories = Array.from(new Set(
            Array.from(tbody.querySelectorAll('tr')).map((row) => row.dataset.category)
        )).filter(Boolean).sort((a, b) => a.localeCompare(b, 'id'));
        const currentValue = categoryFilter.value;
        categoryFilter.innerHTML = '<option value="all">Semua kategori</option>';
        currentCategories.forEach((category) => {
            const option = document.createElement('option');
            option.value = category;
            option.textContent = category;
            categoryFilter.appendChild(option);
        });
        categoryFilter.value = currentCategories.includes(currentValue) ? currentValue : 'all';
    }

    tbody.addEventListener('click', function (event) {
        const editButton = event.target.closest('.js-edit-transaction');
        const deleteButton = event.target.closest('.js-delete-transaction');
        if (!editButton && !deleteButton) return;

        activeRow = (editButton || deleteButton).closest('tr');
        if (!activeRow) return;

        if (editButton) {
            document.getElementById('editType').value = activeRow.dataset.type;
            document.getElementById('editCategory').value = activeRow.dataset.category;
            document.getElementById('editName').value = activeRow.querySelector('.transaction-name').textContent.trim();
            document.getElementById('editDescription').value = activeRow.querySelector('.transaction-subtitle').textContent.trim();
            document.getElementById('editAmount').value = activeRow.dataset.amount;
            document.getElementById('editDate').value = activeRow.dataset.date;
            editModal.show();
        } else {
            document.getElementById('deleteTransactionName').textContent = activeRow.querySelector('.transaction-name').textContent.trim();
            deleteModal.show();
        }
    });

    document.getElementById('editTransactionForm').addEventListener('submit', function (event) {
        event.preventDefault();
        if (!activeRow) return;

        const type = document.getElementById('editType').value;
        const category = document.getElementById('editCategory').value;
        const name = document.getElementById('editName').value.trim();
        const description = document.getElementById('editDescription').value.trim() || 'Tidak ada keterangan';
        const amount = Number(document.getElementById('editAmount').value);
        const date = document.getElementById('editDate').value;
        if (!name || !Number.isFinite(amount) || amount <= 0 || !date) return;

        activeRow.dataset.type = type;
        activeRow.dataset.category = category;
        activeRow.dataset.amount = String(amount);
        activeRow.dataset.date = date;

        const dateCell = activeRow.cells[0];
        dateCell.textContent = formatDateIndonesia(date);
        dateCell.classList.add('text-nowrap');

        const typeCell = activeRow.cells[1];
        typeCell.innerHTML = type === 'income'
            ? '<span class="type-badge type-income">Pemasukan</span>'
            : '<span class="type-badge type-expense">Pengeluaran</span>';

        const categoryCell = activeRow.cells[2];
        const iconClassByCategory = {
            'Gaji': 'bi-wallet2', 'Freelance': 'bi-laptop', 'Makanan & Minuman': 'bi-cup-hot',
            'Belanja': 'bi-basket3', 'Tagihan': 'bi-lightning-charge', 'Transportasi': 'bi-car-front', 'Hiburan': 'bi-controller'
        };
        categoryCell.innerHTML = '<span class="transaction-icon me-2"><i class="bi ' + (iconClassByCategory[category] || 'bi-wallet2') + '"></i></span><span class="category-name"></span>';
        categoryCell.querySelector('.category-name').textContent = category;

        activeRow.querySelector('.transaction-name').textContent = name;
        activeRow.querySelector('.transaction-subtitle').textContent = description;
        activeRow.cells[4].innerHTML = '<span class="' + (type === 'income' ? 'amount-income' : 'amount-expense') + '">' + (type === 'income' ? '+' : '−') + ' Rp ' + formatRupiah(amount) + '</span>';

        refreshCategoryOptions();
        applyFilters();
        editModal.hide();
    });

    document.getElementById('confirmDeleteTransaction').addEventListener('click', function () {
        if (!activeRow) return;
        activeRow.remove();
        activeRow = null;
        refreshCategoryOptions();
        applyFilters();
        deleteModal.hide();
    });

    refreshCategoryOptions();
    applyFilters();
</script>
@endpush