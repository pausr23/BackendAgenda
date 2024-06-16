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
            
            <div class=" bg-white py-10 rounded-2xl">
                <h1 class="text-4xl font-bold mt-6 mb-32 ml-10">Activities</h1>
                <div class="flex justify-center">
                    <button class="bg-indigo-300 rounded-lg shadow-2xl w-36 mx-20 hover:bg-indigo-500 active:bg-indigo-800">
                        <img class="mx-auto" src="https://i.ibb.co/CJ8D5bP/add.png" alt="">
                        <h2 class="font-semibold">Add New Activity</h2>
                    </button>
                    
                    <button class="bg-indigo-300 rounded-lg shadow-2xl w-36 mx-20 hover:bg-indigo-500 active:bg-indigo-800">
                        <img class="mx-auto" src="https://i.ibb.co/DgNxnsh/edit.png" alt="">
                        <h2 class="font-semibold">Edit Activity</h2>
                    </button>

                    <button class="bg-indigo-300 rounded-lg shadow-2xl w-36 mx-20 hover:bg-indigo-500 active:bg-indigo-800">
                        <img class="mx-auto" src="https://i.ibb.co/dPz988t/delete.png" alt="">
                        <h2 class="font-semibold">Delete Activity</h2>
                    </button>
                </div>
            </div>
        </div> 

    </div>

@endsection