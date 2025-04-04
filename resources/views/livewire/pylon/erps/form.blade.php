<div>
    <div class="flex items-center justify-between flex-wrap gap-2 mb-6">
        <div>
            <h4 class="text-slate-900 text-lg font-medium mb-2">
                <div class="flex justify-start items-center gap-2">
                    @if($id)
                        <i class="material-symbols-rounded font-light text-2xl transition-all group-hover:fill-1">Person</i>
                        {{ __('Edit ERP') }}
                        <span class="  whitespace-nowrap inline-block py-1.5 px-3 rounded-md text-xs font-medium bg-green-100 text-green-800">
                            {{$name}}
                        </span>

                    @else
                        <i class="material-symbols-rounded font-light text-2xl transition-all group-hover:fill-1">add</i> {{ __('Add new Erp') }}
                    @endif
                </div>
            </h4>
        </div>
        @if($user->isSuperAdmin() || $user->can('erps.index'))
            <div>
                <a href="{{route('erps.index')}}"
                   class="  btn rounded-full bg-gray-200 flex justify-center items-center">
                    <span>{{ __('Back to List') }}</span>
                    <i class="material-symbols-rounded font-light text-2xl transition-all group-hover:fill-1">Undo</i>
                </a>
            </div>
        @endif
    </div>

    <div class="flex flex-col gap-6">
        <div class="card">
            <div class="p-6">
            @include('livewire._partials.messages.erp-credentials')
            @include('livewire._partials.messages.success')

            <form wire:submit.prevent="save" class="mt-5">
                <div class="grid lg:grid-cols-3 gap-6">

                    <div>
                        <x-input-label for="name" :value="__('Name')" required="true"></x-input-label>
                        <x-text-input wire:model="name" id="name" placeholder="{{__('Name')}}"  type="text" class="mt-1 block w-full" />
                        @error('name')
                        <span class="text-red-500 text-xs font-medium mt-5">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <div>
                        <x-input-label for="api_key" :value="__('API Key')" required="true"></x-input-label>
                        <x-text-input wire:model="api_key" id="api_key"  placeholder="{{__('API Key')}}" type="text" class="mt-1 block w-full" />
                        @error('api_key')
                        <span class="text-red-500 text-xs font-medium mt-5">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <div>
                        <x-input-label for="database" :value="__('Database')" required="true"></x-input-label>
                        <x-text-input wire:model="database" id="database" placeholder="{{__('Database')}}" type="text" class="mt-1 block w-full" />
                        @error('database')
                        <span class="text-red-500 text-xs font-medium mt-5">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>



                    <div>
                        <x-input-label for="username" :value="__('Username')" required="true"></x-input-label>
                        <x-text-input wire:model="username" id="username" placeholder="{{__('Username')}}"  type="text" class="mt-1 block w-full" />
                        @error('username')
                        <span class="text-red-500 text-xs font-medium mt-5">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <div>
                        <x-input-label for="password" :value="__('Password')" required="true"></x-input-label>
                        <x-text-input wire:model="password" id="password" placeholder="{{__('Password')}}" type="text" class="mt-1 block w-full" />
                        @error('password')
                        <span class="text-red-500 text-xs font-medium mt-5">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <div>
                        <x-input-label for="url" :value="__('URL')" required="true"></x-input-label>
                        <x-text-input wire:model="url" id="url"  placeholder="{{__('URL')}}" type="text" class="mt-1 block w-full" />
                        @error('url')
                        <span class="text-red-500 text-xs font-medium mt-5">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>


                    <div>
                        <div class="flex items-center">
                            <input type="checkbox" id="formSwitch" class="form-switch text-primary" wire:model="is_main"    @if($is_main) checked  @endif>
                            <label for="main_erp" class="ms-1.5">{{ __('Main ERP') }}</label>
                        </div>
                    </div>


                    <div class="col-span-3">

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
                            @if($user->isSuperAdmin() || $user->can('erps.index'))
                                <a href="{{route('erps.index')}}"
                                   class="  btn rounded-full bg-gray-200 flex justify-center items-center">


                                    <span>{{ __('Back to List') }}</span>
                                    <i class="material-symbols-rounded font-light text-2xl transition-all group-hover:fill-1">Undo</i>
                                </a>
                            @endif
                        </div>

                    </div>


                </div>

            </form>
        </div>
    </div>
    </div>
</div>
