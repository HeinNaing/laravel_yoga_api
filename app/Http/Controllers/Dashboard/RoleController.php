<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Helpers\ApiResponse;
use Laravel\Sanctum\HasApiTokens;
use App\Http\Controllers\Controller;
use Illuminate\Notifications\Notifiable;
use App\Http\Resources\Dashboard\RoleResource;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RoleController extends Controller
{
    use ApiResponse, HasApiTokens, HasFactory, Notifiable;

    public function index() {
        $roles = Role::all();

        if(!$roles) {
            return $this->errorResponse('Role not found', 404);
        }

        return $this->successResponse('Role retrieved successfully', RoleResource::collection($roles), 200);
    }
}
