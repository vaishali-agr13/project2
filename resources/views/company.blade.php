@extends('layouts.app')

@section('content')
<div class="bg-gray-100 min-h-screen py-10">
  <div class="max-w-7xl mx-auto px-6">
    <div class="flex flex-wrap lg:flex-nowrap gap-6">

      <!-- LEFT SIDE (Company Info) -->
      <div class="w-full lg:w-1/2">
        <div class="bg-white p-8 rounded-xl shadow-sm">
          <h2 class="text-2xl font-bold mb-4 text-gray-900">About Our Company</h2>
          <p class="text-gray-600 mb-6">
            We are a growing platform helping companies post jobs and hire the best talent.
          </p>

          <h3 class="text-lg font-semibold text-gray-800 mb-2">Terms & Conditions</h3>
          <ul class="list-disc pl-5 text-gray-600 space-y-2 mb-6">
            <li>You can post maximum 10 jobs per month.</li>
            <li>All job posts must be genuine and verified.</li>
            <li>Spam or duplicate jobs will be removed.</li>
          </ul>

          <h3 class="text-lg font-semibold text-gray-800 mb-2">Privacy Policy</h3>
          <p class="text-gray-600">
            Your company information and job details are सुरक्षित and will not be shared with third parties.
          </p>
        </div>
      </div>

      <!-- RIGHT SIDE (Job Form) -->
      <div class="w-full lg:w-1/2">
        <div class="bg-white p-8 rounded-xl shadow-md">
          <h2 class="text-2xl font-bold mb-6 text-gray-900">Post a Job</h2>

          <form action="#" method="POST" class="space-y-4">
            @csrf

            <div>
              <label class="block text-sm font-semibold text-gray-700 mb-1">Job Title</label>
              <input type="text" name="title" class="w-full px-4 py-2 border rounded-lg" placeholder="Software Developer" required>
            </div>

            <div>
              <label class="block text-sm font-semibold text-gray-700 mb-1">Company Name</label>
              <input type="text" name="company" class="w-full px-4 py-2 border rounded-lg" placeholder="ABC Pvt Ltd" required>
            </div>

            <div>
              <label class="block text-sm font-semibold text-gray-700 mb-1">Location</label>
              <input type="text" name="location" class="w-full px-4 py-2 border rounded-lg" placeholder="Indore" required>
            </div>

            <div class="grid grid-cols-2 gap-4">
              <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Salary</label>
                <input type="text" name="salary" class="w-full px-4 py-2 border rounded-lg" placeholder="3-6 LPA">
              </div>

              <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Job Type</label>
                <select name="job_type" class="w-full px-4 py-2 border rounded-lg">
                  <option>Full Time</option>
                  <option>Part Time</option>
                  <option>Internship</option>
                </select>
              </div>
            </div>

            <div>
              <label class="block text-sm font-semibold text-gray-700 mb-1">Job Description</label>
              <textarea name="description" rows="4" class="w-full px-4 py-2 border rounded-lg"></textarea>
            </div>

            <button type="submit" class="w-full bg-purple-700 text-white py-3 rounded-lg font-bold hover:bg-purple-800">
              Post Job
            </button>
          </form>
        </div>
      </div>

    </div>
  </div>
</div>
@endsection
