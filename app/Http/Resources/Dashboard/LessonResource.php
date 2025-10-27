<?php

namespace App\Http\Resources\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LessonResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'description' => $this->description,
            'level' => $this->level,
            'videoUrl' => $this->video_url,
            'videoPublicId' => $this->video_public_id,
            'lessonTypeId' => $this->lesson_type_id,
            'durationMinutes' => $this->duration_minutes,
            'isFree' => $this->is_free,
            'isPremium' => $this->is_premium,
            'trainerId' => $this->trainer_id,
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at
        ];
    }
}
