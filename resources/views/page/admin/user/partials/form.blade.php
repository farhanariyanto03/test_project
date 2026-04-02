@php
    $editing = isset($user);
@endphp

@if ($errors->any())
    <div class="mb-6 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-red-700">
        <div class="flex items-start">
            <svg class="mr-2 mt-0.5 h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                    clip-rule="evenodd"></path>
            </svg>
            <div>
                <h3 class="font-semibold">Terdapat beberapa kesalahan:</h3>
                <ul class="mt-1 list-inside list-disc text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endif

<form action="{{ $editing ? route('admin.user.update', $user) : route('admin.user.store') }}" method="POST"
    class="space-y-6">
    @csrf
    @if ($editing)
        @method('PUT')
    @endif

    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
        <div>
            <label for="name" class="mb-2 block text-sm font-semibold text-slate-700">
                Nama Lengkap <span class="text-red-500">*</span>
            </label>
            <input type="text" name="name" id="name" value="{{ old('name', $user->name ?? '') }}"
                class="w-full rounded-xl border border-slate-300 px-4 py-2.5 transition-all focus:border-transparent focus:ring-2 focus:ring-slate-900"
                placeholder="Masukkan nama lengkap" required>
            @error('name')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="username" class="mb-2 block text-sm font-semibold text-slate-700">
                Username <span class="text-red-500">*</span>
            </label>
            <input type="text" name="username" id="username" value="{{ old('username', $user->username ?? '') }}"
                class="w-full rounded-xl border border-slate-300 px-4 py-2.5 transition-all focus:border-transparent focus:ring-2 focus:ring-slate-900"
                placeholder="Masukkan username" required>
            @error('username')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="password" class="mb-2 block text-sm font-semibold text-slate-700">
                Password {{ $editing ? '(opsional)' : '' }} @unless ($editing)
                    <span class="text-red-500">*</span>
                @endunless
            </label>
            <input type="password" name="password" id="password"
                class="w-full rounded-xl border border-slate-300 px-4 py-2.5 transition-all focus:border-transparent focus:ring-2 focus:ring-slate-900"
                placeholder="{{ $editing ? 'Kosongkan jika tidak diubah' : 'Masukkan password' }}"
                {{ $editing ? '' : 'required' }}>
            @error('password')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="role" class="mb-2 block text-sm font-semibold text-slate-700">
                Role <span class="text-red-500">*</span>
            </label>
            <select name="role" id="role"
                class="w-full rounded-xl border border-slate-300 px-4 py-2.5 transition-all focus:border-transparent focus:ring-2 focus:ring-slate-900"
                required>
                <option value="">Pilih Role</option>
                <option value="admin" {{ old('role', $user->role ?? '') === 'admin' ? 'selected' : '' }}>Admin
                </option>
                <option value="author" {{ old('role', $user->role ?? '') === 'author' ? 'selected' : '' }}>Author
                </option>
            </select>
            @error('role')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="flex items-center justify-end space-x-3 border-t border-slate-200 pt-4">
        <a href="{{ route('admin.user.index') }}"
            class="rounded-xl bg-slate-100 px-6 py-2.5 font-medium text-slate-700 transition-all hover:bg-slate-200">
            Batal
        </a>
        <button type="submit"
            class="rounded-xl bg-slate-900 px-6 py-2.5 font-medium text-white shadow-sm transition-all hover:bg-slate-800">
            {{ $editing ? 'Perbarui Data' : 'Simpan Data' }}
        </button>
    </div>
</form>
