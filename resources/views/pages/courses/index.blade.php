@extends('layouts.app')
@section('content')
<h1 class="font-sans antialiased sm:subpixel-antialiased md:antialiased text-2xl md:text-6xl py-5">Courses</h1>
 @if ($message = Session::get('success'))
 <div class="alert flex flex-row items-center bg-green-200 p-5 rounded border-b-2 border-green-300">
			<div class="alert-icon flex items-center bg-green-100 border-2 border-green-500 justify-center h-10 w-10 flex-shrink-0 rounded-full">
				<span class="text-green-500">
					<svg fill="currentColor"
						 viewBox="0 0 20 20"
						 class="h-6 w-6">
						<path fill-rule="evenodd"
							  d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
							  clip-rule="evenodd"></path>
					</svg>
				</span>
			</div>
			<div class="alert-content ml-4">
				<div class="alert-title font-semibold text-lg text-green-800">
					Success
				</div>
				<div class="alert-description text-sm text-green-600">
    {{ $message }}
                </div>
      </div>
  </div>
@endif
<table class="border-collapse w-full shadow-lg mb-10">
    <thead>
        <tr>
            <th class="p-3 font-sans uppercase bg-purple-200  bg-opacity-50 text-gray-600 border border-gray-300 hidden lg:table-cell">Course Name</th>
            <th class="p-3 font-sans uppercase bg-purple-200  bg-opacity-50 text-gray-600 border border-gray-300 hidden lg:table-cell">Short Description</th>
            <th class="p-3 font-sans uppercase bg-purple-200  bg-opacity-50 text-gray-600 border border-gray-300 hidden lg:table-cell">Banner</th>
            <th class="p-3 font-sans uppercase bg-purple-200  bg-opacity-50 text-gray-600 border border-gray-300 hidden lg:table-cell">Long Description</th>
            <th class="p-3 font-sans uppercase bg-purple-200  bg-opacity-50 text-gray-600 border border-gray-300 hidden lg:table-cell">Status</th>
            <th class="p-3 font-sans uppercase bg-purple-200  bg-opacity-50 text-gray-600 border border-gray-300 hidden lg:table-cell">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($courses as $course)
        <tr class="bg-white bg-opacity-50 lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Course Name</span>
               {{$course->name}}
            </td>
            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Short Description</span>
                {{$course->short_description}}
            </td>
            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Banner</span>
                <img class="inline" src="/banner/{{$course->banner}}" alt="" width="150"/>
            </td>
          	<td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">full Description</span>
                {{Str::limit($course->full_description, 100)}}
          	</td>
            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Status</span>
                <span class="rounded {{$course->status == 'active' ? 'bg-green-400': 'bg-red-400' }} py-1 px-3 text-xs font-bold uppercase">{{$course->status}}</span>
          	</td>
            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Actions</span>
                <a href="{{ route('courses.edit',$course->id)}}" class="px-4 py-2   mb-4  text-sm     font-medium   rounded-full block  border-b border-orange-300 bg-yellow-200 hover:bg-yellow-300 text-yellow-900">Edit</a>
                <form action="{{ route('courses.destroy',$course->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                <button href="#" class="px-4 py-2   mb-4  text-sm     font-medium   rounded-full block  border-b border-orange-300 bg-red-200 hover:bg-red-300 text-red-900">Remove</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@stop
