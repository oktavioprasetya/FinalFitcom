<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Detail & Status Laporan | LaporDesa</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('CSS/UbahStatusLaporan.css') }}">
</head>

<body>

    <main id="KontenUtama">

        <!-- HEADER HALAMAN -->
        <div id="HeaderHalaman">

            <a href="{{ route('admin.dashboard', ['laporan' => $Laporan->id]) }}"
                id="TombolKembali" aria-label="Kembali">
                <img src="" alt="">
                ←
            </a>

            <h1>Detail & Status Laporan</h1>

        </div>


        <!-- ISI HALAMAN -->
        <div id="KelompokKonten">

            <!-- DETAIL LAPORAN -->
            <section id="BagianDetail">

                <p class="JudulKecil">Detail laporan</p>

                <h2 id="NomorLaporan">
                    {{ $Laporan->no_laporan }}
                </h2>

                <hr id="GarisPemisah">


                <div class="BarisInformasi">
                    <span>Pelapor</span>
                    <span>:</span>
                    <p>{{ $Laporan->pengguna->nama ?? 'Pengguna' }}</p>
                </div>

                <div class="BarisInformasi">
                    <span>Jenis Laporan</span>
                    <span>:</span>
                    <p>{{ $Laporan->kategori }}</p>
                </div>

                <div class="BarisInformasi">
                    <span>Lokasi</span>
                    <span>:</span>
                    <p>{{ $Laporan->lokasi }}</p>
                </div>

                <div class="BarisInformasi">
                    <span>Tanggal Laporan</span>
                    <span>:</span>
                    <p>
                        {{ $Laporan->tanggal
                            ? \Carbon\Carbon::parse($Laporan->tanggal)->translatedFormat('d F Y')
                            : '-' }}
                    </p>
                </div>


                <!-- TITIK LOKASI -->
                <div class="BarisInformasi" id="BarisTitikLokasi">

                    <span>Titik Lokasi</span>
                    <span>:</span>

                    <a
                        href="https://www.google.com/maps/search/?api=1&query={{ urlencode($Laporan->lokasi) }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        id="TombolMaps">

                        <img src="" alt="">
                        Lihat di Google Maps

                    </a>

                </div>


                <!-- DESKRIPSI -->
                <h2 class="JudulBagian">Deskripsi Laporan</h2>

                <div id="KotakDeskripsi">
                    {{ $Laporan->deskripsi }}
                </div>


                <!-- FOTO -->
                <h2 class="JudulBagian">Foto</h2>

                @if ($Laporan->foto)

                    <div id="KelompokFoto">

                        <a href="{{ asset('storage/' . $Laporan->foto) }}"
                            target="_blank"
                            rel="noopener noreferrer">

                            <img
                                src="{{ asset('storage/' . $Laporan->foto) }}"
                                alt="Foto laporan {{ $Laporan->no_laporan }}"
                                class="FotoLaporan">

                        </a>

                    </div>

                @else

                    <p id="FotoKosong">Belum ada foto laporan.</p>

                @endif

            </section>


            <!-- FORM UBAH STATUS -->
            <section id="BagianUbahStatus">

                <h2>Ubah Status Laporan</h2>

                <div id="InformasiStatus">

                    <img src="" alt="">

                    <p>
                        Pilih status sesuai dengan perkembangan penanganan
                        laporan. Status akan terlihat oleh pelapor di halaman
                        Laporan Saya.
                    </p>

                </div>


                @if ($errors->any())

                    <div id="PesanError">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>

                @endif
@if (session('success'))
    <p id="PesanBerhasil">
        {{ session('success') }}
    </p>
@endif

                <form
                    action="{{ route('admin.status.update', $Laporan->id) }}"
                    method="POST"
                    id="FormStatus">

                    @csrf
                    @method('PATCH')


                    <label for="PilihanStatus">Status Laporan</label>

                    <select name="status" id="PilihanStatus" required>

                        @foreach (['Diterima', 'Diproses', 'Selesai', 'Ditolak'] as $Status)

                            <option
                                value="{{ $Status }}"
                                {{ old('status', $Laporan->status) === $Status ? 'selected' : '' }}>

                                {{ $Status }}

                            </option>

                        @endforeach

                    </select>


                    <label for="CatatanAdmin">Catatan / Keterangan</label>

                    <textarea
                        name="catatan_admin"
                        id="CatatanAdmin"
                        rows="6"
                        placeholder="Tambahkan catatan penanganan laporan...">{{ old('catatan_admin', $Laporan->catatan_admin) }}</textarea>


                    <div id="KelompokTombol">

                        <a
                            href="{{ route('admin.dashboard', ['laporan' => $Laporan->id]) }}"
                            id="TombolBatal">

                            Batal

                        </a>

                        <button type="submit" id="TombolSimpan">
                            Simpan Perubahan
                        </button>

                    </div>

                </form>

            </section>

        </div>

    </main>

</body>
</html>