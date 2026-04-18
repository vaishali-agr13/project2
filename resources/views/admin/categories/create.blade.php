@extends('adminlte::page')

@section('title', 'Add Category')

@section('content_header')
    <h1>Add Category</h1>
@stop

@section('content')

    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
    @endif

    {{-- Card --}}
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Create New Category</h3>
        </div>

        <form action="{{ url('/admin/categories/store') }}" method="POST">
            @csrf

            <div class="card-body">

                <div class="form-group">
                    <label>Category Name</label>
                    <input 
                        type="text" 
                        name="name" 
                        class="form-control" 
                        placeholder="Enter category name"
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
                        placeholder="Enter category Icon"
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
                    placeholder="Enter category description"
                ></textarea>

                @error('description')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">
                    Add Category
                </button>

                <a href="{{ url('/admin/categories') }}" class="btn btn-secondary">
                    Back
                </a>
            </div>

        </form>
    </div>

@stop