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
<main id="IsihalamanLS">

    <hr>

    <h2 id="JudulLS">LAPORAN SAYA</h2>

    <img
        src="{{ asset('/images/DekorAtasLS.svg') }}"
        alt=""
        id="DekorAtas"
    >

    <!-- RINGKASAN LAPORAN -->
    <div id="JumlahLaporanSaya">

        <div id="TotalLaporan" class="KotakJumlah">
            <h2 class="Jumlah">{{ $TotalLaporan }}</h2>
            <p class="KeteranganKotak">Total Laporan</p>
        </div>

        <div id="Diterima" class="KotakJumlah">
            <h2 class="Jumlah">{{ $JumlahDiterima }}</h2>
            <p class="KeteranganKotak">Diterima</p>
        </div>

        <div id="Diproses" class="KotakJumlah">
            <h2 class="Jumlah">{{ $JumlahDiproses }}</h2>
            <p class="KeteranganKotak">Diproses</p>
        </div>

        <div id="Selesai" class="KotakJumlah">
            <h2 class="Jumlah">{{ $JumlahSelesai }}</h2>
            <p class="KeteranganKotak">Selesai</p>
        </div>

        <div id="Ditolak" class="KotakJumlah">
            <h2 class="Jumlah">{{ $JumlahDitolak }}</h2>
            <p class="KeteranganKotak">Ditolak</p>
        </div>

    </div>


    <!-- FILTER STATUS -->
    <div id="BarisStatus">

        <button type="button" class="PilihanStatus aktif" data-status="Semua">
            Semua
        </button>

        <button type="button" class="PilihanStatus" data-status="Diterima">
            Diterima
        </button>

        <button type="button" class="PilihanStatus" data-status="Diproses">
            Diproses
        </button>

        <button type="button" class="PilihanStatus" data-status="Selesai">
            Selesai
        </button>

        <button type="button" class="PilihanStatus" data-status="Ditolak">
            Ditolak
        </button>

    </div>


    <!-- DAFTAR LAPORAN -->
    <div class="DaftarLaporan">

        <div class="HeaderLaporan">
            <span>Nomor Laporan</span>
            <span>Lokasi</span>
            <span>Kategori</span>
            <span>Tanggal</span>
            <span>Status</span>
        </div>

        @forelse ($laporan as $item)

            <a
                href="{{ route('laporan.detail', $item->id) }}"
                class="LinkLaporan"
                data-status="{{ $item->status }}"
            >

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

            </a>

        @empty

            <p class="LaporanKosong">
                Kamu belum memiliki laporan.
            </p>

        @endforelse

        <p id="PesanFilterKosong" hidden>
            Tidak ada laporan dengan status tersebut.
        </p>

    </div>

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
<script>
    const TombolStatus = document.querySelectorAll('.PilihanStatus');
    const DaftarLaporan = document.querySelectorAll('.LinkLaporan');
    const PesanFilterKosong = document.getElementById('PesanFilterKosong');

    TombolStatus.forEach(function(Tombol) {
        Tombol.addEventListener('click', function() {

            TombolStatus.forEach(function(Item) {
                Item.classList.remove('aktif');
            });

            Tombol.classList.add('aktif');

            const StatusDipilih = Tombol.dataset.status;
            let JumlahTampil = 0;

            DaftarLaporan.forEach(function(Laporan) {
                const StatusLaporan = Laporan.dataset.status;

                if (
                    StatusDipilih === 'Semua' ||
                    StatusLaporan === StatusDipilih
                ) {
                    Laporan.style.display = 'block';
                    JumlahTampil++;
                } else {
                    Laporan.style.display = 'none';
                }
            });

            PesanFilterKosong.hidden = JumlahTampil > 0;
        });
    });
</script>
</html>