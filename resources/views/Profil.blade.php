<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Profil Saya | LaporDesa</title>

    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Poppins:wght@400;500;600;700&family=Smooch+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('CSS/Profil.css') }}">
    <link rel="stylesheet" href="{{ asset('CSS/Template.css') }}">
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


    <!-- KONTEN PROFIL -->
    <main id="KontenProfil">

        <h1 id="JudulHalaman">PROFIL SAYA</h1>

        <div id="KartuProfil">

            <!-- BAGIAN KIRI -->
            <section id="InformasiUtama">

                <div id="HeaderProfil">

                    <div id="FotoProfil">
                        <img src="{{asset('/images/Profil.svg')}}" alt="">
                    </div>

                    <div id="NamaPengguna">
                        <h2>{{ $Pengguna->nama }}</h2>
                    </div>

                </div>

                <div id="DetailPengguna">

                    <div class="BarisDetail">
                        <strong>Alamat</strong>
                        <span>:</span>
                        <p>{{ $Pengguna->alamat ?? '-' }}</p>
                    </div>

                    <div class="BarisDetail">
                        <strong>Jenis Kelamin</strong>
                        <span>:</span>
                        <p>{{ $Pengguna->jenis_kelamin ?? '-' }}</p>
                    </div>

                    <a href="#" id="TombolEdit">
                        Edit Profil
                    </a>

                </div>

            </section>


            <!-- BAGIAN KANAN -->
            <section id="InformasiKontak">

                <p id="TanggalBergabung">
                    Bergabung pada
                    {{ $Pengguna->created_at
                        ? $Pengguna->created_at->translatedFormat('d F Y')
                        : '-' }}
                </p>

                <div class="BarisKontak">

                    <img src="{{asset('/images/Email.svg')}}" alt="">

                    <span>{{ $Pengguna->email }}</span>

                </div>

                <div class="BarisKontak">

                    <img src="{{asset('/images/Telepon.svg')}}" alt="">

                    <span>{{ $Pengguna->no_telepon ?? '-' }}</span>

                </div>

                <form action="{{ route('logout') }}" method="POST" id="FormLogout">
                    @csrf

                    <button type="submit" id="TombolKeluar">
                        KELUAR
                    </button>
                </form>

            </section>

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
            <div id="Isi3"><br>
            <div class="FooterSubJudul"><b>Tautan</b></div><br>

                <a href="{{ route('beranda') }}" class="TautanFooter">Beranda</a><br>
                <a href="{{ route('laporan.create') }}" class="TautanFooter">Buat Laporan</a><br>
                <a href="{{ route('daftar.laporan') }}" class="TautanFooter">Daftar Laporan</a><br>
                <a href="{{ route('laporan') }}" class="TautanFooter">Laporan Saya</a><br>
                <a href="{{ route('profil') }}" class="TautanFooter">Profil</a><br>
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