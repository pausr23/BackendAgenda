@extends('activities.layout')
 
@section('content')
<div class="justify-center items-center grid">
    <div>
        <div>
            <div>
                <h2 class="mb-2 mt-2 text-4xl leading-tight text-black font-bold">Edit Activity</h2>
            </div>

        </div>
    </div>
    
    @if ($errors->any())
        <div>
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('activities.update', $activity->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    
        <div>
            <div class="mt-2 mb-2">
                <div>
                    <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Activity Image:</label>
                    
                    <img class="w-96" id="preview" src="{{ asset('storage/images/'.$activity->image) }}" alt="activity">

                    <input type="hidden" name="old_image" value="{{ $activity->image }}">
                
                    <input type="file" accept=".jpg, .png" id="image" class="w-96 bg-gray-10 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="image">
                </div>
            </div>
            
            <div class="mt-2 mb-2">
                <div>
                    <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category:</label>
                    <select name="categories_activities_id" class="w-96 bg-gray-10 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($categories as $category)
                            @if ($category->id == $activity->categories_activities_id)
                                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                            @else
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endif
                            
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mt-2 mb-2">
                <div>
                    <label for="tags_activities_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tags:</label>
                    <select name="tags_activities_id" class="w-96 bg-gray-10 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($tags as $tag)
                            @if ($tag->id == $activity->tags_activities_id)
                                <option value="{{ $tag->id }}" selected>{{ $tag->name }}</option>
                            @else
                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mt-2 mb-2">
                <div>
                    <label for="status_activities_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status:</label>
                    <select name="status_activities_id" class="w-96 bg-gray-10 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($status as $single_status)
                            @if ($single_status->id == $activity->status_activities_id)
                                <option value="{{ $single_status->id }}" selected>{{ $single_status->name }}</option>
                            @else
                                <option value="{{ $single_status->id }}">{{ $single_status->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mt-2 mb-2">
                <div>
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title:</label>
                    <input type="text" class="w-96 bg-gray-10 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="title" placeholder="Activity Title" value="{{ $activity->title }}">
                </div>
            </div>

            <div class="mt-2 mb-2">
                <div>
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Subtitle:</label>
                    <input type="text" class="w-96 bg-gray-10 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="description" placeholder="Activity Description" value="{{ $activity->description }}">
                </div>
            </div>

            <div class="mt-2 mb-2">
                <div>
                    <label for="scheduled_at" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date:</label>
                    <input type="datetime-local" class="w-96 bg-gray-10 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="scheduled_at" placeholder="year-month-day" value="{{ $activity->scheduled_at }}">
                </div>
            </div>

            <div class="mb-10">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                <a class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" href="{{ route('activities.index') }}"> Back</a>
            </div>
        </div>
    </form>
</div>
@endsection