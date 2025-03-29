<?php

namespace App\Livewire\Dashboard;

use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
use Livewire\Component;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class Index extends Component
{

    public function render()
    {
        $today = Carbon::today();

        $chart_options = [
            'chart_title' => "TEST",
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Store',
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'chart_type' => 'bar',
        ];
        $chart1 = new LaravelChart($chart_options);


        return view('livewire.dashboard.index',[
            'totalProducts' => Product::all()->count(),
            'todayProducts' => Product::whereDate('created_at', $today)->count(),
            'countEan'      => $this->countDoubleEAN(),
            'totalOrders'        => Order::all()->count(),
            'chart1' => $chart1,
            'todayOrders'   => Order::whereDate('created_at', $today)->count(),
        ]);
    }



    public function countDoubleEAN()
    {
        $query= Product::select('ean')
                        ->groupBy('ean')
                        ->havingRaw('COUNT(ean) > 1')
                        ->count();
        return $query;
    }
}
