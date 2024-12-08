@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-12">
            <h1 class="text-5xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600 mb-4">
                Smart Reminders
            </h1>
            <p class="text-xl text-gray-500 max-w-2xl mx-auto">
                Stay organized and on top of your tasks with intelligent reminder management
            </p>
        </div>

        <div class="flex justify-center mb-10">
            <a href="{{ route('reminders.create') }}" class="
                flex items-center 
                px-6 py-3 
                bg-gradient-to-r from-blue-600 to-purple-600 
                text-white 
                rounded-full 
                shadow-lg 
                hover:from-blue-700 hover:to-purple-700 
                transition-all 
                duration-300
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
                    shadow-lg 
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
                        {{ strtotime($reminder->reminder_time) < time() ? 'bg-red-500' : 'bg-green-500' }}
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
                            bg-yellow-50 
                            p-2 
                            rounded-full 
                            hover:bg-yellow-100 
                            transition-colors
                        ">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-600" viewBox="0 0 20 20" fill="currentColor">
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
                                rounded-full 
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
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <p class="text-sm text-gray-500">
                                {{ \Carbon\Carbon::parse($reminder->reminder_time)->format('F d, Y h:i A') }}
                            </p>
                        </div>

                        <h2 class="text-2xl font-bold text-gray-800 mb-3">
                            {{ $reminder->title }}
                        </h2>

                        <p class="text-gray-600 mb-4 line-clamp-3">
                            {{ Str::limit($reminder->description, 120) }}
                        </p>

                        <div class="flex justify-between items-center mt-6">
                            <a href="{{ route('reminders.show', $reminder->id) }}" class="
                                px-4 
                                py-2 
                                bg-blue-50 
                                text-blue-600 
                                rounded-lg 
                                hover:bg-blue-100 
                                transition-colors 
                                flex 
                                items-center
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
                <div class="col-span-full text-center py-12">
                    <h3 class="text-2xl text-gray-500 mb-4">No reminders found</h3>
                    <p class="text-gray-400">Create your first reminder to get started</p>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection