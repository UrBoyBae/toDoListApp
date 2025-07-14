@extends('layouts.index')
@section('content')
    <div class="w-[950px] min-h-screen bg-[#F6F7FA] px-7 pt-6 pb-16">
        <div class="flex items-center w-full bg-[#FFFFFF] h-[48px] px-3 rounded-lg gap-3">
            <ion-icon name="search-outline" class="text-2xl text-[#1F2937]"></ion-icon>
            <input type="text" name="search" id="search" placeholder="Search"
                class="placeholder:text-[#1F2937] h-full w-full focus:outline-none focus:ring-0 focus:border-transparent">
        </div>
        <div class="flex flex-col mt-12 gap-12">
            <div class="flex items-start justify-between">
                <div class="flex flex-col gap-2">
                    <span class="text-3xl text-[#1F2937] font-semibold">{{ $title }}</span>
                    <p class="text-base text-[#6c6c6c]">Manage your habits, reminders, events, activities.</p>
                </div>
                <div class="flex items-center justify-center w-fit py-2 px-4 bg-[#FFFFFF] rounded-lg gap-3 cursor-pointer hover:outline-[1px] hover:outline-black" id="new_activity">
                    <ion-icon name="add-outline" class="text-xl text-[#1F2937]"></ion-icon>
                    <span class="text-lg text-[#1F2937] font-normal">New Activity</span>
                </div>
            </div>
            <div class="flex flex-col gap-4">
                <span class="text-2xl text-[#1F2937] font-medium">Your Habits</span>
                <div class="grid grid-cols-5 w-full gap-5">
                    @foreach ($habits as $habit)
                        @include('components.molekuls.habits-card', ['habit' => $habit])
                    @endforeach
                </div>
            </div>
            <div class="flex flex-col gap-4">
                <span class="text-2xl text-[#1F2937] font-medium">Reminders</span>
                <div class="grid grid-cols-3 w-full gap-5">
                    @foreach ($reminderTasks as $task)
                        @include('components.molekuls.activities-card', ['task' => $task])
                    @endforeach
                </div>
            </div>
            <div class="flex flex-col gap-4">
                <span class="text-2xl text-[#1F2937] font-medium">To Do List</span>
                <div class="grid grid-cols-3 w-full gap-5">
                    <div class="flex flex-col gap-4 w-full h-fit bg-[#F6F7FA]">
                        <div
                            class="flex items-center justify-between w-full h-fit bg-[#ffffff] py-3.5 px-4.5 rounded-lg relative">
                            <div class="absolute left-0 h-4/6 w-[4px] bg-[#2563EB] rounded-tr-full rounded-br-full"></div>
                            <div class="flex items-center gap-4">
                                <span class="text-[#1F2937] font-normal text-base">To Do</span>
                                <p class="text-sm text-[#6c6c6c]">{{ $toDoCount }}</p>
                            </div>
                            <ion-icon name="ellipsis-horizontal-outline" class="text-xl text-[#1F2937]"></ion-icon>
                        </div>
                        <div class="grid grid-cols-1 w-full gap-5">
                            @foreach ($toDoTasks as $task)
                                @include('components.molekuls.activities-card', ['task' => $task])
                            @endforeach
                        </div>
                    </div>
                    <div class="flex flex-col gap-4 w-full h-fit bg-[#F6F7FA]">
                        <div
                            class="flex items-center justify-between w-full h-fit bg-[#ffffff] py-3.5 px-4.5 rounded-lg relative">
                            <div class="absolute left-0 h-4/6 w-[4px] bg-[#DB2777] rounded-tr-full rounded-br-full"></div>
                            <div class="flex items-center gap-4">
                                <span class="text-[#1F2937] font-normal text-base">In Progress</span>
                                <p class="text-sm text-[#6c6c6c]">{{ $inProgressCount }}</p>
                            </div>
                            <ion-icon name="ellipsis-horizontal-outline" class="text-xl text-[#1F2937]"></ion-icon>
                        </div>
                        <div class="grid grid-cols-1 w-full gap-5">
                            @foreach ($inProgressTasks as $task)
                                @include('components.molekuls.activities-card', ['task' => $task])
                            @endforeach
                        </div>
                    </div>
                    <div class="flex flex-col gap-4 w-full h-fit bg-[#F6F7FA]">
                        <div
                            class="flex items-center justify-between w-full h-fit bg-[#ffffff] py-3.5 px-4.5 rounded-lg relative">
                            <div class="absolute left-0 h-4/6 w-[4px] bg-[#16A34A] rounded-tr-full rounded-br-full"></div>
                            <div class="flex items-center gap-4">
                                <span class="text-[#1F2937] font-normal text-base">Completed</span>
                                <p class="text-sm text-[#6c6c6c]">{{ $completedCount }}</p>
                            </div>
                            <ion-icon name="ellipsis-horizontal-outline" class="text-xl text-[#1F2937]"></ion-icon>
                        </div>
                        <div class="grid grid-cols-1 w-full gap-5">
                            @foreach ($completedTasks as $task)
                                @include('components.molekuls.activities-card', ['task' => $task])
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('components.organisme.activity-modal', ['lists' => $lists, 'tags' => $tags])
@endsection
