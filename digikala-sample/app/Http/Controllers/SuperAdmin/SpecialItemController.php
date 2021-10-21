<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MakeSpecialItemRequest;
use App\Jobs\DeleteSpecials;
use App\Models\SpecialItem;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 * Class SpecialItemController for controlling special items CRUD.
 *
 * @package App\Http\Controllers\Web
 */
class SpecialItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $items = SpecialItem::paginate(4);

        return view('admin.special.index')
            ->with('items', $items);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param MakeSpecialItemRequest $request
     * @return RedirectResponse
     */
    public function store(MakeSpecialItemRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        DB::transaction(function () use ($validated) {
            $item = SpecialItem::query()
                ->create([
                    'item_id' => $validated['item_id'],
                    'expire_date' => now()->addMonth(),
                    'discount' => 12
                ]);

            DeleteSpecials::dispatch($item)->delay(now()->addMonth());
        });

        return redirect()
            ->route('special.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        SpecialItem::query()->findOrFail($id)->delete();
        return redirect()
            ->route('special.index');
    }
}
