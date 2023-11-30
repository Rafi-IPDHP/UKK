<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Barryvdh\DomPDF\Facade\Pdf as Pdf;
// use PDF;

class EmployeeController extends Controller
{
    public function showEmployees(){
        $employee = Employee::all();
        return view('index', compact('employee'));
    }

    public function createPDF() {
        // retrieve all records from db
        $data = Employee::all();

        // Convert the collection to an array
        $dataArray = $data->toArray();

        // share data to view
        view()->share('employee', $dataArray);

        // Use $dataArray instead of $data
        $pdf = PDF::loadView('pdf_view', $dataArray);

        // download PDF file with download method
        return $pdf->download('pdf_file.pdf');
    }

}
