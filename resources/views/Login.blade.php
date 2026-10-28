<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login | LaporDesa</title>

    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('CSS/Login.css') }}">
</head>
<body>

    <div class="HalamanLogin">

        <!-- Bagian Kiri -->
        <div class="BagianKiri">

            <div class="InformasiWebsite">
                <h1>LaporDesa</h1>
                <p>Membangun Desa Menjadi Lebih baik.</p>
            </div>

            <a href="{{ route('registrasi') }}" class="TombolDaftar">
                Daftar
            </a>

        </div>

        <!-- Bagian Kanan -->
        <div class="BagianKanan">

            <div class="KontenLogin">

                <h2>LOGIN</h2>

                <p class="DeskripsiLogin">
                    Selamat datang kembali silahkan masuk
                    untuk melanjutkan!
                </p>

                <!-- Pesan Berhasil -->
                @if (session('success'))
                    <p class="PesanBerhasil">
                        {{ session('success') }}
                    </p>
                @endif

                <!-- Pesan Error -->
                @if ($errors->any())
                    <p class="PesanError">
                        {{ $errors->first() }}
                    </p>
                @endif

                <!-- Form Login -->
                <form action="{{ route('login.proses') }}" method="POST">
                    @csrf

                    <!-- Email -->
                    <div class="InputGrup">

                        <img src="" alt="" class="IkonInput">

                        <input
                            type="email"
                            name="email"
                            placeholder="Email"
                            value="{{ old('email') }}"
                            required
                        >

                    </div>

                    <!-- Password -->
                    <div class="InputGrup">

                        <img src="" alt="" class="IkonInput">

                        <input
                            type="password"
                            name="password"
                            id="Password"
                            placeholder="Password"
                            required
                        >

                        <button
                            type="button"
                            class="TombolPassword"
                            onclick="LihatPassword()"
                        >
                            <img src="" alt="">
                        </button>

                    </div>

                    <!-- Ingat Saya -->
                    <div class="PilihanLogin">

                        <label class="IngatSaya">
                            <input type="checkbox" name="ingat_saya">
                            <span>Ingat Saya</span>
                        </label>

                        <a href="#" class="LupaPassword">
                            Lupa Password?
                        </a>

                    </div>

                    <!-- Tombol Login -->
                    <button type="submit" class="TombolLogin">
                        Login
                    </button>

                </form>

                <!-- Pemisah -->
                <div class="Pemisah">
                    <span></span>
                    <p>atau</p>
                    <span></span>
                </div>

                <!-- Login Google -->
                <button type="button" class="TombolGoogle">
                    <img src="" alt="">
                    Login dengan Google
                </button>

            </div>

        </div>

    </div>

    <script>
        function LihatPassword() {
            const Password = document.getElementById('Password');

            if (Password.type === 'password') {
                Password.type = 'text';
            } else {
                Password.type = 'password';
            }
        }
    </script>

</body>
</html>