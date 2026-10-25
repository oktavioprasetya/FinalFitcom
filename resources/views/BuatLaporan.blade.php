<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Buat Laporan - LaporDesa</title>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/BuatLaporan.css') }}">
</head>
<body>

{{-- NAVBAR --}}
<header class="navbar">
    <a href="/" class="brand">
        <img src="{{ asset('images/logo-lapordesa.png') }}" alt="" class="brand-logo">
        <span>LaporDesa</span>
    </a>
    <nav class="nav-menu">
        <a href="/" class="pill">Beranda</a>
        <a href="#" class="pill">Laporan Saya</a>
        <a href="#" class="pill">Daftar Laporan</a>
    </nav>
    <div class="nav-icons">
        <button class="icon-btn" aria-label="Notifikasi">&#128276;</button>
        <button class="icon-btn" aria-label="Profil">&#128100;</button>
    </div>
</header>

<main class="layout">

    {{-- SIDEBAR PANDUAN --}}
    <aside class="sidebar">
        <h1 class="judul-halaman">Buat Laporan</h1>
        <h2 class="judul-panduan">Panduan Mengisi Formulir</h2>

        <ol class="langkah">
            <li><span class="no">01</span><div class="kotak">Pilih kategori yang paling sesuai</div></li>
            <li><span class="no">02</span><div class="kotak">Tulis Lokasi sejelas mungkin</div></li>
            <li><span class="no">03</span><div class="kotak">Ceritakan Masalahnya dengan detail</div></li>
            <li><span class="no">04</span><div class="kotak">Lampirkan foto Kerusakan</div></li>
            <li><span class="no">05</span><div class="kotak">Kirim dan simpan nomor laporan</div></li>
        </ol>

        <div class="label-contoh">Contoh laporan yang kurang jelas dan laporan yang jelas</div>

        <div class="contoh">
            <h3>Kurang jelas</h3>
            <p class="kutipan kuning">“Jalan rusak tolong perbaiki”</p>
            <p>Tidak jelas lokasinya di mana, separah apa kerusakannya, dan sejak kapan terjadi, petugas harus survei dulu sebelum bisa menindaklanjuti.</p>
        </div>

        <div class="contoh jelas">
            <h3>Jelas &amp; lengkap</h3>
            <p class="kutipan hijau">“Jalan di Jl. Melati RT 04/RW 01, dekat pertigaan warung Bu Yanti, berlubang sekitar 50cm dan cukup dalam. Sudah terjadi sejak dua minggu lalu dan beberapa kali membuat motor tergelincir saat malam hari.”</p>
            <p>Lokasi jelas, ukuran masalah disebutkan, dan dampaknya nyata, petugas bisa langsung menilai prioritas penanganan.</p>
        </div>
    </aside>

    {{-- FORMULIR --}}
    <section class="konten">
        <form id="formLaporan" class="form-card" action="{{ route('laporan.simpan') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-head">
                <img src="{{ asset('images/logo-lapordesa.png') }}" alt="">
                <div>
                    <strong>Formulir Pelaporan</strong>
                    <span>Infrastruktur Desa Rusak</span>
                </div>
            </div>
            <p class="intro">Laporkan kerusakan infrastruktur desa seperti jalan, jembatan, saluran air, dan fasilitas umum lainnya agar segera ditindaklanjuti.</p>

            <div class="field">
                <div class="field-title"><span class="ico">&#128100;</span>
                    <div><b>Nama Pelapor</b><small>Masukkan nama lengkap Anda</small></div></div>
                <input type="text" name="nama_pelapor" class="input-pill" placeholder="Masukkan nama anda di sini" required>
            </div>

            <div class="field">
                <div class="field-title"><span class="ico">&#9776;</span>
                    <div><b>Jenis Laporan</b><small>Pilih jenis infrastruktur yang mengalami kerusakan</small></div></div>
                <div class="jenis-grid" id="jenisGrid">
                    @foreach (['Jalan','Lingkungan','Drainase','Fasilitas Umum','Penerangan jalan','Lainnya'] as $jenis)
                        <button type="button" class="jenis" data-value="{{ $jenis }}">
                            <span class="ico-sm">&#9679;</span>{{ $jenis }}
                        </button>
                    @endforeach
                </div>
                <input type="hidden" name="jenis_laporan" id="jenisLaporan" required>
            </div>

            <div class="field">
                <div class="field-title"><span class="ico">&#128205;</span>
                    <div><b>Lokasi kejadian</b><small>Tentukan lokasi secara tepat pada peta</small></div></div>
                <div class="peta-box">
                    <iframe id="peta" title="Peta lokasi" loading="lazy"
                       src="https://maps.google.com/maps?q=Jl.%20Belimbing%20No.5,%20Ngingas,%20Ngastemi,%20Bangsal,%20Mojokerto,%20Jawa%20Timur%2061381&output=embed"></iframe>
                </div>
                <input type="hidden" name="latitude" id="lat">
                <input type="hidden" name="longitude" id="lng">
            </div>

            <div class="dua-kolom">
                <label class="kotak-input"><span>&#127968; Dusun</span>
                    <input type="text" name="dusun" placeholder="Nama dusun"></label>
                <label class="kotak-input"><span>&#127970; Desa</span>
                    <input type="text" name="desa" placeholder="Nama desa"></label>
            </div>

            <div class="field">
                <div class="field-title"><span class="ico">&#128247;</span>
                    <div><b>Foto Tempat</b><small>Unggah foto lokasi kerusakan (maks. 2 foto)</small></div></div>
                <label class="upload" id="dropzone">
                    <span class="upload-ico">&#9729;</span>
                    <b>Klik untuk mengunggah foto</b>
                    <span>atau seret dan lepas gambar di sini</span>
                    <input type="file" name="foto[]" id="fotoInput" accept="image/*" multiple hidden>
                </label>
                <div class="preview" id="preview"></div>
            </div>

            <div class="field">
                <div class="field-title"><span class="ico">&#128196;</span>
                    <div><b>Deskripsi</b><small>Jelaskan secara rinci lokasi kejadian dan kondisi kerusakan</small></div></div>
                <textarea name="deskripsi" class="textarea" rows="5" placeholder="Jelaskan lebih rinci bagaimana kerusakannya...." required></textarea>
            </div>

            <button type="submit" class="btn-kirim">Kirim</button>
        </form>
    </section>
</main>

{{-- FOOTER --}}
<footer class="footer">
    <div class="footer-grid">
        <div>
            <h4>LaporDesa</h4>
            <p>Kanal resmi warga Desa Sumbersari untuk melaporkan dan memantau penyelesaian masalah di lingkungan sekitar.</p>
            <h4 class="mt">Kontak</h4>
            <p>082245930654</p>
        </div>
        <div>
            <h4>Kantor Desa</h4>
            <p>Jl. Belimbing No.5, Ngingas, Ngastemi, Kec. Bangsal, Kabupaten Mojokerto, Jawa Timur 61381</p>
        </div>
        <div>
            <h4>Tautan</h4>
            <ul>
                <li><a href="/">Beranda</a></li>
                <li><a href="#">Buat Laporan</a></li>
                <li><a href="#">Daftar Laporan</a></li>
                <li><a href="#">Laporan Saya</a></li>
                <li><a href="#">Notifikasi</a></li>
                <li><a href="#">Profil</a></li>
            </ul>
        </div>
    </div>
    <div class="footer-bawah">
        <span>© 2026 Pemerintah Desa Ngastemi</span>
        <span>Layanan ini gratis untuk seluruh warga desa Ngastemi</span>
    </div>
</footer>

<script src="{{ asset('js/buat-laporan.js') }}"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LaporDesa - Beranda</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/tombol-laporan.css') }}">
</head>
<body>
    <section class="banner-laporan">
        {{-- Klik tombol ini -> pindah ke halaman Buat Laporan (gambar no 2) --}}
        <a href="{{ route('BuatLaporan') }}" class="tombol-laporan"></a>
    </section>
</body>
</html>