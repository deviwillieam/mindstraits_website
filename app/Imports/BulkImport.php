<?php

namespace App\Imports;


use App\Models\TotalAmount;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class BulkImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $user = auth()->user();
        
        /**
         * @param array $row
         *
         * @return \Illuminate\Database\Eloquent\Model|null
         */
        return new \App\Models\TotalAmount([
            'userid'=>$user->email, 
            'date' => Date::excelToDateTimeObject($row['date']),
            'doc_no' => $row['doc_no'],
            'description' => $row['description'],
            'account' => $row['account'],
            'item' => $row['item'],
            'amount' => $row['amount'],
        ]);
        
    }
}