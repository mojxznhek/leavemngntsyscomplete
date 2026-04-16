<!-- resources/views/leaves/review.blade.php -->
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
    <div class="bg-white rounded-lg shadow-lg w-3/4 max-w-3xl p-6">
        <div class="flex justify-between items-center border-b pb-3">
            <h3 class="text-xl font-semibold">Review Leave Application</h3>
            <button @click="showModal = false" class="text-gray-400 hover:text-black text-2xl">&times;</button>
        </div>

        <form method="POST" :action="`/leaves/${form.id}`" class="mt-4">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-sm">Name</label>
                <input type="text" x-model="form.name" class="border p-2 rounded w-full" disabled />
            </div>

            <div class="mb-4">
                <label class="block text-sm">Leave Start</label>
                <input type="text" x-model="form.leave_from_date" class="border p-2 rounded w-full" disabled />
            </div>

            <div class="mb-4">
                <label class="block text-sm">Leave End</label>
                <input type="text" x-model="form.leave_to_date" class="border p-2 rounded w-full" disabled />
            </div>

            <div class="mb-4">
                <label class="block text-sm">Applied At</label>
                <input type="text" x-model="form.created_at" class="border p-2 rounded w-full" disabled />
            </div>

            <div class="mb-4">
                <label class="block text-sm">Reason</label>
                <input type="text" x-model="form.reason" class="border p-2 rounded w-full" disabled />
            </div>

            <div class="mb-4">
                <label class="block text-sm">Remarks</label>
                <select x-model="form.remarks" name="remarks" class="border p-2 rounded w-full" required>
                    <option value="" disabled> Select Remarks </option>    
                    <option value="Approved"> Approved </option>
                    <option value="Disapproved"> Disapproved </option>
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-sm">Details of Remarks</label>
                <textarea x-model="form.details" name="details" class="border p-2 rounded w-full" required></textarea>
            </div>

            <div class="flex justify-end gap-2 border-t pt-4">
                <button type="button" @click="showModal = false" class="px-4 py-2 bg-gray-300 rounded">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Save</button>
            </div>
        </form>
    </div>
</div>