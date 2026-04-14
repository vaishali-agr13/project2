@extends('layouts.app')

@section('content')

<div class="hero">
    <h1>{{ $category->name }}</h1>
    <p>{{ $category->description }}</p>
</div>

<div class="container">

   <div class="job-grid"> 
     @foreach($category->jobs as $job)
    <div class="job-card">

        <!-- LEFT -->
        <div class="job-left">

            <div class="job-top">
                <img src="/assets/company-logo.png" class="company-logo">

                <div class="company-info">
                    <h4>{{ $job->company_name }}</h4>
                    <p>📍 {{ $job->location }}</p>
                </div>
            </div>

            <h2 class="job-title">{{ $job->title }}</h2>

            <div class="meta">
                <span>🕒 {{ $job->job_type }}</span>
                <span>⏱ 3 days ago</span>
            </div>

            <p class="desc">{{ $job->description }}</p>

            <h3 class="salary">
                {{ $job->salary }} <span>/Monthly</span>
            </h3>

        </div>

    </div>
    @endforeach
</div>
</div>

@endsection


<style>

    body {
    margin: 0;
    font-family: Arial, sans-serif;
    background: #f5f7fb;
}

/* HERO */
.hero {
    display: flex;
    flex-direction: column;
    justify-content: center; /* Center mein alignment */
    align-items: flex-start; /* Left side mein aligned rakhega */
    text-align: left;
}

.hero h1 {
    font-size: 36px;
    margin: 0;
}

.job-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); /* Boxes ko chota karega aur side-by-side layega */
    gap: 20px; /* Boxes ke beech ka gap */
}

.hero p {
    font-size: 18px;
    margin-top: 10px;
}

/* CONTAINER (FIXED) */
.container {
    width: 100%;
    max-width: 1100px;
    margin: 40px auto;
    padding: 0 20px;
}

/* JOB CARD (FIXED FLEX ISSUE) */
.job-card {

margin-bottom: 0; /* Kyunki gap ab grid sambhal raha hai */
    height: 100%;
    display: flex;
    flex-direction: column;

    background: #f9fbff;
    border: 1px solid #e3e8f0;
    border-radius: 12px;

    padding: 20px;
    margin-bottom: 20px;

    box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    transition: 0.3s;
}

.job-card:hover {
    transform: translateY(-3px);
}

/* LEFT */
.job-left {
    display: flex;
    flex-direction: column;
}

/* TOP ROW */
.job-top {
    display: flex;
    align-items: center;
    gap: 12px;
}

/* LOGO */
.company-logo {
    width: 50px;
    height: 50px;
    border-radius: 8px;
}

/* COMPANY INFO */
.company-info h4 {
    margin: 0;
    font-size: 15px;
}

.company-info p {
    margin: 0;
    font-size: 12px;
    color: #666;
}

/* TITLE */
.job-title {
    margin: 10px 0 5px;
    font-size: 20px;
}

/* META */
.meta {
    display: flex;
    gap: 15px;
    font-size: 13px;
    color: #64748b;
}

/* DESCRIPTION */
.desc {
    font-size: 14px;
    color: #555;
    margin: 8px 0;
}

/* SALARY */
.salary {
    font-size: 18px;
    color: #2563eb;
}

.salary span {
    font-size: 14px;
    color: #666;
}   </style>