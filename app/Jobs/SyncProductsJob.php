<?php

namespace App\Jobs;

use App\Events\SyncComplete;
use App\Events\SyncProgressUpdated;
use App\Models\Product;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Event;
class SyncProductsJob implements ShouldQueue
{
    use Queueable , InteractsWithQueue, SerializesModels, Dispatchable;
    protected $page;
    protected $limit;
    protected $totalProducts;
    protected $syncedProducts;

    /**
     * Create a new job instance.
     */
    public function __construct($page, $limit, $totalProducts)
    {
        $this->page = $page;
        $this->limit = $limit;
        $this->totalProducts = $totalProducts;
        $this->syncedProducts = 0;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            $lastSyncDate = Product::max('updated_at') ?? '2000-01-01 00:00:00';
            $allSyncedIds = []; // Θα αποθηκεύουμε όλα τα προϊόντα που συγχρονίζουμε

            while ($this->syncedProducts < $this->totalProducts) {
                $response = Http::get('https://gizmos.gr/laravel-api', [
                    'page' => $this->page,
                    'limit' => $this->limit,
//                    'date_upd_after' => $lastSyncDate,
                ]);

                $products = $response->json()['products'];
                if (empty($products)) {
                    break; // Σταματάει αν δεν υπάρχουν άλλα προϊόντα
                }
                foreach ($products as $p) {
                    // Process each product (save to the database or handle it)
                    $existingProduct = Product::where('id_prestashop', $p['id'])->first();

                    // 🔹 Ελέγχουμε αν το προϊόν έχει αλλάξει
                    if ($existingProduct) {
                        if ($existingProduct->updated_at >= $p['updated_at']) {
                            $allSyncedIds[] = $existingProduct->id_prestashop;
                            continue; // Αν δεν έχει αλλάξει, το αγνοούμε
                        }
                    }


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

                    $allSyncedIds[] = $p['id']; // Προσθέτουμε το ID στα συγχρονισμένα

                    $this->syncedProducts++;
                    $progress = round(($this->syncedProducts / $this->totalProducts) * 100);
                    event(new SyncProgressUpdated($progress, $this->syncedProducts, $this->totalProducts));
                }

                $this->page++; // Move to the next page for the next set of products
                if ($this->syncedProducts >= $this->totalProducts) {
                    break;
                }
            }
            Product::whereNotIn('id_prestashop', $allSyncedIds)->delete();

            event(new SyncComplete('Η συγχρονισμός των προϊόντων ολοκληρώθηκε!'));


        } catch (\Exception $e) {
            Log::error("Error during product sync: " . $e->getMessage());
            throw $e; // Rethrow exception to let the job retry
        }
    }
}
