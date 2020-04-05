<?php


namespace App\Http\Controllers;


use App\Models\Reservation;
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

    public function customerReport(Request $request) {
        return view('reports.customer');
    }

    public function itemCriteria(Request $request) {
        return view('reports.itemCriteria');
    }

    public function itemReport(Request $request) {
        return view('reports.item');
    }
}
