@extends('layouts.app')

@section('content')
    <div class="page">
        <div class="page-wrapper">
            <div class="page-wrapper">
                <!-- Page header -->
                <div class="page-header d-print-none">
                    <div class="container-xl">
                        <div class="row g-2 align-items-center">
                            <div class="col">
                                <h2 class="page-title">
                                    Detail Pesanan
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Page body -->
                <div class="page-body">
                    <div class="container-xl">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Detail Pesanan User</h3>
                                <div class="card-actions">
                                    <a href="{{ route('pemesanan.edit', ['pemesanan' => $pemesanan->id]) }}"data-bs-toggle="modal"
                                        data-bs-target="#modal-editPesanan">
                                        Edit pemesanan
                                        <!-- Download SVG icon from http://tabler-icons.io/i/edit -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                            <path
                                                d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                            <path d="M16 5l3 3" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="datagrid">
                                    <div class="datagrid-item">
                                        <div class="datagrid-title">Kode Pesanan</div>
                                        <div class="datagrid-content">{{ $pemesanan->kode_pesanan }}</div>
                                    </div>
                                    <div class="datagrid-item">
                                        <div class="datagrid-title">Nama pemesanan</div>
                                        <div class="datagrid-content">{{ $detail_pemesanan->pemesanan_id }}</div>
                                    </div>
                                    <div class="datagrid-item">
                                        <div class="datagrid-title">Tanggal pemesanan</div>
                                        <div class="datagrid-content">{{ $pemesanan->tanggal }}</div>
                                    </div>

                                    <div class="datagrid-item">
                                        <div class="datagrid-title">Status</div>
                                        <div class="datagrid-content">
                                            <span id="statusSpan">
                                                {{ $pemesanan->status }} {{-- Tampilkan status dari variabel $pemesanan --}}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="datagrid-item">
                                        <div class="datagrid-title">Pemesan</div>
                                        <div class="datagrid-content">
                                            <div class="d-flex align-items-center">
                                                <span class="avatar avatar-xs me-2 rounded"
                                                    style="background-image: url('{{ asset('/storage/pemesanan/' . $pemesanan->user->gambar_profile) }}')"></span>
                                                {{ $pemesanan->user->name }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="datagrid-item">
                                        <div class="datagrid-title">Jumlah pemesanan</div>
                                        <div class="datagrid-content">{{ $detail_pemesanan->jumlah }}</div>
                                    </div>
                                    <div class="datagrid-item">
                                        <div class="datagrid-title">Subtotal</div>
                                        <div class="datagrid-content">
                                            {{ 'Rp ' . number_format($detail_pemesanan->subtotal, 0, ',', '.') }}</div>
                                    </div>

                                    {{-- total belom ke fix --}}
                                    <div class="datagrid-item">
                                        <div class="datagrid-title">total</div>
                                        <div class="datagrid-content">
                                            {{ 'Rp ' . number_format($detail_pemesanan->subtotal, 0, ',', '.') }}</div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <footer class="footer footer-transparent d-print-none">
                    <div class="container-xl">
                        <div class="row text-center align-items-center flex-row-reverse">
                            <div class="col-lg-auto ms-lg-auto">
                                <ul class="list-inline list-inline-dots mb-0">
                                    <li class="list-inline-item"><a href="https://tabler.io/docs" target="_blank"
                                            class="link-secondary" rel="noopener">Documentation</a></li>
                                    <li class="list-inline-item"><a href="./license.html" class="link-secondary">License</a>
                                    </li>
                                    <li class="list-inline-item"><a href="https://github.com/tabler/tabler" target="_blank"
                                            class="link-secondary" rel="noopener">Source code</a></li>
                                    <li class="list-inline-item">
                                        <a href="https://github.com/sponsors/codecalm" target="_blank"
                                            class="link-secondary" rel="noopener">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/heart -->
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon text-pink icon-filled icon-inline" width="24" height="24"
                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path
                                                    d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                                            </svg>
                                            Sponsor
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                                <ul class="list-inline list-inline-dots mb-0">
                                    <li class="list-inline-item">
                                        Copyright &copy; 2023
                                        <a href="." class="link-secondary">Tabler</a>.
                                        All rights reserved.
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="./changelog.html" class="link-secondary" rel="noopener">
                                            v1.0.0-beta19
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>
    {{-- nyeluk modal edit mas --}}
    @include('panel.pemesanan.edit')

    <script>
        // Mengambil nilai status dari elemen dengan id "statusSpan"
        var status = document.getElementById('statusSpan').innerText;
        var statusColor = "";
        switch (status) {
            case "pending":
                statusColor = "bg-red";
                break;
            case "dikemas":
                statusColor = "bg-yellow";
                break;
            case "dikirim":
                statusColor = "bg-blue";
                break;
            case "diterima":
                statusColor = "bg-green";
                break;
            default:
                statusColor = "bg-blue";
                break;
        }
        // Ubah tampilan status sesuai dengan warna yang ditentukan
        document.getElementById('statusSpan').innerHTML = '<span class="badge ' + statusColor + '">' + status.charAt(0)
            .toUpperCase() + status.slice(1) + '</span>';
    </script>
@endsection