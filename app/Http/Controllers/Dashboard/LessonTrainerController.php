<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Helpers\ApiResponse;
use App\Http\Resources\Dashboard\LessonTrainerResource;
use Illuminate\Http\Request;
use App\Models\LessonTrainer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;



class LessonTrainerController extends Controller
{
    use ApiResponse;
    /**
     * POST /api/v1/lesson-trainers
     * Assign a lesson to a trainer.
     */
    public function assign(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'lessonTypeId' => 'required|exists:lesson_types,id',
            'trainerId' => 'required|exists:trainer_details,id',
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->errors(), 422);
        }

        try {
            $lessonTrainer = LessonTrainer::create([
                'lesson_type_id' => $request->lessonTypeId,
                'trainer_id' => $request->trainerId
            ]);
            return $this->successResponse('Lesson trainer assign successfully.', new LessonTrainerResource($lessonTrainer), 201);

        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), 500);
        }

    }

    /**
     * DELETE /api/v1/lesson-trainers/{id}
     * Remove a lesson assignment from a trainer.
     */
    public function unassign($id)
    {
        $unassign = LessonTrainer::find($id, 'id');

        if(!$unassign) {
            return $this->errorResponse("Trainer's lesson not found.", 404);
        }

        $unassign->delete();

        return $this->successResponse("Trainer's lesson deleted.", null, 204);
    }
}
