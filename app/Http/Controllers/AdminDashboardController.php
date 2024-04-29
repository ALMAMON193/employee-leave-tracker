<?php

namespace App\Http\Controllers;

use App\Models\LeaveRequest;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function showDashboard()
    {
        // Retrieve leave requests data
        $leaveRequests = LeaveRequest::all();

        // Calculate statistics
        $totalLeaveRequests = LeaveRequest::count();
        $pendingRequests = LeaveRequest::where('status', 'pending')->count();
        $approvedRequests = LeaveRequest::where('status', 'approved')->count();
        $rejectedRequests = LeaveRequest::where('status', 'rejected')->count();

        // Pass the data to the view
        return view('admin_dashboard', compact('leaveRequests', 'totalLeaveRequests', 'pendingRequests', 'approvedRequests', 'rejectedRequests'));
    }
}