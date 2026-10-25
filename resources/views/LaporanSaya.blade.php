<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LaporDesa</title>

    <link rel="stylesheet" href="/CSS/Template.css">
    <link rel="stylesheet" href="/CSS/LaporanSaya.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Smooch+Sans:wght@100..900&display=swap" rel="stylesheet">
</head>

<body>
    <nav id="navbar">
        <div id="IsiNavbar">
            <div id="Logo">
                <h2>LaporDesa</h4>
            </div>
            <div id="KelompokMenu">
                <a href="{{route('beranda')}}" class="LinkMenu">Beranda</a>
                <a href="#" class="LinkMenu">Laporan Saya</a>
                <a href="#" class="LinkMenu">Daftar Laporan</a>
            </div>
            <div id="KelompokLoginDaftar">
                <button class="btnLoginDaftar">Login</button>
                <button class="btnLoginDaftar">Daftar</button>
            </div>

        </div>
    </nav>
    <main id="IsihalamanLS">
        <hr>
         <h2 id="JudulLS">LAPORAN SAYA</h2>
        <img src="{{asset('/images/DekorAtasLS.svg')}}" alt="foto" id="DekorAtas">
       
        <div id="JumlahLaporanSaya">
            <div id="TotalLaporan" class="KotakJumlah">
                <h2 class="Jumlah">5</h2>
                <p class="KeteranganKotak">TotalLaporan</p>
            </div>
            <div id="Diterima" class="KotakJumlah">
                <h2 class="Jumlah">5</h2>
                <p class="KeteranganKotak">Diterima</p>
            </div>
            <div id="Diproses" class="KotakJumlah">
                <h2 class="Jumlah">5</h2>
                <p class="KeteranganKotak">Diproses</p>
            </div>
            <div id="Selesai" class="KotakJumlah">
                <h2 class="Jumlah">5</h2>
                <p class="KeteranganKotak">Selesai</p>
            </div>
            <div id="Ditolak" class="KotakJumlah">
                <h2 class="Jumlah">5</h2>
                <p class="KeteranganKotak">Ditolak</p>
            </div>
        </div>
        <div id="BarisStatus">
            <button class="PilihanStatus">Semua</button>
            <button class="PilihanStatus">Diterima</button>
            <button class="PilihanStatus">Diproses</button>
            <button class="PilihanStatus">Selesai</button>
            <button class="PilihanStatus">Ditolak</button>
        </div>
        <div class="DaftarLaporan">

    <div class="HeaderLaporan">
        <span>Nomor Laporan</span>
        <span>Lokasi</span>
        <span>Kategori</span>
        <span>Tanggal</span>
        <span>Status</span>
    </div>

    @forelse ($laporan as $item)
        <div class="BarisLaporan">

            <span class="nomor">
                {{ $item->no_laporan }}
            </span>

            <span class="lokasi">
                {{ $item->lokasi }}
            </span>

            <span class="kategori">
                {{ $item->kategori }}
            </span>

            <span class="tanggal">
                {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}
            </span>

            <span class="status status-{{ strtolower(str_replace(' ', '-', $item->status)) }}">
                {{ $item->status }}
            </span>

        </div>
    @empty
        <p class="LaporanKosong">Belum ada laporan.</p>
    @endforelse

</div>
    </main>
    <footer id="Footer">
        <div id="IsiFooter1">
            <div id="Isi1">
                <h3 id="JudulFooter">LaporDesa</h3>
                <p class="IsiFooter">Kanal resmi warga Desa Sumbersari untuk melaporkan
                    dan memantau <br> penyelesaian masalah di
                    lingkungan sekitar.</p> <br><br>

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
                <div class="TautanFooter">Beranda</div>
                <div class="TautanFooter">Buat Laporan</div>
                <div class="TautanFooter">Daftar Laporan</div>
                <div class="TautanFooter">Laporan Saya</div>
                <div class="TautanFooter">Notifikasi</div>
                <div class="TautanFooter">Profil</div>
            </div>
        </div><br>
        <hr>
        <div id="FooterBawah">
            <p class="TextBawahFooter">© 2026 Pemerintah Desa Ngastemi</p>
            <p class="TextBawahFooter">Layanan ini gratis untuk seluruh warga desa Ngastemi</p>
        </div>
    </footer>
</body>
<script>
 
    const tombol = document.querySelectorAll('.PilihanStatus');

    tombol.forEach(function(button) {
        button.addEventListener('click', function() {

            tombol.forEach(function(btn) {
                btn.classList.remove('aktif');
            });

            button.classList.add('aktif');
        });
    });
</script>
</html>