<?php

namespace App\Jobs;

use App\Events\QueueFinished;
use App\Jobs\ProductJob;
use App\Models\Product;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Bus\Batch;
use Throwable;
class SyncProductsBatchDispatcherJob implements ShouldQueue
{
    use Queueable, Dispatchable, SerializesModels, InteractsWithQueue;


    protected $page;
    protected $limit;
    protected $totalProducts;

    /**
     * Create a new job instance.
     */
    public function __construct($page = 1, $limit = 1000, $totalProducts = 1000)
    {
        $this->page = $page;
        $this->limit = $limit;
        $this->totalProducts = $totalProducts;
    }

    /**
     * Execute the job.
     */

    public function handle(): void
    {
        try {
            $batch = Bus::batch([])->dispatch();
            $allSyncedIds = [];
            $jobs = [];

            // 🔹 Παίρνουμε την τελευταία ημερομηνία συγχρονισμού
//            $lastSyncDate = Product::max('updated_at') ?? '2000-01-01 00:00:00';

            while (count($allSyncedIds) < $this->totalProducts) {
                $response = Http::get('https://housephone.gr/laravel-api', [
                    'page' => $this->page,
                    'limit' => $this->limit,
                ]);

                $products = $response->json()['products'] ?? [];
                if (empty($products)) {
                    break;
                }

                $jobs[] = new ProductJob($products);
                $this->page++;
            }
            if (count($jobs) > 0) {
                $batch = Bus::batch($jobs)->dispatch(); // Dispatch the batch with jobs
            }
        } catch (\Exception $e) {
            Log::error("Error during product sync: " . $e->getMessage());
            throw $e;
        }
    }
}
