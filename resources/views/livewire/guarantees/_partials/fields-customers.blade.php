<div class="p-5">
    <div class="grid lg:grid-cols-2 gap-6 mt-5">
        <div>
            <x-input-label for="firstname" :value="__('Firstname')" required="true"></x-input-label>
            <x-text-input wire:model="firstname" id="firstname" placeholder="{{__('Firstname')}}" type="text" class="mt-1 block w-full" />
            <x-input-error class="text-red-500 text-xs font-medium" :messages="$errors->get('firstname')" />
        </div><!-- div-->
        <div>
            <x-input-label for="lastname" :value="__('Lastname')" required="true"></x-input-label>
            <x-text-input wire:model="lastname" id="lastname" placeholder="{{__('Lastname')}}" type="text" class="mt-1 block w-full" />
            <x-input-error class="text-red-500 text-xs font-medium" :messages="$errors->get('lastname')" />
        </div><!-- div-->

        <div>
            <x-input-label for="email" :value="__('Email')" required="true"></x-input-label>
            <x-text-input wire:model="email" id="email" placeholder="{{__('Email')}}" type="text" class="mt-1 block w-full" />
            <x-input-error class="text-red-500 text-xs font-medium" :messages="$errors->get('email')" />
        </div><!-- div-->

        <div>
            <x-input-label for="address" :value="__('Address')" required="true"></x-input-label>
            <x-text-input wire:model="address" id="address" placeholder="{{__('Address')}}" type="text" class="mt-1 block w-full" />
            <x-input-error class="text-red-500 text-xs font-medium" :messages="$errors->get('address')" />
        </div><!-- div-->

        <div>
            <x-input-label for="city" :value="__('City')" required="true"></x-input-label>
            <x-text-input wire:model="city" id="city" placeholder="{{__('City')}}" type="text" class="mt-1 block w-full" />
            <x-input-error class="text-red-500 text-xs font-medium" :messages="$errors->get('city')" />
        </div><!-- div-->

        <div>
            <x-input-label for="postcode" :value="__('Postcode')" required="true"></x-input-label>
            <x-text-input wire:model="postcode" id="postcode" placeholder="{{__('Postcode')}}" type="text" class="mt-1 block w-full" />
            <x-input-error class="text-red-500 text-xs font-medium" :messages="$errors->get('postcode')" />
        </div><!-- div-->

        <div>
            <x-input-label for="phone" :value="__('Phone')" required="true"></x-input-label>
            <x-text-input wire:model="phone" id="phone" placeholder="{{__('Phone')}}" type="text" class="mt-1 block w-full" />
            <x-input-error class="text-red-500 text-xs font-medium" :messages="$errors->get('phone')" />
        </div><!-- div-->
    </div>
</div>
