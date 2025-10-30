<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Food;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Dashboard\FoodResource;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class FoodController extends Controller
{
    use ApiResponse;

    /**
     * GET /api/v1/foods
     * List all food
     */
    public function index()
    {
        $food = Food::orderBy('created_at', 'desc')
            ->paginate(config('pagination.perPage'));

        return $this->successResponse('User retrieved successfully', $this->buildPaginatedResourceResponse(FoodResource::class, $food), 200);
    }

    /**
     * POST /api/v1/foods
     * Create new food
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'title' => 'required',
            'description' => 'required|string|max:255',
            'ingredients' => 'required',
            'nutrition' => 'required',
            'image' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->errors(), 422);
        }

        $userId = User::where('email', $request->email)->first();
        $createdByUser = Auth::user()->id;

        if ($request->hasFile('image')) {
            $uploadedFile = Cloudinary::upload($request->file('image')->getRealPath(), ['folder' => 'foods'])->getSecurePath();
            $imageUrl = $uploadedFile['secure_url'];
            $imagePublicId = $uploadedFile['public_id'];
        }

        try {
            $food = Food::create([
                'user_id' => $userId,
                'title' => $request->title,
                'description' => $request->description,
                'created_by' => $createdByUser,
                'ingredients' => $request->ingredients,
                'nutrition' => $request->nutrition,
                'image_url' => $imageUrl,
                'image_public_id' => $imagePublicId
            ]);

            return $this->successResponse('Food created successfully', new FoodResource($food), 201);

        } catch (\Exception $e) {
            return $this->errorResponse('Food creation failed:' . $e->getMessage(), 500);
        }
    }

    /**
     * GET /api/v1/foods/{id}
     * Show food information
     */
    public function show($id)
    {
        $food = Food::find($id);

        if (!$food) {
            return $this->errorResponse('Food not found.', 404);
        }

        return $this->successResponse('Food Fetched Successfully', new FoodResource($food), 200);
    }

    /**
     * PUT /api/v1/foods/{id}
     * Update food
     */
    public function update(Request $request, $id)
    {
        $food = Food::find($id);

        if (!$food) {
            return $this->errorResponse('Food not found.', 404);
        }

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'title' => 'required',
            'description' => 'required|string|max:255',
            'ingredients' => 'required',
            'nutrition' => 'required',
            'image' => 'nullable',
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->errors(), 422);
        }

        $foodData = [
            'email' => $request->email,
            'title' => $request->title,
            'description' => $request->description,
            'ingredients' => $request->ingredients,
            'nutrition' => $request->nutrition
        ];

        if ($request->hasFile($request->image)) {
            if ($food->profile_public_id) {
                Cloudinary::destroy($food->profile_public_id);
            }

            $uploadedFile = Cloudinary::upload($request->file('image')->getRealPath(), ['folder' => 'foods'])->getSecurePath();
            $foodData['image_url'] = $uploadedFile['secure_url'];
            $foodData['image_public_id'] = $uploadedFile['public_id'];
        }

        try {
            $food->update($foodData);

            return $this->successResponse('Food updated Successfully', new FoodResource($food), 200);

        } catch (\Exception $e) {
            return $this->errorResponse('Food updated failed:' . $e->getMessage(), 500);
        }
    }

    /**
     * DELETE /api/v1/foods/{id}
     * Delete food
     */
    public function destroy($id)
    {
        $food = Food::find($id);

        if (!$food) {
            return $this->errorResponse('Food not found.', 404);
        }

        if ($food->image_public_id) {
            Cloudinary::destroy($food->image_public_id);
        }

        $food->delete();

        return $this->successResponse('Food deleted Successfully', null, 204);
    }
}
