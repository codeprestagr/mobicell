


        <div id="erp-shipping" class="hs-removing:translate-x-5 mb-5 hs-removing:opacity-0 text-red-600
        transition duration-300 bg-red-600/10
         rounded-md p-4 border-red-600/30 " role="alert">


            <div class="flex items-center gap-3">
                <div class="flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                    </svg>
                </div>
                <div class="flex-grow">
                    <div class="text-sm text-red-600 font-medium flex justify-start items-center gap-2">
                        <span class="font-medium"><b>{{__('There is at least one ERP without associated shipping methods.')}}</b></span>

                        @if($btn)
                            <a href="{{route('admin.erps.index')}}" class="btn bg-white text-red-500 font-medium">
                                <i class="material-symbols-rounded font-light text-2xl transition-all group-hover:fill-1">
                                    Asterisk
                                </i>
                                <span>{{ __('Set Shipping Methods') }}</span>
                            </a>
                        @endif
                    </div>
                </div>
                <button data-hs-remove-element="#erp-shipping" type="button" id="dismiss-test" class="ms-auto h-8 w-8 rounded-full
                 bg-white flex justify-center items-center">
                    <i class="ti ti-x text-xl"></i>
                </button>
            </div>

        </div>


