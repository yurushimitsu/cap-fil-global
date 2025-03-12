<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Fullypaid;
use App\Models\Terminated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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

    public function uploadAnnouncement(Request $request) {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('announcements'), $imageName);

            Announcement::create([
                'filename' => $imageName,
            ]);
        
            return response()->json(['success' => true]);
            // return back()->with('success', 'Image uploaded successfully')->with('image', $imageName);
        }

        return response()->json(['success' => false, 'message' => 'Error deleting record']);
        
    }

    public function showAnnouncement() {
        $latest = Announcement::orderBy('filename', 'desc')->first();

        return view('announcement', compact('latest'));
    }

    public function getAllAnnouncement() {
        $announcements = Announcement::all();

        return view('adminAnnouncement', compact('announcements'));
    }
    
    public function deleteAnnouncement($filename) {
        $deleted = DB::table('announcement')
                    ->where('filename', $filename)
                    ->delete();
    
        if ($deleted) {
            if (file_exists(public_path('announcements/' . $filename))) {
                unlink(public_path('announcements/' . $filename));
            }

            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false, 'message' => 'Error deleting record']);
        }
    }
    
}
