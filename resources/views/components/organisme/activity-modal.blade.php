<div id="activityModal" class="fixed inset-0 bg-white/40 backdrop-blur-sm z-50 hidden flex items-center justify-center">
    <div id="modalContent" class="bg-white rounded-lg shadow-lg w-full max-w-lg p-6 relative">
        <h2 class="text-xl font-bold mb-4">New Activity</h2>
        <form action="{{ route('activities.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="title" class="block font-semibold mb-1">Title</label>
                <input type="text" id="title" name="title" class="w-full border border-gray-300 rounded px-3 py-2" required>
            </div>
            <div class="mb-4">
                <label for="detail_task" class="block font-semibold mb-1">Detail</label>
                <textarea id="detail_task" name="detail_task" rows="3" class="w-full border border-gray-300 rounded px-3 py-2" required></textarea>
            </div>
            <div class="mb-4">
                <label for="list_id" class="block font-semibold mb-1">List</label>
                <select id="list_id" name="list_id" class="w-full border border-gray-300 rounded px-3 py-2" required>
                    @foreach ($lists as $list)
                        <option value="{{ $list->list_id }}">{{ $list->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="tag_id" class="block font-semibold mb-1">Tag</label>
                <select id="tag_id" name="tag_id" class="w-full border border-gray-300 rounded px-3 py-2" required>
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->tag_id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="remind_at" class="block font-semibold mb-1">Remind At</label>
                <input type="datetime-local" id="remind_at" name="remind_at" class="w-full border border-gray-300 rounded px-3 py-2" required>
            </div>
            <div class="mb-4">
                <label for="note" class="block font-semibold mb-1">Note</label>
                <input type="text" id="note" name="note" class="w-full border border-gray-300 rounded px-3 py-2" required>
            </div>
            <div class="flex justify-end">
                <button type="button" id="closeModal" class="px-4 py-2 bg-gray-400 text-white rounded mr-2">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-[#6359e9] text-white rounded">Save</button>
            </div>
        </form>
    </div>
</div>

<script>
    const modal = document.getElementById('activityModal');
    const modalContent = document.getElementById('modalContent');
    const openBtn = document.getElementById('new_activity');
    const closeBtn = document.getElementById('closeModal');

    // Buka modal
    openBtn.addEventListener('click', () => {
        modal.classList.remove('hidden');
        document.body.classList.add('overflow-hidden'); // Nonaktifkan scroll body
    });

    
    closeBtn.addEventListener('click', () => {
        modal.classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    });
    // Klik di luar modalContent = tutup modal
    window.addEventListener('click', (e) => {
        if (e.target === modal) {
            modal.classList.add('hidden');
            document.body.classList.remove('overflow-hidden'); // Aktifkan scroll lagi
        }
    });

    document.addEventListener('keydown', function (event) {
        if (event.key === "Escape" && !modal.classList.contains('hidden')) {
            modal.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }
    });
</script>