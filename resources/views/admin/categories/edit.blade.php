@extends('adminlte::page')

@section('title', 'Edit Category')

@section('content_header')
    <h1>Edit Category</h1>
@stop

@section('content')

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
@endif

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Update Category</h3>
    </div>

    <form action="{{ url('/admin/categories/update/'.$category->id) }}" method="POST">
        @csrf

        <div class="card-body">

            <!-- Name -->
            <div class="form-group">
                <label>Category Name</label>
                <input 
                    type="text" 
                    name="name" 
                    class="form-control" 
                    value="{{ $category->name }}"
                    required
                >
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

               <div class="form-group">
                <label>Category Icon</label>
                <input 
                    type="text" 
                    name="icon" 
                    class="form-control" 
                    value="{{ $category->icon }}"
                    required
                >
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- Description -->
            <div class="form-group">
                <label>Description</label>
                <textarea 
                    name="description" 
                    class="form-control" 
                    rows="4"
                >{{ $category->description }}</textarea>

                @error('description')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">
                Update Category
            </button>

            <a href="{{ url('/admin/categories') }}" class="btn btn-secondary">
                Back
            </a>
        </div>

    </form>
</div>

@stop