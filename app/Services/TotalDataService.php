<?php

namespace App\Services;

use App\Models\Data;
use Illuminate\Database\Eloquent\Collection;

class TotalDataService
{

    protected Collection $data;

    function __construct() {
        $this->data = $this->getFromDB();
    }

    protected function setCompanyResponseStruct() {
        $companies_response = array();
        $companies = \App\Models\Company::all()->pluck('id');

        foreach($companies as $company) {
            $companies_response[$company] = array(
                'qOil' => array(
                    'fact' => 0,
                    'forecast' => 0
                ),
                'qLiq' => array(
                    'fact' => 0,
                    'forecast' => 0
                )
            );
        }
        return $companies_response;
    }

    protected function getFromDB() {
        return Data::query()->selectRaw('date,company_id, type_of_decision,type_of_value, SUM(value) as sum')->groupByRaw('date,company_id, type_of_decision,type_of_value')->get();
    }

    protected function mergeDataFromDB() {
        $insertData = array();
        foreach($this->data as $data) {
            if(!array_key_exists($data['date'], $insertData)) {
                $insertData[$data['date']] = array();
            }
            $insertData[$data['date']][] = $data;
        }
        return $insertData;
    }

    public function toArray() {
        $response = array();
        foreach ($this->mergeDataFromDB() as $key => $item) {
            $temp_array = array(
              'date' => $key,
              'companies' => $this->setCompanyResponseStruct()
            );
            foreach ($item as $value) {
                $temp_array['companies'][$value['company_id']][$this->getNameFromTypeOfValue($value['type_of_value'])][$this->getNameFromTypeOfDecision($value['type_of_decision'])] = $value['sum'];
            }
            $response[] = $temp_array;
        }
        return $response;
    }

    public function toCollection() {
        return [
            'companies' => \App\Models\Company::all()->pluck('name'),
            'data' => $this->toArray()
        ];
    }


    protected function getNameFromTypeOfDecision($type) {
        return match (intval($type)) {
          Data::TYPE_OF_DICISION_FACT => 'fact',
          Data::TYPE_OF_DICISION_FORECAST => 'forecast'
        };
    }
    protected function getNameFromTypeOfValue($type) {
        return match (intval($type)) {
            Data::TYPE_OF_VALUE_QLIQ => 'qLiq',
            Data::TYPE_OF_VALUE_QOIL => 'qOil'
        };
    }
}
