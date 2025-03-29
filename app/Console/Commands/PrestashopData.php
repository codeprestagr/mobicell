<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
class PrestashopData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:prestashop-products';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $lastSyncDate = Product::max('updated_at') ?? '2000-01-01 00:00:00';

        $page = 1;
        $limit = 50; // Φέρνουμε 50 προϊόντα ανά σελίδα

        do {
            $url ="https://gizmos.gr/laravel-api?date_upd_after=" . urlencode($lastSyncDate) . "&page={$page}&limit={$limit}";
            $response = Http::get($url);
            $data = $response->json();

            $products = $data['products'] ?? [];
            $totalPages = $data['pagination']['total_pages'] ?? 1;


            foreach ($products as $p) {
                $existingProduct = Product::where('id_prestashop', $p['id'])->first();

                if (!$existingProduct || $existingProduct->updated_at_prestashop < $p['updated_at']) {
                    Product::updateOrCreate(
                        ['id_prestashop' => $p['id']],
                        [
                            'name' => $p['name'],
                            'sku' => $p['reference'],
                            'url' => $p['url'],
                            'image' => $p['image'],
                            'price' => $p['price'],
                            'mpn' => $p['mpn'],
                            'ean'=> $p['ean13'],
                            'updated_at' => $p['updated_at'],
                        ]
                    );
                }
            }

            $page++;
        } while ($page <= $totalPages);


    }
}
