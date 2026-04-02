<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Dashboard') - BLOG</title>

    <!-- Google Fonts - Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">

    <style>
        /* Custom DataTables Styling */
        .dataTables_wrapper .dataTables_length select,
        .dataTables_wrapper .dataTables_filter input {
            border: 1px solid #e2e8f0;
            border-radius: 0.5rem;
            padding: 0.5rem 0.75rem;
            font-size: 0.875rem;
        }

        .dataTables_wrapper .dataTables_filter input:focus {
            outline: none;
            border-color: #475569;
        }

        table.dataTable thead th {
            background-color: #f8fafc;
            font-weight: 600;
            color: #1e293b;
            border-bottom: 2px solid #e2e8f0;
        }

        table.dataTable tbody tr:hover {
            background-color: #f8fafc;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button {
            padding: 0.5rem 0.75rem;
            margin: 0 0.125rem;
            border-radius: 0.5rem;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background: #0f172a !important;
            color: white !important;
            border: 1px solid #0f172a !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background: #f1f5f9 !important;
            border: 1px solid #e2e8f0 !important;
            color: #0f172a !important;
        }
    </style>
</head>

<body class="bg-slate-50 antialiased overflow-hidden h-screen">
    @php
        $authUser = auth()->user();
        $isAdmin = $authUser?->role === 'admin';
        $isAuthor = $authUser?->role === 'author';
    @endphp

    <div class="h-screen flex flex-col">
        <!-- Header/Navbar -->
        <header class="bg-white/80 backdrop-blur-md border-b border-slate-200 z-50 shadow-sm shrink-0">
            <div class="flex items-center justify-between px-6 py-4">
                <div class="flex items-center space-x-4">
                    <button id="sidebarToggle"
                        class="lg:hidden focus:outline-none text-slate-600 hover:text-slate-900 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                    <div>
                        <h1 class="text-xl font-bold text-slate-900 tracking-tight">BLOG</h1>
                        {{-- <p class="text-xs text-slate-500 hidden sm:block">Sistem Informasi Akademik</p> --}}
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <button class="relative focus:outline-none text-slate-600 hover:text-slate-900 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                            </path>
                        </svg>
                        <span
                            class="absolute -top-1 -right-1 bg-slate-900 text-white text-xs rounded-full h-4 w-4 flex items-center justify-center font-medium text-[10px]">3</span>
                    </button>
                    <div class="h-8 w-px bg-slate-200 hidden sm:block"></div>
                    <div class="relative">
                        <button id="profileToggle" class="flex items-center space-x-3 focus:outline-none group">
                            <div class="hidden sm:block text-right">
                                <p class="text-sm font-semibold text-slate-900">{{ $authUser?->name }}</p>
                                <p class="text-xs text-slate-500">{{ $authUser?->role }}</p>
                            </div>
                            {{-- <div
                                class="w-10 h-10 bg-linear-to-br from-slate-700 to-slate-900 rounded-xl flex items-center justify-center shadow-sm group-hover:shadow-md transition-all ring-2 ring-slate-200">
                                <span class="text-sm font-bold text-white">{{ $initials ?: 'US' }}</span>
                            </div> --}}
                        </button>
                        <!-- Dropdown Profile -->
                        <div id="profileDropdown"
                            class="hidden absolute right-0 mt-3 w-56 bg-white rounded-xl shadow-xl border border-slate-200 py-2">
                            <div class="px-4 py-3 border-b border-slate-100">
                                <p class="text-sm font-semibold text-slate-900">{{ $authUser?->name }}</p>
                                <p class="text-xs text-slate-500">{{ $authUser?->username }}</p>
                            </div>
                            <a href="#"
                                class="flex items-center px-4 py-2.5 hover:bg-slate-50 transition-colors text-sm text-slate-700">
                                <svg class="w-4 h-4 mr-3 text-slate-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                Profil Saya
                            </a>
                            <a href="#"
                                class="flex items-center px-4 py-2.5 hover:bg-slate-50 transition-colors text-sm text-slate-700">
                                <svg class="w-4 h-4 mr-3 text-slate-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                Pengaturan
                            </a>
                            <hr class="my-2 border-slate-100">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="flex w-full items-center px-4 py-2.5 hover:bg-red-50 transition-colors text-sm text-red-600">
                                    <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                        </path>
                                    </svg>
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="flex flex-1 overflow-hidden h-full">
            <!-- Sidebar -->
            <aside id="sidebar"
                class="bg-white border-r border-slate-200 transform -translate-x-full lg:translate-x-0 transition-transform duration-300 fixed lg:relative inset-y-0 left-0 z-40 w-64 overflow-y-auto lg:shrink-0">
                <nav class="p-4 space-y-1 pt-20 lg:pt-4">
                    @if ($isAdmin)
                        <a href="{{ route('admin.beranda') }}"
                            class="flex items-center space-x-3 px-3 py-3 rounded-xl {{ request()->is('admin/beranda') || request()->is('admin/beranda/*') ? 'bg-slate-900 text-white shadow-sm' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }} font-medium transition-all group">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                </path>
                            </svg>
                            <span>Beranda Admin</span>
                        </a>

                        <a href="{{ route('admin.user.index') }}"
                            class="flex items-center space-x-3 px-3 py-3 rounded-xl {{ request()->is('admin/user*') ? 'bg-slate-900 text-white shadow-sm' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }} font-medium transition-all group">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                                </path>
                            </svg>
                            <span>Kelola User</span>
                        </a>
                    @elseif ($isAuthor)
                        <a href="{{ route('author.beranda') }}"
                            class="flex items-center space-x-3 px-3 py-3 rounded-xl {{ request()->is('author/beranda') || request()->is('author/beranda/*') ? 'bg-slate-900 text-white shadow-sm' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }} font-medium transition-all group">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                </path>
                            </svg>
                            <span>Beranda Author</span>
                        </a>

                        <a href="{{ route('author.post.index') }}"
                            class="flex items-center space-x-3 px-3 py-3 rounded-xl {{ request()->is('author/post*') ? 'bg-slate-900 text-white shadow-sm' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }} font-medium transition-all group">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M5 5h14v14H5zM8 9h8M8 12h8M8 15h5">
                                </path>
                            </svg>
                            <span>Kelola Post</span>
                        </a>
                    @endif
                </nav>
            </aside>

            <!-- Overlay for mobile -->
            <div id="sidebarOverlay"
                class="hidden fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-30 lg:hidden transition-opacity"></div>

            <!-- Main Content -->
            <main class="flex-1 overflow-y-auto overflow-x-hidden p-5 lg:p-8 bg-slate-50">
                @yield('content')
            </main>
        </div>
    </div>

    <!-- JavaScript untuk Toggle Sidebar & Dropdown -->
    <script>
        // Sidebar Toggle
        const sidebar = document.getElementById('sidebar');
        const sidebarToggle = document.getElementById('sidebarToggle');
        const sidebarOverlay = document.getElementById('sidebarOverlay');

        sidebarToggle?.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
            sidebarOverlay.classList.toggle('hidden');
        });

        sidebarOverlay?.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
            sidebarOverlay.classList.add('hidden');
        });

        // Profile Dropdown Toggle
        const profileToggle = document.getElementById('profileToggle');
        const profileDropdown = document.getElementById('profileDropdown');

        profileToggle?.addEventListener('click', (e) => {
            e.stopPropagation();
            profileDropdown.classList.toggle('hidden');
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', (e) => {
            if (!profileToggle?.contains(e.target) && !profileDropdown?.contains(e.target)) {
                profileDropdown?.classList.add('hidden');
            }
        });
    </script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                "language": {
                    "search": "Cari:",
                    "lengthMenu": "Tampilkan _MENU_ data per halaman",
                    "zeroRecords": "Data tidak ditemukan",
                    "info": "Menampilkan halaman _PAGE_ dari _PAGES_",
                    "infoEmpty": "Tidak ada data yang tersedia",
                    "infoFiltered": "(difilter dari _MAX_ total data)",
                    "paginate": {
                        "first": "Pertama",
                        "last": "Terakhir",
                        "next": "Selanjutnya",
                        "previous": "Sebelumnya"
                    }
                },
                "pageLength": 10,
                "ordering": true,
                "responsive": true
            });
        });
    </script>
</body>

</html>
