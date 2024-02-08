@extends('layouts.layout')

@section('content')
    <div class="grid grid-cols-2 gap-4" style="place-items: center;margin-top:10%">
        <div>

            <a href="#"
                class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

                <h5 class="mb-2 text-2xl font-bold text-center tracking-tight text-gray-900 dark:text-white">ALL STUDENTS</h5>
                <p class="font-bold text-center text-gray-700 dark:text-gray-400">+{{$studentsTotal}}</p>
            </a>

        </div>
        <div>

            <a href="#"
                class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

                <h5 class="mb-2 text-2xl font-bold tracking-tight text-center text-gray-900 dark:text-white">ALL MODULES</h5>
                <p class="font-bold text-center text-gray-700 dark:text-gray-400">+{{$totalModule}}</p>
            </a>
        </div>
        <div>

            <a href="#"
                class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

                <h5 class="mb-2 text-2xl font-bold tracking-tight text-center text-gray-900 dark:text-white">ALL TEACHERS</h5>
                <p class="font-bold text-center text-gray-700 dark:text-gray-400">+{{$totalTeachers}}</p>
            </a>
        </div>
        <div>

            <a href="#"
                class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-center text-gray-900 dark:text-white">AFECTATIONS</h5>
                <p class="font-bold text-center text-gray-700 dark:text-gray-400">+{{$totalAffectations}}</p>
            </a>
        </div>
    </div>
@endsection
