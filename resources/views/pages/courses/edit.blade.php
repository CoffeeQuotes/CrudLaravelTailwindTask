@extends('layouts.app')
@section('content')
<h1 class="font-sans antialiased sm:subpixel-antialiased md:antialiased text-2xl md:text-6xl py-5">Edit Course</h1>
    <div class="bg-white p-10 mb-10">
@if ($errors->any())
       <div class="alert m-5 shadow-lg flex flex-row items-center bg-red-200 p-5 rounded border-b-2 border-red-300">
			<div class="alert-icon flex items-center bg-red-100 border-2 border-red-500 justify-center h-10 w-10 flex-shrink-0 rounded-full">
				<span class="text-red-500">
					<svg fill="currentColor"
						 viewBox="0 0 20 20"
						 class="h-6 w-6">
						<path fill-rule="evenodd"
							  d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
							  clip-rule="evenodd"></path>
					</svg>
				</span>
			</div>
			<div class="alert-content ml-4">
				<div class="alert-title font-semibold text-lg text-red-800">
					Error
				</div>
				<div class="alert-description text-sm text-red-600">
             <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div>
    </div>
       </div>
@endif
<form action="{{ route('courses.update', $course->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="grid grid-cols-1 space-y-2">
        <label class="text-sm font-bold text-gray-500 tracking-wide my-3">Name</label>
        <input type="text" class="text-base p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500 form-input"  placeholder="name" value="{{ $course->name }}" name="name" required>
    </div>

    <div class="grid grid-cols-1 space-y-2">
        <label class="text-sm font-bold text-gray-500 tracking-wide my-3">Short Description</label>
        <input type="text" class="text-base p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500 form-input" type="" placeholder="short description" value="{{ $course->short_description }}" name="short_description" required>
    </div>

    <div class="grid grid-cols-1 space-y-2">
        <label class="text-sm font-bold text-gray-500 tracking-wide my-3">Full Description</label>
        <textarea class="text-base p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500 form-textarea" name="full_description" required min="100">{{ $course->full_description }}</textarea>
    </div>

    <div class="grid grid-cols-1 space-y-2">
        <label class="text-sm font-bold text-gray-500 tracking-wide my-3">Upload Banner</label>
            <input type="file" name="banner">
            <img src="/banner/{{ $course->banner }}" width="300px">
        </label>
    </div>
    <div class="grid grid-cols-1 space-y-2" required>
         <label class="text-sm font-bold text-gray-500 tracking-wide my-3">Status</label>
    <select class="form-select px-4 py-3 rounded-full" name="status">
        <option {{$course->status == 'active' ? 'selected': '' }} value="active">Active</option>
        <option {{$course->status == 'inactive'? 'selected': ''}} value="inactive">Inactive</option>
    </select>

    </div>
    <input type="submit" class=" my-5 bg-blue-500 rounded-full font-bold text-white px-10 py-3 transition duration-300 ease-in-out hover:bg-blue-600 mr-6" style="pointer: cursor;"/>
</div>

</form>
@stop
