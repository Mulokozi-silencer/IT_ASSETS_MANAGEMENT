<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>IT Asset Tracker - @yield('title')</title>
@vite(['resources/css/app.css', 'resources/js/app.js'])

 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body class="bg-gray-100 text-gray-800">
<div class="min-h-screen flex">
<!-- Sidebar -->
<aside class="w-64 bg-white border-r hidden md:block">
<div class="p-4 text-xl font-semibold">IT Asset Tracker</div>
<nav class="p-4">
<a href="{{ route('dashboard') }}" class="flex items-center gap-3 p-2 rounded hover:bg-gray-100">
<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12h18M3 6h18M3 18h18"/></svg>
Dashboard
</a>
<a href="{{ route('assets.index') }}" class="flex items-center gap-3 p-2 rounded hover:bg-gray-100 mt-2">Assets</a>
<a href="#" class="flex items-center gap-3 p-2 rounded hover:bg-gray-100 mt-2">Maintenance</a>
<a href="#" class="flex items-center gap-3 p-2 rounded hover:bg-gray-100 mt-2">Technicians</a>
<a href="#" class="flex items-center gap-3 p-2 rounded hover:bg-gray-100 mt-2">Reports</a>
</nav>
</aside>


<!-- Main content -->
<div class="flex-1">
<!-- Topbar -->
<header class="bg-white border-b p-4 flex items-center justify-between">
<div class="flex items-center gap-4">
<button class="md:hidden p-2 rounded bg-gray-100">☰</button>
<h1 class="text-lg font-semibold">@yield('page-title')</h1>
</div>
<div class="flex items-center gap-4">
<div class="relative">
<button class="p-2 rounded-full bg-gray-100">🔔</button>
</div>
<div class="flex items-center gap-2">
<div class="text-sm">{{ auth()->user() ? auth()->user()->name : 'Guest' }}</div>
<img src="https://ui-avatars.com/api/?name={{ auth()->user() ? urlencode(auth()->user()->name) : 'G' }}" class="w-8 h-8 rounded-full" alt="avatar" />
</div>
</div>
</header> 


<main class="p-6">
@yield('content')
</main>
</div>
</div>
</body>
</html>