<?php

namespace App\Jobs;

use App\Models\Item;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

/**
 * Class ItemCreate.
 *
 * @package App\Jobs
 */
class ItemCreate implements ShouldQueue
{
    // Traits
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Item of the queue.
     *
     * @var Item
     */
    private $item;

    /**
     * Create a new job instance.
     *
     * @param Item $item
     */
    public function __construct(Item $item)
    {
        $this->item = $item;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // TODO: Email sender with Channel
        Log::info('Item created: ' . $this->item->id);
    }
}
