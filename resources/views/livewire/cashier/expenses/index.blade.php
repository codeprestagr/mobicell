<div>
    <div class="flex items-center justify-between flex-wrap gap-2 mb-6">
        <div>
            <h4 class="text-slate-900 text-lg font-medium mb-2">
                <div class="flex justify-start items-center gap-2">
                    <i class="material-symbols-rounded font-light text-2xl transition-all group-hover:fill-1">Person</i>
                    {{ __('Categories Expenses') }}
                    <span class="inline-flex items-center gap-1.5 py-0.5 px-1.5 text-xs font-medium bg-indigo-500 text-white rounded me-1">{{$count}}</span>
                </div> <!-- flex justify-start items-center gap-2-->
            </h4><!-- text-slate-900 text-lg font-medium mb-2-->
        </div><!-- DIV -->
        @if($user->isSuperAdmin() || $user->can('expenses.categories.create'))
            <div>
                @include('livewire._partials.button_create',[
                    'text' => __('Add new'), 'url'=> route('expenses.categories.create')])
            </div>
        @endif
    </div> <!-- flex items-center justify-between flex-wrap gap-2 mb-6-->


    <div class="card overflow-hidden p-6">
        @if($count)
            <div class="flex mb-5">
                @include('livewire._partials.search')
            </div>
        @endif

        @if(count($items))
            @include('livewire.cashier.expenses._partials.data')
        @else
            @include('livewire._partials.nodata' ,['url' => ''])
        @endif

        @if(count($items))
            <div class="mt-5 bg-white">
                {{$items->links()}}
            </div>
        @endif
    </div><!-- card overflow-hidden p-6-->

</div>
