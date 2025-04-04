<div class="grid xl:grid-cols-2 lg:grid-cols-2 gap-6 mt-5">
    <div class="card">

        <div class="card-header flex justify-between items-center">
            <h4 class="card-title">
                {{ __('Customer Detail') }}
            </h4>
       </div>

        @include('livewire.guarantees._partials.fields-customers')
    </div><!--- card-->

    <div class="card">

            <div class="card-header flex justify-between items-center">
                <h4 class="card-title">
                    {{ __('Select Products') }}
                </h4>
            </div>


        <div class="p-5">

            @include('livewire.guarantees._partials.search')

            @if(count($products))


                <div class="grid lg:grid-cols-1 gap-6 mt-5">
                    <div>

                        <x-input-label for="product" :value="__('Product')" required="true"></x-input-label>
                        <select    wire:model.lazy="selectedProductId" class="form-select">
                            <option value="">Επιλέξτε προϊόν</option>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}">
                                    {{ $product->name }} (Κωδικός: {{ $product->code }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>





                @if($selectedProductId)
                    <div class="grid lg:grid-cols-2 gap-6 mt-5">
                        <div>
                            <x-input-label for="unitPrice" :value="__('Unit Price')" required="true"></x-input-label>
                            <x-text-input wire:model="unitPrice" id="unitPrice" placeholder="{{__('unitPrice')}}" type="text" class="mt-1 block w-full" />
                            <x-input-error class="text-red-500 text-xs font-medium" :messages="$errors->get('unitPrice')" />
                        </div><!-- div-->

                        <div>
                            <x-input-label for="codeimei" :value="__('Code IMEI')" required="true"></x-input-label>
                            <x-text-input wire:model="imei" id="imei" placeholder="{{__('imei')}}" type="text" class="mt-1 block w-full" />
                        </div>
                    </div>



                <div class="grid lg:grid-cols-2 gap-6 mt-5">

            <!-- Κουμπί Προσθήκης -->
            <a href="javascript:void(0);" wire:click="addProductToList" class="btn rounded-full  bg-primary text-white gap-3">

                <i class="material-symbols-rounded font-light text-2xl transition-all group-hover:fill-1">Add</i>
                    {{ __('Add to list') }}
            </a>

                </div>
                @endif



            @endif




            </div>
        </div>
<div>

@if($selectedProducts)
    @include('livewire.guarantees._partials.selected')
@endif
