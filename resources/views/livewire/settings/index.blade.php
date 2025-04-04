<div>




<div class="flex items-center justify-between flex-wrap gap-2 mb-6">
    <div>
        <h4 class="text-slate-900 text-lg font-medium mb-2">
            <div class="flex justify-start items-center gap-2">
                <i class="material-symbols-rounded font-light text-2xl transition-all group-hover:fill-1">Settings</i>
                {{ __('Settings') }}
                        </div> <!-- flex justify-start items-center gap-2-->
        </h4><!-- text-slate-900 text-lg font-medium mb-2-->
    </div><!-- DIV -->

</div> <!-- flex items-center justify-between flex-wrap gap-2 mb-6-->
        <div class="card overflow-hidden p-6">
            @include('livewire._partials.messages.success')
            @include('livewire._partials.messages.error')




                <form wire:submit.prevent="save">
                    <div class="grid lg:grid-cols1 gap-6">

                    @forelse ($settings as $key => $value)

                        <div>
                            <x-input-label for="name" :value="ucfirst(str_replace('_', ' ', $key))"></x-input-label>

                            <x-text-input wire:model.lazy="settings.{{ $key }}" id="name" placeholder="{{ucfirst(str_replace('_', ' ', $key))}}"
                                          type="text" class="mt-1 block w-full" wire:change="updateSetting('{{ $key }}', $event.target.value)" />

                        </div>


                        @endforeach
                    <button type="submit" class="btn btn-primary">Αποθήκευση Ρυθμίσεων</button>
                    </div>
                </form>


        </div>
</div>
