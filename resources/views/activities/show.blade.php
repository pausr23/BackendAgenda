@extends('activities.layout')
  
@section('content')
    <div>
        <div>
            <div>
                <h2 class="mb-2 mt-2 text-4xl font-medium leading-tight text-white">Show Activity Details</h2>
            </div>
            <div>
                <a class=" inline-block text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-4 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" href="{{ url()->previous() }}"> Back</a>
            </div>
        </div>
    </div>
    <div class="text-white">
        
    @if(isset($activity) && $activity->isNotEmpty())
            <div>
                <img src="{{ asset('storage/images/'.$activity[0]->image) }}" alt="{{ $activity[0]->name }}">
            </div>
            <div>
                <h2 class="mb-2 mt-2 text-4xl font-medium leading-tight text-white">{{ $activity[0]->name }}</h2>
                <p>{{ $activity[0]->description }}</p>
                <p>Date: {{ $activity[0]->scheduled_at }}</p>
                <p>Tag: {{ $activity[0]->tag }}</p>
                <p>Category: {{ $activity[0]->category }}</p>
            </div>
        @else
            <p>No activity details available.</p>
        @endif
        
    </div>
@endsection