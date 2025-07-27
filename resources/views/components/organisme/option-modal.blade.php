<!-- Logout Modal -->
<div id="logoutModal" class="fixed inset-0 bg-black/20 backdrop-blur-sm z-50 flex items-center justify-center hidden">
    <div class="bg-white w-[350px] rounded-xl p-6 relative">
        <button onclick="closeLogoutModal()" class="absolute top-3 right-3 text-xl text-gray-400 hover:text-red-500">
            <ion-icon name="close-outline" class="text-3xl"></ion-icon>
        </button>
        <h2 class="text-lg font-semibold text-[#1F2937] mb-8">Apakah Anda yakin ingin keluar?</h2>
        <div class="flex justify-end">
            <form action="{{ route('logout') }}" method="POST" class="flex justify-center">
                @csrf
                <button type="submit" class="flex items-center gap-2 bg-[#DC2626] hover:bg-[#b91c1c] text-white px-4 py-2 rounded transition-all">
                    <ion-icon name="log-out-outline" class="text-xl"></ion-icon>
                    <span>Keluar</span>
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    const logoutModal = document.getElementById('logoutModal');
    const modalOption = document.getElementById('modal_option');

    modalOption.addEventListener('click', () => {
        logoutModal.classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
    });

    function closeLogoutModal() {
        logoutModal.classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    }

    // Tutup modal jika klik di luar kontennya
    window.addEventListener('click', (e) => {
        if (e.target === logoutModal) {
            closeLogoutModal();
        }
    });

    // Escape key untuk tutup
    document.addEventListener('keydown', function (event) {
        if (event.key === "Escape" && !logoutModal.classList.contains('hidden')) {
            closeLogoutModal();
        }
    });
</script>