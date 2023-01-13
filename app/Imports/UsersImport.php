<?php

namespace App\Imports;

use App\Models\Clients;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel ,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    use Exportable;
    
    private $client_id;

    public function  __construct($client_id)
    {
        $this->client_id= $client_id;
    }
    public function model(array $row )
    
    {
       
        
        
        
        // dd($clientsid);
        return new User([
            'name'     => $row['name'],
            'email'    => $row['email'], 
            'role_id' => 2,
            'client_id' => $this->client_id,
            'created_at' => date("Y-m-d"),
            
            
            
         ]);
    }
}
