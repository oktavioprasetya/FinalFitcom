<!DOCTYPE html>

<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Detail Laporan | LaporDesa</title>

<link href="https://fonts.googleapis.com/css2?family=Anton&family=Poppins:wght@400;500;600;700&family=Smooch+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="{{ asset('css/DetailLaporan.css') }}">
<link rel="stylesheet" href="{{ asset('css/Template.css')}}">

</head>

<body>

<!-- NAVBAR -->
<nav id="navbar">
        <div id="IsiNavbar">
            <div id="Logo">
                <h2>LaporDesa</h4>
            </div>
            <div id="KelompokMenu">
                <a href="{{ route('beranda')}}" class="LinkMenu">Beranda</a>
                <a href="{{ route('laporan')}}" class="LinkMenu">Laporan Saya</a>
                <a href="{{ route('daftar.laporan')}}" class="LinkMenu">Daftar Laporan</a>
            </div>
            <div id="KelompokLoginDaftar">
                <a href="{{route('login')}}" class="btnLoginDaftar">Login</a>
                <a href="{{route('registrasi')}}" class="btnLoginDaftar">Daftar</a>
            </div>

        </div>
    </nav>


<!-- KONTEN DETAIL LAPORAN -->
<main id="KontenDetail">
<img src="{{asset('/images/RectangleDetailLaporan.png')}}" id="RectangleDetail" >
    <h1 id="JudulHalaman">DETAIL LAPORAN SAYA</h1>


    <!-- INFORMASI STATUS LAPORAN -->
    <section id="BagianStatus">

        <div id="HeaderStatus">

            <div>
                <h2>{{ $laporan->no_laporan }}</h2>

                <p class="TextKecil">
                    Tanggal laporan:
                    {{ $laporan->tanggal }}
                </p>
            </div>

            <div id="LabelStatus">

                <span class="LabelKategori">
                    {{ $laporan->kategori }}
                </span>

                <span class="LabelProses">
                    {{ $laporan->status }}
                </span>

            </div>

        </div>


        <!-- ALUR STATUS LAPORAN -->
        <div id="AlurStatus">

            <div class="TahapStatus
                {{ in_array($laporan->status, ['Diterima', 'Diproses', 'Selesai']) ? 'Aktif' : '' }}">

                <div class="LingkaranStatus"></div>
                <p>Diterima</p>

            </div>

            <div class="GarisStatus"></div>

            <div class="TahapStatus
                {{ in_array($laporan->status, ['Diproses', 'Selesai']) ? 'Aktif' : '' }}">

                <div class="LingkaranStatus"></div>
                <p>Diproses</p>

            </div>

            <div class="GarisStatus"></div>

            <div class="TahapStatus
                {{ $laporan->status == 'Selesai' ? 'Aktif' : '' }}">

                <div class="LingkaranStatus"></div>
                <p>Selesai</p>

            </div>

        </div>

    </section>


    <!-- DESKRIPSI DAN INFORMASI -->
    <div id="KelompokDetail">

        <!-- DESKRIPSI LAPORAN -->
        <section class="KotakDetail" id="KotakDeskripsi">

            <h2 class="JudulKotak">Deskripsi Laporan</h2>

            <p id="IsiDeskripsi">
                {{ $laporan->deskripsi }}
            </p>


            <!-- FOTO LAPORAN -->
            <div id="KelompokFoto">

                @if ($laporan->foto)

                    <div class="BingkaiFoto">

                        <img
                            src="{{ asset('storage/' . $laporan->foto) }}"
                            alt="Foto laporan {{ $laporan->no_laporan }}"
                            class="FotoLaporan">

                    </div>

                @else

                    <p class="FotoKosong">
                        Belum ada foto laporan.
                    </p>

                @endif

            </div>

        </section>


        <!-- INFORMASI LAPORAN -->
        <section class="KotakDetail" id="KotakInformasi">

            <h2 class="JudulKotak">Info Laporan</h2>

            <div class="BarisInformasi">
                <span>Nomor</span>
                <strong>{{ $laporan->no_laporan }}</strong>
            </div>

            <div class="BarisInformasi">
                <span>Kategori</span>
                <strong>{{ $laporan->kategori }}</strong>
            </div>

            <div class="BarisInformasi">
                <span>Lokasi</span>
                <strong>{{ $laporan->lokasi }}</strong>
            </div>

            <div class="BarisInformasi">
                <span>Tanggal Lapor</span>
                <strong>{{ $laporan->tanggal }}</strong>
            </div>

        </section>

    </div>


    <!-- TOMBOL KEMBALI -->
    <a href="{{ route('laporan') }}" id="TombolKembali">
        Kembali ke Laporan Saya
    </a>

</main>

<footer id="Footer">
        <div id="IsiFooter1">
            <div id="Isi1">
                <h3 id="JudulFooter">LaporDesa</h3>
                 <p class="IsiFooter">Kanal resmi warga Ngastemi untuk melaporkan 
                                      dan memantau <br> penyelesaian masalah di
                                    lingkungan sekitar.</p>   <br><br>
                
                <p class="FooterSubJudul"><b>Kontak</b></p>
                <p class="IsiFooter">08867544545</p>   

            </div>
            <div id="Isi2">
                <p class="FooterSubJudul"><b>Kantor Desa</b></p>
                <p class="IsiFooter">Jl. Belimbing No.5, Ngingas, Ngastemi,<br>
                                  Kec. Bangsal, Kabupaten Mojokerto,<br>
                                  Jawa Timur 61381</p>   
            </div>
            <div id="Isi3">
                <div class="FooterSubJudul"><b>Tautan</b></div><br>
                <div class="TautanFooter"><a href="{{route('beranda')}}"></a>Beranda</div>
                <div class="TautanFooter"><a href="{{route('laporan.create')}}"></a>Buat Laporan</div>
                <div class="TautanFooter"><a href="{{route('daftar.laporan')}}"></a>Daftar Laporan</div>
                <div class="TautanFooter"><a href="{{route('laporan')}}">Laporan Saya</div>
                <div class="TautanFooter"><a href="#">Notifikasi</div>
                <div class="TautanFooter"><a href="{{route('profil')}}">Profil</div>
            </div>
        </div><br>
         <hr>
         <div id="FooterBawah">
                <p class="TextBawahFooter">© 2026 Pemerintah Desa Ngastemi</p>
                <p class="TextBawahFooter">Layanan ini gratis untuk seluruh warga desa Ngastemi</p>
            </div>
    </footer>

</body>
</html>
