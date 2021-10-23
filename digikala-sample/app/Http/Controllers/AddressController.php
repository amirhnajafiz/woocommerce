<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUpdateAddressRequest;
use App\Models\Address;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

/**
 * Class AddressController for user addresses.
 *
 * @package App\Http\Controllers
 */
class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $addresses = Auth::user()->addresses;
        return view('utils.address.index')
            ->with('addresses', $addresses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('utils.address.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateUpdateAddressRequest $request
     * @return RedirectResponse
     */
    public function store(CreateUpdateAddressRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $validated['user_id'] = Auth::id();

        Address::query()->create($validated);

        return redirect()
            ->route('address.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Address $address
     * @return View
     */
    public function edit(Address $address): View
    {
        return view('utils.address.edit')
            ->with('address', $address);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CreateUpdateAddressRequest $request
     * @param Address $address
     * @return RedirectResponse
     */
    public function update(CreateUpdateAddressRequest $request, Address $address): RedirectResponse
    {
        $validated = $request->validated();

        $address->update($validated);
        $address->save();

        return redirect()
            ->route('address.index', $address->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Address $address
     * @return RedirectResponse
     */
    public function destroy(Address $address): RedirectResponse
    {
        $address->delete();

        return redirect()
            ->route('address.index');
    }
}
