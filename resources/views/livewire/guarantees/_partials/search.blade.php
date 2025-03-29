<!-- Αναζήτηση προϊόντων -->
<div class="mb-4">
    <x-input-label for="search" :value="__('Search')" required="true"></x-input-label>
    <div class="relative w-2/3">
        <input type="text" wire:model.live="search" id="search" placeholder="{{__('Search....')}}" class="form-input ps-11">
        <div class="absolute inset-y-0 start-4 flex items-center z-20">
            <i class="ti ti-search text-lg text-gray-400"></i>
        </div>
    </div>
    <small class="text-gray-500">Μπορείτε να κάνετε αναζήτηση με κωδικό προϊόντος</small>
</div>
