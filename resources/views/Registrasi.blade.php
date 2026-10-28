<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi | LaporDesa</title>

    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('CSS/Registrasi.css') }}">
</head>

<body>

    <div class="HalamanRegistrasi">

        <!-- Panel Kiri -->
        <div class="PanelKiri">

            <div class="IdentitasWebsite">
                <h1>LaporDesa</h1>
                <p>Membangun Desa Menjadi Lebih Baik.</p>
            </div>

            <a href="{{ route('login') }}" class="TombolLogin">
                Login
            </a>

        </div>

        <!-- Panel Kanan -->
        <div class="PanelKanan">

            <div class="JudulRegistrasi">
                <h2>Daftar</h2>
                <p>
                    Bergabunglah bersama kami untuk membuat
                    desa ngastemi lebih maju!
                </p>
            </div>

            @if ($errors->any())
                <div class="PesanError">
                    @foreach ($errors->all() as $Error)
                        <p>{{ $Error }}</p>
                    @endforeach
                </div>
            @endif

            @if (session('success'))
                <div class="PesanBerhasil">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('registrasi.store') }}" method="POST" class="FormRegistrasi">
                @csrf

                <!-- Nama -->
                <div class="GrupInput">
                    <img src="" alt="" class="IkonInput">

                    <input
                        type="text"
                        name="nama"
                        placeholder="Nama pengguna"
                        value="{{ old('nama') }}"
                        autocomplete="name"
                        required
                    >
                </div>

                <!-- Email -->
                <div class="GrupInput">
                    <img src="" alt="" class="IkonInput">

                    <input
                        type="email"
                        name="email"
                        placeholder="Email"
                        value="{{ old('email') }}"
                        autocomplete="email"
                        required
                    >
                </div>

                <!-- Nomor Telepon -->
                <div class="GrupInput">
                    <img src="" alt="" class="IkonInput">

                    <input
                        type="tel"
                        name="no_telepon"
                        placeholder="No telepon"
                        value="{{ old('no_telepon') }}"
                        autocomplete="tel"
                        required
                    >
                </div>

                <!-- Password -->
                <div class="GrupInput">
                    <img src="" alt="" class="IkonInput">

                    <input
                        type="password"
                        name="password"
                        placeholder="Password"
                        autocomplete="new-password"
                        required
                    >
                </div>

                <!-- Konfirmasi Password -->
                <div class="GrupInput">
                    <img src="" alt="" class="IkonInput">

                    <input
                        type="password"
                        name="password_confirmation"
                        placeholder="Konfirmasi password"
                        autocomplete="new-password"
                        required
                    >
                </div>

                <button type="submit" class="TombolDaftar">
                    Daftar
                </button>

            </form>

        </div>

    </div>

</body>
</html>
