<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

/**
 * Class AdminController for admin features.
 *
 * @package App\Http\Controllers
 */
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return \response()->json([
            'status' => 'OK',
            'page' => 'admin'
        ]);
    }
}
