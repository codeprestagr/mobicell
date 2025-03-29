







<div class="mt-6">

                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>

                        <th scope="col" class="px-2 py-2 text-start text-sm text-gray-500">
                            {{ __('Product') }}
                        </th>

                        <th scope="col" class="px-2 py-2 text-start text-sm text-gray-500">
                            {{ __('Price') }}
                        </th>
                        <th scope="col" class="px-2 py-2 text-start text-sm text-gray-500">
                            {{ __('Quantity') }}
                        </th>

                        <th scope="col" class="px-2 py-2 text-start text-sm text-gray-500">
                            {{ __('IMEI') }}
                        </th>

                        <th scope="col" class="px-2 py-2 text-end text-sm text-gray-500">
                            {{ __('Actions') }}</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">

                    @foreach($selectedProducts as $index => $product)
                        <tr class="hover:bg-gray-100">

                            <td class="px-2 py-2 whitespace-nowrap text-sm text-gray-800">
                                {{ $product['name'] }}</td>
                            <td class="px-2 py-2 whitespace-nowrap text-sm text-gray-800">

                                {{ $product['price'] }}
                            </td>
                            <td class="px-2 py-2 whitespace-nowrap text-sm text-gray-800">
                             1
{{--                                <input type="number" wire:model="selectedProducts.{{ $index }}.quantity" class="w-16 p-1 border rounded">--}}
                            </td>

                            <td class="px-2 py-2 whitespace-nowrap text-sm text-gray-800">
                                {{ $product['imei'] }}
                            </td>


                            <td class="px-2 py-2 whitespace-nowrap text-sm text-gray-800">
                                <a wire:click="removeProduct({{ $index }})" class="bg-red-500 text-white px-2 py-1 rounded">❌</a>
                            </td>






                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>

