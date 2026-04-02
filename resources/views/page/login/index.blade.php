<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - BLOG</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-[#040b24] text-slate-100" style="font-family: 'Inter', sans-serif;">
    <section class="flex min-h-screen items-center justify-center p-6 sm:p-8">
        <div
            class="w-full max-w-md rounded-3xl border border-[#1d2f5e] bg-[#0a153a] px-6 py-7 shadow-2xl sm:px-8 sm:py-8">
            <h2 class="text-2xl font-extrabold text-white">Masuk</h2>
            <p class="mt-1 text-base text-slate-300">Masukkan username dan password Anda.</p>

            @if ($errors->any())
                <div class="mt-6 rounded-xl border border-red-500/40 bg-red-500/10 px-4 py-3 text-sm text-red-200">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('login.authenticate') }}" method="POST" class="mt-6 space-y-5">
                @csrf
                <div>
                    <label for="username" class="mb-2 block text-sm font-semibold text-white">Username</label>
                    <input type="text" id="username" name="username" value="{{ old('username') }}"
                        class="w-full rounded-xl border border-[#1d2f5e] bg-[#020a2a] px-4 py-2.5 text-base text-slate-100 placeholder-slate-500 focus:border-slate-400 focus:outline-none"
                        placeholder="Masukkan username" required autofocus>
                </div>

                <div>
                    <label for="password" class="mb-2 block text-sm font-semibold text-white">Password</label>
                    <input type="password" id="password" name="password"
                        class="w-full rounded-xl border border-[#1d2f5e] bg-[#020a2a] px-4 py-2.5 text-base text-slate-100 placeholder-slate-500 focus:border-slate-400 focus:outline-none"
                        placeholder="Masukkan password" required>
                </div>
                
                <button type="submit"
                    class="w-full rounded-xl bg-white px-4 py-2.5 text-base font-bold text-slate-900 transition hover:bg-slate-200">
                    Login
                </button>
            </form>
        </div>
    </section>
</body>

</html>
