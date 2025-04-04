<div>
    <div class="flex items-center justify-between flex-wrap gap-2 mb-6">
        <div>
            <h4 class="text-slate-900 text-lg font-medium mb-2">
                <div class="flex justify-start items-center gap-2">

                        <span class="  whitespace-nowrap inline-block py-1.5 px-3 rounded-md text-xs font-medium bg-green-100 text-green-800">
                            {{$object->name}}
                        </span>


                </div>
            </h4>
        </div>
        @if($user->isSuperAdmin() || $user->can('products.index'))
            @include('livewire._partials.back-to-list',['url'=> route('products.index')])
        @endif
    </div>


    <div class="flex flex-col gap-6">
        <div class="card">

            <div class="p-6">
                <form wire:submit.prevent="save" class="mt-5">
                    <div>
                        <x-input-label for="query" :value="__('Query')" required="true"></x-input-label>
                        <x-text-input wire:model="message" id="message" placeholder="{{__('Query')}}" type="text" class="mt-1 block w-full" />
                        <x-input-error class="text-red-500 text-xs font-medium " :messages="$errors->get('message')" />
                    </div>
                    <div class="mt-5">
                    <div class="hs-tooltip">
                        <button wire:loading.attr="disabled" data-fc-placement="bottom"   class="btn  bg-primary text-white gap-1">
                            <i class="material-symbols-rounded font-light text-2xl transition-all group-hover:fill-1">add</i>
                            <span>OpenAi Generate</span>
                        </button> <!-- btn  bg-primary text-white gap-1-->
                        <!-- Φόρτωση -->
                        <div wire:loading>
                            <span>Loading...</span>
                        </div>

                        <span
                            class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded shadow-sm"
                            role="tooltip"> OpenAi Generate
    </span><!-- hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded shadow-sm-->
                    </div><!-- hs-tooltip-->
                    </div>
                </form>


                <!-- Εμφάνιση αποτελεσμάτων -->
                @if($results)


                    <div class="card">
                        <div class="card-header">
                            <div class="flex justify-between items-center">
                                <h4 class="card-title mb-4">OpenAI Results</h4>

                            </div>
                        </div>

                        <div class="p-6">
                            <!-- Bubble Editors -->
                            <div id="bubble-editor" style="height: 300px;">
                                {!! $results !!}
                            </div>

                            <script>
                                var quill = new Quill('#bubble-editor', {
                                    theme: 'bubble'
                                });

                            </script>
                        </div>

                    </div>
                @endif

            </div>
        </div>
    </div>
</div>
