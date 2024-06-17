@extends('activities.layout')
 
@section('content')

    <div class="w-full grid pl-14">
        <div class="grid py-10 items-center gap-16">
            <form class="flex rounded-3xl bg-white drop-shadow-xl w-[70%] h-12">
                <input class="rounded-3xl pl-7 w-[90%]" type="text" placeholder="Search">
                <button><img class="w-7" src="https://i.ibb.co/NYk96s9/search.png" alt="#"></button>
            </form>
        </div>

        <form class="grid gap-16" action="{{ route('activities.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
            
            <div class=" bg-white rounded-2xl">
                <h1 class="text-4xl font-bold mt-20 mb-12 ml-10">Activities</h1>

                <div class="pl-20 grid grid-cols-[50%,50%]">
                    <div class="grid">
                        <!--Name-->
                        <div class="grid ">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                            <input class="bg-gray-10 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text" name="title" id="">
                        </div>

                         <!--Categories-->                       
                        <div class="mt-2 mb-2">
                            <div>
                                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category:</label>
                                <select name="categories_activities_id" class="bg-gray-10 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mt-2 mb-2">
                            <div>
                                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tag:</label>
                                <select name="tags_activities_id" class="bg-gray-10 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @foreach ($tags as $tag)
                                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mt-2 mb-2">
                            <div>
                                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status:</label>
                                <select name="status_activities_id" class="bg-gray-10 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @foreach ($status as $single_status)
                                        <option value="{{ $single_status->id }}">{{ $single_status->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        
                        <div>
                            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                        </div>

                    </div>
                    <div>
                         <!--Description-->
                         <div class="mb-14 grid grid-cols-1">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                            <textarea class="bg-gray-10 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="description" id="" cols="30" rows="5"></textarea>
                        </div>

                        <!--Date-->
                        <div class="mb-14 grid grid-cols-1">
                            <div>
                                <label for="scheduled_at" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date:</label>
                                <input type="datetime-local" class="w-80 bg-gray-10 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="scheduled_at" placeholder="year-month-day">
                                </div>
                            </div>
  

                        <!--Image-->
                        <div class="mt-2 mb-2">
                            <div>
                                <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image:</label>
                                <img id="preview" src="{{ url('images/placeholder.jpg') }}" alt="activity">
                                <input type="file" accept=".jpg, .png" id="image" class="bg-gray-10 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="image">
                            </div>
                        </div>

                    </div>
                </div>
                </div>
            
        </form> 

    </div>

@endsection