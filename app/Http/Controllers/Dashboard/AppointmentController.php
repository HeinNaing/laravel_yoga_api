<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Helpers\ApiResponse;
use App\Http\Resources\Dashboard\AppointmentResource;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AppointmentController extends Controller
{
    use ApiResponse;
    /**
     * GET /api/appointments
     * List all appointments
     */
    public function index()
    {
        $appointments = Appointment::with(['member', 'admin', 'trainer'])
            ->orderBy('appointment_date', 'desc')
            ->get();

        return $this->successResponse(['Appointment retrieved successfully', AppointmentResource::collection($appointments), 200]);
    }

    /**
     * POST /api/appointments
     * Create new appointment
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'admin_id' => 'required|exists:users,id',
            'trainer_id' => 'required|exists:users,id',
            'appointment_date' => 'required|date',
            'appointment_fees' => 'required|numeric|min:0',
            'meet_link' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->errors(), 422);
        }

        $appointment = Appointment::create([
            'user_id' => $request->user_id,
            'admin_id' => $request->admin_id,
            'trainer_id' => $request->trainer_id,
            'appointment_date' => $request->appointment_date,
            'appointment_fees' => $request->appointment_fees,
            'meet_link' => $request->meet_link,
            'is_approved' => false,
            'is_completed' => false,
        ]);

        return $this->successResponse('Appointment created successfully', new AppointmentResource($appointment), 201);
    }

    /**
     * PUT /api/appointments/{id}
     * Update appointment (approve / complete / edit)
     */
    public function update(Request $request, $id)
    {
        $appointment = Appointment::find($id);

        if (!$appointment) {
            return $this->errorResponse('Appointment not found!', 404);
        }

        $validator = Validator::make($request->all(), [
            'appointment_date' => 'sometimes|date',
            'appointment_fees' => 'sometimes|numeric|min:0',
            'meet_link' => 'sometimes|string|max:255',
            'is_approved' => 'sometimes|boolean',
            'is_completed' => 'sometimes|boolean',
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->errors(), 422);
        }

        $appointment->update($request->only([
            'appointment_date',
            'appointment_fees',
            'meet_link',
            'is_approved',
            'is_completed'
        ]));

        return $this->successResponse('Appointment updated successfully', new AppointmentResource($appointment), 200);
    }

    /**
     * DELETE /api/appointments/{id}
     * Delete appointment
     */
    public function destroy($id)
    {
        $appointment = Appointment::find($id);

        if (!$appointment) {
            return $this->errorResponse('Appointment not found!', 404);
        }

        $appointment->delete();

        return $this->successResponse('Appointment deleted successdfully', new AppointmentResource($appointment), 204);
    }
}
