@extends('activities.layout')
 
@section('content')

    <div class="w-full grid pl-14">
        <div class="grid py-10 items-center gap-16">
            <form class="flex rounded-3xl bg-white drop-shadow-xl w-[70%] h-12">
                <input class="rounded-3xl pl-7 w-[90%]" type="text" placeholder="Search">
                <button><img class="w-7" src="https://i.ibb.co/NYk96s9/search.png" alt="#"></button>
            </form>
        </div>

        @if ($message = Session::get('success'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400">
            <p>{{ $message }}</p>
        </div>
        @endif

        <div class="grid gap-16"> 
            
            <div class=" bg-white py-10 rounded-2xl">
                <h1 class="text-4xl font-bold mt-6 mb-32 ml-10">Activities</h1>
                <div class="flex justify-center">
                <a href="{{ route('activities.create') }}" class="bg-indigo-300 rounded-lg shadow-2xl w-36 mx-20 hover:bg-indigo-500 active:bg-indigo-800 text-center py-4 px-6 flex flex-col items-center">
                    <img class="mx-auto w-16 h-16" src="https://i.ibb.co/CJ8D5bP/add.png" alt="">
                    <h2 class="font-semibold mt-2">Add New Activity</h2>
                </a>
                    
                </div>
            </div>
        </div> 

    </div>
        <table class="min-w-full text-center text-sm font-light text-surface dark:text-white">
            <thead class="border-b border-neutral-200 bg-neutral-50 font-medium dark:border-white/10 dark:text-neutral-800">
                <tr>
                    <th scope="col" class="px-6 py-3">Name</th>
                    <th scope="col" class="px-6 py-3">Category</th>
                    <th scope="col" class="px-6 py-3">Tag</th>
                    <th scope="col" class="px-6 py-3">State</th>
                    <th scope="col" class="px-6 py-3">Date</th>
                    <th scope="col" class="px-6 py-3" width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($activities as $activity)
                <tr class="border-b border-neutral-200 dark:border-white/10">
                    <td>{{ $activity->name }}</td>
                    <td>{{ $activity->category }}</td>
                    <td>{{ $activity->tag }}</td>
                    <td>{{ $activity->status }}</td>
                    <td>{{ $activity->scheduled_at }}</td>
                    <td>
                        <form action="{{ route('activities.destroy',$activity->id) }}" method="POST">
        
                            <a class="text-white bg-gray-900 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700"  href="{{ route('activities.show',$activity->id) }}">Show</a>
            
                            <a class="inline-block focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mt-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800" href="{{ route('activities.edit',$activity->id) }}">Edit</a>
        
                            @csrf
                            @method('DELETE')
            
                            <button class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mt-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

@endsection