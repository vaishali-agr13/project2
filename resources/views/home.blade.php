@extends('layouts.app')

@section('content')

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
         <p style="font-weight: bold;"> {{$category->name}}</p>

          <p style="color:grey"> {{$category->jobs_count}} Jobs Avilaible </p>
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

      <a href="#" class="btn-explore">Explore Jobs</a>
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
            <h4>{{ $job->title }}</h4>
            <p>{{ $job->company_name }}</p>
            <p>{{ $job->location }}</p>
            
            <a href="{{ route('jobs.show', $job->id) }}" class="block mt-4 text-blue-500 font-semibold hover:text-blue-700 transition">
                <button class="apply-btn">View Details →</button>    
            </a>
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
            <h2>20+</h2>
            <p>Jobs Available</p>
          </div>

          <div class="counter-box">
            <h2>20+</h2>
            <p>Companies</p>
          </div>

          <div class="counter-box">
            <h2>20+</h2>
            <p>Candidates</p>
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
      <img src="{{ asset('images/job-alert.webp') }}" alt="job alert">
    </div>

  </div>
</section>




<!-- Companies -->
<section class="section">
  <h3>Top Companies Hiring</h3>
  <div class="grid">
    <div class="card category-card">
      <h4>Google</h4>
      <p style="color:grey">Software Engineer</p>
    </div>
    <div class="card category-card">
      <h4>Amazon</h4>
      <p style="color:grey">Backend Developer</p>
    </div>
    <div class="card category-card">
      <h4>Microsoft</h4>
      <p style="color:grey">UI/UX Designer</p>
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

