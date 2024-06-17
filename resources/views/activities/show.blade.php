@extends('activities.layout')
  
@section('content')
    <div>
        <div class="flex justify-center items-center">
            <div>
                <div>
                    <h2 class="mb-2 mt-2 text-4xl leading-tight text-black font-bold">Show Activity Details</h2>
                </div>
                
            </div>
        </div>
        <div class="text-black flex justify-center items-center">
            <div>
                <img src="{{ asset('storage/images/'.$activity[0]->image) }}" alt="{{ $activity[0]->title }}">
                <h2 class="mb-2 mt-2 text-4xl font-medium leading-tight">{{ $activity[0]->title }}</h2>
                <p>Description: {{ $activity[0]->description }}</p>
                <p>Date: {{ $activity[0]->scheduled_at }}</p>
                <p>Tag: {{ $activity[0]->tag }}</p>
                <p>Category: {{ $activity[0]->category }}</p>

                <a class="mt-3 inline-block text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-4 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" href="{{ route('activities.index') }}"> Back</a>
            </div>
        </div>


    </div>
@endsection