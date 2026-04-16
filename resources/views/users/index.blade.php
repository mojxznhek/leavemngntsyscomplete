<x-app-layout>

    {{-- <div class="bg-blue-700 py-2 px-4 rounded-md text-center fixed bottom-4 right-4 flex gap-4">
        <p> </p>
        <span class="cursor-pointer font-bold" onclick="return this.parentNode.remove()"><sup
                class="text-white">X</sup></span>

    </div> --}}



    <table class="min-w-full divide-y divide-gray-200 overflow-x-auto">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Name
                </th>

                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Status
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Role
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Email
                </th>
                <th scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Registration Date
                </th>
                <th scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Last Profile Update
                </th>
                <th scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">

            @foreach ($users as $user)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10">
                                <img class="h-10 w-10 rounded-full" src="https://i.pravatar.cc/150?img=1"
                                    alt="">
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">
                                    {{ $user->name }}
                                </div>
                            </div>
                        </div>
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap">
                        @if ($user->status == 'active')
                            <span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                {{ $user->status }}
                            </span>
                        @endif

                        @if ($user->status == 'pending')
                            <span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-orange-100 text-green-800">
                                {{ $user->status }}
                            </span>
                        @endif
                        @if ($user->status == 'deactivated')
                            <span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-green-800">
                                {{ $user->status }}
                            </span>
                        @endif
                        @if ($user->status == 'disapproved')
                            <span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-purple-100 text-green-800">
                                {{ $user->status }}
                            </span>
                        @endif

                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $user->role }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $user->email }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $user->created_at }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $user->updated_at }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap  text-sm font-medium">
                        
                        @if ($user->status == 'pending')
                            <form action="{{ route('users.update', $user->id) }}" method="POST" class="inline">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="status" value="active">
                                <button type="submit" class="text-green-600 hover:text-green-900">Approve</button>
                            </form>

                            <form action="{{ route('users.update', $user->id) }}" method="POST" class="inline">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="status" value="disapproved">
                                <button type="submit" class="text-red-600 hover:text-red-900">Disapprove</button>
                            </form>
                        @endif

                        @if ($user->status == 'active')
                            <form action="{{ route('users.update', $user->id) }}" method="POST" class="inline">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="status" value="deactivated">
                                <button type="submit" class="ml-2 text-red-600 hover:text-red-900">Deactivate</button>
                            </form>
                        @endif

                        @if ($user->status == 'disapproved')
                            <form action="{{ route('users.update', $user->id) }}" method="POST" class="inline">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="status" value="active">
                                <button type="submit" class="ml-2 text-green-600 hover:text-green-900">Approve</button>
                            </form>
                        @endif

                        @if ($user->status == 'deactivated')
                            <form action="{{ route('users.update', $user->id) }}" method="POST" class="inline">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="status" value="active">
                                <button type="submit"
                                    class="ml-2 text-green-600 hover:text-green-900">Activate</button>
                            </form>
                        @endif




                        @if ($user->status == 'active')
                            <form action="{{ route('users.changeRole', $user->id) }}" method="POST" class="inline">
                                @csrf
                                @method('PATCH')
                                <select name="role" id="role" class="border border-gray-300 p-2 rounded w-1/3">
                                    <option value="employee" {{ $user->role == 'employee' ? 'selected' : '' }}>Employee
                                    </option>
                                    <option value="supervisor" {{ $user->role == 'supervisor' ? 'selected' : '' }}>
                                        Supervisor</option>
                                    <option value="manager" {{ $user->role == 'manager' ? 'selected' : '' }}>Manager
                                    </option>
                                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin
                                    </option>
                                </select>

                                <button type="submit"
                                    class="ml-2 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">
                                    Update Role
                                </button>
                            </form>
                        @endif







                    </td>
                </tr>
            @endforeach



        </tbody>
    </table>



</x-app-layout>
