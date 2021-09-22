<?php

namespace App\Jobs;

use App\Models\Brand;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

/**
 * Class BrandCreate.
 *
 * @package App\Jobs
 */
class BrandCreate implements ShouldQueue
{
    // Traits
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Brand of the Queue
     *
     * @var Brand
     */
    private $brand;

    /**
     * Create a new job instance.
     *
     * @param Brand $brand
     */
    public function __construct(Brand $brand)
    {
        $this->brand = $brand;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Log::info('Brand created: ' . $this->brand->id);
    }
}
