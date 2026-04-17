
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Job Portal</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body class="bg-[#0f172a] text-white">

  <!-- Navbar -->

  <!-- TOP HEADER -->
<div class="top-header">
  
  <!-- LEFT: SOCIAL MEDIA -->
  <div class="top-left">
    <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
    <a href="#"><i class="fa-brands fa-twitter"></i></a>
    <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
    <a href="#"><i class="fa-brands fa-instagram"></i></a>
  </div>

  <!-- RIGHT: CONTACT INFO -->
  <div class="top-right">
    <span>📞 +91 9876543210</span>
    <span>✉️ support@jobportal.com</span>
  </div>

</div>

  <header class="flex flex-wrap justify-between items-center px-6 py-5">
  
  <!-- Logo -->
  <h1 class="text-2xl font-bold text-white w-full md:w-auto" style="color:black;">
    JobPortal
  </h1>

  <!-- Menu -->
  <nav class="flex flex-wrap gap-4 mt-4 md:mt-0" style="color:black;">
    <a href="/" class="hover:text-blue-400"><i class="fa-solid fa-house"></i></a>
    <a href="/find-jobs" class="hover:text-blue-400">Find a Job</a>
    <a href="#" class="hover:text-blue-400">Companies</a>
    <!-- <a href="/admin/login" class="hover:text-blue-400">Login</a> -->
  </nav>

</header>

  @yield('content')

  <!-- Footer -->
  <footer class="main-footer">

  <div class="footer-container">

    <!-- COLUMN 1 -->
    <div class="footer-col">
      <h4>JobPortal</h4>
      <p>Find your dream job easily with thousands of opportunities from top companies.</p>
    </div>

    <!-- COLUMN 2 -->
    <div class="footer-col">
      <h5>Quick Links</h5>
      <ul>
        <li><a href="/">Home</a></li>
        <li><a href="/find-jobs">Find Jobs</a></li>
        <li><a href="#">Companies</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
    </div>

    <!-- COLUMN 3 -->
    <div class="footer-col">
      <h5>Job Categories</h5>
      <ul>
        <li><a href="#">IT Jobs</a></li>
        <li><a href="#">Marketing</a></li>
        <li><a href="#">Sales</a></li>
        <li><a href="#">Finance</a></li>
      </ul>
    </div>

    <!-- COLUMN 4 -->
    <div class="footer-col">
      <h5>Contact</h5>
      <p>📞 +91 9876543210</p>
      <p>✉️ support@jobportal.com</p>

      <div class="footer-social">
        <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
        <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
        <a href="#"><i class="fa-brands fa-twitter"></i></a>
      </div>
    </div>

  </div>

  <!-- BOTTOM BAR -->
  <div class="footer-bottom">
    <p>© 2026 JobPortal. All rights reserved.</p>
  </div>


  <script>

 document.addEventListener("keydown", function(e) {
  if (e.ctrlKey || e.metaKey) {
    // keyCode: 187 (=,+), 189 (-,_)
    if (e.keyCode === 187 || e.keyCode === 189) {
      e.preventDefault();
      document.body.style.zoom = "100%";
    }
  }
});

// Disable Ctrl + scroll zoom
window.addEventListener("wheel", function(e) {
  if (e.ctrlKey) {
    e.preventDefault();
  }
}, { passive: false });
</script>

</footer>

</body>
</html>