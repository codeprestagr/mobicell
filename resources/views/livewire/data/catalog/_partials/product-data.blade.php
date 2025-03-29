

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
                                {{ __('Sku') }}
                            </th>
                            <th scope="col" class="px-2 py-2 text-start text-sm text-gray-500">
                                {{ __('Id Prestashop') }}
                            </th>

                            <th scope="col" class="px-2 py-2 text-start text-sm text-gray-500">
                                {{ __('EAN') }}
                            </th>
                            <th scope="col" class="px-2 py-2 text-start text-sm text-gray-500">
                                {{ __('MPN') }}
                            </th>

                            <th scope="col" class="px-2 py-2 text-end text-sm text-gray-500">
                                {{ __('Actions') }}</th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">

                        @foreach($items as $item)
                        <tr class="hover:bg-gray-100">

                            <td class="px-2 py-2 whitespace-nowrap text-sm text-gray-800">
                                <div class="relative inline-block">
                                    <img class="inline-block size-[46px] rounded-full"
                                         src="{{$item->image}}" >
                                  </div>

                                {{ $item->name }}</td>
                            <td class="px-2 py-2 whitespace-nowrap text-sm text-gray-800">

                                {{ $item->sku }}
                            </td>
                            <td class="px-2 py-2 whitespace-nowrap text-sm text-gray-800">
                                {{ $item->id_prestashop }}
                            </td>

                            <td class="px-2 py-2 whitespace-nowrap text-sm text-gray-800">
                                {{ $item->ean }}
                            </td>


                            <td class="px-2 py-2 whitespace-nowrap text-sm text-gray-800">
                                {{ $item->mpn }}
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

