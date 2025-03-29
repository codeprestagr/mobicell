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
                        {{ __('Add new guarantee') }}
                    @endif
                </div>
            </h4>
        </div>
        @if($user->isSuperAdmin() || $user->can('guarantees.index'))
            @include('livewire._partials.back-to-list',['url'=> route('guarantees.index')])
        @endif
    </div>


    <div class="flex flex-col gap-6">


                @include('livewire._partials.messages.success')
                @include('livewire._partials.messages.error')
                <form wire:submit.prevent="save" class="mt-5">
                    <div class="grid lg:grid-cols-2 gap-6 mb-10">
                        <div>
                            <div class="flex items-center">
                                <input class="form-switch" type="checkbox" role="switch" wire:click="toggleOrder">
                                <label class="ms-1.5" for="new_order"> {{__('New Order')}}</label>
                            </div>
                        </div>
                    </div>


                        @if($new_order)
                            @include('livewire.guarantees._partials.new_order')
                        @else
                            @include('livewire.guarantees._partials.exist_order')
                        @endif
                         @include('livewire._partials.save',['id'=> $id])


                </form>




</div>
</div>
<script>
    document.addEventListener('livewire:load', function () {
        Livewire.on('focusSearchInput', () => {
            document.getElementById('searchProduct').focus();
        });
    });
</script>
