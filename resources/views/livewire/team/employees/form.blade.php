<div>
    <div class="flex items-center justify-between flex-wrap gap-2 mb-6">
        <div>
            <h4 class="text-slate-900 text-lg font-medium mb-2">
                <div class="flex justify-start items-center gap-2">
                    @if($id)
                        <i class="material-symbols-rounded font-light text-2xl transition-all group-hover:fill-1">Person</i>
                        {{ __('Edit Employee') }}
                        <span class="  whitespace-nowrap inline-block py-1.5 px-3 rounded-md text-xs font-medium bg-green-100 text-green-800">
                            {{$name}} / {{$email}}
                        </span>

                    @else
                        <i class="material-symbols-rounded font-light text-2xl transition-all group-hover:fill-1">add</i> {{ __('Add new Employee') }}
                    @endif
                </div>
            </h4>
        </div>
        @if($user->isSuperAdmin() || $user->can('employees.index'))
            @include('livewire._partials.back-to-list',['url'=> route('employees.index')])
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
                            <x-input-label for="name" :value="__('Name')" required="true"></x-input-label>
                            <x-text-input wire:model="name" id="name" placeholder="{{__('Name')}}" type="text" class="mt-1 block w-full" />
                            <x-input-error class="text-red-500 text-xs font-medium" :messages="$errors->get('name')" />
                        </div><!-- div-->

                        <div>
                            <x-input-label for="email" :value="__('Email')" required="true"></x-input-label>
                            <x-text-input wire:model="email" id="email" placeholder="{{__('Email')}}" type="text" class="mt-1 block w-full" />
                            <x-input-error class="text-red-500 text-xs font-medium" :messages="$errors->get('email')" />
                        </div><!-- div-->

                        <div>
                            <x-input-label for="password" :value="__('Password')" required="true"></x-input-label>
                            <x-text-input wire:model="password" type="password" id="password" placeholder="{{__('Password')}}" type="text" class="mt-1 block w-full" />
                            <x-input-error class="text-red-500 text-xs font-medium" :messages="$errors->get('password')" />
                        </div><!-- div-->

                        <div>
                            <x-input-label for="id_role" :value="__('Select Role')" required="true"></x-input-label>
                            <select wire:model="id_role" wire:change="roleChanged" class="form-select" id="role">
                                <option selected="" value="">{{ __('Select a Role') }}</option>
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}" {{ $role->id == $id_role ? 'selected' : '' }}>{{ $role->name }}</option>
                                @endforeach
                            </select>
                            <x-input-error class="text-red-500 text-xs font-medium" :messages="$errors->get('id_role')" />
                        </div><!-- div-->

                        @if(!$disableStore)
                        <div>
                            <x-input-label for="store_id" :value="__('Assignment to Store')" note="true"></x-input-label>
                            <x-select-box
                                name="store_id"
                                label="{{ __('Assignment to Store') }}"
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
                        @endif
                    </div>

                    <div class="grid lg:grid-cols-1 gap-6 mt-5">
                        <div class="flex  justify-start items-center gap-2">
                            @include('livewire._partials.save',['id'=> $id])
                            @if($user->isSuperAdmin() || $user->can('employees.index'))
                                @include('livewire._partials.back-to-list',['url'=> route('employees.index')])
                            @endif
                        </div><!-- flex  justify-start items-center gap-2-->
                    </div><!-- grid lg:grid-cols-1 gap-6 mt-5-->
                </form><!-- form-->

            </div>
        </div>
    </div>
</div>
