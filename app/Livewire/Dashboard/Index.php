<?php

namespace App\Livewire\Dashboard;

use Akaunting\Apexcharts\Chart;
use App\Charts\ProductTrendsChart;
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

        $chart =1;

        return view('livewire.dashboard.index',[
            'totalProducts' => Product::all()->count(),
            'todayProducts' => Product::where('updated_at', '>=', now()->subHour())->count(),
        'countEan'      => $this->countDoubleEAN(),
            'totalOrders'        => Order::all()->count(),
            'chart' => $chart,
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
