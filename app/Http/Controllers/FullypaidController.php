<?php

namespace App\Http\Controllers;

use App\Models\Fullypaid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FullypaidController extends Controller
{
    public function ajaxSearch(Request $request) {
        if($request->ajax()){
            $output = '';
            $query = $request->get('query');
            if($query != '') {
                $data = DB::table('fullypaid')
                    ->where('accountNo', $query)
                    ->orWhere('subscriber', 'like', '%'.$query.'%')
                    ->orWhere('office', 'like', '%'.$query.'%')
                    ->get();
            }
             
            $total_row = $data->count();

            if($total_row > 0) {
                $output .= '
                    <table class="w-full text-sm text-center rtl:text-right text-gray-500 border-2">
                        <thead class="text-md text-gray-700" style="background-color: #B3E8E5">
                            <tr>
                                <th scope="col" class="px-6 py-3">Tranche No.</th>
                                <th scope="col" class="px-6 py-3">Batch No.</th>
                                <th scope="col" class="px-6 py-3">Subscriber/Payee</th>
                                <th scope="col" class="px-6 py-3">Account No.</th>
                                <th scope="col" class="px-6 py-3">Amount</th>
                                <th scope="col" class="px-6 py-3">Schedule</th>
                                <th scope="col" class="px-6 py-3">Servicing Office</th>
                            </tr>
                        </thead>
                        <tbody>';
                foreach($data as $row) {
                    $output .= '
                    <tr class="bg-white border-b border-gray-200">
                        <td class="px-6 py-4 text-gray-800 font-medium">'.$row->trancheNo.'</td>
                        <td class="px-6 py-4 text-gray-800 font-medium">'.$row->batchNo.'</td>
                        <td class="px-6 py-4 text-gray-800 font-medium">'.$row->subscriber.'</td>
                        <td class="px-6 py-4 text-gray-800 font-medium">'.$row->accountNo.'</td>
                        <td class="px-6 py-4 text-gray-800 font-medium">'.$row->amount.'</td>
                        <td class="px-6 py-4 text-gray-800 font-medium">'.$row->schedule.'</td>
                        <td class="px-6 py-4 text-gray-800 font-medium">'.$row->office.'</td>
                    </tr>
                    ';
                }
                $output .= '</tbody>
                </table>';
            } else {
                $output = '
                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 role="alert">
                    <span class="font-medium">Account number does not exist</span>
                </div>
                ';
            }
            $data = array(
                'table_data'  => $output
            );
            
            echo json_encode($data);
        }
    }

    public function searchFullypaid(Request $request) {
        $search = $request->input('search');

        $posts = collect();
        if ($search) {
            $posts = Fullypaid::where('accountNo', $search)
                                ->get();
        }
        
        return view('fullypaid', compact('posts', 'search'));
    }
}
