

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



                                <!-- User -->
                                <div class=" inline-block">
                                    <div
                                        class="max-w-xs p-3 flex items-center gap-x-3
                                          ">
                                        <img class="inline-block size-9 rounded-full"
                                             src="{{$item->image}}" alt="Image Description">

                                        <!-- User Content -->
                                        <div class="grow">
                                            <h4 class="font-semibold text-sm text-gray-800">
                                                {{ \Illuminate\Support\Str::limit($item->name, 30, '........') }}
                                            </h4>
                                            <p class="text-sm text-gray-800 md:text-gray-500 md:">
                                               {{ $item->sku }}
                                            </p>
                                        </div>
                                        <!-- End User Content -->

                                    </div>
                                </div>
                                <!-- End User -->
                              </td>
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

                            <td class="px-2 py-2 whitespace-nowrap text-sm text-gray-800 flex justify-end">
                                <div class="hs-tooltip text-end">

                                    <a href="{{ route('openai.generate', $item->id) }}" data-fc-placement="bottom" class=" h-8 w-8 rounded-full bg-gray-200 flex justify-center items-center" >
                                        <i class="material-symbols-rounded font-light text-2xl transition-all group-hover:fill-1">Chat</i>           </a>

                                    <span
                                        class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded shadow-sm"
                                        role="tooltip">
                                            {{ __('Add to entry') }}
                                        </span>

                                </div>
                            </td>




                        </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

