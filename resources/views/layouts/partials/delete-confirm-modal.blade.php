<div id="delete-confirm-modal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden flex items-center justify-center p-4" data-aos="fade" data-aos-duration="300">
    <div class="bg-white rounded-xl shadow-2xl w-full max-w-md" data-aos="zoom-in" data-aos-delay="100" data-aos-duration="300">
        <div class="p-8 text-center">
            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100 mb-5">
                <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                </svg>
            </div>
            <h3 class="text-xl font-bold text-neutral-800">Apakah Anda yakin?</h3>
            <p id="modal-text" class="text-sm text-neutral-500 mt-2">
                Aksi ini tidak dapat dibatalkan. Pastikan Anda benar-benar ingin melanjutkan.
            </p>
        </div>
        <div class="flex justify-center items-center space-x-4 bg-neutral-50 p-5 rounded-b-xl border-t border-neutral-200">
            <button id="cancel-delete-btn" type="button" class="px-6 py-2.5 text-sm font-medium text-neutral-700 bg-white border border-neutral-300 rounded-lg shadow-sm hover:bg-neutral-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-neutral-400">
                Batal
            </button>
            <button id="confirm-delete-btn" type="button" class="px-6 py-2.5 text-sm font-medium text-white bg-red-600 border border-transparent rounded-lg shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                Ya, Hapus
            </button>
        </div>
    </div>
</div>