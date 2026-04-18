
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
    <a href="https://www.facebook.com/share/1AjicM8ZoD"><i class="fa-brands fa-facebook-f"></i></a>
    <a href="https://x.com/"><i class="fa-brands fa-twitter"></i></a>
    <a href="https://www.linkedin.com"><i class="fa-brands fa-linkedin-in"></i></a>
    <a href="https://www.instagram.com/rjindiajobs?utm_source=qr&igsh=MWpxZTd2aGc3YTk1ZA=="><i class="fa-brands fa-instagram"></i></a>
  </div>

  <!-- RIGHT: CONTACT INFO -->
  <div class="top-right">
    <span>
      <a href="https://wa.me/919876543210" target="_blank">
           <i class="fa-brands fa-whatsapp"></i> +91 9876543210
      </a>
     </span>
    <span>
       <a href="https://mail.google.com/mail/?view=cm&fs=1&to=support@jobportal.com" target="_blank">
           <i class="fa-regular fa-envelope"></i> support@jobportal.com
       </a>
    </span>
  </div>

</div>

  <header class="flex justify-between items-center px-6 py-3">
  
  <!-- Logo -->
  <h1 class="text-white" style="color:black;">
    <a href="/">
        <img src="{{ asset('images/company-logo.png') }}"  class="company_logo"  alt="Resume Tips">
    </a>
  </h1>

  <!-- Menu -->
  <nav class="flex items-center gap-6" style="color:black;">
    <a href="/" class="hover:text-blue-400"><i class="fa-solid fa-house"></i></a>
    <a href="/find-jobs" class="hover:text-blue-400">Find a Job</a>
    <a href="#" class="hover:text-blue-400">Companies</a>
    <a href="/about" class="hover:text-blue-400">About</a>
    <a href="/services" class="hover:text-blue-400">Services</a>
    <a href="/privacy-policy" class="hover:text-blue-400">Privacy Policy</a>
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
        <a href="https://www.facebook.com/"><i class="fa-brands fa-facebook-f"></i></a>
        <a href="https://www.linkedin.com/"><i class="fa-brands fa-linkedin-in"></i></a>
        <a href="https://x.com/"><i class="fa-brands fa-twitter"></i></a>
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