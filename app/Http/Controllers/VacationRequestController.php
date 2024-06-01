<?php

namespace App\Http\Controllers;

use App\Models\Department;
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

    public function getManagerRequests($manager_id)
    {
        $employees = Department::with('employees')->where('manager_id', $manager_id)->first()?->employees?->pluck('id');
        return VacationRequest::whereIn('employee_id', $employees ?? [])->get();
    }

    public function acceptRequest($manager_id, $id)
    {
        $employees = Department::with('employees')->where('manager_id', $manager_id)->first()?->employees?->pluck('id') ?? [];
        $request = VacationRequest::find($id);
        if (!in_array($request->employee_id, $employees->toArray())) {
            return response('This request belongs to an emloyee that works for an another manager', 400);
        }

        $request->status = "accepted";
        $request->save();
        return $request;
    }

    public function rejectRequest($manager_id, $id, Request $request)
    {
        $employees = Department::with('employees')->where('manager_id', $manager_id)->first()?->employees?->pluck('id') ?? [];
        $vacation_request = VacationRequest::find($id);
        if (!in_array($vacation_request->employee_id, $employees->toArray())) {
            return response('This request belongs to an emloyee that works for an another manager', 400);
        }

        if (!$request->comment)
            return response(
                'The comment is required',
                400
            );

        $vacation_request->status = "rejected";
        $vacation_request->comment = $request->comment;
        $vacation_request->save();
        return $vacation_request;
    }
}
