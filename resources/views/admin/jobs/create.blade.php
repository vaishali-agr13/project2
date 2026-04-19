@extends('adminlte::page')

@section('title', 'Post New Job')

@section('content_header')
    <h1>Post a New Job</h1>
@stop

@section('content')

{{-- Success Message --}}
@if(session('success'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i> Success!</h5>
        {{ session('success') }}
    </div>
@endif

{{-- Validation Errors --}}
@if ($errors->any())
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-ban"></i> Errors!</h5>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="row">
    <div class="col-md-10">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Job Details</h3>
            </div>
            
            <form action="{{ route('admin.jobs.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="row">
                        {{-- Job Title --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title">Job Title</label>
                                <input type="text" name="title" class="form-control" id="title" placeholder="e.g. Senior Laravel Developer" value="{{ old('title') }}" required>
                            </div>
                        </div>

                        {{-- Category --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select name="category" class="form-control" required>
                                    <option value="">-- Select Category --</option>

                                            @foreach($categories as $cat)
                                                <option value="{{ $cat->id }}">
                                                    {{ $cat->name }}
                                                </option>
                                            @endforeach
                                </select>

                                @error('category_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        {{-- Company Name --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="company_name">Company Name</label>
                                <input type="text" name="company_name" class="form-control" placeholder="e.g. Google" value="{{ old('company_name') }}" required>
                            </div>
                        </div>

                        {{-- Location --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="location">Location</label>
                                <input type="text" name="location" class="form-control" placeholder="e.g. Indore, Remote, etc." value="{{ old('location') }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        {{-- Salary --}}
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="salary">Salary Min</label>
                                <input type="text" name="salary_min" class="form-control" placeholder="e.g. 50000" value="{{ old('salary_min') }}">
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="salary">Salary Max</label>
                                <input type="text" name="salary_max" class="form-control" placeholder="e.g. 600000 "value="{{ old('salary_max') }}">
                            </div>
                        </div>


                        {{-- Experience (Naya Field) --}}
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="experience">Experience Required</label>
                                <input type="text" name="experience" class="form-control" placeholder="e.g. 2-3 Years" value="{{ old('experience') }}" required>
                            </div>
                        </div>

                        {{-- Job Type --}}
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="job_type">Job Type</label>
                                <select name="job_type" class="form-control">
                                    <option value="Full-time">Full-time</option>
                                    <option value="Part-time">Part-time</option>
                                    <option value="Contract">Contract</option>
                                    <option value="Remote">Remote</option>
                                </select>
                            </div>
                        </div>

                         {{-- Status --}}
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" class="form-control">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                       
                    </div>

                    {{-- Description --}}
                    <div class="form-group">
                        <label for="description">Job Description</label>
                        <textarea name="description" class="form-control" rows="5" placeholder="Enter full job requirements..." required>{{ old('description') }}</textarea>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary px-4">Publish Job</button>
                    <a href="{{ url()->previous() }}" class="btn btn-default float-right">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@stop

@section('css')
    <style>
        .card-primary:not(.card-outline)>.card-header {
            background-color: #007bff;
        }
    </style>
@stop

@section('js')
    <script> console.log('Job Create Form Loaded Successfully!'); 


    setTimeout(function () {
        let alert = document.querySelector('.alert');
        if (alert) {
            alert.style.transition = "opacity 0.5s";
            alert.style.opacity = "0";

            setTimeout(() => {
                alert.remove();
            }, 500);
        }
    }, 3000);
    </script>
@stop
