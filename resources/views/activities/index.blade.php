@extends('activities.layout')
 
@section('content')

<div class="w-full grid pl-36">

<div class="my-5">
    
    <form class="grid grid-cols-[20%_20%_20%_20%_15%] gap-2" action="{{ route('activities.search') }}" method="GET">
        <div>
            <label for="activity" class="block mb-2 text-sm font-medium text-gray-900">Title:</label>
            <input id="activity" type="text" class="border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" name="activity" placeholder="Activity Name">
        </div>
        <div>
            <label for="category" class="block mb-2 text-sm font-medium text-gray-900">Category:</label>
            <select id="category" name="category" class="bg-gray-10 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                <option value="0">All</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="course" class="block mb-2 text-sm font-medium text-gray-900">Course:</label>
            <select id="course" name="course" class="bg-gray-10 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                <option value="0">All</option>
                @foreach ($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <button type="submit" class="bg-white rounded-lg text-sm w-14 px-5 py-2.5 text-center mt-[1.9rem]">
                <img src="https://i.ibb.co/NYk96s9/search.png" alt="Search">
            </button>
        </div>
    </form>
</div>
<div class="flex">
    <div class="mt-5">
        <form action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-red-600 mb-5">Logout</button>
        </form>
    </div>


    <div class="mt-7 ml-5">
        <a href="{{ route('students.index') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-indigo-800 mb-5">Users</a>
    </div>



</div>

@if ($message = Session::get('success'))
<div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400">
    <p>{{ $message }}</p>
</div>
@endif

<div class="w-[90%] grid gap-16">  
    <div class="bg-white py-10 rounded-2xl">
        <div class="grid grid-cols-2 pb-10">
            <h1 class="text-4xl font-bold mt-3 ml-10 mb-10">Registered Activities</h1>
            <a class="flex items-center justify-center w-56 h-16 text-white bg-indigo-600 hover:bg-indigo-800 focus:ring-2 focus:ring-indigo-300 font-medium rounded-full text-center" href="{{ route('activities.create') }}"> Create an Activity 
            <img class="ml-2" src="https://img.icons8.com/ios-glyphs/30/FFFFFF/add--v1.png" alt="Create"></a>            
        </div>

        <table class="min-w-full text-center text-sm font-light text-surface">
            <thead class="border-b border-neutral-200 bg-neutral-50 font-medium">
                <tr>
                    <th scope="col" class="px-6 py-3">Title</th>
                    <th scope="col" class="px-6 py-3">Category</th>
                    <th scope="col" class="px-6 py-3">Course</th>
                    <th scope="col" class="px-6 py-3">State</th>
                    <th scope="col" class="px-6 py-3">Date</th>
                    <th scope="col" class="px-6 py-3" width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($activities as $activity)
                <tr class="border-b border-neutral-200 dark:border-white/10">
                    <td>{{ $activity->title }}</td>
                    <td>{{ $activity->category }}</td>
                    <td>{{ $activity->course }}</td>
                    <td>{{ $activity->status }}</td>
                    <td>{{ $activity->scheduled_at }}</td>
                    <td>
                        <form action="{{ route('activities.destroy',$activity->id) }}" method="POST">
                            <a class="text-indigo-500 font-medium text-sm px-5 py-2.5 me-2 mb-2 underline" href="{{ route('activities.show',$activity->id) }}">Show</a>
                            <a class="text-indigo-500 font-medium text-sm px-5 py-2.5 me-2 mb-2 underline" href="{{ route('activities.edit',$activity->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button class="text-red-500 font-medium text-sm px-5 py-2.5 me-2 mb-2 underline" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
</div>

</div>

<div class="mt-5 ml-5">
    <a href="{{ route('students.index') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-indigo-800 mb-5">View Students</a>
</div>
       
@endsection