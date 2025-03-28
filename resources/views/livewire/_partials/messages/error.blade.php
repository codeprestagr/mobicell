@if (session()->has('error'))







        <div class="mb-5">


        <div   x-data="{ show: true }"
               x-init="setTimeout(() => show = false, 1000)"
               x-show="show" id="dismiss-alert" class="hs-removing:translate-x-5 hs-removing:opacity-0 transition
               duration-300 bg-red-50 border border-red-200 rounded-md p-4" role="alert">
            <div class="flex items-center gap-3">
                <div class="flex-shrink-0">
                    <i class="ti ti-circle-check text-xl"></i>
                </div>
                <div class="flex-grow">
                    <div class="text-sm text-red-800 font-medium">
                        {{ session('error') }}
                    </div>
                </div>
                <button data-hs-remove-element="#dismiss-alert" type="button" id="dismiss-test" class="ms-auto h-8 w-8 rounded-full
                 bg-gray-200 flex justify-center items-center">
                    <i class="ti ti-x text-xl"></i>
                </button>
            </div>
        </div>


        </div>



@endif
