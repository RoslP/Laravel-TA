<?php

namespace App\Http\Controllers\Auth\Api;

use App\Http\Controllers\Controller;
use App\Services\UPemisionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserPermissionController extends Controller
{
    private $userPermissionService;
    public function __construct(UPemisionService $userPermissionService)
    {
        $this->userPermissionService = $userPermissionService;
    }

    public function checkPermission()
    {
        if ($this->userPermissionService->hasPermission(Auth::user())) {
            return response()->json(['admin']);
        } else {
            return 0;
        }
    }
}
