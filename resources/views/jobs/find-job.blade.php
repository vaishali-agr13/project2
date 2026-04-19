@extends('layouts.app')
@section('content')

<div class="jobs-hero">
  <!-- Hero Text -->
  <div class="hero-content header-text">
    <h1>The official <span class="highlight">IT Jobs</span> site</h1>
    <p>“JobBox is our first stop whenever we're hiring a PHP role. We've hired 10 PHP developers in the last few years, all thanks to JobBox.” — Andrew Hall, Elite JSC.</p>
  </div>
        <form action="{{ url('/find-jobs') }}" method="GET">
                           
                <!-- Search Box -->
          <div class="search-box">
          
              <div class="search-item">
                  <span>🔍</span>
                  <input type="text" name="title" value="{{ request('title') }}" placeholder="Job title">
              </div>

              <div class="divider"></div>

              <div class="search-item">
                  <span>📍</span>
                  <input type="text" name="location" value="{{ request('location') }}" placeholder="Location" value="">
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
  <!-- Categories -->
  <div class="categories">

  @foreach($categories as $category)
        <a href="{{ url('/categories/'.$category->id) }}">

            <div class="category-box">
            
            <div class="category-info">
                <p>{{$category->name}}</p>
                <span>{{$category->jobs_count}} Jobs Available</span>
            </div>
            
            </div>
        </a>
    @endforeach
  </div>

  
</div>

<div class="jobs-page">

  <!-- LEFT SIDEBAR (SEPARATE FORM) -->
  <aside class="filters">

    <form method="GET" action="{{ url('/find-jobs') }}">

      <h3>All Filters</h3>

      <!-- Job Type -->
      <div class="filter-group">
        <h4>Job Type</h4>
        <label>
          <input type="checkbox" name="job_type[]" value="Full-Time"
          {{ in_array('Full-Time', request('job_type', [])) ? 'checked' : '' }}>
         <span>Full Time</span>
        </label>

        <label>
          <input type="checkbox" name="job_type[]" value="Part-Time"
          {{ in_array('Part-Time', request('job_type', [])) ? 'checked' : '' }}>
          <span>Part Time</span>
        </label>

        
      </div>

      <!-- Location -->
      <div class="filter-group">
        <h4>Location</h4>
        <label>
          <input type="checkbox" name="locations[]" value="Delhi"
          {{ in_array('Delhi', request('locations', [])) ? 'checked' : '' }}>
          <span>Delhi</span>
        </label>

        <label>
          <input type="checkbox" name="locations[]" value="Mumbai"
          {{ in_array('Mumbai', request('locations', [])) ? 'checked' : '' }}>
        <span>Mumbai</span>
        </label>

         <label>
          <input type="checkbox" name="locations[]" value="Pune"
          {{ in_array('Pune', request('locations', [])) ? 'checked' : '' }}>
          <span>Pune</span>
        </label>
         <label>
          <input type="checkbox" name="locations[]" value="Hyderabad"
          {{ in_array('Hyderabad', request('locations', [])) ? 'checked' : '' }}>
          <span>Hyderabad</span>
        </label>
         <label>
          <input type="checkbox" name="locations[]" value="Noida"
          {{ in_array('Noida', request('locations', [])) ? 'checked' : '' }}>
          <span>Noida</span>
        </label>

         <label>
          <input type="checkbox" name="locations[]" value="Bengaluru"
          {{ in_array('Bengaluru', request('locations', [])) ? 'checked' : '' }}>
          <span>Bengaluru</span>
        </label>

        
         <label>
          <input type="checkbox" name="locations[]" value="Indore"
          {{ in_array('Indore', request('locations', [])) ? 'checked' : '' }}>
          <span>Indore</span>
        </label>
        
         <label>
          <input type="checkbox" name="locations[]" value="Bhopal"
          {{ in_array('Bhopal', request('locations', [])) ? 'checked' : '' }}>
          <span>Bhopal</span>
        </label>

      </div>

      <!-- Salary -->
      <div class="filter-group">
        <h4>Salary</h4>
        <label>
          <input type="radio" name="salary" value="0-3"
          {{ request('salary') == '0-3' ? 'checked' : '' }}>
          <span>0-3 LPA</span>
        </label>

        <label>
          <input type="radio" name="salary" value="3-6"
          {{ request('salary') == '3-6' ? 'checked' : '' }}>
         <span>3-6 LPA</span>
        </label>
        <label>
          <input type="radio" name="salary" value="6-10"
          {{ request('salary') == '6-10' ? 'checked' : '' }}>
         <span>6-10 LPA</span>
        </label>
        <label>
          <input type="radio" name="salary" value="10-15"
          {{ request('salary') == '10-15' ? 'checked' : '' }}>
         <span>10-15 LPA</span>
        </label>

      </div>

      <!-- Buttons -->
      <button type="submit" class="filter-btn">Apply Filters</button>

      <a href="{{ url('/find-jobs') }}" class="clear-btn">Clear All</a>

    </form>

  </aside>


  <!-- RIGHT JOB LIST -->
  <main class="job-listing">

    @forelse($jobs as $job)
      <div class="job-card">

        <div class="job-header">
          <img src="{{ asset('images/company-default-logo.svg') }}" class="company-logo">

          <div class="job-company">
            <h3>{{$job->company_name}}</h3>
            <p>{{$job->location}}</p>
          </div>
        </div>

        <div class="job-title">
          <h2>{{$job->title}}</h2>
          <p>{{$job->job_type}} • 1 year ago</p>
        </div>

        <div class="job-description">
          {{$job->description}}
        </div>

        <div class="job-footer">
          <p class="salary">₹{{ $job->salary_min }} - ₹{{ $job->salary_max }} </p>

          <a href="{{ url('/jobs/'.$job->id) }}" class="apply-btn">
            View Details
          </a>
        </div>

      </div>
    @empty
    <div style="width:100%; text-align:center; padding:40px;">
      <h2 style="color:#444;">No Jobs Found</h2>
      <p style="color:gray;">Try changing filters or search keyword</p>
    </div>
   @endforelse

  </main>

</div>

@endsection

<style>
    /* Hero Section */
.jobs-hero {
  background-color: #e7f3fd;
  padding: 60px 20px;
  text-align: center;
  color: #00395b;

  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 30px;   /* IMPORTANT */
}

.jobs-hero .hero-content h1 {
  font-size: 2.5rem;
  margin-bottom: 15px;
}

.jobs-hero .hero-content .highlight {
  color: #6c1e96;
}

.jobs-hero .hero-content p {
  font-size: 1rem;
  max-width: 700px;
  margin: 0 auto 40px;
}



/* Search Box */
.search-box {
 display: flex;
  align-items: center;
  gap: 10px;

  width: 100%;
  max-width: 800px;

  background: #fff;
  border-radius: 50px;
  padding: 10px 15px;

  box-shadow: 0 5px 20px rgba(0,0,0,0.1);
  position: relative;
  z-index: 2;
}

.divider {
  width: 1px;
  height: 25px;
  background: #ddd;
}

.search-box select,
.search-box input {
  width: 100%;
  height: 40px;   /* IMPORTANT FIX */
  padding: 0 10px;
  border: none;
  outline: none;
  font-size: 14px;
  color: #000;
  background: transparent;
}

.search-box,
.categories {
  position: relative;
}

.search-box input {
  flex: 1;
}

.search-box button {
  padding: 0 20px;
  border: none;
  border-radius: 10px;
  background-color: #fff;
  color: #3b59ff;
  font-weight: bold;
  cursor: pointer;
  height: 100%;
}

/* Categories */
.categories {
  display: flex;
  justify-content: center;
  gap: 20px;
  flex-wrap: wrap;

  margin-top: 20px;   /* IMPORTANT */
  position: relative;
  z-index: 1;
}

.category-box {
  background-color: #fff;
  color: #000;
  width: 180px;
  border-radius: 15px;
  padding: 20px;
  display: flex;
  align-items: center;
  gap: 10px;
  cursor: pointer;
  transition: 0.3s;
}

.category-box:hover {
  transform: translateY(-5px);
  box-shadow: 0 5px 15px rgba(0,0,0,0.2);
}

.category-box i {
  font-size: 2rem;
  color: #3b59ff;
}

.category-info p {
  margin: 0;
  font-weight: bold;
}

.category-info span {
  font-size: 0.85rem;
  color: #666;
}

/* Header Text */
.header-text {
  text-align: center;
  margin: 20px 0;
  font-size: 18px;
  font-weight: 500;
  color: #00395b;
}



/* Page Layout */
.jobs-page {
  display: flex;
  gap: 20px;
  padding: 20px;
    align-items: flex-start;   /* 🔥 YE ADD KARO */

}

/* Sidebar */
.filters {
 width: 250px;
  background: #fff;
  padding: 20px;
  border-radius: 10px;
  height: fit-content;
  box-shadow: 0 2px 10px rgba(0,0,0,0.08);
  position: sticky;
  top: 20px;
}

.filter-group {
  margin-bottom: 20px;
}

.filter-group h4 {
  font-size: 16px;
  margin-bottom: 10px;
}

.filter-group label {
   display: flex;
  align-items: center;
  gap: 8px;
  margin-bottom: 8px;
  font-size: 14px;
}

.filters h3,
.filters h4 {
  color: #1a3d7c;
}

.filter-group input {
  margin: 0;
}

.filter-group input[type="checkbox"],
.filter-group input[type="radio"] {
  width: 16px;
  height: 16px;
}

.filters input {
  width: 100%;
  padding: 8px;
  margin-bottom: 15px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

.filters ul {
  list-style: none;
  padding: 0;
}

.filters ul li {
  padding: 5px 0;
  color: #555;
}

/* Job Listing */
.job-listing {
  flex: 1;
  display: grid;
  grid-template-columns: repeat(2, 1fr);  /* 🔥 2 cards per row */
  gap: 20px;
  margin: 20px;

}

/* Job Card */
.job-card {
  background-color: #f3f6fb;
  border: 1px solid #1a3d7c;
  border-radius: 10px;
  padding: 20px;
  box-shadow: 0 3px 6px rgba(0,0,0,0.08);
}

/* Job Header */
.job-header {
  display: flex;
  align-items: center;
  gap: 15px;
  margin-bottom: 10px;
}

.company-logo {
  width: 52px;
  height: 52px;
  border-radius: 5px;
}

/* Company Info */
.job-company h3 {
  margin: 0;
  font-size: 18px;
  color: #1a3d7c;
}

.job-company p {
  margin: 0;
  font-size: 14px;
  color: #555;
}

/* Title */
.job-title h2 {
  margin: 10px 0 5px;
  font-size: 20px;
  color: #1a3d7c;
}

.job-title p {
  margin: 0;
  font-size: 14px;
  color: #777;
}

/* Description */
.job-description {
  margin: 10px 0;
  font-size: 15px;
  color: #333;
}

/* Footer */
.job-footer {
  display: flex;
  justify-content: space-between;
  align-items: center;
  flex-wrap: wrap;
}

.salary {
  font-weight: bold;
  color: #1a3d7c;
}

.skills span {
  background-color: #dde9ff;
  padding: 5px 10px;
  border-radius: 5px;
  margin-right: 5px;
  font-size: 13px;
  color: #1a3d7c;
}

/* Button */
.apply-btn {
  background-color: #1a3d7c;
  color: #fff;
  border: none;
  padding: 8px 15px;
  border-radius: 5px;
  cursor: pointer;
}

.apply-btn:hover {
  background-color: #16326a;
}

.no-jobs {
  text-align: center;
  margin-top: 60px;
  font-size: 20px;

}
.search-item {
  display: flex;
  align-items: center;
  gap: 8px;
  flex: 1;
}

.filter-btn {
  width: 100%;
  padding: 10px;
  background: #1a3d7c;
  color: white;
  border: none;
  border-radius: 6px;
  margin-top: 10px;
  cursor: pointer;
}

.clear-btn {
  display: block;
  text-align: center;
  margin-top: 10px;
  color: red;
  text-decoration: none;
}
    </style>