<?php


namespace App\Http\Controllers;


use App\Models\Item;
use App\Models\Reservation;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function index(Request $request) {
        return view('reports.index');
    }

    public function reservationReportCriteria(Request $request) {
        return view('reports.reservationCriteria');
    }

    public function reservationReport(Request $request) {
        $start = $request->get('start');
        $end = $request->get('end');

        $reservations = Reservation::where('userID', '!=', 0)
            ->where('reservation_out_date', '>=', $start)
            ->where('reservation_in_date', '<=', $end)
            ->with(['items', 'user'])->get();

        return view('reports.reservation', compact('reservations', 'start', 'end'));
    }

    public function customerCriteria(Request $request) {
        return view('reports.customerCriteria');
    }

    public function itemCriteria(Request $request) {
        return view('reports.itemCriteria');
    }

    public function itemReport(Request $request) {
        $start = $request->get('start', false);
        $end = $request->get('end', false);

        $start = new Carbon($start);
        $end = new Carbon($end);


        if($start && $end) {
            $items = Item::where('created_at', '>=', $start->format('Y-m-d'))->where('created_at', '<=', $end->format('Y-m-d'))->get();
        }
        else if($start) {
            $items = Item::where('created_at', '>=', $start->format('Y-m-d'))->get();
        }
        else if($end) {
            $items = Item::where('created_at', '<=', $end->format('Y-m-d'))->get();
        }
        else {
            $items = Item::all();
        }

        return view('reports.item', ['items' => $items]);
    }

    public function customerReport(Request $request) {
        $start = $request->get('start', false);
        $end = $request->get('end', false);

        $start = new Carbon($start);
        $end = new Carbon($end);


        if($start && $end) {
            $customers = User::where('created_at', '>=', $start->format('Y-m-d'))->where('created_at', '<=', $end->format('Y-m-d'))->get();
        }
        else if($start) {
            $customers = User::where('created_at', '>=', $start->format('Y-m-d'))->get();
        }
        else if($end) {
            $customers = User::where('created_at', '<=', $end->format('Y-m-d'))->get();
        }
        else {
            $customers = User::all();
        }
//        ['customers' => $customers];
        return view('reports.customer', compact('customers','start', 'end'));
    }

}
