

    <div>
        <div class="overflow-x-auto">
            <div class="min-w-full inline-block align-middle">
                <div class="overflow-hidden">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>

                            <th scope="col" class="px-2 py-2 text-start text-sm text-gray-500">
                                {{ __('Name') }}
                            </th>

                            <th scope="col" class="px-2 py-2 text-start text-sm text-gray-500">
                                {{ __('Quantity') }}
                            </th>

                            <th scope="col" class="px-2 py-2 text-start text-sm text-gray-500">
                                {{ __('Price') }}
                            </th>

                            <th scope="col" class="px-2 py-2 text-start text-sm text-gray-500">
                                {{ __('Profit') }}
                            </th>


                            <th scope="col" class="px-2 py-2 text-end text-sm text-gray-500">
                                {{ __('Actions') }}</th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">

                        @foreach($items as $item)
                        <tr class="hover:bg-gray-100">

                            <td class="px-2 py-2 whitespace-nowrap text-sm text-gray-800">
                                {{ $item->name }}
                            </td>

                            <td class="px-2 py-2 whitespace-nowrap text-sm text-centertext-gray-800">

                                @if($item->quantity)
                                    <span class="inline-flex items-center gap-1.5 py-1.5 px-3 rounded-md text-xs font-medium bg-primary/25 text-sky-800">
                                        {{$item->quantity}}
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 py-1.5 px-3 rounded-md text-xs font-medium bg-red-100 text-red-800">
                                           {{ $item->quantity }}
                                    </span>
                                @endif

                            </td>

                            <td class="px-2 py-2 whitespace-nowrap text-sm text-gray-800">
                                {{ $item->price }}
                            </td>

                            <td class="px-2 py-2 whitespace-nowrap text-sm text-gray-800">

                                <div>
                                    <x-text-input wire:model="profit" type="text" id="profit" placeholder="{{__('Profit')}}" value="{{$item->profit}}"
                                                  type="text" class="" />
                                    <x-input-error class="text-red-500 text-xs font-medium" :messages="$errors->get('profit')" />

                                </div><!-- div-->
                            </td>

                            <td class="px-2 py-2 whitespace-nowrap text-end text-sm font-medium flex justify-end gap-3">




                            </td>
                        </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

