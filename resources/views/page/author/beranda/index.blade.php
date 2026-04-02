@extends('page.layout.index')

@section('title', 'Dashboard Author')

@section('content')
    <div class="space-y-6">
        <!-- Welcome Section -->
        <div
            class="relative overflow-hidden bg-linear-to-br from-slate-800 via-slate-900 to-slate-900 rounded-2xl shadow-xl p-8">
            <div class="relative z-10">
                <div class="flex items-start justify-between">
                    <div>
                        <h2 class="text-3xl font-bold text-white mb-2">Selamat Datang Author</h2>
                    </div>
                    <div class="hidden sm:block">
                        <div class="w-20 h-20 bg-white/10 backdrop-blur-sm rounded-2xl flex items-center justify-center">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                </path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <div class="absolute top-0 right-0 -mt-20 -mr-20 w-64 h-64 bg-white/5 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 left-0 -mb-20 -ml-20 w-64 h-64 bg-white/5 rounded-full blur-3xl"></div>
        </div>
    </div>
@endsection
