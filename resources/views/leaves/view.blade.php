<!-- resources/views/leaves/view.blade.php -->
<div 
    x-show="showModal" 
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 scale-90"
    x-transition:enter-end="opacity-100 scale-100"
    x-transition:leave="transition ease-in duration-300"
    x-transition:leave-start="opacity-100 scale-100"
    x-transition:leave-end="opacity-0 scale-90"
    class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50"
>
    <div class="bg-white rounded-lg shadow-lg w-3/4 max-w-2xl p-6">
        <div class="flex justify-between items-center border-b pb-3">
            <h3 class="text-xl font-semibold">Leave Application Details</h3>
            <button @click="showModal = false" class="text-gray-400 hover:text-black text-2xl">&times;</button>
        </div>

        <!-- Read-only content -->
        <div class="mt-4 space-y-4">
            <div>
                <label class="text-sm font-semibold text-gray-600">Name:</label>
                <p class="text-base text-gray-800" x-text="form.name"></p>
            </div>
            <div>
                <label class="text-sm font-semibold text-gray-600">Reason:</label>
                <p class="text-base text-gray-800" x-text="form.reason"></p>
            </div>
            <div>
                <label class="text-sm font-semibold text-gray-600">Leave Start</label>
                <p class="text-base text-gray-800" x-text="form.leave_from_date"></p>
            </div>
            <div>
                <label class="text-sm font-semibold text-gray-600">Leave End</label>
                <p class="text-base text-gray-800" x-text="form.leave_to_date"></p>
            </div>
            <div>
                <label class="text-sm font-semibold text-gray-600">Leave Application</label>
                <p class="text-base text-gray-800" x-text="form.created_at"></p>
            </div>
            <div>
                <label class="text-sm font-semibold text-gray-600">Remarks</label>
                <p class="text-base text-gray-800" x-text="form.remarks"></p>
            </div>
            <div>
                <label class="text-sm font-semibold text-gray-600">Details</label>
                <p class="text-base text-gray-800" x-text="form.details"></p>
            </div>
        </div>

        <div class="flex justify-end mt-6 border-t pt-4">
            <button type="button" @click="showModal = false" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">
                Close
            </button>
        </div>
    </div>
</div>
                    