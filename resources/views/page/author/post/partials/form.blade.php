@php
    $editing = isset($post);
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

<form action="{{ $editing ? route('author.post.update', $post) : route('author.post.store') }}" method="POST"
    enctype="multipart/form-data" class="space-y-6">
    @csrf
    @if ($editing)
        @method('PUT')
    @endif

    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
        <div>
            <label for="title" class="mb-2 block text-sm font-semibold text-slate-700">
                Judul Post <span class="text-red-500">*</span>
            </label>
            <input type="text" name="title" id="title" value="{{ old('title', $post->title ?? '') }}"
                class="w-full rounded-xl border border-slate-300 px-4 py-2.5 transition-all focus:border-transparent focus:ring-2 focus:ring-slate-900"
                placeholder="Masukkan judul post" required>
            @error('title')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="date" class="mb-2 block text-sm font-semibold text-slate-700">
                Tanggal Publish <span class="text-red-500">*</span>
            </label>
            <input type="datetime-local" name="date" id="date"
                value="{{ old('date', $editing ? \Illuminate\Support\Carbon::parse($post->date)->format('Y-m-d\TH:i') : '') }}"
                class="w-full rounded-xl border border-slate-300 px-4 py-2.5 transition-all focus:border-transparent focus:ring-2 focus:ring-slate-900"
                required>
            @error('date')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="content" class="mb-2 block text-sm font-semibold text-slate-700">
                Gambar {{ $editing ? '(opsional)' : '' }}
                @unless ($editing)
                    <span class="text-red-500">*</span>
                @endunless
            </label>
            <input type="file" name="content" id="content" accept="image/*"
                class="w-full rounded-xl border border-slate-300 px-4 py-2.5 transition-all focus:border-transparent focus:ring-2 focus:ring-slate-900"
                {{ $editing ? '' : 'required' }}>
            @error('content')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror

            @if ($editing && !empty($post->content))
                <div class="mt-3">
                    <p class="mb-2 text-xs text-slate-500">Gambar saat ini:</p>
                    <img src="{{ asset($post->content) }}" alt="{{ $post->title }}"
                        class="h-28 w-40 rounded-lg border border-slate-200 object-cover">
                </div>
            @endif
        </div>
    </div>

    <div class="flex items-center justify-end space-x-3 border-t border-slate-200 pt-4">
        <a href="{{ route('author.post.index') }}"
            class="rounded-xl bg-slate-100 px-6 py-2.5 font-medium text-slate-700 transition-all hover:bg-slate-200">
            Batal
        </a>
        <button type="submit"
            class="rounded-xl bg-slate-900 px-6 py-2.5 font-medium text-white shadow-sm transition-all hover:bg-slate-800">
            {{ $editing ? 'Perbarui Post' : 'Simpan Post' }}
        </button>
    </div>
</form>
