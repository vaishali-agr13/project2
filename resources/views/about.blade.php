@extends('layouts.app')

@section('content')
<section id="about" class="py-16">
  <div class="max-w-6xl mx-auto px-4 grid md:grid-cols-2 gap-10 items-center">
    <div>
      <h2 class="text-3xl font-bold text-purple-700 mb-4">About Us</h2>
      <p class="text-gray-600 mb-4">
        We are a modern digital platform focused on connecting users with the best opportunities. Our mission is to simplify access to jobs, services, and professional growth.
      </p>
      <p class="text-gray-600">
        With a user-friendly interface and powerful backend system, we ensure seamless experience for both job seekers and recruiters.
      </p>
    </div>
    <div>
      <img src="{{ asset('images/about.jpg') }}" class="rounded-2xl shadow-lg" />
    </div>
  </div>
</section>
@endsection