


        <div id="erp-default" class="hs-removing:translate-x-5 mb-5 hs-removing:opacity-0 text-yellow-600 transition duration-300 bg-yellow-600/10 border
         rounded-md p-4 border-yellow-600/20 " role="alert">


            <div class="flex items-center gap-3">
                <div class="flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                    </svg>
                </div>
                <div class="flex-grow">
                    <div class="text-sm text-yellow-600 font-medium flex justify-start items-center gap-2">
                        <span class="font-medium"><b>{{__('Main ERP not found!')}}</b></span> {{__('Please define a Main ERP.')}}

                        @if($btn)
                            <a href="{{route('admin.erps.index')}}" class="btn bg-primary text-white font-medium">
                                <i class="material-symbols-rounded font-light text-2xl transition-all group-hover:fill-1">
                                    Asterisk
                                </i>
                                <span>{{ __('Set Default Store') }}</span>
                            </a>
                        @endif
                    </div>
                </div>
                <button data-hs-remove-element="#erp-default" type="button" id="dismiss-test" class="ms-auto h-8 w-8 rounded-full bg-gray-200 flex justify-center items-center">
                    <i class="ti ti-x text-xl"></i>
                </button>
            </div>

        </div>


