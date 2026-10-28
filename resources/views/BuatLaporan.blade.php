<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Buat Laporan | LaporDesa</title>

    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Poppins:wght@400;500;600;700&family=Anton&family=Smooch+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/Template.css') }}">
    <link rel="stylesheet" href="{{ asset('css/BuatLaporan.css') }}">
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

    <main id="IsiHalamanBuatLaporan">


        <aside id="PanelPanduan">

            <h1 class="JudulHalaman">BUAT LAPORAN</h1>

            <h2 class="JudulPanduan">Panduan Mengisi Formulir</h2>

            <div id="DaftarLangkah">

                <div class="BarisLangkah">
                    <span class="NomorLangkah">01</span>
                    <div class="KotakLangkah">
                        Pilih kategori yang paling sesuai
                    </div>
                </div>

                <div class="BarisLangkah">
                    <span class="NomorLangkah">02</span>
                    <div class="KotakLangkah">
                        Tulis lokasi sejelas mungkin
                    </div>
                </div>

                <div class="BarisLangkah">
                    <span class="NomorLangkah">03</span>
                    <div class="KotakLangkah">
                        Ceritakan masalahnya dengan detail
                    </div>
                </div>

                <div class="BarisLangkah">
                    <span class="NomorLangkah">04</span>
                    <div class="KotakLangkah">
                        Lampirkan foto kerusakan
                    </div>
                </div>

                <div class="BarisLangkah">
                    <span class="NomorLangkah">05</span>
                    <div class="KotakLangkah">
                        Kirim dan simpan nomor laporan
                    </div>
                </div>

            </div>


            <div class="JudulContoh">
                Contoh laporan yang kurang jelas dan laporan yang jelas
            </div>

            <div class="ContohLaporan">

                <h3>Kurang jelas</h3>

                <p class="ContohKalimat WarnaKuning">
                    "Jalan rusak tolong perbaiki"
                </p>

                <p>
                    Tidak jelas lokasinya di mana, separah apa kerusakannya,
                    dan sejak kapan terjadi. Petugas harus melakukan survei
                    terlebih dahulu.
                </p>

            </div>


            <div class="ContohLaporan">

                <h3>Jelas & lengkap</h3>

                <p class="ContohKalimat WarnaHijau">
                    "Jalan di Jl. Melati RT 04/RW 01, dekat pertigaan warung
                    Bu Yanti, berlubang sekitar 50 cm dan cukup dalam."
                </p>

                <p>
                    Lokasi jelas, ukuran kerusakan disebutkan, dan dampaknya
                    dijelaskan sehingga petugas dapat menilai prioritas
                    penanganan.
                </p>

            </div>

        </aside>


        <section id="KontenFormulir">

            <form
                id="FormLaporan"
                class="KotakFormulir"
                action="{{ route('laporan.store') }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf

                <div class="JudulFormulir">

                    <img src="{{asset('/images/Logo.svg')}}" alt="" class="LogoFormulir">

                    <div>
                        <strong>Formulir Pelaporan</strong>
                        <span>Infrastruktur Desa Rusak</span>
                    </div>

                </div>


                <p class="KeteranganFormulir">
                    Laporkan kerusakan infrastruktur desa seperti jalan,
                    jembatan, saluran air, dan fasilitas umum lainnya agar
                    segera ditindaklanjuti.
                </p>


                @if ($errors->any())
                <div class="PesanError">
                    <p>Periksa kembali data yang kamu masukkan.</p>

                    @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                    @endforeach
                </div>
                @endif


                @if (session('sukses'))
                <div class="PesanSukses">
                    {{ session('sukses') }}
                </div>
                @endif


                <div class="BagianFormulir">

                    <div class="JudulBagian">


                        <img src="{{asset('/images/Profil.svg')}}" alt="" class="IkonBagian">

                        <div>
                            <b>Nama Pelapor</b>
                            <small>Nama akun yang sedang digunakan</small>
                        </div>

                    </div>

                    <input
                        type="text"
                        class="InputNama"
                        value="{{ $pengguna->nama ?? '' }}"
                        placeholder="Nama pengguna"
                        readonly>

                </div>
           

                <div class="BagianFormulir">

                    <div class="JudulBagian">


                        <img src="{{asset('/images/Menu.svg')}}" alt="" class="IkonBagian">

                        <div>
                            <b>Jenis Laporan</b>
                            <small>Pilih jenis infrastruktur yang rusak</small>
                        </div>

                    </div>


                    <div class="PilihanJenisLaporan">

                        @foreach ([
                        'Jalan',
                        'Lingkungan',
                        'Drainase',
                        'Fasilitas Umum',
                        'Penerangan jalan',
                        'Lainnya'
                        ] as $jenis)

                        <label class="TombolJenis">

                            <input
                                type="radio"
                                name="kategori"
                                value="{{ $jenis }}"
                                {{ old('kategori') == $jenis ? 'checked' : '' }}
                                required>

                          
                            <span>{{ $jenis }}</span>

                        </label>

                        @endforeach

                    </div>

                </div>


                <div class="BagianFormulir">

                    <div class="JudulBagian">


                        <img src="{{asset('/images/Lokasi.svg')}}" alt="" class="IkonBagian">

                        <div>
                            <b>Lokasi Kejadian</b>
                            <small>Masukkan lokasi kerusakan secara jelas</small>
                        </div>

                    </div>


                    <div class="KotakPeta">

                        <iframe
                            id="PetaLokasi"
                            title="Peta lokasi Desa Ngastemi"
                            loading="lazy"
                            src="https://maps.google.com/maps?q=Ngastemi%20Bangsal%20Mojokerto&output=embed">
                        </iframe>

                    </div>


                    <input
                        type="text"
                        name="lokasi"
                        class="InputNama"
                        value="{{ old('lokasi') }}"
                        placeholder="Contoh: Jalan Melati RT 04/RW 01, dekat balai desa"
                        required>

                </div>

                <div class="BagianFormulir">

                    <div class="JudulBagian">


                        <img src="{{asset('/images/UnggahFoto.svg')}}" alt="" class="IkonBagian">

                        <div>
                            <b>Foto Tempat</b>
                            <small>Unggah maksimal 1 foto kerusakan</small>
                        </div>

                    </div>


                    <label for="FotoInput" class="AreaUnggah">

    
                        <img src="{{asset('/images/Cloud.svg')}}" alt="" class="IkonUnggah">

                        <b>Klik untuk mengunggah foto</b>

                        <span>Pilih foto dari perangkatmu</span>

                        <input
                            type="file"
                            name="foto"
                            id="FotoInput"
                            accept="image/jpeg,image/png,image/webp"
                            hidden>

                    </label>


                    <div id="NamaFotoTerpilih"></div>

                </div>


                
                <div class="BagianFormulir">

                    <div class="JudulBagian">


                        <img src="{{asset('/images/Deskripsi.svg')}}" alt="" class="IkonBagian">

                        <div>
                            <b>Deskripsi</b>
                            <small>
                                Jelaskan kondisi kerusakan dan informasi lainnya
                            </small>
                        </div>

                    </div>

                    <textarea
                        name="deskripsi"
                        class="InputDeskripsi"
                        rows="5"
                        placeholder="Jelaskan secara rinci lokasi kejadian dan kondisi kerusakan..."
                        required>{{ old('deskripsi') }}</textarea>

                </div>


                <button type="submit" class="TombolKirim">
                    Kirim Laporan
                </button>

            </form>

        </section>

    </main>
    <footer id="Footer">
        <div id="IsiFooter1">
            <div id="Isi1">
                <h3 id="JudulFooter">LaporDesa</h3>
                <p class="IsiFooter">Kanal resmi warga Ngastemi untuk melaporkan
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

    <script>
        const FotoInput = document.getElementById('FotoInput');
const NamaFotoTerpilih = document.getElementById('NamaFotoTerpilih');

FotoInput.addEventListener('change', function () {
    NamaFotoTerpilih.innerHTML = '';

    if (this.files.length > 1) {
        alert('Maksimal hanya 1 foto.');
        this.value = '';
        return;
    }

    if (this.files.length > 0) {
        const NamaFoto = document.createElement('p');
        NamaFoto.textContent = this.files[0].name;
        NamaFotoTerpilih.appendChild(NamaFoto);
    }
});
    </script>

</body>
</html>