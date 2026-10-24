<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/Beranda.css') }}">
    <a href="/HTML/Navbar/navbartemplate.html"></a>
    <title>LaporDesa</title>


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
                <a href="{{route('laporan')}}" class="LinkMenu">Laporan Saya</a>
                <a href="#" class="LinkMenu">Daftar Laporan</a>
            </div>
            <div id="KelompokLoginDaftar">
                <button class="btnLoginDaftar">Login</button>
                <button class="btnLoginDaftar">Daftar</button>
            </div>

        </div>
    </nav>

    <main id="main">
        <div id="Hero">
            <div id="IsiHero">
                <div id="IsiHeroKanan">
                    <span id="HeroBadge">Desa Ngastemi,Kec Bangsal</span>
                    <h1 id="HeroTitle">Ada Masalah<br>di<br>lingkungan?<br>sampaikan<br>ke desa.</h1>
                    <p id="HeroDesc">Jalan rusak,lampu mati, atau sampah yang menumpuk <br> laporkan dalam dua
                        menit,dan pantau prosesnya smapai selesai.</p><br>
                    <div id="HeroActions">
                        <a id="btnBuatLaporan" href="#">Buat laporan baru</a>
                        <a id="btnCekStatus" href="#lur">Cek Status</a>
                    </div>
                </div>
                <div id="IsiHeroKiri">
                    <img class="HeroPhoto" src="Rectangle 3.png" alt="Kantor Kepala Desa Ngastemi">
                </div>
            </div>
        </div><br><br><br>
        <div id="deskripsiSection">
            <h1 id="JudulDeskripsi">Satu Tempat untuk Informasi Laporan Desa</h1> <br> <br>
            <p id="PDeskripsi">LaporDesa mengumpulkan informasi laporan warga dalam <br>
                satu sistem agar lebih mudah dikelola dan dipantau. Setiap laporan <br>
                dilengkapi dengan informasi terkait kondisi, lokasi, <br>
                serta perkembangan penanganannya.</p>
            <hr id="garisDeskripsi">
        </div>
        <div id="Statistik">
            <div id="StatistikBeranda">
                <div id="Items1">
                    <p class="JumlahS">15</p>
                    <p class="JenisS">Total Laporan</p>
                </div>
                <hr>
                <div id="Items1">
                    <p class="JumlahS">5</p>
                    <p class="JenisS">Diterima</p>
                </div>
                <hr>
                <div id="Items1">
                    <p class="JumlahS">3</p>
                    <p class="JenisS">Sedang Diproses</p>
                </div>
                <hr>
                <div id="Items1">
                    <p class="JumlahS">7</p>
                    <p class="JenisS">Selesai</p>
                </div>
            </div>
        </div>
        <div id="alur">
            <div id="text1">
                <h3 id="JudulAlur">Alur Laporan, dari kirim sampai tuntas</h3>
                <p id="deskripsiAlur">Empat tahap yang dilalui setiap laporan sebelum dinyatakan selesai <br>
                    oleh perangkat desa.</p>
            </div>
            <div class="AreaAlurKanan">
                <div id="ItemAlur1">
                    <p class="JudulAlurItem"></p>
                    <p class="deskripsiAlurItem"></p>
                </div>
                <div id="itemAlur1">
                    <p class="JudulAlurItem"></p>
                    <p class="deskripsiAlurItem"></p>
                </div>
            </div>
            <div class="AreaAlurKanan">
                <div id="itemAlurKanan">
                     <div id="ItemAlur2">
                    <p class="JudulAlurItem"></p>
                    <p class="deskripsiAlurItem"></p>
                </div>
                <div id="itemAlur2">
                    <p class="JudulAlurItem"></p>
                    <p class="deskripsiAlurItem"></p>
                </div>
                </div>
            </div>
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
                <div class="TautanFooter"><a href="" class="TautanFooterLink">Beranda</a></div>
                <div class="TautanFooter"><a href=""></a>Buat Laporan</div>
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

</html>