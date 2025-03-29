<div>
    <div class="flex items-center justify-between flex-wrap gap-2 mb-6">
        <div>
            <h4 class="text-slate-900 text-lg font-medium mb-2">
                <div class="flex justify-start items-center gap-2">
                    @if($id)
                        <i class="material-symbols-rounded font-light text-2xl transition-all group-hover:fill-1">Group</i>
                        {{ __('Edit Customer') }}
                        <span class="  whitespace-nowrap inline-block py-1.5 px-3 rounded-md text-xs font-medium bg-green-100 text-green-800">
                            {{$firstname}}  {{$lastname}}
                        </span>

                    @else
                        <i class="material-symbols-rounded font-light text-2xl transition-all group-hover:fill-1">add</i>
                        {{ __('Add new Customer') }}
                    @endif
                </div>
            </h4>
        </div>
        @if($user->isSuperAdmin() || $user->can('customers.index'))
            @include('livewire._partials.back-to-list',['url'=> route('customers.index')])
        @endif
    </div>

    <div class="flex flex-col gap-6">
        <div class="card">
            <div class="p-6">

                @include('livewire._partials.messages.success')
                @include('livewire._partials.messages.error')

                <form wire:submit.prevent="save" class="mt-5">
                    <div class="grid lg:grid-cols-2 gap-6">
                        <div>
                            <x-input-label for="firstname" :value="__('Firstname')" required="true"></x-input-label>
                            <x-text-input wire:model="firstname" id="firstname" placeholder="{{__('Firstname')}}" type="text" class="mt-1 block w-full" />
                            <x-input-error class="text-red-500 text-xs font-medium" :messages="$errors->get('firstname')" />
                        </div><!-- div-->

                        <div>
                            <x-input-label for="lastname" :value="__('Lastname')" required="true"></x-input-label>
                            <x-text-input wire:model="lastname" id="lastname" placeholder="{{__('Lastname')}}" type="text" class="mt-1 block w-full" />
                            <x-input-error class="text-red-500 text-xs font-medium" :messages="$errors->get('lastname')" />
                        </div><!-- div-->

                        <div>
                            <x-input-label for="email" :value="__('Email')" required="true"></x-input-label>
                            <x-text-input wire:model="email" id="email" placeholder="{{__('Email')}}" type="text" class="mt-1 block w-full" />
                            <x-input-error class="text-red-500 text-xs font-medium" :messages="$errors->get('email')" />
                        </div><!-- div-->

                        <div>
                            <x-input-label for="address" :value="__('Address')" required="true"></x-input-label>
                            <x-text-input wire:model="address" id="address" placeholder="{{__('Address')}}" type="text" class="mt-1 block w-full" />
                            <x-input-error class="text-red-500 text-xs font-medium" :messages="$errors->get('address')" />
                        </div><!-- div-->



                        <div>
                            <x-input-label for="city" :value="__('City')" required="true"></x-input-label>
                            <x-text-input wire:model="city" id="city" placeholder="{{__('City')}}" type="text" class="mt-1 block w-full" />
                            <x-input-error class="text-red-500 text-xs font-medium" :messages="$errors->get('city')" />
                        </div><!-- div-->

                        <div>
                            <x-input-label for="postcode" :value="__('Postcode')" required="true"></x-input-label>
                            <x-text-input wire:model="postcode" id="postcode" placeholder="{{__('Postcode')}}" type="text" class="mt-1 block w-full" />
                            <x-input-error class="text-red-500 text-xs font-medium" :messages="$errors->get('postcode')" />
                        </div><!-- div-->

                        <div>
                            <x-input-label for="phone" :value="__('Phone')" required="true"></x-input-label>
                            <x-text-input wire:model="phone" id="phone" placeholder="{{__('Phone')}}" type="text" class="mt-1 block w-full" />
                            <x-input-error class="text-red-500 text-xs font-medium" :messages="$errors->get('phone')" />
                        </div><!-- div-->
                        <div>
                            <x-input-label for="store_id" :value="__('Store')" note="true"></x-input-label>
                            <x-select-box
                                name="store_id"
                                label="{{ __('Store') }}"
                                :options="$stores"
                                :selectedValue="$store_id"
                                placeholder="{{ __('All stores') }}"
                            />
                            <x-input-error class="text-red-500 text-xs font-medium" :messages="$errors->get('store_id')" />
                            @if(!count($stores))

                                <div class="mt-5 flex gap-3">
                                    <span class="inline-flex items-center gap-1.5 py-1.5 px-3 rounded-full text-xs font-medium
                                bg-red-100 text-red-800">
                                        <span class="w-1.5 h-1.5 inline-block bg-red-400 rounded-full"></span>
                                          {{ __('No stores found. Please enter a store if needed.') }}
                                    </span>
                                    @if($user->isSuperAdmin() || $user->can('stores.create'))
                                        <div class="hs-tooltip">
                                            <a href="{{route('stores.create')}}"  data-fc-placement="bottom" class="
                                                 h-8 w-8 rounded-full bg-gray-200 flex justify-center items-center">
                                                <i class="material-symbols-rounded font-light text-2xl transition-all group-hover:fill-1">add</i>
                                            </a>
                                            <span
                                                class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded shadow-sm"
                                                role="tooltip">
                                                {{ __('Add new store') }}
                                            </span>
                                        </div>
                                    @endif
                                </div>

                            @endif
                        </div>

                    </div>

                    <div class="grid lg:grid-cols-1 gap-6 mt-5">
                        <div class="flex  justify-start items-center gap-2">
                            @include('livewire._partials.save',['id'=> $id])
                            @if($user->isSuperAdmin() || $user->can('customers.index'))
                                @include('livewire._partials.back-to-list',['url'=> route('customers.index')])
                            @endif
                        </div><!-- flex  justify-start items-center gap-2-->
                    </div><!-- grid lg:grid-cols-1 gap-6 mt-5-->
                </form><!-- form-->

            </div>
        </div>
    </div>
</div>
