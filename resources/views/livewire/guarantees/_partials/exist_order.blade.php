<div class="card mt-5">
    <div class="card-header">
        <h4 class="card-title">{{ __('Search Order') }}</h4>
    </div>
    <div class="p-6">
<div class="mt-5">
    <x-input-label for="search_order" :value="__('Order')" required="true"></x-input-label>
    <x-text-input wire:model="search" id="email" placeholder="{{__('Search')}}" type="text" class="mt-1 block w-full" />

    <x-input-error class="text-red-500 text-xs font-medium " :messages="$errors->get('search')" />
</div>

    </div>
</div>
