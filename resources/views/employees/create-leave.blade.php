<x-employee-layout>
    @if (session('message'))
        <div class="bg-blue-700 py-2 px-4 rounded-md text-center fixed bottom-4 right-4 flex gap-4">
            <p> <x-input-info :messages="session('message')" class="mt-2" /> </p>
            <span class="cursor-pointer font-bold" onclick="return this.parentNode.remove()"><sup
                    class="text-white">X</sup></span>
        </div>
    @endif


    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Leave Filing') }}
        </h2>
    </x-slot>


    {{-- code for leave form --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <form method="POST" action="{{ route('employee.store') }}">
                        @csrf
                        <div class="border-b border-gray-900/10 pb-12">
                            <h2 class="text-base/7 font-semibold text-gray-900">Leave Information
                            </h2>
                            <p class="mt-1 text-sm/6 text-gray-600">Leave application is subject for approval</p>

                            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                <div class="sm:col-span-3">
                                    <label for="leave_from_date" class="block text-sm/6 font-medium text-gray-900">
                                        From
                                        Date: </label>
                                    <div class="mt-2">
                                        <input type="date" name="leave_from_date" id="leave_from_date"
                                            autocomplete="leave_from_date" value="{{ old('leave_from_date') }}"
                                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                        <x-input-error :messages="$errors->get('leave_from_date')" class="mt-2" />
                                    </div>
                                </div>

                                <div class="sm:col-span-3">
                                    <label for="leave_to_date" class="block text-sm/6 font-medium text-gray-900">To
                                        Date:</label>
                                    <div class="mt-2">
                                        <input type="date" name="leave_to_date" id="leave_to_date"
                                            autocomplete="leave_to_date" value="{{ old('leave_to_date') }}"
                                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                        <x-input-error :messages="$errors->get('leave_to_date')" class="mt-2" />
                                    </div>
                                </div>


                                <div class="col-span-full">
                                    <label for="reason" class="block text-sm/6 font-medium text-gray-900">
                                        Reason: </label>
                                    <div class="mt-2">
                                        <input type="text" name="reason" id="reason"
                                            value="{{ old('reason') }}"autocomplete="reason"
                                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                        <x-input-error :messages="$errors->get('reason')" class="mt-2" />
                                    </div>
                                </div>
                            </div>
                        </div>


                </div>

                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <button type="submit"
                        class="rounded-md bg-indigo-600 px-3 m-10 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                </div>
                </form>

            </div>
        </div>
    </div>

    {{-- code for table --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200 overflow-x-auto">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Date Submitted
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                From
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                To
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                reason
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Noted By
                            </th>

                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Date Updated
                            </th>


                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">

                        @foreach ($leaves as $leave)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $leave->created_at }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $leave->leave_from_date }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $leave->leave_to_date }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $leave->reason }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        {{ $leave->status }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $leave->noted_by }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $leave->updated_at }}
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-employee-layout>
