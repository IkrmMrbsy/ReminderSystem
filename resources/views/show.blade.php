@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl mx-auto bg-white shadow-2xl rounded-3xl overflow-hidden">
        <div class="bg-gradient-to-r from-blue-600 to-purple-600 px-8 py-6">
            <h1 class="text-4xl font-extrabold text-white text-center">Reminder Details</h1>
        </div>

        <div class="p-10 space-y-6">
            <div class="flex items-start space-x-4 mb-6">
                <div class="bg-blue-100 text-blue-600 p-3 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-3xl font-bold text-gray-900 mb-2">{{ $reminder->title }}</h2>
                    <span class="
                        {{ strtotime($reminder->reminder_time) < time() ? 'bg-red-100 text-red-600' : 'bg-green-100 text-green-600' }} 
                        px-3 py-1 rounded-full text-xs font-semibold uppercase tracking-wide
                    ">
                        {{ strtotime($reminder->reminder_time) < time() ? 'Overdue' : 'Upcoming' }}
                    </span>
                </div>
            </div>

            <div class="bg-gray-50 p-6 rounded-xl border border-gray-200 mb-6">
                <h3 class="text-xl font-semibold text-gray-800 mb-3 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Description
                </h3>
                <p class="text-gray-600 leading-relaxed">{{ $reminder->description }}</p>
            </div>

            <div class="grid grid-cols-2 gap-6">
                <div class="bg-gray-50 p-4 rounded-xl border border-gray-200">
                    <div class="flex items-center mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <h4 class="text-lg font-semibold text-gray-800">Reminder Time</h4>
                    </div>
                    <p class="text-gray-600">
                        {{ \Carbon\Carbon::parse($reminder->reminder_time)->format('F d, Y') }}
                        <span class="block text-sm text-gray-500">
                            {{ \Carbon\Carbon::parse($reminder->reminder_time)->format('h:i A') }}
                        </span>
                    </p>
                </div>

                <div class="bg-gray-50 p-4 rounded-xl border border-gray-200">
                    <div class="flex items-center mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <h4 class="text-lg font-semibold text-gray-800">Created At</h4>
                    </div>
                    <p class="text-gray-600">
                        {{ $reminder->created_at->format('F d, Y') }}
                        <span class="block text-sm text-gray-500">
                            {{ $reminder->created_at->format('h:i A') }}
                        </span>
                    </p>
                </div>
            </div>

            <div class="flex justify-between items-center mt-8">
                <a href="{{ route('reminders.index') }}" class="
                    px-6 
                    py-2.5 
                    bg-gray-100 
                    text-gray-700 
                    rounded-full 
                    hover:bg-gray-200 
                    transition 
                    duration-300 
                    flex 
                    items-center
                ">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Back to List
                </a>

                <div class="flex space-x-4">
                    <a href="{{ route('reminders.edit', $reminder->id) }}" class="
                        px-6 
                        py-2.5 
                        bg-yellow-50 
                        text-yellow-600 
                        rounded-full 
                        hover:bg-yellow-100 
                        transition 
                        duration-300 
                        flex 
                        items-center
                    ">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        Edit
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection