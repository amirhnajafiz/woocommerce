<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\Payment;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;

/**
 * Class AdminPaymentController for managing payments.
 *
 * @package App\Http\Controllers\SuperAdmin
 */
class AdminPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $payments = Payment::paginate(6);

        return view('admin.payment.index')
            ->with('payments', $payments);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        Payment::query()->findOrFail($id)->delete();

        return redirect()
            ->route('admin-payment.index');
    }
}
