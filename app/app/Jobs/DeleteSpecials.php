<?php

namespace App\Jobs;

use App\Models\SpecialItem;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

/**
 * Class DeleteSpecials for deleting the expire special items.
 *
 * @package App\Jobs
 */
class DeleteSpecials implements ShouldQueue
{
    // Traits
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    // Instance of item object
    public $specialItem;

    /**
     * Create a new job instance.
     *
     * @param SpecialItem $specialItem
     */
    public function __construct(SpecialItem $specialItem)
    {
        $this->specialItem = $specialItem;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->specialItem->delete();
    }
}
