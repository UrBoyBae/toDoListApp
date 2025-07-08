{{-- <div class="w-[336px] min-h-screen fixed top-0 right-0 bg-[#FFFFFF]"> --}}
<div class="w-[336px] min-h-screen bg-[#FFFFFF] px-5 py-5">
    <div class="w-full h-fit relative flex items-center gap-5">
        <div class="h-fit w-[70px] flex items-center">
            <input type="checkbox" id="theme" class="sr-only">
            <label for="theme" class="w-full h-[35px] px-2 bg-gray-200 dark:bg-[#F6F7FA] flex items-center justify-between relative cursor-pointer rounded-full">
                <ion-icon name="sunny-outline" class="text-[#000] text-[20px]"></ion-icon>
                <ion-icon name="moon-outline" class="text-[#000] text-[20px]"></ion-icon>
                <div id="ball" class="absolute top-1 left-1 h-[27px] w-[27px] bg-[#FFFFFF] rounded-full transition-transform duration-300 flex justify-center items-center">
                    <ion-icon name="sunny-outline" class="text-[#000] text-[20px] transition-all duration-300 ease-in-out opacity-100 scale-100" id="icon-ball"></ion-icon>
                </div>
            </label>
        </div>
        <div class="h-full w-[2.3px] rounded-full bg-[#ebebee]">&nbsp;</div>
        <div class="flex items-center justify-between w-[180px]">
            <div class="flex items-center gap-3.5">
                <img src="{{ asset('assets/image/gojocat.jpg') }}" alt="profilePict" class="w-10 h-10 rounded-full">
                <span class="max-w-[90px] truncate overflow-hidden whitespace-nowrap text-[#1F2937]">YourBoy</span>
            </div>
            <ion-icon name="chevron-down-outline" class="text-xl text-[#1F2937] cursor-pointer"></ion-icon>
        </div>
    </div>
    <div class="w-full mt-8 flex flex-col bg-[#F6F7FA] py-5 px-5 rounded-xl">
        <div class="flex flex-col gap-3 border-b-[#dadadd] border-b-2 pb-8">
            <span class="text-[#1F2937] font-semibold text-lg">Gym Session Week 3</span>
            <p class="text-sm text-[#1F2937] text-justify">Day for biceps, legs, and back. The target is 20 for biceps, 10 or legs, and 15 for back.</p>
        </div>
        <div class="flex flex-col gap-3 mt-8 pb-8">
            <span class="text-[#1F2937] font-semibold text-base">List</span>
            <div class="flex items-center gap-6">
                <div class="flex items-center gap-2">
                    <ion-icon name="flash-outline" class="text-xl text-[#6c6c6c] group-hover:text-black"></ion-icon>
                    <a href="" class="text-base text-[#6c6c6c] font-normal group-hover:text-black">Workout</a>
                </div>
                <div class="flex items-center gap-2">
                    <ion-icon name="globe-outline" class="text-xl text-[#6c6c6c] group-hover:text-black"></ion-icon>
                    <a href="" class="text-base text-[#6c6c6c] font-normal group-hover:text-black">Learning</a>
                </div>
            </div>
        </div>
        <div class="flex flex-col gap-4 pb-1">
            <span class="text-[#1F2937] font-semibold text-base">Tags</span>
            <div class="flex items-center justify-center w-fit py-2 px-6 bg-[#FCE7F3] rounded-lg">
                <span class="text-base text-[#DB2777] font-normal">Inspiration</span>
            </div>
        </div>
    </div>
    <form method="post" action="">
        @csrf
        <button type="submit" class="w-full mt-8 rounded-xl bg-[#6359e9] flex justify-center items-center py-3 cursor-pointer border-[#6359e9] border-2 hover:bg-[#FFFFFF] hover:border-[#6359e9] hover:border-2 group transition-all duration-300 ease-in-out">
            <span class="font-normal text-[#FFFFFF] group-hover:text-[#6359e9]">Save Change</span>
        </button>
    </form>
</div>
