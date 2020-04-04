<?php


namespace App\Http\Controllers;


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
        return view('reports.reservation');
    }

    public function reservationCustomerCriteria(Request $request) {
        return view('reports.reservationCustomerCriteria');
    }

    public function reservationCustomer(Request $request) {
        return view('reports.reservationCustomer');
    }

    public function reservationItemCriteria(Request $request) {
        return view('reports.reservationItemCriteria');
    }

    public function reservationItem(Request $request) {
        return view('reports.reservationItem');
    }
}
