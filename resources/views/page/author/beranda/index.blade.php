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

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
            <!-- Card 1: Total Mahasiswa -->
            <div
                class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 hover:shadow-md transition-all duration-200">
                <div class="flex items-start justify-between mb-4">
                    <div class="w-12 h-12 bg-slate-100 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                            </path>
                        </svg>
                    </div>
                </div>
                <div>
                    <p class="text-slate-500 text-sm font-medium mb-1">Total Mahasiswa</p>
                    <h3 class="text-3xl font-bold text-slate-900 mb-2">1,245</h3>
                    <div class="flex items-center text-sm">
                        <span
                            class="inline-flex items-center px-2 py-0.5 rounded-md bg-emerald-50 text-emerald-700 font-medium">
                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
                            </svg>
                            5%
                        </span>
                        <span class="ml-2 text-slate-500">dari bulan lalu</span>
                    </div>
                </div>
            </div>

            <!-- Card 2: Total Dosen -->
            <div
                class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 hover:shadow-md transition-all duration-200">
                <div class="flex items-start justify-between mb-4">
                    <div class="w-12 h-12 bg-slate-100 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                    </div>
                </div>
                <div>
                    <p class="text-slate-500 text-sm font-medium mb-1">Total Dosen</p>
                    <h3 class="text-3xl font-bold text-slate-900 mb-2">87</h3>
                    <div class="flex items-center text-sm">
                        <span
                            class="inline-flex items-center px-2 py-0.5 rounded-md bg-emerald-50 text-emerald-700 font-medium">
                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
                            </svg>
                            2%
                        </span>
                        <span class="ml-2 text-slate-500">dari bulan lalu</span>
                    </div>
                </div>
            </div>

            <!-- Card 3: Mata Kuliah -->
            <div
                class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 hover:shadow-md transition-all duration-200">
                <div class="flex items-start justify-between mb-4">
                    <div class="w-12 h-12 bg-slate-100 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                            </path>
                        </svg>
                    </div>
                </div>
                <div>
                    <p class="text-slate-500 text-sm font-medium mb-1">Mata Kuliah</p>
                    <h3 class="text-3xl font-bold text-slate-900 mb-2">156</h3>
                    <div class="flex items-center text-sm">
                        <span class="text-slate-900 font-medium">32</span>
                        <span class="ml-1 text-slate-500">aktif semester ini</span>
                    </div>
                </div>
            </div>

            <!-- Card 4: Kelas Aktif -->
            <div
                class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 hover:shadow-md transition-all duration-200">
                <div class="flex items-start justify-between mb-4">
                    <div class="w-12 h-12 bg-slate-100 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                    </div>
                </div>
                <div>
                    <p class="text-slate-500 text-sm font-medium mb-1">Kelas Aktif</p>
                    <h3 class="text-3xl font-bold text-slate-900 mb-2">48</h3>
                    <div class="flex items-center text-sm">
                        <span class="text-slate-900 font-medium">8</span>
                        <span class="ml-1 text-slate-500">kelas hari ini</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
