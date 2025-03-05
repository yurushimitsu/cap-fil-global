<?php

namespace App\Http\Controllers;
use App\Models\Fullypaid;
use App\Models\Terminated;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function createAdminData(Request $request) {
        $type = $request->input('type');
        $data = [
            'batchNo' => $request->input('batchNo'),
            'subscriber' => $request->input('subscriber'),
            'accountNo' => $request->input('accountNo'),
            'amount' => $request->input('amount'),
            'schedule' => $request->input('schedule'),
            'office' => $request->input('office')
        ];

        if ($type == 'fullyPaid') {
            $response = Fullypaid::create($data);
        } elseif ($type == 'terminated') {
            $response = Terminated::create($data);
        }

        // return $response;
        if ($response) {
            return response()->json(['success' => true, 'message' => 'Data inserted successfully!']);
        } else {
            return response()->json(['success' => false, 'message' => 'Failed to insert data.']);
        }
    }

    public function getAllData() {
        $fullypaidData = Fullypaid::all();
        $terminatedData = Terminated::all();

        $allData = $fullypaidData;
        // dd($allData);
        $sortedData = $allData->sortBy('batchNo');

        return view('adminTable', compact('sortedData'));
    }
}
