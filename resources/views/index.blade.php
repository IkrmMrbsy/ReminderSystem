@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-[#2D6F8E] via-[#3B89B3] to-[#2D6F8E] py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-12">
            <h1 class="text-5xl font-bold text-white mb-4">
                NotifyMe
            </h1>
            <p class="text-xl text-gray-100 max-w-2xl mx-auto">
                Stay organized and never miss important moments with smart notifications
            </p>
        </div>

        <div class="flex justify-center mb-10">
            <a href="{{ route('reminders.create') }}" class="
                flex items-center 
                px-6 py-3 
                bg-white
                text-[#2D6F8E]
                rounded-lg
                shadow-lg 
                hover:bg-gray-50
                transition-all 
                duration-300
                font-semibold
            ">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                </svg>
                Create New Reminder
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse ($reminders as $reminder)
                <div class="
                    bg-white 
                    rounded-2xl 
                    shadow-xl 
                    overflow-hidden 
                    transition-all 
                    duration-300 
                    ease-in-out
                    transform 
                    hover:-translate-y-2 
                    hover:shadow-2xl
                    border 
                    border-gray-100
                    relative
                    group
                ">
                    {{-- Status Indicator --}}
                    <div class="
                        absolute 
                        top-4 
                        left-4 
                        z-10 
                        w-3 
                        h-3 
                        rounded-full 
                        {{ strtotime($reminder->reminder_time) < time() ? 'bg-red-500' : 'bg-[#2D6F8E]' }}
                    "></div>

                    {{-- Actions --}}
                    <div class="
                        absolute 
                        top-4 
                        right-4 
                        z-10 
                        flex 
                        space-x-2 
                        opacity-0 
                        group-hover:opacity-100 
                        transition-opacity 
                        duration-300
                    ">
                        <a href="{{ route('reminders.edit', $reminder->id) }}" class="
                            bg-[#2D6F8E]/10
                            p-2 
                            rounded-lg
                            hover:bg-[#2D6F8E]/20
                            transition-colors
                        ">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-[#2D6F8E]" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.379-8.379-2.828-2.828z" />
                            </svg>
                        </a>
                        <form action="{{ route('reminders.destroy', $reminder->id) }}" method="POST" class="inline-block" 
                            onsubmit="return confirm('Are you sure you want to delete this reminder?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="
                                bg-red-50 
                                p-2 
                                rounded-lg
                                hover:bg-red-100 
                                transition-colors
                            ">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-red-600" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </form>
                    </div>

                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 text-[#2D6F8E]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <p class="text-sm text-gray-500">
                                {{ \Carbon\Carbon::parse($reminder->reminder_time)->format('F d, Y h:i A') }}
                            </p>
                        </div>

                        <h2 class="text-2xl font-bold text-[#2D6F8E] mb-3">
                            {{ $reminder->title }}
                        </h2>

                        <p class="text-gray-600 mb-4 line-clamp-3">
                            {{ Str::limit($reminder->description, 120) }}
                        </p>

                        <div class="flex justify-between items-center mt-6">
                            <a href="{{ route('reminders.show', $reminder->id) }}" class="
                                px-4 
                                py-2 
                                bg-[#2D6F8E]/10
                                text-[#2D6F8E]
                                rounded-lg 
                                hover:bg-[#2D6F8E]/20
                                transition-colors 
                                flex 
                                items-center
                                font-medium
                            ">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                    <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                </svg>
                                View Details
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full">
                    <div class="bg-white rounded-2xl shadow-xl p-8 max-w-2xl mx-auto text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-[#2D6F8E] mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                        <h3 class="text-2xl font-bold text-gray-900 mb-2">No Reminders Yet</h3>
                        <p class="text-gray-600 mb-6">Create your first reminder to get started with NotifyMe!</p>
                        <a href="{{ route('reminders.create') }}" class="inline-flex items-center px-6 py-3 bg-[#2D6F8E] text-white rounded-lg shadow-lg hover:bg-[#235D77] transition duration-300 font-semibold">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            Create First Reminder
                        </a>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection