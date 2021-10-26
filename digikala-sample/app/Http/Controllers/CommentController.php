<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommentRequest;
use App\Models\Comment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

/**
 * Class CommentController for handling the comment features.
 *
 * @package App\Http\Controllers
 */
class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param CreateCommentRequest $request
     * @return RedirectResponse
     */
    public function store(CreateCommentRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $validated['user_id'] = Auth::id();

        Comment::query()
            ->create($validated);

        return redirect()
            ->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Comment $comment
     * @return RedirectResponse
     */
    public function destroy(Comment $comment): RedirectResponse
    {
        $comment->delete();
        return redirect()
            ->back();
    }
}
