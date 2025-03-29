<div>
    <div class="flex items-center justify-between flex-wrap gap-2 mb-6">
        <div>
            <h4 class="text-slate-900 text-lg font-medium mb-2">
                <div class="flex justify-start items-center gap-2">
                    @if($id)
                        <i class="material-symbols-rounded font-light text-2xl transition-all group-hover:fill-1">Group</i>
                        {{ __('Edit Warehouse') }}
                        <span class="  whitespace-nowrap inline-block py-1.5 px-3 rounded-md text-xs font-medium bg-green-100 text-green-800">
                            {{$name}}
                        </span>

                    @else
                        <i class="material-symbols-rounded font-light text-2xl transition-all group-hover:fill-1">add</i>
                        {{ __('Add new Customer') }}
                    @endif
                </div>
            </h4>
        </div>
        @if($user->isSuperAdmin() || $user->can('guarantees.warehouse.index'))
            @include('livewire._partials.back-to-list',['url'=> route('guarantees.warehouse.index')])
        @endif
    </div>
</div>
