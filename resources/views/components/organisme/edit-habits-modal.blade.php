<div id="modalEditHabit" class="fixed inset-0 bg-white/40 backdrop-blur-sm z-50 hidden flex items-center justify-center">
    <div class="bg-white rounded-lg shadow-lg w-[500px] p-6 relative">
        <h2 class="text-xl font-semibold mb-4">Ubah Kebiasaan</h2>
        <form id="editHabitForm" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="habit_id" id="edit_habit_id">

            <div class="mb-4">
                <label for="edit_title" class="block font-medium">Judul</label>
                <input type="text" name="title" id="edit_title" class="w-full border px-3 py-2 rounded-lg" required>
            </div>
            <div class="mb-4">
                <label class="text-sm text-gray-700">Foto</label>
                <div class="relative mt-1">
                    <input type="file" name="photo" id="edit_photo" accept="image/*" class="sr-only">
                    <div class="flex gap-2 items-center">
                        <label for="edit_photo" class="w-28 flex items-center justify-center px-4 py-2 bg-blue-200 text-blue-700 rounded-md cursor-pointer hover:bg-gray-300">
                            Pilih Foto
                        </label>
                        <span id="edit-file-name" class="ml-2 text-sm text-gray-600">*Tidak ada file yang dipilih</span>
                    </div>
                </div>
            </div>
            <div class="mb-4">
                <label for="edit_start_time" class="block font-medium">Jam Mulai</label>
                <input type="time" name="start_time" id="edit_start_time" class="w-full border px-3 py-2 rounded-lg" required>
            </div>
            <div class="mb-4">
                <label for="edit_end_time" class="block font-medium">Jam Selesai</label>
                <input type="time" name="end_time" id="edit_end_time" class="w-full border px-3 py-2 rounded-lg" required>
            </div>
            <div>
                <label for="edit_date" class="text-sm text-gray-700">Tanggal</label>
                <input type="date" name="date" id="edit_date" class="w-full mt-1 px-3 py-2 border rounded-md" required>
            </div>
            <div class="flex justify-between gap-3 mt-6">
                <button type="submit" class="w-full bg-[#16A34A] text-white px-4 py-2 rounded-lg hover:bg-green-700">Simpan</button>
                <button type="button" onclick="deleteHabit()" class="w-full bg-[#DC2626] text-white px-4 py-2 rounded-lg hover:bg-red-700">Hapus</button>
            </div>
        </form>
        <button onclick="closeEditHabitModal()" class="absolute top-3 right-4 text-gray-600 hover:text-black text-2xl">&times;</button>
    </div>
</div>

<script>
    document.getElementById('edit_photo').addEventListener('change', function () {
        const fileName = this.files[0]?.name || '*Belum ada file yang dipilihBelum ada file';
        document.getElementById('edit-file-name').textContent = fileName;
    });
</script>