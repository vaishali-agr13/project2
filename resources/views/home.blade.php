@extends('layouts.app')

@section('content')



<!-- Popup -->
<div id="welcomePopup" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.6); z-index:9999;">
  
  <div style="
      background:white;
      width:90%;
      max-width:500px;
      padding:35px 30px;
      border-radius:15px;
      text-align:center;
      position:absolute;
      top:50%;
      left:50%;
      transform:translate(-50%, -50%);
      color:black;
      box-shadow:0 10px 40px rgba(0,0,0,0.2);
  ">
    
    <!-- Close Button -->
    <span onclick="closePopup()" 
          style="position:absolute; top:12px; right:18px; font-size:26px; cursor:pointer; color:black;">
        &times;
    </span>

    <!-- Logo -->
    <div style="display:flex; justify-content:center; align-items:center; margin-bottom:15px;">
      <img src="{{asset('images/company-logo.png') }}" alt="Logo" style="height:90px;">
    </div>

    <!-- Title -->
    <h3 style="font-size:32px; font-weight:700; margin-bottom:10px;">
      Welcome 👋
    </h3>

    <!-- Subtitle -->
    <p style="color:gray; font-size:16px; margin-bottom:15px;">
      Welcome to our website! 🚀
    </p>

  </div>
</div>




<section class="hero">
  <div class="hero-text">
    <h2>Find Your <span>Dream Job</span> Easily</h2>
    <p>Search thousands of jobs from top companies.</p>
  
    <form action="{{ url('/find-jobs') }}" method="GET">

        <div class="search-box">
                <div class="search-item">
                    <span>🔍</span>
                    <input type="text" name="title" placeholder="Job title">
                </div>

                <div class="divider"></div>

                <div class="search-item">
                    <span>📍</span>
                    <input type="text" name="location" placeholder="Location">
                </div>

                <div class="divider"></div>

                <div class="search-item">
                    <select  name="category">
                      <option value="" disabled selected>
                          Select Category
                      </option>
                        @foreach($categories as $category)
                            <option value="{{ $category->name }}"
                                  {{ request('category') == $category->name ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                    
                        @endforeach

                    </select>
                </div>

                <button type="submit">Search</button>
        </div>

     </form>
  </div>

  <div class="hero-img">
    <img src="{{ asset('images/top-header-image.png') }}">
  </div>
</section>

<!-- Categories -->
<section class="section">
  <h3>Popular Categories</h3>
  
  <div class="grid">
    @forelse($categories as $category)
    
       <div class="card  category-card">
        <a href="{{ url('/categories/'.$category->id) }}">

        <!-- ICON -->
          <div class="category-icon">
              <i class="fas {{ !empty($category->icon) ? $category->icon : 'fa-folder' }}"></i>
          </div>
         <p style="font-weight: bold;"> {{$category->name}}</p>

          <p style="color:grey"> {{$category->jobs_count}} Jobs Avilaible </p>
       </a>
       </div>
    
     @empty
    @endforelse
  </div>
</section>

<section class="job-section">
  <div class="container">
    
    <!-- LEFT CONTENT -->
    <div class="left-content">
      <h2>Explore Job Opportunities in <br> Popular Roles</h2>
      
      <p>
        Explore top job opportunities in popular roles across various industries.
        Find the perfect fit for your skills and ambitions, and take the next step
        in your career today.
      </p>

      <a href="/find-jobs" class="btn-explore">Explore Jobs</a>
    </div>

    <!-- RIGHT IMAGE -->
    <div class="right-image">
      <img src="{{ asset('images/job-seekers.webp') }}" alt="job illustration">
    </div>

  </div>
</section>


<section class="section">
  <h3>Jobs of the Day</h3>

  <div class="grid">


   @forelse($featuredJobs as $job)
            <div class="card job-card category-card">
                    <img src="{{ asset('images/company-default-logo.svg') }}" class="company-logo">
                    <h4>{{ $job->title }}</h4>
                    <p>{{ $job->company_name }}</p>
                    <p>{{ $job->location }}</p>

                   <a href="{{ route('jobs.show', $job->id) }}" class="block mt-4">
                        <button class="apply-btn">View Details →</button>    
                    </a>

                    <div class="bottom-row">
                        <div class="share-icons">
                            <a href="https://wa.me/?text={{ urlencode($job->title . ' ' . route('jobs.show', $job->id)) }}" target="_blank">
                                <i class="fab fa-whatsapp"></i>
                            </a>

                            <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(route('jobs.show', $job->id)) }}" target="_blank">
                                <i class="fab fa-linkedin"></i>
                            </a>
                        </div>

                        @php
                           if (!function_exists('formatSalary')) {
                                function formatSalary($amount) {
                                    if ($amount >= 100000) {
                                        return round($amount / 100000) . ' LPA';
                                    } elseif ($amount >= 1000) {
                                        return round($amount / 1000) . 'k';
                                    }
                                    return $amount;
                                }   
                            }
                        @endphp

                        <div class="salary">
                            ₹ {{ formatSalary($job->salary_min) }} - ₹{{ formatSalary($job->salary_max) }}
                        </div>
                    </div>

                    
          </div>

           
        @empty
   @endforelse
  </div>
</section>


<section class="counter-section">

<h3 class="counter-heading">Our Platform in Numbers</h3>
  <p class="counter-subtext">Trusted by thousands of job seekers and companies</p>
    <div class="counter-wrapper">
          <div class="counter-box">
            <h2>9350+</h2>
            <p>Jobs Available</p>
          </div>

          <div class="counter-box">
            <h2>1670+</h2>
            <p>Companies</p>
          </div>

          <div class="counter-box">
            <h2>27000+</h2>
            <p>Candidates</p>
          </div>

          <div class="counter-box">
            <h2>7121+</h2>
            <p>Jobs Placements </p>
          </div>
     </div>
</section>

<section class="section">
  <div class="job-alert-container">

    <!-- LEFT CONTENT -->
    <div class="job-alert-left">
      <h2>Never miss out <span style="color: #661e92">on the latest career</span> opportunities</h2>
      
      <p>
        Get daily alerts and stay ahead!
      </p>

      <div class="job-alert-form">
        <input type="email" placeholder="Enter your email">
        <button>Subscribe</button>
      </div>
    </div>

    <!-- RIGHT IMAGE -->
    <div class="job-alert-right">
      <img src="{{ asset('images/job-alert.png') }}" alt="job alert">
    </div>

  </div>
</section>




<!-- Companies -->
<section class="section">
  <h3>Top Companies Hiring</h3>
  <div class="grid">
    <div class="card category-card">
      <img src="{{ asset('images/Google_logo.svg') }}" class="company-logo">
      <h4>Google</h4>
      <p style="color:grey">Software Engineer</p>
    </div>
    <div class="card category-card">
      <img src="{{ asset('images/Amazon_logo.svg') }}" class="company-logo">
      <h4>Amazon</h4>
      <p style="color:grey">Backend Developer</p>
    </div>
    <div class="card category-card">
      <img src="{{ asset('images/Microsoft_logo.svg') }}" class="company-logo">
      <h4>Microsoft</h4>
      <p style="color:grey">UI/UX Designer</p>
    </div>
    <div class="card category-card">
      <img src="{{ asset('images/vipdigitalhub.jpg') }}" class="company-logo">
      <h4>VIP DIgital Hub</h4>
      <p style="color:grey">Laravel Developer</p>
    </div>
    <div class="card category-card">
      <img src="{{ asset('images/Tech_Mahindra-Logo.png') }}" class="company-logo">
      <h4>Tech Mahindra</h4>
      <p style="color:grey">Java Developer</p>
    </div>
    <div class="card category-card">
      <img src="{{ asset('images/softobiz.jpg') }}" class="company-logo">
      <h4>Softobiz Technology</h4>
      <p style="color:grey">Python Developerr</p>
    </div>
    <div class="card category-card">
      <img src="{{ asset('images/impetus.png') }}" class="company-logo">
      <h4>Impetus</h4>
      <p style="color:grey">Angular Developer</p>
    </div>
    <div class="card category-card">
      <img src="{{ asset('images/cis.jpg') }}" class="company-logo">
      <h4>CIS</h4>
      <p style="color:grey">Website Designer</p>
    </div>
    <div class="card category-card">
      <img src="{{ asset('images/synapseindia.jpeg') }}" class="company-logo">
      <h4>Synapse India</h4>
      <p style="color:grey">Mern Stack Developer</p>
    </div><div class="card category-card">
      <img src="{{ asset('images/ondoor.png') }}" class="company-logo">
      <h4>Ondoor Concepts</h4>
      <p style="color:grey">Azure Developer</p>
    </div>

  </div>
</section>

<section class="how-section">
  <h3>How It Works</h3>

  <div class="how-container">

      <div class="how-card">
        <div class="step">01</div>
        <div class="icon">👤</div>
        <h4>Create Account</h4>
        <p>Sign up and build your profile to get started with your job search.</p>
      </div>

      <div class="how-card">
        <div class="step">02</div>
        <div class="icon">🔍</div>
        <h4>Search Jobs</h4>
        <p>Find jobs that match your skills, interests, and location easily.</p>
      </div>

      <div class="how-card">
        <div class="step">03</div>
        <div class="icon">🚀</div>
        <h4>Apply & Get Hired</h4>
        <p>Apply to jobs and connect with employers to land your dream role.</p>
      </div>

  </div>
</section>


<section class="reviews-section">
  <h2>What Candidates Say</h2>

  <div class="reviews-container">

    <div class="review-card">
      <img src="https://i.pravatar.cc/80?img=1" alt="user">
      <h4>Riya Sharma</h4>
      <p class="role">Frontend Developer</p>
      <p class="review-text">
        "This platform helped me land my first job within 2 weeks. The process was smooth and easy!"
      </p>
      <div class="stars">★★★★★</div>
    </div>

    <div class="review-card">
      <img src="https://i.pravatar.cc/80?img=2" alt="user">
      <h4>Aman Verma</h4>
      <p class="role">Backend Developer</p>
      <p class="review-text">
        "Great experience! The job listings are genuine and updated regularly."
      </p>
      <div class="stars">★★★★☆</div>
    </div>

    <div class="review-card">
      <img src="https://i.pravatar.cc/80?img=3" alt="user">
      <h4>Neha Gupta</h4>
      <p class="role">UI/UX Designer</p>
      <p class="review-text">
        "Loved the UI and filters. Found a perfect remote job easily!"
      </p>
      <div class="stars">★★★★★</div>
    </div>

    <div class="review-card">
      <img src="https://i.pravatar.cc/80?img=3" alt="user">
      <h4>Kirti Agrawal</h4>
      <p class="role">Java Developer</p>
      <p class="review-text">
        "Loved the UI and filters. Found a perfect remote job easily!"
      </p>
      <div class="stars">★★★★★</div>
    </div>

  </div>
</section>

<section class="advice-section">
  <h3>Career Advice & Resources</h3>

  <div class="advice-container">

    <!-- Card 1 -->
    <div class="advice-card">
      <img src="{{ asset('images/photo1.jpg') }}" alt="Resume Tips">
      <div class="advice-content">
        <h4>How to Build a Strong Resume</h4>
        <p>Learn how to create a resume that stands out to recruiters.</p>
        <a href="#">Read More →</a>
      </div>
    </div>

    <!-- Card 2 -->
    <div class="advice-card">
      <img src="{{ asset('images/photo2.jpg') }}" alt="Interview Tips">
      <div class="advice-content">
        <h4>Top Interview Tips</h4>
        <p>Prepare confidently and crack your next interview easily.</p>
        <a href="#">Read More →</a>
      </div>
    </div>

    <!-- Card 3 -->
    <div class="advice-card">
      <img src="{{ asset('images/photo3.jpg') }}" alt="Career Growth">
      <div class="advice-content">
        <h4>Career Growth Strategies</h4>
        <p>Boost your career with smart planning and skill development.</p>
        <a href="#">Read More →</a>
      </div>
    </div>

  </div>
</section>

@endsection

<script>
window.onload = function() {
    document.getElementById('welcomePopup').style.display = 'block';
};

function closePopup() {
    document.getElementById('welcomePopup').style.display = 'none';
}
</script>