

    <div>
        <div class="overflow-x-auto">
            <div class="min-w-full inline-block align-middle">
                <div class="overflow-hidden">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>

                            <th scope="col" class="px-2 py-2 text-start text-sm text-gray-500">
                                {{ __('Firstname') }}
                            </th>

                            <th scope="col" class="px-2 py-2 text-start text-sm text-gray-500">
                                {{ __('Lastname') }}
                            </th>
                            <th scope="col" class="px-2 py-2 text-start text-sm text-gray-500">
                                {{ __('E-Mail') }}
                            </th>

                            <th scope="col" class="px-2 py-2 text-start text-sm text-gray-500">
                                {{ __('Phone') }}
                            </th>
                            <th scope="col" class="px-2 py-2 text-start text-sm text-gray-500">
                                {{ __('User') }}
                            </th>
                            <th scope="col" class="px-2 py-2 text-start text-sm text-gray-500">
                                {{ __('Created at') }}
                            </th>
                            <th scope="col" class="px-2 py-2 text-start text-sm text-gray-500">
                                {{ __('Updated at') }}
                            </th>
                            <th scope="col" class="px-2 py-2 text-end text-sm text-gray-500">
                                {{ __('Actions') }}</th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">

                        @foreach($items as $item)
                        <tr class="hover:bg-gray-100">

                            <td class="px-2 py-2 whitespace-nowrap text-sm text-gray-800">
                                {{ $item->firstname }}</td>
                            <td class="px-2 py-2 whitespace-nowrap text-sm text-gray-800">

                                {{ $item->lastname }}
                            </td>
                            <td class="px-2 py-2 whitespace-nowrap text-sm text-gray-800">
                                {{ $item->email }}
                            </td>

                            <td class="px-2 py-2 whitespace-nowrap text-sm text-gray-800">
                                {{ $item->phone }}
                            </td>


                            <td class="px-2 py-2 whitespace-nowrap text-sm text-gray-800">
                                {{ $item->user->name }}
                            </td>

                            <td class="px-2 py-2 whitespace-nowrap text-sm text-gray-800">
                                {{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y H:i') }}

                            </td>

                            <td class="px-2 py-2 whitespace-nowrap text-sm text-gray-800">
                                {{ \Carbon\Carbon::parse($item->updated_at)->format('d/m/Y H:i') }}

                            </td>



                            <td class="px-2 py-2 whitespace-nowrap text-end text-sm font-medium flex justify-end gap-3">


                                        @if($user->isSuperAdmin() || $user->can('customers.delete'))
                                            <div class="hs-tooltip">
                                                <button  wire:loading.attr="disabled" wire:click="delete({{$item->id}})" class="h-8 w-8 rounded-full bg-gray-200 flex justify-center items-center" data-fc-placement="bottom">
                                                    <i class="material-symbols-rounded font-light text-2xl transition-all group-hover:fill-1">delete</i>
                                                </button>
                                                <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded shadow-sm" role="tooltip">
                                                    {{ __('Delete') }}
                                                </span>
                                            </div>
                                        @endif

                                        @if($user->isSuperAdmin() || $user->can('customers.edit'))
                                            <div class="hs-tooltip">
                                                <a href="{{ route('customers.edit', $item) }}" data-fc-placement="bottom" class=" h-8 w-8 rounded-full bg-gray-200 flex justify-center items-center" >
                                                    <i class="material-symbols-rounded font-light text-2xl transition-all group-hover:fill-1">edit</i>
                                                </a>
                                                <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded shadow-sm"
                                                    role="tooltip">
                                                    {{ __('Edit') }}
                                                </span>
                                            </div>
                                        @endif

                            </td>
                        </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

