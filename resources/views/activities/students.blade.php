@extends('activities.layout')

@section('content')

<div class="w-full grid pl-36">

    <div class="my-5">
        
    </div>
    <div class="flex">
        <div class="mt-5">
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-red-600 mb-5">Logout</button>
            </form>
        </div>

        <div class="mt-7 ml-5">
            <a href="{{ route('activities.index') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-indigo-800 mb-5">Activities</a>
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
                <h1 class="text-4xl font-bold mt-3 ml-10 mb-10">Registered Students</h1>
            </div>

            <table class="min-w-full text-center text-sm font-light text-surface">
                <thead class="border-b border-neutral-200 bg-neutral-50 font-medium">
                    <tr>
                        <th scope="col" class="px-6 py-3">Name</th>
                        <th scope="col" class="px-6 py-3">Email</th> <!-- Agrega la columna Email -->
                        <th scope="col" class="px-6 py-3">Courses</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr class="border-b border-neutral-200 dark:border-white/10">
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td> <!-- Muestra el correo electrónico del usuario -->
                        <td>
                            <ul>
                                <li>{{ $user->course }}</li>
                            </ul>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
    </div>

</div>
       
@endsection