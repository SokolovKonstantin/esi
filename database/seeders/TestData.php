<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('devices')->delete();
        DB::table('devices')->insert([
          'id'=>1,
          'type'=> 'EM133',
          'manufacture_number'=>'111',
          'metrology'=>'Ктт=200 Ктн=100',
          'communication_setting'=>'9600/8/n/1',
          'id_sid1'=>1,
          'id_sid2'=>0,
          'id_ip1'=>1,
          'id_ip2'=>0,
          'id_installation_location'=>1,
          'software'=>'one',
          'comments'=>'Необходимо заменить клеммник',
          'verification_date'=>'2022.01.01',
          'communication_status'=>true,
          'name_of_adjuster'=>'Соколов Константин Викторович',
          'checklist'=>'/checklists/one',
        ]);

        DB::table('devices')->insert([
          'id'=>2,
          'type'=> 'EM133',
          'manufacture_number'=>'222',
          'metrology'=>'Ктт=200 Ктн=100',
          'communication_setting'=>'9600/8/n/1',
          'id_sid1'=>2,
          'id_sid2'=>0,
          'id_ip1'=>2,
          'id_ip2'=>0,
          'id_installation_location'=>2,
          'software'=>'two',
          'comments'=>'Необходимо заменить клеммник',
          'verification_date'=>'2022.01.01',
          'communication_status'=>false,
          'name_of_adjuster'=>'Соколов Константин Викторович',
          'checklist'=>'/checklists/one',
        ]);

        DB::table('devices')->insert([
          'id'=>3,
          'type'=> 'EM133',
          'manufacture_number'=>'333',
          'metrology'=>'Ктт=200 Ктн=100',
          'communication_setting'=>'9600/8/n/1',
          'id_sid1'=>3,
          'id_sid2'=>0,
          'id_ip1'=>3,
          'id_ip2'=>0,
          'id_installation_location'=>3,
          'software'=>'three',
          'comments'=>'Необходимо заменить клеммник',
          'verification_date'=>'2022.01.01',
          'communication_status'=>false,
          'name_of_adjuster'=>'Соколов Константин Викторович',
          'checklist'=>'/checklists/one',
        ]);

        DB::table('devices')->insert([
          'id'=>4,
          'type'=> 'PM175',
          'manufacture_number'=>'444',
          'metrology'=>'Ктт=200 Ктн=100',
          'communication_setting'=>'9600/8/n/1',
          'id_sid1'=>3,
          'id_sid2'=>0,
          'id_ip1'=>3,
          'id_ip2'=>0,
          'id_installation_location'=>3,
          'software'=>'four',
          'comments'=>'Необходимо заменить клеммник',
          'verification_date'=>'2022.01.01',
          'communication_status'=>false,
          'name_of_adjuster'=>'Соколов Константин Викторович',
          'checklist'=>'/checklists/one',
        ]);

        DB::table('sids')->delete();
        DB::table('sids')->insert([
          'id'=>1,
          'sid'=>1,
          'id_number_port'=>1,
        ]);

        DB::table('port_numbers')->delete();
        DB::table('port_numbers')->insert([
          'id'=>1,
          'number_port'=>1,
          'id_converter'=>1,
        ]);

        DB::table('converters')->delete();
        DB::table('converters')->insert([
          'id'=>1,
          'type'=>'Mgate3480',
          'id_ip'=>1,
          'id_installation_location'=>1,
          'comments'=>'Ключ от шкафа у оператора',
        ]);

        DB::table('ip')->delete();
        DB::table('ip')->insert([
          'id'=>1,
          'ip'=>'192.168.127.1',
          'mask'=>'255.255.0.0',
          'gateway'=>'192.168.0.254',
          'number_port_switch'=>1,
          'id_switch'=>1,
        ]);

        DB::table('ip')->insert([
          'id'=>2,
          'ip'=>'192.168.127.2',
          'mask'=>'255.255.0.0',
          'gateway'=>'192.168.0.254',
          'number_port_switch'=>1,
          'id_switch'=>1,
        ]);

        DB::table('network_switch')->delete();
        DB::table('network_switch')->insert([
          'id'=>1,
          'id_ip'=>1,
          'id_installation_location'=>1,
          'type'=>'EDS-510A',
          'mark_switch'=>'none',
          'number_port_main_switch'=>1,
          'id_main_switch'=>2,
        ]);

        DB::table('network_switch')->insert([
          'id'=>2,
          'id_ip'=>0,
          'id_installation_location'=>2,
          'type'=>'ARUBA 24',
          'mark_switch'=>'АИИС 4.6',
          'number_port_main_switch'=>0,
          'id_main_switch'=>0,
        ]);

        DB::table('installation_location')->delete();
        DB::table('installation_location')->insert([
          'id'=>1,
          'electrical_cabinet'=>'ячейка №45',
          'comments'=>'Дверь подклинивает',
          'id_room'=>2,
          'id_building'=>1,
          'id_manufacture'=>1,
        ]);

        DB::table('installation_location')->insert([
          'id'=>2,
          'electrical_cabinet'=>'ячейка №46',
          'comments'=>'Дверь подклинивает',
          'id_room'=>1,
          'id_building'=>1,
          'id_manufacture'=>2,
        ]);

        DB::table('installation_location')->insert([
          'id'=>3,
          'electrical_cabinet'=>'ячейка №47',
          'comments'=>'Дверь подклинивает',
          'id_room'=>1,
          'id_building'=>2,
          'id_manufacture'=>1,
        ]);

      DB::table('room')->delete();
      DB::table('room')->insert([
        'id'=>1,
        'room'=>'РУ-10кВ',
      ]);
      DB::table('room')->insert([
        'id'=>2,
        'room'=>'РУ-6кВ',
      ]);

      DB::table('building')->delete();
      DB::table('building')->insert([
        'id'=>1,
        'building'=>'РП-48',
      ]);
      DB::table('building')->insert([
        'id'=>2,
        'building'=>'РП-50',
      ]);

      DB::table('manufacture')->delete();
      DB::table('manufacture')->insert([
        'id'=>1,
        'manufacture'=>'Конвертерное производство',
      ]);
      DB::table('manufacture')->insert([
        'id'=>2,
        'manufacture'=>'ПХП',
      ]);
      DB::table('manufacture')->insert([
        'id'=>3,
        'manufacture'=>'ПГП',
      ]);
      DB::table('manufacture')->insert([
        'id'=>4,
        'manufacture'=>'ЛПЦ-1',
      ]);

      DB::table('software')->delete();
      DB::table('software')->insert([
        'id'=>1,
        'software'=>'PAS v.1.0.2',
      ]);

      DB::table('projects')->delete();
      DB::table('projects')->insert([
        'id'=>1,
        'project'=>'/projects/one',
        'id_device'=>1,
      ]);

      DB::table('free_ip')->delete();
      for ($i=1; $i<10 ; $i++) {
        DB::table('free_ip')->insert([
          'id'=>$i,
          'ip'=>'192.168.126.'.$i,
          'mask'=>'255.255.0.0',
          'gateway'=>'192.168.0.254',
        ]);
      }

      DB::table('users')->delete();
      DB::table('users')->insert([
        'id'=>1,
        'first_name'=>'Соколов',
        'last_name'=>'Константин',
        'father_name'=>'Викторович',
        'password'=>'1',
        'access'=>'admin',
      ]);


    }
}
