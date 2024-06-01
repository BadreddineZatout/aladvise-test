<?php

namespace App\Http\Controllers;

use App\Models\VacationRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VacationRequestController extends Controller
{
    public function createRequest($employee_id, Request $request)
    {
        if (VacationRequest::where([
            "employee_id" => $employee_id,
            'starts_at' => new Carbon($request->starts_at),
            'ends_at' => new Carbon($request->ends_at),
        ])->exists()) {
            return response('request already exists', 400);
        }
        // dd(
        //     $request->starts_at,
        //     $request->ends_at
        // );
        return VacationRequest::create([
            "employee_id" => $employee_id,
            "starts_at" => new Carbon($request->starts_at),
            "ends_at" => new Carbon($request->ends_at),
        ]);
    }

    public function getEmployeeRequests($employee_id)
    {
        return VacationRequest::where('employee_id', $employee_id)->get();
    }
}
