<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SIAKAD') - SMK Veteran 1 Tuulungagung</title>
    @vite(['resources/css/app.css', 'resources/js/app.css'])
</head>
<body class="bg-gray-100 font-sans">
    <div class="flex min-h-screen">
        {{-- SideBar --}}
        @include('layouts.sidebar')
        {{-- Konten Utama --}}
        <div class="flex-1 flex flex-col">
            {{-- Header / Navbar --}}
            <header class="bg-white shadow-sm border-b border-gray-200">
                <div class="flex items-center justify-between px-6 py-4">
                    <h1 class="text-xl font-semibold text-gray-800">
                        @yield('header')</h1>
                        <div class="flex items-center gap-3">
                            <span class="px-2 py-1 text-xs font-medium bg-blue-100
                            text-blue-800 rounded-full">
                            {{ auth()->user()->getRoleLabel() }}
                            </span>
                            <form method="POST"  action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="text-sm-red-600 hover:text-red-800">
                                    keluar
                                </button>
                            </form>
                         </div>
                    </div>
                </header>

                {{-- Flash  Massages --}}
                <div class="px-6 pt-4">
                    @if (session('succes'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                            {{ session('succes') }}
                        </div>
                        @endif
                        @if ($errors->any())
                            <div class="bg-red-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                                <ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>
                                @endforeach</ul>
                            </div>
                        @endif
                </div>
                <main class="flex-1 p-6">@yield('content')</main>
            </div>
        </div>
    
</body>
</html>