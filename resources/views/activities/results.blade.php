@extends('activities.layout')
 
@section('content')
    <div class="ml-9">
        <div>
            <h2 class="mb-2 mt-0 text-2xl font-medium leading-tight text-black">Found: {{ $total }} Activities </h2>
        </div>
        <div>
            <a class=" inline-block text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-4 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" href="{{ route('activities.index') }}">Back</a>
        </div>
    </div>
   
    <table class="min-w-full text-center text-sm font-light text-surface dark:text-white">
        <thead class="border-b border-neutral-200 bg-neutral-50 font-medium dark:border-white/10 dark:text-neutral-800">
            <tr>
                <th scope="col" class="px-6 py-3">Activity Title</th>
                <th scope="col" class="px-6 py-3">Category</th>
                <th scope="col" class="px-6 py-3">Course</th>
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
                <td>{{ $activity->scheduled_at }}</td>
                <td>
                <form action="{{ route('activities.destroy',$activity->id) }}" method="POST">
        
                    <a class="text-indigo-500 font-medium text-sm px-5 py-2.5 me-2 mb-2 underline"  href="{{ route('activities.show',$activity->id) }}">Show</a>

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
    
    {{ $activities->onEachSide(5) }}
@endsection