<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SuperAdminUpdateRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

/**
 * Class AdminController for admin user CRUD.
 *
 * @package App\Http\Controllers\SuperAdmin
 */
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $users = User::paginate(10);

        return view('admin.user.index')
            ->with('users', $users);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SuperAdminUpdateRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(SuperAdminUpdateRequest $request, $id): RedirectResponse
    {
        $validated = $request->validated();
        $user = User::query()->where('id', '=', $id)->first();

        $user->update([
            'role' => $validated['role']
        ]);

        $user->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        User::query()->findOrFail($id)->delete();
        return back();
    }
}
