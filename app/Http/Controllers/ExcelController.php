<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class ExcelController extends Controller
{
    public function edit()
    {
        // Path to the Excel file
        $filePath = storage_path('sample3.xlsx');

        // Load the spreadsheet
        $spreadsheet = IOFactory::load($filePath);

        // Perform your editing operations here
        $worksheet = $spreadsheet->getActiveSheet();
        $worksheet->setCellValue('A1', 'Texto en A1');
        $worksheet->setCellValue('A2', 'Texto en A2');

        // Save the modified spreadsheet
        $writer = new Xlsx($spreadsheet);
        $filePath = storage_path('sample4.xlsx');
        $writer->save($filePath);

        return 'Excel file edited and saved successfully.';
    }

    public function downloadFile()
    {
        $filePath = storage_path('sample4.xlsx');
        $fileName = 'sample4.xlsx';

        return response()->download($filePath, $fileName);
    }

}
