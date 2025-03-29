<?php

namespace App\Jobs;

use App\Models\Product;
use Illuminate\Bus\Batchable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\DB;

class ProductJob implements ShouldQueue
{
    use Queueable, Batchable;

    protected $products;

    /**
     * Create a new job instance.
     */
    public function __construct($products)
    {

        $this->products = $products;
    }
    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Βρίσκουμε τα προϊόντα που χρειάζονται ενημέρωση
        $productsToUpdate = collect($this->products)->filter(function ($p) {
            $product = Product::where('id_prestashop', $p['id'])->first();
            return $product && $this->hasChanges($product, $p);
        });
        $productIdsInNewList = collect($this->products)->pluck('id')->toArray();
        $productsToDelete = Product::whereNotIn('id_prestashop', $productIdsInNewList)->get();


        foreach ($this->products as $p) {

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

        // Διαγραφή των προϊόντων που δεν υπάρχουν στη νέα λίστα
        foreach ($productsToDelete as $product) {
            $product->delete();
        }



    }

    protected function hasChanges(Product $product, array $data): bool
    {
        return $product->name !== $data['name'] ||
            $product->sku !== $data['reference'] ||
            $product->url !== $data['url'] ||
            $product->image !== $data['image'] ||
            $product->price !== $data['price'] ||
            $product->mpn !== $data['mpn'] ||
            $product->ean !== $data['ean13'] ||
            $product->updated_at !== $data['updated_at'];
    }
}
