<div class="flex flex-col justify-between gap-3 w-full h-fit bg-[#ffffff] pt-2.5 px-2.5 pb-4 rounded-lg hover:outline-1 hover:outline-[#6359e9]">
    <div class="bg-[#6359e9] h-[116px] rounded-lg w-full overflow-hidden">
        <img src="{{ asset('assets/image/' . $habit->photo) }}" alt="habits"
            class="w-full h-full object-cover rounded-lg">
    </div>
    <div class="flex flex-col gap-1 px-1">
        <span class="text-[#1F2937] font-normal text-lg">{{ $habit->title }}</span>
        <p class="text-sm text-[#6c6c6c]">{{ \Carbon\Carbon::createFromFormat('H:i:s', $habit->start_time)->format('H:i') }} - {{ \Carbon\Carbon::createFromFormat('H:i:s', $habit->end_time)->format('H:i') }}</p>
    </div>
</div>