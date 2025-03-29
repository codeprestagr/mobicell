<div>
    <div class="flex items-center justify-between flex-wrap gap-2 mb-6">
        <div>
            <h4 class="text-slate-900 text-lg font-medium mb-2">
                <div class="flex justify-start items-center gap-2">
                    <i class="material-symbols-rounded font-light text-2xl transition-all group-hover:fill-1">Dashboard</i>
                    {{ __('Dashboard') }}

                </div> <!-- flex justify-start items-center gap-2-->
            </h4><!-- text-slate-900 text-lg font-medium mb-2-->
        </div><!-- DIV -->

    </div> <!-- flex items-center justify-between flex-wrap gap-2 mb-6-->


    <div class="grid xl:grid-cols-4 md:grid-cols-2 gap-6 mb-6">


        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="p-5">
                                <span
                                    class="material-symbols-rounded float-end text-3xl text-default-400">payments</span>
                    <h6 class="text-muted text-sm uppercase">{{__('Orders')}}</h6>
                    <h3 class="text-2xl mb-3"><span>{{$totalOrders}}</span></h3>
                    <span
                        class="inline-flex items-center gap-1.5 py-0.5 px-1.5 text-xs font-medium bg-danger text-white rounded me-1">
                                    {{$todayOrders}} </span> <span class="text-muted">{{ __('Today') }}</span>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="p-5">
                    <span class="material-symbols-rounded float-end text-3xl text-default-400">Shoppingmode</span>
                    <h6 class="text-muted text-sm uppercase">{{ __('Products') }}</h6>
                    <h3 class="text-2xl mb-3" data-plugin="counterup">{{$totalProducts}}</h3>
                   @if($todayProducts)
                        <span
                            class="inline-flex items-center gap-1.5 py-0.5 px-1.5 text-xs font-medium bg-success text-white rounded me-1">
                                    {{$todayProducts}} </span> <span class="text-muted">{{ __('Today') }}</span>
                    @else
                       <span
                           class="inline-flex items-center gap-1.5 py-0.5 px-1.5 text-xs font-medium bg-danger text-white rounded me-1">
                           {{$todayProducts}}
                       </span>
                   @endif

                </div>
            </div>
        </div>



    </div>
    <div wire:loading>
        <p>Loading chart...</p>
    </div>

    {!! $chart1->renderHtml() !!}

</div>
<!-- end row -->
@push('scripts')

    {!! $chart1->renderChartJsLibrary() !!}
    {!! $chart1->renderJs() !!}
@endpush
