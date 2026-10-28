<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Admin | LaporDesa</title>

    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('CSS/Dashboard.css') }}">
</head>

<body>

    <!-- HEADER -->
    <header id="HeaderAdmin">

        <a href="{{ route('admin.dashboard') }}" id="LogoAdmin">
            LaporDesa
        </a>

        <div id="MenuAdmin">
            <a href="{{ route('admin.dashboard') }}" class="MenuAktif">
                Dashboard
            </a>
        </div>

        <a href="{{ route('admin.profil') }}" id="TombolProfil">
            Profil
        </a>

    </header>


    <!-- RINGKASAN -->
    <main id="KontenDashboard">

        <section id="RingkasanLaporan">

            <div class="KotakRingkasan">
                <h2>{{ $TotalLaporan }}</h2>
                <p>TOTAL LAPORAN</p>
            </div>

            <div class="KotakRingkasan">
                <h2>{{ $JumlahBaru }}</h2>
                <p>LAPORAN BARU</p>
            </div>

            <div class="KotakRingkasan">
                <h2>{{ $JumlahDiproses }}</h2>
                <p>SEDANG DIPROSES</p>
            </div>

            <div class="KotakRingkasan">
                <h2>{{ $JumlahSelesai }}</h2>
                <p>SELESAI</p>
            </div>

        </section>


        <!-- DAFTAR DAN DETAIL LAPORAN -->
        <section id="PanelLaporan">

            <div id="BagianDaftar">

                <h2>Semua Laporan</h2>

                @forelse ($laporan as $item)

                    <a
                        href="{{ route('admin.dashboard', ['laporan' => $item->id]) }}"
                        class="ItemLaporan {{ isset($LaporanDipilih) && $LaporanDipilih->id == $item->id ? 'ItemAktif' : '' }}"
                    >

                        <strong>{{ $item->no_laporan }}</strong>

                        <span>{{ $item->pengguna->nama ?? 'Pengguna' }}</span>

                        <small>
                            {{ $item->tanggal
                                ? \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y')
                                : '-' }}
                        </small>

                    </a>

                @empty

                    <p>Belum ada laporan.</p>

                @endforelse

            </div>


            <!-- DETAIL LAPORAN -->
            <div id="BagianDetail">

                @if ($LaporanDipilih)

                    <div id="HeaderDetail">

                        <div>
                            <small>Detail laporan</small>

                            <h3>
                                {{ $LaporanDipilih->no_laporan }}

                                <span class="LabelStatus">
                                    {{ $LaporanDipilih->status }}
                                </span>
                            </h3>
                        </div>

                        <small>
                            {{ $LaporanDipilih->tanggal
                                ? \Carbon\Carbon::parse($LaporanDipilih->tanggal)->translatedFormat('d F Y')
                                : '-' }}
                        </small>

                    </div>


                    <div id="InformasiLaporan">

                        <p>
                            <strong>Pelapor</strong> :
                            {{ $LaporanDipilih->pengguna->nama ?? 'Pengguna' }}
                        </p>

                        <p>
                            <strong>Lokasi</strong> :
                            {{ $LaporanDipilih->lokasi }}
                        </p>

                        <p>
                            <strong>Kategori</strong> :
                            {{ $LaporanDipilih->kategori }}
                        </p>

                        <p>
                            <strong>Deskripsi</strong> :
                            {{ $LaporanDipilih->deskripsi }}
                        </p>

                    </div>


                    @if ($LaporanDipilih->foto)

                        <div id="FotoLaporan">
                            <img
                                src="{{ asset('storage/' . $LaporanDipilih->foto) }}"
                                alt="Foto laporan"
                            >
                        </div>

                    @endif


                    <a
                        href="{{ route('admin.status.edit', $LaporanDipilih->id) }}"
                        id="TombolUbahStatus"
                    >
                        Ubah Status
                    </a>

                @else

                    <p id="PilihLaporan">
                        Pilih laporan di sebelah kiri untuk melihat detailnya.
                    </p>

                @endif

            </div>

        </section>

    </main>

</body>
</html>
