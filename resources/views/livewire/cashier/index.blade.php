<div>

    <div class="flex items-center justify-between flex-wrap gap-2 mb-6">
        <div>
            <h4 class="text-slate-900 text-lg font-medium mb-2">
                <div class="flex justify-start items-center gap-2">
                    <i class="material-symbols-rounded font-light text-2xl transition-all group-hover:fill-1">Payments</i>
                    {{ __('Cashier') }}
                </div> <!-- flex justify-start items-center gap-2-->
            </h4><!-- text-slate-900 text-lg font-medium mb-2-->

        </div><!-- DIV -->
        @if($id)
        <div>
          {{ $cashRegister->initial_balance}}
        </div>
        @endif

    </div> <!-- flex items-center justify-between flex-wrap gap-2 mb-6-->
    <div class="flex flex-col gap-6">
        <div class="card">
            <div class="p-6">
                <div class="flex justify-center items-center flex-col gap-3">
                    @if(!$id)
                        <h1 class="text-2xl flex items-center justify-center gap-2">

                            <i class="material-symbols-rounded font-light text-2xl transition-all group-hover:fill-1">Today</i>
                            <span> {{$currentDate}}</span>
                        </h1>
                    <div class="flex justify-center items-center flex-col gap-3">
                        <form wire:submit.prevent="save" class="mt-5">
                            <div>
                                <x-input-label for="name" :value="__('InitialBalance')" required="true"></x-input-label>

                                <div class="relative">
                                    <input type="text" id="input-with-leading-and-trailing-icon" name="input-with-leading-and-trailing-icon" class="form-input px-8" placeholder="0.00" wire:model="initialBalance" id="initialBalance">
                                    <div class="absolute inset-y-0 start-4 flex items-center pointer-events-none z-20">
                                        <span class="text-gray-500">€</span>
                                    </div>
                                    <div class="absolute inset-y-0 end-4 flex items-center pointer-events-none z-20">
                                        <span class="text-gray-500">{{__('EURO')}}</span>
                                    </div>
                                </div>

                                <x-input-error class="text-red-500 text-xs font-medium" :messages="$errors->get('initialBalance')" />
                            </div>

                            <div class="mt-5 w-full">
                                <div class="hs-tooltip">
                                    <button  type="submit" class="btn border-primary text-primary hover:bg-primary hover:text-white w-full">
                                        <i class="material-symbols-rounded font-light text-2xl transition-all group-hover:fill-1">Payments</i>
                                        <span class="ml-2">
                                        {{ __('Confirm Initial Balance') }}
                                    </span><!-- ml-2 -->
                                    </button><!-- btn rounded-full  bg-primary text-white gap-3-->
                                    <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible
                                            opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2
                                            bg-gray-900 text-xs font-medium text-white rounded shadow-sm" role="tooltip">
                                    <span>{{ __('Confirm') }} </span>
                                </span><!-- hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded shadow-sm-->
                                </div>
                            </div>

                        </form>

                    </div>
                    @else


                    @endif


                </div>

            </div>
        </div>
    </div>


</div>
