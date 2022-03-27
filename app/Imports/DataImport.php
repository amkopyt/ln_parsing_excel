<?php

namespace App\Imports;

use App\Models\Company;
use App\Models\Data;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Validator;


class DataImport implements ToCollection
{

    public function collection(Collection $rows)
    {
        Validator::make($rows->toArray(), [
            '0.0' => 'required|in:id',
            '0.1' => 'required|in:company',
            '0.2' => 'required|in:fact',
            '0.6' => 'required|in:forecast',
            '1.2' => 'required|in:Qliq',
            '1.4' => 'required|in:Qoil',
            '1.6' => 'required|in:Qliq',
            '1.8' => 'required|in:Qoil'
        ])->validate();
        // TODO: Добавить валидацию также остальных полей

        Data::truncate();
        foreach ($rows as $key => $row) {
            if($key > 2) {
                $company_id = Company::where('name', $row[1])->firstOrCreate([
                    'name' => $row[1]
                ])->id;

                foreach ($this->getTypeData($rows) as $type) {
                    Data::create([
                        'company_id' => $company_id,
                        'date' => Carbon::parse(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($type->date))->toDateString(),
                        'type_of_value' => $type->type_of_value,
                        'type_of_decision' => $type->type_of_decision,
                        'value' => $row[$type->key]
                    ]);
                }

            }
        }
        return null;
    }


    protected function getTypeData($rows):array {
        return array(
            (object) array(
                'type_of_value' => Data::TYPE_OF_VALUE_QLIQ,
                'type_of_decision' => Data::TYPE_OF_DICISION_FACT,
                'date' => $rows[2][2],
                'key' => 2
            ),
            (object) array(
                'type_of_value' => Data::TYPE_OF_VALUE_QLIQ,
                'type_of_decision' => Data::TYPE_OF_DICISION_FACT,
                'date' => $rows[2][3],
                'key' => 3
            ),
            (object) array(
                'type_of_value' => Data::TYPE_OF_VALUE_QOIL,
                'type_of_decision' => Data::TYPE_OF_DICISION_FACT,
                'date' => $rows[2][4],
                'key' => 4
            ),
            (object)  array(
                'type_of_value' => Data::TYPE_OF_VALUE_QOIL,
                'type_of_decision' => Data::TYPE_OF_DICISION_FACT,
                'date' => $rows[2][5],
                'key' => 5
            ),
            (object) array(
                'type_of_value' => Data::TYPE_OF_VALUE_QLIQ,
                'type_of_decision' => Data::TYPE_OF_DICISION_FORECAST,
                'date' => $rows[2][6],
                'key' => 6
            ),
            (object)  array(
                'type_of_value' => Data::TYPE_OF_VALUE_QLIQ,
                'type_of_decision' => Data::TYPE_OF_DICISION_FORECAST,
                'date' => $rows[2][7],
                'key' => 7
            ),
            (object) array(
                'type_of_value' => Data::TYPE_OF_VALUE_QOIL,
                'type_of_decision' => Data::TYPE_OF_DICISION_FORECAST,
                'date' => $rows[2][8],
                'key' => 8
            ),
            (object) array(
                'type_of_value' => Data::TYPE_OF_VALUE_QOIL,
                'type_of_decision' => Data::TYPE_OF_DICISION_FORECAST,
                'date' => $rows[2][9],
                'key' => 9
            ),
        );
    }
}
