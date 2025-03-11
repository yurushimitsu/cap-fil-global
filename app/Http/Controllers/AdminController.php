<?php

namespace App\Http\Controllers;
use App\Models\Fullypaid;
use App\Models\Terminated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        $allData = $fullypaidData->concat($terminatedData);
        // dd($allData);
        $sortedData = $allData->sortBy('batchNo');

        return view('adminTable', compact('sortedData'));
    }

    public function updateAdminData(Request $request) {
        $updated = DB::table($request->dbTable)
            ->where('trancheNo', $request->trancheNo)
            ->update([
                'batchNo' => $request->batchNo,
                'subscriber' => $request->subscriber,
                'accountNo' => $request->accountNo,
                'amount' => $request->amount,
                'schedule' => $request->schedule,
                'office' => $request->office,
            ]);

        if ($updated) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false, 'message' => 'No records updated']);
        }
    }

    public function deleteAdminData($dbTable, $trancheNo) {
        // Delete the record based on the dbTable and trancheNo
        $deleted = DB::table($dbTable)
                    ->where('trancheNo', $trancheNo)
                    ->delete();
    
        if ($deleted) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false, 'message' => 'Error deleting record']);
        }
    }
}
