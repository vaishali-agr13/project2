
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Job Portal</title>
  <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body class="bg-[#0f172a] text-white">

  <!-- Navbar -->
  <header class="flex justify-between items-center px-10 py-5">
    <h1 class="text-2xl font-bold text-white">JobPortal</h1>
    <nav class="space-x-6">
      <a href="/" class="hover:text-blue-400">Home</a>
      <a href="/find-jobs" class="hover:text-blue-400">Find a Job</a>
      <a href="#" class="hover:text-blue-400">Companies</a>
      <a href="#" class="hover:text-blue-400">Login</a>
    </nav>
  </header>

  @yield('content')

  <!-- Footer -->
  <footer class="text-center py-6 bg-[#020617]">
    <p class="text-gray-400">© 2026 JobPortal. All rights reserved.</p>
  </footer>

</body>
</html>