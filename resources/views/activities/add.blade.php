@extends('activities.layout')
 
@section('content')

    <div class="w-full grid pl-14">
        <div class="grid py-10 items-center gap-16">
            <form class="flex rounded-3xl bg-white drop-shadow-xl w-[70%] h-12">
                <input class="rounded-3xl pl-7 w-[90%]" type="text" placeholder="Search">
                <button><img class="w-7" src="https://i.ibb.co/NYk96s9/search.png" alt="#"></button>
            </form>
        </div>

        <div class="grid gap-16"> 
            
            <div class=" bg-white rounded-2xl">
                <h1 class="text-4xl font-bold mt-20 mb-12 ml-10">Activities</h1>

                <div class="grid grid-cols-[50%,50%]">
                    <div class="grid">
                        <!--Name-->
                        <div class="grid ">
                            <label class="text-2xl font-bold ml-16 mb-3">Name</label>
                            <input class="rounded-md drop-shadow-xl bg-sky-100 w-[70%] ml-16" type="text" name="name" id="">
                        </div>

                        <div class="grid grid-cols-1">
                            <div>
                                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category:</label>
                                <select name="categories_events_id" class="bg-gray-10 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </select>
                            </div>

                            <div>
                                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category:</label>
                                <select name="categories_events_id" class="bg-gray-10 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </select>
                            </div>
                        </div>

                        <!--Description-->
                        <div class="mb-14 grid grid-cols-1">
                            <label class="text-2xl font-bold ml-16 mb-3">Description</label>
                            <textarea class="bg-sky-100 w-80 ml-16 rounded-md" name="Description" id="" cols="30" rows="5"></textarea>
                        </div>

                    </div>
                    <div>

                        <!--Date-->
                        <div class="mb-14 grid grid-cols-1">
                            <div>
                                <label for="scheduled_at" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date:</label>
                                <input type="datetime-local" class="bg-gray-10 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="scheduled_at" placeholder="year-month-day">
                                </div>
                            </div>
  

                        <!--Image-->
                        <div class="grid grid-cols-1">
                            <div>
                                <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Event Image:</label>
                                <img id="preview" src="{{ url('images/placeholder.jpg') }}" alt="event">
                                <input type="file" accept=".jpg, .png" id="image" class="bg-gray-10 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="image">
                            </div>
                        </div>

                    </div>
                </div>
                </div>
            </div>
        </div> 

    </div>

@endsection