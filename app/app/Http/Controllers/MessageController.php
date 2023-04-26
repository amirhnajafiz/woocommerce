<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\RedirectResponse;

/**
 * Class MessageController for handling the user messages.
 *
 * @package App\Http\Controllers
 */
class MessageController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param string $message
     * @param int $user_id
     * @param string $type
     */
    public function store(string $message, int $user_id, string $type)
    {
        Message::query()
            ->create([
                'message' => $message,
                'user_id' => $user_id,
                'type' => $type
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        Message::query()
            ->findOrFail($id)
            ->delete();
        return redirect()
            ->back();
    }
}
