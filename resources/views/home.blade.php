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
    
       <div class="card">
         <p> {{$category->name}}</p>

          <p> {{$category->jobs_count}} Jobs Avilaible </p>
       </div>
    
     @empty
    @endforelse
  </div>
</section>


<section class="section">
  <h3>Jobs of the Day</h3>

  <div class="grid">


   @forelse($featuredJobs as $job)
            <div class="card job-card">
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


<!-- Companies -->
<section class="section dark">
  <h3>Top Companies Hiring</h3>
  <div class="grid">
    <div class="card">
      <h4>Google</h4>
      <p>Software Engineer</p>
    </div>
    <div class="card">
      <h4>Amazon</h4>
      <p>Backend Developer</p>
    </div>
    <div class="card">
      <h4>Microsoft</h4>
      <p>UI/UX Designer</p>
    </div>
  </div>
</section>

@endsection

