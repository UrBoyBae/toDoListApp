<div id="editModal" class="fixed inset-0 bg-black/20 backdrop-blur-sm z-50 flex items-center justify-center hidden">
    <div class="bg-white w-[500px] rounded-xl p-6 relative">
        <!-- Tombol close -->
        <button onclick="closeEditModal()" class="absolute top-3 right-3 text-xl text-gray-400 hover:text-red-500">
            <ion-icon name="close-outline" class="text-4xl"></ion-icon>
        </button>
        <h2 class="text-xl font-bold mb-4">Edit Activity</h2>
        <form method="POST" id="edit-form"">
            @csrf
            @method('PUT')
            <input type="hidden" name="task_id" id="edit-task-id">
            
            <div class="mb-4">
                <label class="block text-gray-700 mb-1">Title</label>
                <input type="text" name="title" id="edit-title" class="w-full border px-3 py-2 rounded" required>
            </div>

            <div class="mb-3">
                <label class="block text-gray-700 mb-1">Detail</label>
                <textarea name="detail_task" id="edit-detail" class="w-full border px-3 py-2 rounded"></textarea>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-1">List</label>
                <select name="list_id" id="edit-list" class="w-full border px-3 py-2 rounded">
                    @foreach ($lists as $list)
                        <option value="{{ $list->list_id }}">{{ $list->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-1">Tag</label>
                <select name="tag_id" id="edit-tag" class="w-full border px-3 py-2 rounded">
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->tag_id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-1">Remind At</label>
                <input type="datetime-local" name="remind_at" id="edit-remind-at" class="w-full border px-3 py-2 rounded">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-1">Note</label>
                <input type="text" name="note" id="edit-note" class="w-full border px-3 py-2 rounded">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-1">Status</label>
                <select name="status" id="edit-status" class="w-full border px-3 py-2 rounded">
                    <option value="0">To Do</option>
                    <option value="1">In Progress</option>
                    <option value="2">Completed</option>
                </select>
            </div>
            <button type="submit" class="w-full bg-[#6359e9] text-white px-4 py-2 rounded hover:bg-indigo-600 transition-all">Update Activity</button>
        </form>
        <form id="delete-form" method="POST" style="display: none;">
            @csrf
            @method('DELETE')
        </form>
    </div>
</div>

<script>
    const modalEdit = document.getElementById('editModal');

    function openEditModal() {
        document.getElementById('editModal').classList.remove('hidden');
        document.body.classList.add('overflow-hidden');

        const panel = document.getElementById('activities-panel');

        document.getElementById('edit-title').value = panel.querySelector('.title').textContent;
        document.getElementById('edit-detail').value = panel.querySelector('.detail-task').textContent;
        document.getElementById('edit-remind-at').value = panel.querySelector('.hidden-remind-at')?.textContent ?? '';
        document.getElementById('edit-note').value = panel.querySelector('.note')?.textContent ?? '';
        const listText = panel.querySelector('.list-name')?.textContent.trim();
        const listSelect = document.getElementById('edit-list');
        for (let option of listSelect.options) {
            if (option.text.trim() === listText) {
                listSelect.value = option.value;
                break;
            }
        }
        const tagText = panel.querySelector('.tag-name')?.textContent.trim();
        const tagSelect = document.getElementById('edit-tag');
        for (let option of tagSelect.options) {
            if (option.text.trim() === tagText) {
                tagSelect.value = option.value;
                break;
            }
        }
        const status = panel.querySelector('.status')?.textContent.trim();
        const statusSelect = document.getElementById('edit-status');
        for (let option of statusSelect.options) {
            if (option.value === status) {
                statusSelect.value = option.value;
                break;
            }
        }

        const taskId = panel.querySelector('.id_task').textContent;
        document.getElementById('edit-task-id').value = taskId;
        const form = document.getElementById('edit-form');
        form.action = `/activities/${taskId}`;
    }

    function closeEditModal() {
        document.getElementById('editModal').classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    }

    window.addEventListener('click', (e) => {
        if (e.target === modalEdit) {
            modalEdit.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }
    });

    document.addEventListener('keydown', function (event) {
        if (event.key === "Escape" && !modalEdit.classList.contains('hidden')) {
            modalEdit.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }
    });

    function openDeleteModal() {
        if (confirm('Are you sure you want to delete this activity?')) {
            const panel = document.getElementById('activities-panel');
            const taskId = panel.querySelector('.id_task').textContent;
            const deleteForm = document.getElementById('delete-form');
            deleteForm.action = `/activities/${taskId}`;
            deleteForm.submit();
        }
    }
</script>
