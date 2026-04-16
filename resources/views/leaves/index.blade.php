<x-app-layout>
    <table class="min-w-full divide-y divide-gray-200 overflow-x-auto">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Employee
                </th>

                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Leave Start
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Leave End
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Date of Application
                </th>
                <th scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Reason
                </th>
                <th scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Remarks
                </th>
                
                <th scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Details
                </th>
        
                <th scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($leaves as $leave)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10">
                                <img class="h-10 w-10 rounded-full" src="https://i.pravatar.cc/150?img=1"
                                    alt="">
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">
                                    
                                    {{ $leave->user->name }}

                                    {{-- relationship of model  is in step 6 --}}
                                    {{-- remember this one.  --}}
                                    {{-- since your LeaveApplication model has a belongsTo relationship with the User model, 
                                    you can easily access the name field like this:
                                    $leave->user->name;  --}}


                                </div>
                            </div>
                        </div>
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $leave->leave_to_date }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $leave->leave_to_date }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $leave->created_at }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $leave->reason }}
                    </td>
                    @if(!$leave->remarks)
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        for review
                    </td>
                    @else
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $leave->remarks }}
                    </td>
                    @endif
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $leave->details }}
                    </td>

                    {{-- This td is for modal of our edit and view form  --}}
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"> 
                        {{-- modal 1 for review and update remarks of leave application --}}
                        <div x-data="{ showModal: false, form: { id: '', name: '', reason: '', date: '',details:'', remarks:''} }">
                            <!-- Trigger Button -->
                            <button 
                                @click="showModal = true; form.id = '{{ $leave->id }}'; 
                                    form.name = '{{ $leave->user->name }}'; 
                                    form.reason = '{{ $leave->reason }}'; 
                                    form.leave_from_date = '{{ $leave->leave_from_date }}';
                                    form.leave_to_date = '{{ $leave->leave_to_date }}';
                                    form.created_at = '{{ $leave->created_at }}'
                                    form.remarks = '{{ $leave->remarks }}';
                                    form.details = '{{ $leave->details }}';"

                                class="bg-orange-100 px-2 py-4 mr-4"
                            >
                                Review
                            </button>
                        
                            <!-- Modal -->
                            @include('leaves.review')
                        </div>

                         {{-- modal 2 for viewing only leave application --}}
                        <div x-data="{ showModal: false, form: {id: '', name: '', reason: '', created_at: '',details:'', remarks:''} }">
                            <!-- Trigger Button -->
                            <button 
                                @click="showModal = true;form.name = '{{ $leave->user->name }}'; 
                                form.reason = '{{ $leave->reason }}'; 
                                form.leave_from_date = '{{ $leave->leave_from_date }}';
                                form.leave_to_date = '{{ $leave->leave_to_date }}';
                                form.remarks = '{{ $leave->remarks }}';
                                form.details = '{{ $leave->details}}';
                                form.created_at = '{{ $leave->created_at }}'"
                                 }}'"
                                class="bg-green-100 px-2 py-4"
                            >
                                View
                            </button>
                        
                            <!-- Modal -->
                            @include('leaves.view')
                        </div>
                    </td> {{-- end of td for modal  --}}
                </tr>
            @endforeach

        </tbody>
    </table>
</x-app-layout>

