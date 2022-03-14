<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\company_details;
use App\userLogs;

class apiController extends Controller
{
    public function getCompanyDetails()
    {
        return response()->json(company_details::orderBy('created_at', 'DESC')->first());
    }
    public function getLoggedUser()
    {
        $user = User::find(Auth::id());
        return $user;
    }
    public function ignorePost(Request $request)
    {
        $saveLogs = new userLogs();
        $saveLogs->userId = Auth::id() ?? 0;
        $saveLogs->ipAddress = $request->ip();
        $saveLogs->notes = 'Update Alter Request for employee code: ' . $request->employee_code;
        $saveLogs->save();
        return response()->json($request->all(), 200);
        // return Auth::id();
    }
}
