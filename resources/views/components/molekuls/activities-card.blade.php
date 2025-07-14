<div onclick="showPanel(this)" class="flex flex-col justify-between gap-4 w-full h-fit bg-[#ffffff] pt-4.5 px-4.5 pb-5 rounded-lg hover:outline-1 hover:outline-[#6359e9] cursor-pointer"
    data-id-task="{{ $task->task_id }}"
    data-title="{{ $task->title }}"
    data-detail="{{ $task->detail_task }}"
    data-status="{{ $task->status }}"
    data-tag="{{ $task->tags->name }}"
    data-tag-color="{{ $task->tags->color }}"
    data-list="{{ $task->lists->name }}"
    data-list-icon="{{ $task->lists->icon }}"
    data-remind-at="{{ \Carbon\Carbon::parse($task->reminders->remind_at)->format('H:i') }}"
    data-hidden-remind-at="{{ $task->reminders->remind_at }}"
    data-note="{{ $task->reminders->note }}">
    <div class="flex justify-between items-center">
        <div class="flex gap-3">
            <div
                class="flex items-center justify-center w-fit py-1 px-2 rounded-sm" style="background-color: {{ $task->tags->color }}1A;">
                <span class="text-xs text-[{{ $task->tags->color }}] font-normal">{{ $task->tags->name }}</span>
            </div>
            <div class="flex items-center gap-1">
                <ion-icon name="{{ $task->lists->icon }}" class="text-sm text-[#1F2937]"></ion-icon>
                <span class="text-xs text-[#1F2937] font-normal">{{ $task->lists->name }}</span>
            </div>
        </div>
        <div class="flex justify-start">
            <p class="text-xs text-[#1F2937]">{{ \Carbon\Carbon::parse($task->reminders->remind_at)->format('F d, Y') }}</p>
        </div>
    </div>
    <div class="flex flex-col gap-2 border-b-[#dadadd] border-b-2 pb-4">
        <span class="text-[#1F2937] font-normal text-lg">{{ $task->title }}</span>
        <p class="text-sm text-[#6c6c6c] truncate overflow-hidden whitespace-nowrap">
            {{ $task->detail_task }}
        </p>
    </div>
    <div class="flex items-center justify-between gap-1">
        <p class="text-sm text-[#1F2937]">{{ $task->reminders->note }}</p>
        <p class="text-sm text-[#1F2937]">{{ \Carbon\Carbon::parse($task->reminders->remind_at)->format('H:i') }}</p>
    </div>
</div>

<script>
    function showPanel(e) {
        const panel = document.getElementById('activities-panel');

        panel.querySelector('.id_task').textContent = e.dataset.idTask;
        panel.querySelector('.title').textContent = e.dataset.title;
        panel.querySelector('.detail-task').textContent = e.dataset.detail;
        panel.querySelector('.tag-name').textContent = e.dataset.tag;
        panel.querySelector('.tag-name').style.color = e.dataset.tagColor;
        panel.querySelector('.tag-wrapper').style.backgroundColor = e.dataset.tagColor + '1A';
        panel.querySelector('.list-name').textContent = e.dataset.list;
        panel.querySelector('.list-icon').name = e.dataset.listIcon;
        panel.querySelector('.note').textContent = e.dataset.note;
        panel.querySelector('.remind-at').textContent = e.dataset.remindAt;
        panel.querySelector('.hidden-remind-at').textContent = e.dataset.hiddenRemindAt;
        panel.querySelector('.status').textContent = e.dataset.status;

        panel.classList.remove('hidden');
    }
</script>