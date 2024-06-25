@extends('activities.layout')
 
@section('content')

    <div class="w-full grid pl-14">
        

        <form class="grid gap-16" action="{{ route('activities.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
            
            <div class="bg-white rounded-2xl">
                <div class="grid grid-cols-2 mt-8 mb-12 ml-10">
                    <h1 class="text-4xl font-bold">Create an Event, Task or Announcement</h1>
                    <a class="text-white w-[20%] bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg px-5 py-2.5 text-center" href="{{ route('activities.index') }}"> Back</a>
                </div>

                <div class="pl-20 grid grid-cols-[50%,50%]">
                    <div class="grid">
                        <!--Name-->
                        <div class="grid ">
                            <label class="block mb-2 font-medium text-gray-900">Title</label>
                            <input class="bg-gray-10 border border-gray-300 text-gray-900 text-sm rounded-lg block w-80 p-2.5" type="text" name="title" id="">
                        </div>

                         <!--Categories-->                       
                        <div class="mt-2 mb-2">
                            <div>
                                <label for="first_name" class="block mb-2 font-medium text-gray-900">Category:</label>
                                <select name="categories_activities_id" class="bg-gray-10 border border-gray-300 text-gray-900 text-sm rounded-lg block w-80 p-2.5 focus:ring-blue-500 focus:border-blue-500">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mt-2 mb-2">
                            <div>
                                <label for="first_name" class="block mb-2 font-medium text-gray-900">Course:</label>
                                <select name="courses_activities_id" class="bg-gray-10 border border-gray-300 text-gray-900 text-sm rounded-lg block w-80 p-2.5 focus:ring-blue-500 focus:border-blue-500">
                                    @foreach ($courses as $course)
                                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mt-2 mb-2">
                            <div>
                                <label for="first_name" class="block mb-2 font-medium text-gray-900">Status:</label>
                                <select name="status_activities_id" class="bg-gray-10 border border-gray-300 text-gray-900 text-sm rounded-lg block w-80 p-2.5 focus:ring-blue-500 focus:border-blue-500">
                                    @foreach ($status as $single_status)
                                        <option value="{{ $single_status->id }}">{{ $single_status->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        
                        <div class="mb-10">
                            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
                        </div>

                    </div>
                    <div class="mb-10">
                         <!--Description-->
                         <div class="mb-10 grid grid-cols-1">
                            <label class="block mb-2 font-medium text-gray-900">Description</label>
                            <textarea class="bg-gray-10 border border-gray-300 text-gray-900 text-sm rounded-lg block w-80 p-2.5" name="description" id="" cols="30" rows="5"></textarea>
                        </div>

                        <!--Date-->
                        <div class="mb-14 grid grid-cols-1">
                            <div>
                                <label for="scheduled_at" class="block mb-2 font-medium text-gray-900">Date:</label>
                                <input type="datetime-local" class="w-80 bg-gray-10 border border-gray-300 text-gray-900 text-sm rounded-lg block p-2.5" name="scheduled_at" placeholder="year-month-day">
                                </div>
                            </div>
  

                        <!--Image-->
                        <div class="mt-2 mb-2">
                            <div>
                                <label for="image" class="block mb-2 font-medium text-gray-900">Image:</label>
                                <img id="preview" src="{{ url('images/placeholder.jpg') }}" alt="activity">
                                <input type="file" accept=".jpg, .png" id="image" class="bg-gray-10 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 p-2.5" name="image">
                            </div>
                        </div>

                    </div>
                </div>
                </div>
            
        </form> 

    </div>

@endsection