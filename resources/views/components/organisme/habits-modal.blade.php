<div id="modal_habit" class="fixed inset-0 bg-white/40 backdrop-blur-sm z-50 hidden flex items-center justify-center">
    <div class="bg-white p-6 rounded-xl w-[500px] space-y-4 shadow-lg">
        <div class="flex justify-between items-center">
            <h2 class="text-xl font-semibold text-gray-800">Tambah Kebiasaan</h2>
            <button onclick="closeAddHabitsModal()" class="text-gray-600 text-2xl">&times;</button>
        </div>
        <form action="{{ route('habits.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            <div>
                <label class="text-sm text-gray-700">Judul</label>
                <input type="text" name="title" class="w-full mt-1 px-3 py-2 border rounded-md" required>
            </div>
            <div>
                <label class="text-sm text-gray-700">Foto</label>
                <div class="relative mt-1">
                    <input type="file" name="photo" id="photo" accept="image/*" class="sr-only" required>
                    <div class="flex gap-2 items-center">
                        <label for="photo" class="w-28 flex items-center justify-center px-4 py-2 bg-blue-200 text-blue-700 rounded-md cursor-pointer hover:bg-gray-300">
                            Pilih Foto
                        </label>
                        <span id="file-name" class="ml-2 text-sm text-gray-600">*Belum ada file yang dipilih</span>
                    </div>
                </div>
            </div>
            <div class="flex gap-4">
                <div class="w-1/2">
                    <label class="text-sm text-gray-700">Start Time</label>
                    <input type="time" name="start_time" class="w-full mt-1 px-3 py-2 border rounded-md" required>
                </div>
                <div class="w-1/2">
                    <label class="text-sm text-gray-700">End Time</label>
                    <input type="time" name="end_time" class="w-full mt-1 px-3 py-2 border rounded-md" required>
                </div>
            </div>
            <div>
                <label class="text-sm text-gray-700">Tanggal</label>
                <input type="date" name="date" class="w-full mt-1 px-3 py-2 border rounded-md" required>
            </div>
            <div class="text-right">
                <button type="submit" class="bg-[#6359e9] text-white px-4 py-2 rounded-md">Simpan</button>
            </div>
        </form>
    </div>
</div>

<script>
    const modal_habit = document.getElementById('modal_habit');
    document.getElementById('new_habits').addEventListener('click', function () {
        modal_habit.classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
    });
    
    window.addEventListener('click', (e) => {
        if (e.target === modal_habit) {
            modal_habit.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }
    });

    document.addEventListener('keydown', function (event) {
        if (event.key === "Escape" && !modal_habit.classList.contains('hidden')) {
            modal_habit.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }
    });

    function closeAddHabitsModal() {
        document.getElementById('modal_habit').classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    }

    document.getElementById('photo').addEventListener('change', function () {
        const fileName = this.files[0]?.name || '*Belum ada file yang dipilihBelum ada file';
        document.getElementById('file-name').textContent = fileName;
    });
</script>
