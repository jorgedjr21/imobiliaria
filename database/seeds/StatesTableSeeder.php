<?php
use Illuminate\Database\Seeder;
class StatesTableSeeder extends Seeder{
    public function run(){
        DB::table('states')->delete();

        $states = [

            ['state_uf'=>"AC",'state_name'=>"Acre"],
            ['state_uf'=>"AL",'state_name'=>"Alagoas"],
            ['state_uf'=>"AM",'state_name'=>"Amazonas"],
            ['state_uf'=>"AP",'state_name'=>"Amapá"],
            ['state_uf'=>"BA",'state_name'=>"Bahia"],
            ['state_uf'=>"CE",'state_name'=>"Ceará"],
            ['state_uf'=>"DF",'state_name'=>"Distrito Federal"],
            ['state_uf'=>"ES",'state_name'=>"Espírito Santo"],
            ['state_uf'=>"GO",'state_name'=>"Goiás"],
            ['state_uf'=>"MA",'state_name'=>"Maranhão"],
            ['state_uf'=>"MT",'state_name'=>"Mato Grosso"],
            ['state_uf'=>"MS",'state_name'=>"Mato Grosso do Sul"],
            ['state_uf'=>"MG",'state_name'=>"Minas Gerais"],
            ['state_uf'=>"PA",'state_name'=>"Pará"],
            ['state_uf'=>"PB",'state_name'=>"Paraíba"],
            ['state_uf'=>"PR",'state_name'=>"Paraná"],
            ['state_uf'=>"PE",'state_name'=>"Pernambuco"],
            ['state_uf'=>"PI",'state_name'=>"Piauí"],
            ['state_uf'=>"RJ",'state_name'=>"Rio de Janeiro"],
            ['state_uf'=>"RN",'state_name'=>"Rio Grande do Norte"],
            ['state_uf'=>"RO",'state_name'=>"Rondônia"],
            ['state_uf'=>"RS",'state_name'=>"Rio Grande do Sul"],
            ['state_uf'=>"RR",'state_name'=>"Roraima"],
            ['state_uf'=>"SC",'state_name'=>"Santa Catarina"],
            ['state_uf'=>"SE",'state_name'=>"Sergipe"],
            ['state_uf'=>'SP','state_name'=>'São Paulo'],
            ['state_uf'=>"TO",'state_name'=>"Tocantins"]
        ];

        DB::table('states')->insert($states);

    }
}