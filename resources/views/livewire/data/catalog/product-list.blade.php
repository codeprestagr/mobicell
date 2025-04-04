<div>
    <div class="flex items-center justify-between flex-wrap gap-2 mb-6">
        <div>
            <h4 class="text-slate-900 text-lg font-medium mb-2">
                <div class="flex justify-start items-center gap-2">
                    <i class="material-symbols-rounded font-light text-2xl transition-all group-hover:fill-1">Group</i>
                    {{ __('Products') }}
                    <span class="inline-flex items-center gap-1.5 py-0.5 px-1.5 text-xs font-medium bg-indigo-500 text-white rounded me-1">{{$count}}</span>
                </div> <!-- flex justify-start items-center gap-2-->
            </h4><!-- text-slate-900 text-lg font-medium mb-2-->
        </div><!-- DIV -->

        @if($user->isSuperAdmin() || $user->can('products.sync'))
            <div>




                <button wire:click="sync" type="button"
                        class="py-2 px-5 inline-flex items-center justify-center font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-primary/5 hover:bg-primary border-primary/10 hover:border-primary text-primary hover:text-white rounded-full cursor-pointer gap-3"
                        wire:loading.class="cursor-default"
                        wire:loading.attr="disabled"
                        :disabled="$disabled">

                    <div wire:loading class="animate-spin w-5 h-5 border-[3px] border-current border-t-transparent rounded-full" role="status" aria-label="loading">
                        <span class="sr-only">Loading...</span>
                    </div>

                    <span wire:loading.remove>Sync</span>
                    <span wire:loading>Loading...</span>
                </button>

                @if ($success)
                    <p class="text-green-500 mt-2">Η διαδικασία ολοκληρώθηκε με επιτυχία!</p>
                @endif

            </div>
        @endif
    </div> <!-- flex items-center justify-between flex-wrap gap-2 mb-6-->
    <div class="card overflow-hidden p-6">



        @if($count)
            <div class="flex mb-5">
                @include('livewire._partials.search')
            </div>
        @endif

        @if($items->count())

        @include('livewire.data.catalog._partials.product-data')
            @else
                @include('livewire._partials.nodata' ,['url' => ''])
            @endif


        @if($items->count())

        <div class="mt-5 bg-white">
                    {{$items->links()}}
                </div>
            @endif
    </div>


</div>
