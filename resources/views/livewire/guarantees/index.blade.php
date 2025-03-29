<div>
    <div class="flex items-center justify-between flex-wrap gap-2 mb-6">
        <div>
            <h4 class="text-slate-900 text-lg font-medium mb-2">
                <div class="flex justify-start items-center gap-2">
                    <i class="material-symbols-rounded font-light text-2xl transition-all group-hover:fill-1">Person</i>
                    {{ __('Guarantees') }}
                    <span class="inline-flex items-center gap-1.5 py-0.5 px-1.5 text-xs font-medium bg-indigo-500 text-white rounded me-1">{{$count}}</span>
                </div> <!-- flex justify-start items-center gap-2-->
            </h4><!-- text-slate-900 text-lg font-medium mb-2-->
        </div><!-- DIV -->

        <div>
            @include('livewire._partials.button_create',[
                'text' => __('Add new'), 'url'=> route('guarantees.create')])
        </div>
    </div> <!-- flex items-center justify-between flex-wrap gap-2 mb-6-->


</div>
