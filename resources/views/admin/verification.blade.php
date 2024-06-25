@extends('activities.layout')
 
@section('content')
    <div>
        <div class="text-center">
            <div>
                <h2 class="mb-2 mt-2 text-4xl font-medium leading-tight text-white">Verification</h2>
            </div>
            
        </div>
    </div>
    
    @if ($errors->any())
        <div class="text-white">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form class="max-w-[360px] mx-auto" action="{{ route('admin.check') }}" method="POST">
        @csrf
    
        <div>
            
            <div class="mt-2 mb-2">
                <div>
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Activity Title:</label>
                    <input type="text" class="bg-gray-10 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="title" placeholder="Activity Title" >
                </div>
            </div>
            
            <div class="mt-2 mb-2">
                <div>
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                </div>
            </div>
        </div>
    </form>
@endsection