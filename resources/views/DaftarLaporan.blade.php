<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Daftar Laporan | LaporDesa</title>

    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Poppins:wght@400;500;600;700&family=Smooch+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('css/DaftarLaporan.css') }}">
<link rel="stylesheet" href="{{ asset('css/Template.css') }}">
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


<!-- HEADER DAFTAR LAPORAN -->
<header id="HeaderLaporan">

    <div id="BagianJudul">

        <h1 id="JudulHalaman">DAFTAR LAPORAN</h1>

        <div id="KelompokPencarian">
            <img src="" alt="" id="IkonPencarian">

            <input
                type="text"
                id="InputPencarian"
                placeholder="Cari laporan..."
            >
        </div>

    </div>


    <!-- RINGKASAN LAPORAN -->
    <div id="RingkasanLaporan">

        <div class="KartuRingkasan KartuDiproses">

            <strong>{{ $JumlahDiproses }}</strong>

            <span>Diproses</span>

        </div>


        <div class="KartuRingkasan KartuDiterima">

            <strong>{{ $JumlahDiterima }}</strong>

            <span>Diterima</span>

        </div>


        <div class="KartuRingkasan KartuTotal">

            <span>Total<br>Laporan<br>diterima</span>

            <strong>{{ $TotalLaporan }}</strong>

        </div>

    </div>

</header>


<!-- DAFTAR DATA LAPORAN -->
<main id="KontenLaporan">

    <!-- FILTER STATUS -->
    <div id="KelompokFilter">

        <button type="button" class="TombolFilter Aktif" data-status="Semua">
            Semua
        </button>

        <button type="button" class="TombolFilter" data-status="Diproses">
            Diproses
        </button>

        <button type="button" class="TombolFilter" data-status="Diterima">
            Diterima
        </button>

    </div>


    <!-- JUDUL KOLOM -->
    <div id="HeaderTabel">

        <span>Nomor Laporan</span>
        <span>Lokasi</span>
        <span>Kategori</span>
        <span>Tanggal</span>
        <span>Status</span>

    </div>


    <!-- DAFTAR LAPORAN -->
    <div id="DaftarDataLaporan">

        @forelse ($laporan as $item)

            <a
                href="{{ route('laporan.detail', $item->id) }}"
                class="BarisLaporan"
                data-status="{{ $item->status }}"
            >

                <span class="NomorLaporan">
                    {{ $item->no_laporan }}
                </span>

                <span class="LokasiLaporan">
                    {{ $item->lokasi }}
                </span>

                <span class="KategoriLaporan">
                    {{ $item->kategori }}
                </span>

                <span class="TanggalLaporan">
                    {{ \Carbon\Carbon::parse($item->tanggal)->format('d F Y') }}
                </span>

                <span class="KolomStatus">

                    <span class="LabelStatus
                        {{ $item->status == 'Diterima' ? 'StatusDiterima' : '' }}
                        {{ $item->status == 'Diproses' ? 'StatusDiproses' : '' }}
                        {{ $item->status == 'Selesai' ? 'StatusSelesai' : '' }}
                        {{ $item->status == 'Ditolak' ? 'StatusDitolak' : '' }}">

                        {{ $item->status == 'Diproses' ? 'Sedang Diproses' : $item->status }}

                    </span>

                </span>

            </a>

        @empty

            <p id="PesanKosong">
                Belum ada laporan yang tersedia.
            </p>

        @endforelse

    </div>

    <p id="PesanTidakDitemukan" hidden>
        Laporan yang kamu cari tidak ditemukan.
    </p>

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
            <div id="Isi3"><br>
            <div class="FooterSubJudul"><b>Tautan</b></div><br>

                <a href="{{ route('beranda') }}" class="TautanFooter">Beranda</a><br>
                <a href="{{ route('laporan.create') }}" class="TautanFooter">Buat Laporan</a><br>
                <a href="{{ route('daftar.laporan') }}" class="TautanFooter">Daftar Laporan</a><br>
                <a href="{{ route('laporan') }}" class="TautanFooter">Laporan Saya</a><br>
                <a href="#" class="TautanFooter">Notifikasi</a><br>
                <a href="{{ route('profil') }}" class="TautanFooter">Profil</a><br>
         </div>
        </div><br>
         <hr>
         <div id="FooterBawah">
                <p class="TextBawahFooter">© 2026 Pemerintah Desa Ngastemi</p>
                <p class="TextBawahFooter">Layanan ini gratis untuk seluruh warga desa Ngastemi</p>
            </div>
    </footer>


<!-- PENCARIAN DAN FILTER -->
<script>
    const InputPencarian = document.getElementById('InputPencarian');
    const TombolFilter = document.querySelectorAll('.TombolFilter');
    const BarisLaporan = document.querySelectorAll('.BarisLaporan');
    const PesanTidakDitemukan = document.getElementById('PesanTidakDitemukan');

    let StatusAktif = 'Semua';

    function FilterLaporan() {
        const KataKunci = InputPencarian.value.toLowerCase();
        let JumlahTampil = 0;

        BarisLaporan.forEach(function(Baris) {
            const IsiLaporan = Baris.textContent.toLowerCase();
            const StatusLaporan = Baris.dataset.status;

            const CocokPencarian = IsiLaporan.includes(KataKunci);

            const CocokStatus =
                StatusAktif === 'Semua' ||
                StatusLaporan === StatusAktif;

            if (CocokPencarian && CocokStatus) {
                Baris.style.display = 'grid';
                JumlahTampil++;
            } else {
                Baris.style.display = 'none';
            }
        });

        PesanTidakDitemukan.hidden = JumlahTampil > 0;
    }

    InputPencarian.addEventListener('input', FilterLaporan);

    TombolFilter.forEach(function(Tombol) {
        Tombol.addEventListener('click', function() {
            TombolFilter.forEach(function(Item) {
                Item.classList.remove('Aktif');
            });

            Tombol.classList.add('Aktif');

            StatusAktif = Tombol.dataset.status;

            FilterLaporan();
        });
    });
</script>

</body>
</html>