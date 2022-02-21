<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Devices;
use App\Models\InstallationLocation;
use App\Models\Room;
use App\Models\Building;
use App\Models\Manufacture;
use App\Models\IP;
use App\Models\Sids;
use App\Models\PortNumbers;
use App\Models\Converters;


class StartPage extends Controller
{

  private $menu = [
    'Главная'=>'/',
    'Работа с приборами'=>'/working_with_devices',
    'Работа с IP адресами'=>'/',
    'Чек листы'=>'/',
  ];

  public function mainMethod(){
    $search_devices = Devices::where('communication_status', false)
                ->orderBy('id_installation_location')
                ->get();
    $list = [];
    if (isset($search_devices)) {

      foreach ($search_devices as $device) {
          $installation_location = InstallationLocation::where('id', $device['id_installation_location'])->first();
          $room = Room::where('id', $installation_location['id_room'])->first();
          $building = Building::where('id', $installation_location['id_building'])->first();
          $manufacture = Manufacture::where('id', $installation_location['id_manufacture'])->first();

          $sid1 = Sids::where('id', $device['id_sid1'])->first();
          if (isset($sid1)) {
            $number_port_converter1 = PortNumbers::where('id' , $sid1['id_number_port'])->first();
            $converter1 = Converters::where('id', $number_port_converter1['id_converter'])->first();
            $ip_converter1 = IP::where('id',$converter1['id_ip'])->first();
            $installation_location_converter1 = InstallationLocation::where('id', $converter1['id_installation_location'])
              ->first();
            $manufacture_converter1 = Manufacture::where('id', $installation_location_converter1['id_manufacture'])
              ->first();
            $building_converter1 = Building::where('id', $installation_location_converter1['id_building'])
              ->first();
            $room_converter1 = Room::where('id', $installation_location_converter1['room'])->first();
          }

            $sid2 = Sids::where('id', $device['id_sid2'])->first();
          if (isset($sid2)) {
            $number_port_converter2 = PortNumbers::where('id' , $sid2['id_number_port'])->first();
            $converter2 = Converters::where('id', $number_port_converter2['id_converter'])->first();
            $ip_converter2 = IP::where('id',$converter1['id_ip'])->first();
            $installation_location_converter2 = InstallationLocation::where('id', $converter2['id_installation_location'])
              ->first();
            $manufacture_converter2 = Manufacture::where('id', $installation_location_converter2['id_manufacture'])
              ->first();
            $building_converter2 = Building::where('id', $installation_location_converter2['id_building'])
              ->first();
            $room_converter2 = Room::where('id', $installation_location_converter2['room'])->first();
          }

          $ip_1_device = IP::where('id', $device['id_ip1'])->first();
          $ip_2_device = IP::where('id', $device['id_ip2'])->first();



          array_push($list, [
                              'manufacture'=>$manufacture['manufacture'],
                              'building'=>$building['building'],
                              'room'=>$room['room'],
                              'electrical_cabinet'=>$installation_location['electrical_cabinet'],
                              'type'=>$device['type'],
                              'manufacture_number'=>$device['manufacture_number'],
                              'id'=>$device['id'],
                              'comment_device'=>$device['comments'],

                              'sid1'=>(isset($sid1))?$sid1['sid']:'none',
                              'number_port_converter1'=>(isset($sid1))?$number_port_converter1['number_port']:'none',
                              'type_converter1'=>(isset($sid1))?$converter1['type']:'none',
                              'ip_converter1'=>(isset($sid1))?$ip_converter1['ip']:'none',
                              'electrical_cabinet_converter1'=>(isset($sid1))?$installation_location_converter1['electrical_cabinet']:'none',
                              'manufacture_converter1'=>(isset($sid1))?$manufacture_converter1['manufacture']:'none',
                              'building_converter1'=>(isset($sid1))?$building_converter1['building']:'none',
                              'room_converter1'=>(isset($sid1))?$room_converter1['room']:'none',
                              'comments_converter1'=>(isset($sid1))?$converter1['comments']:'none',

                              'sid2'=>(isset($sid2))?$sid2['sid']:'none',
                              'number_port_converter2'=>(isset($sid2))?$number_port_converter2['number_port']:'none',
                              'type_converter2'=>(isset($sid2))?$converter2['type']:'none',
                              'ip_converter2'=>(isset($sid2))?$ip_converter2['ip']:'none',
                              'electrical_cabinet_converter2'=>(isset($sid2))?$installation_location_converter2['electrical_cabinet']:'none',
                              'manufacture_converter2'=>(isset($sid2))?$manufacture_converter2['manufacture']:'none',
                              'building_converter2'=>(isset($sid2))?$building_converter2['building']:'none',
                              'room_converter2'=>(isset($sid2))?$room_converter2['room']:'none',
                              'comments_converter2'=>(isset($sid2))?$converter2['comments']:'none',

                              'ip_1_device'=>(isset($ip_1_device))?$ip_1_device['ip']:'none',
                              'ip_2_device'=>(isset($ip_2_device))?$ip_2_device['ip']:'none',

                            ]);
      };
    }

    $data = ['list'=>$list, 'menu'=>$this->menu];
    return view('startPage', ['data'=>$data]);
    }
}
