<?php

namespace App\Imports;

use App\Models\Stock;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StockImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Stock([
            'name' => $row['name'],
            'type' => $row['type'],
            'description' => $row['description'],
            'quantity' => $row['quantity'],
            'price' => $row['price'],
        ]);
    }
}
