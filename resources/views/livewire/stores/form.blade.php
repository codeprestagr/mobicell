<div>
    <div class="flex items-center justify-between flex-wrap gap-2 mb-6">
        <div>
            <h4 class="text-slate-900 text-lg font-medium mb-2">
                <div class="flex justify-start items-center gap-2">
                    @if($id)
                        <i class="material-symbols-rounded font-light text-2xl transition-all group-hover:fill-1">Person</i>
                        {{ __('Edit Store') }}
                        <span class="  whitespace-nowrap inline-block py-1.5 px-3 rounded-md text-xs font-medium bg-green-100 text-green-800">
                            {{$name}} / {{$email}}
                        </span>

                    @else
                        <i class="material-symbols-rounded font-light text-2xl transition-all group-hover:fill-1">add</i> {{ __('Add new Store') }}
                   @endif
                </div>
            </h4>
        </div>
        <div>
            <a href="{{route('stores.index')}}"
               class="  btn rounded-full bg-gray-200 flex justify-center items-center">


                <span>{{ __('Back to List') }}</span>
                <i class="material-symbols-rounded font-light text-2xl transition-all group-hover:fill-1">Undo</i>
            </a>
        </div>
    </div>

    <div class="flex flex-col gap-6">
        <div class="card">
            <div class="p-6">

               @include('livewire._partials.messages.success')

               <form wire:submit.prevent="save" class="mt-5">
                    <div class="grid lg:grid-cols-2 gap-6">
                        <div>
                            <x-input-label for="name" :value="__('Name')" required="true"></x-input-label>
                            <x-text-input wire:model="name" id="name" placeholder="{{__('Name')}}" type="text" class="mt-1 block w-full" />
                            <x-input-error class="text-red-500 text-xs font-medium" :messages="$errors->get('name')" />
                        </div>

                        <div>
                            <x-input-label for="company" :value="__('Company')" required="true"></x-input-label>
                            <x-text-input wire:model="company" id="company" placeholder="{{__('Company')}}" type="text" class="mt-1 block w-full" />
                            <x-input-error class="text-red-500 text-xs font-medium " :messages="$errors->get('company')" />
                        </div>

                        <div>
                            <x-input-label for="company" :value="__('Business Activity')" required="true"></x-input-label>
                            <x-text-input wire:model="business_activity" id="business_activity" placeholder="{{__('Business Activity')}}" type="text" class="mt-1 block w-full" />
                            <x-input-error class="text-red-500 text-xs font-medium " :messages="$errors->get('business_activity')" />
                        </div>

                        <div>
                            <x-input-label for="company" :value="__('Vat number')" required="true"></x-input-label>
                            <x-text-input wire:model="vat_number" id="vat_number" placeholder="{{__('Vat number')}}" type="text" class="mt-1 block w-full" />
                            <x-input-error class="text-red-500 text-xs font-medium " :messages="$errors->get('vat_number')" />
                        </div>

                        <div>
                            <x-input-label for="address" :value="__('Address')" required="true"></x-input-label>
                            <x-text-input wire:model="address" id="address" placeholder="{{__('Address')}}" type="text" class="mt-1 block w-full" />
                            <x-input-error class="text-red-500 text-xs font-medium " :messages="$errors->get('address')" />
                        </div>

                        <div>
                            <x-input-label for="postcode" :value="__('Post Code')" required="true"></x-input-label>
                            <x-text-input wire:model="postcode" id="postcode" placeholder="{{__('Post Code')}}" type="text" class="mt-1 block w-full" />
                            <x-input-error class="text-red-500 text-xs font-medium " :messages="$errors->get('postcode')" />
                        </div>

                        <div>
                            <x-input-label for="city" :value="__('City')" required="true"></x-input-label>
                            <x-text-input wire:model="city" id="city" placeholder="{{__('City')}}" type="text" class="mt-1 block w-full" />
                            <x-input-error class="text-red-500 text-xs font-medium " :messages="$errors->get('city')" />
                        </div>

                        <div>
                            <x-input-label for="Doi" :value="__('Doi')" required="true"></x-input-label>
                            <x-text-input wire:model="doi" id="doi" placeholder="{{__('Doi')}}" type="text" class="mt-1 block w-full" />
                            <x-input-error class="text-red-500 text-xs font-medium " :messages="$errors->get('doi')" />
                        </div>

                        <div>
                            <x-input-label for="postcode" :value="__('Gemi')" required="true"></x-input-label>
                            <x-text-input wire:model="gemi_number" id="gemi_number" placeholder="{{__('Gemi')}}" type="text" class="mt-1 block w-full" />
                            <x-input-error class="text-red-500 text-xs font-medium " :messages="$errors->get('gemi_number')" />
                        </div>

                        <div>
                            <x-input-label for="phone" :value="__('Phone')" required="true"></x-input-label>
                            <x-text-input wire:model="phone" id="phone" placeholder="{{__('Phone')}}" type="text" class="mt-1 block w-full" />
                            <x-input-error class="text-red-500 text-xs font-medium " :messages="$errors->get('phone')" />
                        </div>

                        <div>
                            <x-input-label for="email" :value="__('Email')" required="true"></x-input-label>
                            <x-text-input wire:model="email" id="email" placeholder="{{__('Email')}}" type="text" class="mt-1 block w-full" />
                            <x-input-error class="text-red-500 text-xs font-medium " :messages="$errors->get('email')" />
                        </div>

                        <div>
                            <x-input-label for="website" :value="__('Website')"></x-input-label>
                            <x-text-input wire:model="website" id="website" placeholder="{{__('Website')}}" type="text" class="mt-1 block w-full" />
                            <x-input-error class="text-red-500 text-xs font-medium " :messages="$errors->get('website')" />
                        </div>
                </div>

                <div class="grid lg:grid-cols-1 gap-6 mt-5">


                    <div class="flex  justify-start items-center gap-2">
                        <button type="submit" class="btn rounded-full  bg-primary text-white gap-3">
                            <i class="material-symbols-rounded font-light text-2xl transition-all group-hover:fill-1">Save</i>
                            <span class="ml-2">

                                  @if($id)
                                    {{ __('Update') }}

                                @else
                                    {{ __('Save') }}
                                @endif
                                   </span>

                        </button>
                        <a href="{{route('stores.index')}}"
                           class="  btn rounded-full bg-gray-200 flex justify-center items-center">


                            <span>{{ __('Back to List') }}</span>
                            <i class="material-symbols-rounded font-light text-2xl transition-all group-hover:fill-1">Undo</i>
                        </a>

                    </div>

                </div>



            </form>

            </div>
        </div>
    </div>

</div>
