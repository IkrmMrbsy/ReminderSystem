@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl mx-auto bg-white shadow-2xl rounded-3xl overflow-hidden">
        <div class="bg-[#2D6F8E] px-8 py-6">
            <h1 class="text-4xl font-extrabold text-white text-center">Create a New Reminder</h1>
        </div>

        <form action="{{ route('reminders.store') }}" method="POST" class="p-10 space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="col-span-full">
                    <label for="title" class="block text-gray-700 text-lg font-semibold mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block mr-2 text-[#2D6F8E]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        Title
                    </label>
                    <input 
                        type="text" 
                        name="title" 
                        id="title" 
                        placeholder="Enter reminder title" 
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#2D6F8E] focus:border-transparent transition duration-300 bg-gray-50 placeholder-gray-400" 
                        required
                    >
                </div>

                <div class="col-span-full">
                    <label for="description" class="block text-gray-700 text-lg font-semibold mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block mr-2 text-[#2D6F8E]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        Description
                    </label>
                    <textarea 
                        name="description" 
                        id="description" 
                        rows="6" 
                        placeholder="Provide details about your reminder" 
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#2D6F8E] focus:border-transparent transition duration-300 bg-gray-50 resize-y placeholder-gray-400"
                        required
                    ></textarea>
                </div>

                <div class="col-span-full">
                    <label for="reminder_time" class="block text-gray-700 text-lg font-semibold mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block mr-2 text-[#2D6F8E]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Reminder Time
                    </label>
                    <input 
                        type="datetime-local" 
                        name="reminder_time" 
                        id="reminder_time" 
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#2D6F8E] focus:border-transparent transition duration-300 bg-gray-50" 
                        required
                    >
                </div>
            </div>

            <div class="flex justify-center mt-8">
                <button 
                    type="submit" 
                    class="px-10 py-3.5 bg-[#2D6F8E] hover:bg-[#235D77] text-white font-semibold rounded-lg shadow-xl transition duration-300 transform hover:-translate-y-1 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#2D6F8E] flex items-center gap-2"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Create Reminder
                </button>
            </div>
        </form>
    </div>
</div>
@endsection