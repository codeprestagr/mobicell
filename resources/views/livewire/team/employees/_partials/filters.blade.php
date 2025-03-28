


<div>
    <select  wire:model.live="storeFilter"  class="form-select"  >
        <option value="" >{{ __('Select Store') }}</option>
        @foreach($stores as $store)
            <option value="{{ $store->id }}">{{ $store->name }}</option>
        @endforeach
    </select>
</div>
