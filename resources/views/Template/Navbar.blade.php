<footer id="Footer">
    <div id="IsiFooter1">
        <div id="Isi1">
            <h3 id="JudulFooter">LaporDesa</h3>

            <p class="IsiFooter">
                Kanal pelaporan warga untuk melaporkan dan memantau
                penyelesaian masalah di lingkungan sekitar.
            </p>

            <br>

            <p class="FooterSubJudul"><b>Kontak</b></p>
            <p class="IsiFooter">08867544545</p>
        </div>

        <div id="Isi2">
            <p class="FooterSubJudul"><b>Kantor Desa</b></p>

            <p class="IsiFooter">
                Desa Ngastemi,<br>
                Kecamatan Bangsal,<br>
                Kabupaten Mojokerto, Jawa Timur.
            </p>
        </div>

        <div id="Isi3">
            <p class="FooterSubJudul"><b>Tautan</b></p>
            <br>

            <a href="{{ route('beranda') }}" class="TautanFooter">Beranda</a>
            <a href="{{ route('laporan.create') }}" class="TautanFooter">Buat Laporan</a>
            <a href="{{ route('daftar.laporan') }}" class="TautanFooter">Daftar Laporan</a>
            <a href="{{ route('laporan') }}" class="TautanFooter">Laporan Saya</a>

            @if (session('id_pengguna'))
                <a href="{{ route('profil') }}" class="TautanFooter">Profil</a>
            @else
                <a href="{{ route('login') }}" class="TautanFooter">Login</a>
            @endif
        </div>
    </div>

    <br>
    <hr>

    <div id="FooterBawah">
        <p class="TextBawahFooter">© 2026 Pemerintah Desa Ngastemi</p>
        <p class="TextBawahFooter">
            Layanan ini gratis untuk seluruh warga Desa Ngastemi.
        </p>
    </div>
</footer>