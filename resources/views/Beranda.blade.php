<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LaporDesa | Beranda</title>

    <link rel="stylesheet" href="{{ asset('css/Beranda.css') }}">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Poppins:wght@400;500;600;700&family=Smooch+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
    <main>
        <!-- HERO -->
        <section id="Hero">
            <div id="IsiHero">
                <div id="IsiHeroKanan">
                    <span id="HeroBadge">Desa Ngastemi, Kec. Bangsal</span>

                    <h1 id="HeroTitle">
                        Ada masalah<br>
                        di lingkungan?<br>
                        Sampaikan<br>
                        ke desa.
                    </h1>

                    <p id="HeroDesc">
                        Jalan rusak, lampu mati, atau sampah yang menumpuk.
                        Laporkan dalam dua menit dan pantau prosesnya
                        sampai selesai.
                    </p>

                    <div id="HeroActions">
                        <a id="btnBuatLaporan" href="BuatLaporan">Buat Laporan Baru</a>
                        <a id="btnCekStatus" href="#alur">Cek Status</a>
                    </div>
                </div>

                <div id="IsiHeroKiri">
                    <img src="{{ asset('images/foto.png') }}"
                         alt="Kantor Desa Ngastemi"
                         id="fotoKelurahan">
                </div>
            </div>
        </section>

        <!-- DESKRIPSI -->
        <section id="deskripsiSection">
            <h2 id="JudulDeskripsi">
                Satu Tempat untuk Informasi Laporan Desa
            </h2>

            <p id="PDeskripsi">
                LaporDesa mengumpulkan informasi laporan warga dalam
                satu sistem agar lebih mudah dikelola dan dipantau.
                Setiap laporan dilengkapi dengan informasi terkait
                kondisi, lokasi, serta perkembangan penanganannya.
            </p>

            <hr id="garisDeskripsi">
        </section>

        <!-- STATISTIK -->
        <section id="Statistik">
            <div id="StatistikBeranda">
                <div class="ItemStatistik">
                    <p class="JumlahS">15</p>
                    <p class="JenisS">Total Laporan</p>
                </div>

                <div class="ItemStatistik">
                    <p class="JumlahS">5</p>
                    <p class="JenisS">Diterima</p>
                </div>

                <div class="ItemStatistik">
                    <p class="JumlahS">3</p>
                    <p class="JenisS">Sedang Diproses</p>
                </div>

                <div class="ItemStatistik">
                    <p class="JumlahS">7</p>
                    <p class="JenisS">Selesai</p>
                </div>
            </div>
        </section>

        <!-- ALUR LAPORAN -->
        <section id="alur">
            <div id="text1">
                <h2 id="JudulAlur">
                    Alur Laporan, dari kirim sampai tuntas
                </h2>
                <p id="deskripsiAlur">
                    <b>Empat tahap yang dilalui setiap laporan sebelum dinyatakan selesai <br> oleh perangkat desa.</b>
                </p>
            </div>

            <div class="AlurGrid">
                <div class="GarisAlurTengah"></div>

                <div class="AreaAlur AreaAlurKiri">
                    <article class="ItemAlur ItemAlur1">
                        <div class="KotakAlur">
                            <h3 class="JudulAlurItem">Isi Laporan</h3>
                            <p class="deskripsiAlurItem">
                                Pilih kategori, tuliskan lokasi dan
                                ceritakan kejadiannya secara singkat.
                            </p>
                        </div>
                        <span class="TitikAlur"></span>
                        <div class="NomorAlur">
                            <span>Tahap 01</span>
                            <strong>01</strong>
                        </div>
                    </article>

                    <article class="ItemAlur ItemAlur3">
                        <div class="KotakAlur">
                            <h3 class="JudulAlurItem">Diproses</h3>
                            <p class="deskripsiAlurItem">
                                Laporan mulai ditindaklanjuti oleh
                                pihak desa sesuai permasalahan yang dilaporkan.
                            </p>
                        </div>
                        <span class="TitikAlur"></span>
                        <div class="NomorAlur">
                            <span>Tahap 03</span>
                            <strong>03</strong>
                        </div>
                    </article>
                </div>

                <div class="AreaAlur AreaAlurKanan">
                    <article class="ItemAlur ItemAlur2">
                        <div class="KotakAlur">
                            <h3 class="JudulAlurItem">Diverifikasi</h3>
                            <p class="deskripsiAlurItem">
                                Laporan diperiksa agar informasi yang
                                diberikan jelas dan sesuai.
                            </p>
                        </div>
                        <span class="TitikAlur"></span>
                        <div class="NomorAlur">
                            <span>Tahap 02</span>
                            <strong>02</strong>
                        </div>
                    </article>

                    <article class="ItemAlur ItemAlur4">
                        <div class="KotakAlur">
                            <h3 class="JudulAlurItem">
                                Selesai &amp; terkonfirmasi
                            </h3>
                            <p class="deskripsiAlurItem">
                                Status diperbarui menjadi selesai dan
                                pelapor bisa melihat hasilnya.
                            </p>
                        </div>
                        <span class="TitikAlur"></span>
                        <div class="NomorAlur">
                            <span>Tahap 04</span>
                            <strong>04</strong>
                        </div>
                    </article>
                </div>
            </div>
        </section>

        <!-- KATEGORI: TAMPILAN SAJA, BUKAN TOMBOL -->
        <section id="kategori">
            <div id="IsiKategori">
                <div id="DeskripsiKategori">
                    <h2 id="JudulKategori">Kategori Laporan</h2>
                    <p>
                        Pilih kategori permasalahan yang ingin dilaporkan
                        agar laporan dapat disampaikan dengan lebih terstruktur.
                    </p>
                </div>

                <div id="DaftarKategori">
                    <div class="ItemKategori">Jalan &amp; Jembatan</div>
                    <div class="ItemKategori">Lingkungan</div>
                    <div class="ItemKategori">Drainase &amp; Saluran Air</div>
                    <div class="ItemKategori">Fasilitas Umum</div>
                    <div class="ItemKategori">Penerangan Jalan</div>
                    <div class="ItemKategori">Lainnya</div>
                </div>
            </div>
        </section>
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