@extends('page.layout.index')

@section('title', 'Data Post')

@section('content')
    <div class="space-y-6">
        @if (session('success'))
            <div id="alert-success"
                class="flex items-start rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-emerald-700">
                <svg class="mr-3 mt-0.5 h-5 w-5 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                        clip-rule="evenodd"></path>
                </svg>
                <div class="flex-1">
                    <h3 class="font-semibold">Berhasil!</h3>
                    <p class="mt-0.5 text-sm">{{ session('success') }}</p>
                </div>
                <button onclick="document.getElementById('alert-success').remove()"
                    class="text-emerald-700 hover:text-emerald-900 ml-3">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        @endif

        @if (session('error'))
            <div id="alert-error"
                class="flex items-start rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-red-700">
                <svg class="mr-3 mt-0.5 h-5 w-5 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                        clip-rule="evenodd"></path>
                </svg>
                <div class="flex-1">
                    <h3 class="font-semibold">Gagal!</h3>
                    <p class="mt-0.5 text-sm">{{ session('error') }}</p>
                </div>
                <button onclick="document.getElementById('alert-error').remove()"
                    class="text-red-700 hover:text-red-900 ml-3">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        @endif

        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h2 class="text-2xl font-bold text-slate-900">Data Post</h2>
                <p class="mt-1 text-sm text-slate-500">Kelola postingan author</p>
            </div>
            <a href="{{ route('author.post.create') }}"
                class="inline-flex items-center rounded-xl bg-slate-900 px-4 py-2.5 font-medium text-white shadow-sm transition-all hover:bg-slate-800 hover:shadow-md">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                    </path>
                </svg>
                Tambah Post
            </a>
        </div>

        <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
            <div class="p-6">
                <div class="overflow-x-auto">
                    <table id="myTable" class="w-full display">
                        <thead>
                            <tr>
                                <th class="text-left">No</th>
                                <th class="text-left">Judul</th>
                                <th class="text-left">Author</th>
                                <th class="text-left">Gambar</th>
                                <th class="text-left">Tanggal</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="font-semibold text-slate-900">{{ $post->title }}</td>
                                    <td class="text-slate-600">{{ $post->user->name ?? '-' }}</td>
                                    <td>
                                        @if ($post->content)
                                            <img src="{{ asset($post->content) }}" alt="{{ $post->title }}"
                                                class="h-14 w-20 rounded-lg object-cover border border-slate-200">
                                        @else
                                            <span class="text-xs text-slate-400">-</span>
                                        @endif
                                    </td>
                                    <td class="text-slate-600">
                                        {{ \Illuminate\Support\Carbon::parse($post->date)->format('d M Y H:i') }}</td>
                                    <td class="text-center">
                                        <div class="flex items-center justify-center gap-2">
                                            <a href="{{ route('author.post.edit', $post) }}"
                                                class="inline-flex items-center rounded-lg border border-amber-200 bg-amber-50 px-3 py-1.5 text-sm font-medium text-amber-700 transition-colors hover:bg-amber-100">
                                                <svg class="mr-1 h-4 w-4" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                    </path>
                                                </svg>
                                                Edit
                                            </a>

                                            <form action="{{ route('author.post.destroy', $post) }}" method="POST"
                                                class="delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="delete-btn inline-flex items-center rounded-lg border border-red-200 bg-red-50 px-3 py-1.5 text-sm font-medium text-red-700 transition-colors hover:bg-red-100"
                                                    data-nama="{{ $post->title }}">
                                                    <svg class="mr-1 h-4 w-4" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                        </path>
                                                    </svg>
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        setTimeout(function() {
            const successAlert = document.getElementById('alert-success');
            const errorAlert = document.getElementById('alert-error');

            if (successAlert) {
                successAlert.style.transition = 'opacity 0.5s';
                successAlert.style.opacity = '0';
                setTimeout(() => successAlert.remove(), 500);
            }

            if (errorAlert) {
                errorAlert.style.transition = 'opacity 0.5s';
                errorAlert.style.opacity = '0';
                setTimeout(() => errorAlert.remove(), 500);
            }
        }, 5000);

        document.querySelectorAll('.delete-form').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                const nama = this.querySelector('.delete-btn').getAttribute('data-nama');

                if (confirm(
                        `Apakah Anda yakin ingin menghapus post "${nama}"?\n\nData yang dihapus tidak dapat dikembalikan!`
                    )) {
                    this.submit();
                }
            });
        });
    </script>
@endsection
