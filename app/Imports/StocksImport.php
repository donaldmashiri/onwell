<?php

namespace App\Imports;

use App\Models\Stock;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StocksImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            Stock::create([
                'name' => $row['name'],
                'type' => $row['type'],
                'description' => $row['description'],
                'quantity' => $row['quantity'],
                'price' => $row['price'],
                'status' => $row['status'],
            ]);
        }
    }
}

