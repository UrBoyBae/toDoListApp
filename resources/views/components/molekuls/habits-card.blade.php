<div onclick="openHabitModal('{{ $habit->activity_id }}')" class="flex flex-col justify-between gap-3 w-full h-fit bg-[#ffffff] pt-2.5 px-2.5 pb-4 rounded-lg hover:outline-1 hover:outline-[#6359e9] cursor-pointer">
    <div class="bg-[#6359e9] h-[116px] rounded-lg w-full overflow-hidden">
        <img src="{{ asset('storage/' . $habit->photo) }}" alt="habits" class="w-full h-full object-cover rounded-lg">
    </div>
    <div class="flex flex-col gap-1 px-1">
        <span class="text-[#1F2937] font-normal text-lg">{{ $habit->title }}</span>
        <p class="text-sm text-[#6c6c6c]">
            {{ \Carbon\Carbon::createFromFormat('H:i:s', $habit->start_time)->format('H:i') }} -
            {{ \Carbon\Carbon::createFromFormat('H:i:s', $habit->end_time)->format('H:i') }}</p>
    </div>
</div>

<script>
    function openHabitModal(id) {
        fetch(`/habits/${id}`)
            .then(res => res.json())
            .then(data => {
                document.getElementById('edit_habit_id').value = data.activity_id;
                document.getElementById('edit_title').value = data.title;
                document.getElementById('edit_start_time').value = data.start_time;
                document.getElementById('edit_end_time').value = data.end_time;
                document.getElementById('edit_date').value = data.date;

                document.body.classList.add('overflow-hidden');
                const form = document.getElementById('editHabitForm');
                form.action = `/habits/${data.activity_id}`;
                document.getElementById('modalEditHabit').classList.remove('hidden');

                window.habitToDelete = data.activity_id;
            });
    }

    function closeEditHabitModal() {
        document.getElementById('modalEditHabit').classList.add('hidden');
    }

    function deleteHabit() {
        if (!window.habitToDelete) return;

        if (confirm("Yakin ingin menghapus kebiasaan ini?")) {
            fetch(`/habits/${window.habitToDelete}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            }).then(res => {
                if (res.ok) {
                    location.reload();
                }
            });
        }
    }
</script>
