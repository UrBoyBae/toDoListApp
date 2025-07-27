@php
    $isActiveAllDay = Route::currentRouteName() === 'activities.allday';
    $isActiveToday = Route::currentRouteName() === 'activities.today';
    $isActiveTommorow = Route::currentRouteName() === 'activities.tomorrow';
    $isActiveNextWeek = Route::currentRouteName() === 'activities.nextweek';
@endphp

<div class="w-[75px] min-[1366px]:w-[230px] min-h-screen overflow-y-auto bg-[#FFFFFF] py-7 scrollbar">
    <div class="hidden min-[1366px]:flex justify-center items-center gap-2">
        <ion-icon name="today-outline" class="text-3xl text-[#6359e9]"></ion-icon>
        <a href="{{ route('activities.allday') }}" class="text-2xl font-bold text-[#1F2937]">HABITRA</a>
    </div>
    <div class="ml-5 min-[1200px]:ml-6 min-[1366px]:mt-8">
        <span class="hidden min-[1366px]:block text-sm font-bold text-[#1F2937]">Aktifitas</span>
        <div class="min-[1366px]:mt-3">
            <div class="relative flex items-center gap-4 group h-8">
                <ion-icon name="calendar-outline" class="text-xl text-[#1F2937] group-hover:text-black"></ion-icon>
                <a href="{{ route('activities.allday') }}" class="hidden min-[1366px]:block text-base text-[#1F2937] font-normal group-hover:text-black">Semua Hari</a>
                <div class="absolute right-0 h-full w-[4px] bg-[#6359e9] rounded-tl-full rounded-bl-full {{ $isActiveAllDay ? 'opacity-100' : 'opacity-0' }} group-hover:opacity-100 transition-all duration-200"></div>
            </div>
        </div>  
        <div class="mt-3">
            <div class="relative flex items-center gap-4 group h-8">
                <ion-icon name="today-outline" class="text-xl text-[#1F2937] group-hover:text-black"></ion-icon>
                <a href="{{ route('activities.today') }}" class="hidden min-[1366px]:block text-base text-[#1F2937] font-normal group-hover:text-black">Hari Ini</a>
                <div class="absolute right-0 h-full w-[4px] bg-[#6359e9] rounded-tl-full rounded-bl-full {{ $isActiveToday ? 'opacity-100' : 'opacity-0' }} group-hover:opacity-100 transition-all duration-200"></div>
            </div>
        </div>
        <div class="mt-3">
            <div class="relative flex items-center gap-4 group h-8">
                <ion-icon name="calendar-number-outline" class="text-xl text-[#1F2937] group-hover:text-black"></ion-icon>
                <a href="{{ route('activities.tomorrow') }}" class="hidden min-[1366px]:block text-base text-[#1F2937] font-normal group-hover:text-black">Besok</a>
                <div class="absolute right-0 h-full w-[4px] bg-[#6359e9] rounded-tl-full rounded-bl-full {{ $isActiveTommorow ? 'opacity-100' : 'opacity-0' }} group-hover:opacity-100 transition-all duration-200"></div>
            </div>
        </div>
        <div class="mt-3">
            <div class="relative flex items-center gap-4 group h-8">
                <ion-icon name="calendar-outline" class="text-xl text-[#1F2937] group-hover:text-black"></ion-icon>
                <a href="{{ route('activities.nextweek') }}" class="hidden min-[1366px]:block text-base text-[#1F2937] font-normal group-hover:text-black">7 Hari Kedepan</a>
                <div class="absolute right-0 h-full w-[4px] bg-[#6359e9] rounded-tl-full rounded-bl-full {{ $isActiveNextWeek ? 'opacity-100' : 'opacity-0' }} group-hover:opacity-100 transition-all duration-200"></div>
            </div>
        </div>
    </div>
    {{-- <div class="ml-6 mt-8">
        <span class="text-sm font-bold text-[#1F2937]">Lists</span>
        @foreach ($lists as $list)
            <div class="mt-3">
                <div class="relative flex items-center gap-4 group h-8">
                    <ion-icon name="{{ $list->icon }}" class="text-xl text-[#1F2937] group-hover:text-black"></ion-icon>
                    <a href="" class="text-base text-[#1F2937] font-normal group-hover:text-black">{{ $list->name }}</a>
                    <div class="absolute right-0 h-full w-[4px] bg-[#6359e9] rounded-tl-full rounded-bl-full opacity-0 group-hover:opacity-100 transition-all duration-200"></div>
                </div>
            </div> 
        @endforeach
    </div>
    <div class="ml-6 mt-8">
        <span class="text-sm font-bold text-[#1F2937]">Tags</span>
        @foreach ($tags as $tag)
            <div class="mt-3">
                <div class="relative flex items-center gap-4 group h-8">
                    <ion-icon name="bookmark-outline" class="text-xl text-[{{ $tag->color }}] group-hover:text-[{{ $tag->color }}]"></ion-icon>
                    <a href="" class="text-base text-[#1F2937] font-normal group-hover:text-black">{{ $tag->name }}</a>
                    <div class="absolute right-0 h-full w-[4px] bg-[#6359e9] rounded-tl-full rounded-bl-full opacity-0 group-hover:opacity-100 transition-all duration-200"></div>
                </div>
            </div> 
        @endforeach
    </div> --}}
    {{-- <div class="pl-6 pt-4"> --}}
        {{-- <div class="mt-3">
            <div class="relative flex items-center gap-4 group h-8">
                <ion-icon name="checkmark-circle-outline" class="text-xl text-[#1F2937] group-hover:text-black"></ion-icon>
                <a href="" class="text-base text-[#1F2937] font-normal group-hover:text-black">Completed</a>
                <div class="absolute right-0 h-full w-[4px] bg-[#6359e9] rounded-tl-full rounded-bl-full opacity-0 group-hover:opacity-100 transition-all duration-200"></div>
            </div>
        </div>   --}}
        {{-- <div class="mt-3">
            <div class="relative flex items-center gap-4 group h-8">
                <ion-icon name="trash-outline" class="text-xl text-[#1F2937] group-hover:text-black"></ion-icon>
                <a href="" class="text-base text-[#1F2937] font-normal group-hover:text-black">Trash</a>
                <div class="absolute right-0 h-full w-[4px] bg-[#6359e9] rounded-tl-full rounded-bl-full opacity-0 group-hover:opacity-100 transition-all duration-200"></div>
            </div>
        </div> --}}
    {{-- </div> --}}
</div>