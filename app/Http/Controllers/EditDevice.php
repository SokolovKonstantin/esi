<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Manufacture;
use App\Models\Building;
use App\Models\Room;
use App\Models\InstallationLocation;
use App\Models\IP;
use App\Models\Converters;
use App\Models\PortNumbers;
use App\Models\Devices;
use App\Models\NetworkSwitch;
use App\Models\Projects;

class EditDevice extends Controller
{
  private $device; //device or converter or switch
  private $id_device;
  private $type_device;

  public function mainMethod(Request $request) {

    $update_device = Devices::where('id', $request->id_device)
      ->where('type', $request->type_device)
      ->first();
    $device = 'device';

    if (!isset($device)) {
      $update_device = Converters::where('id', $request->id_device)
        ->where('type', $request->type_device)
        ->first();
      $device = 'converter';
    }

    if (!isset($device)) {
      $update_device = NetworkSwitch::where('id', $request->id_device)
        ->where('type', $request->type_device)
        ->first();
      $device = 'switch';
    }

// -----------------------Oбработка device-------------------------------------
  if ($device === 'device') {
    $update_device = Devices::where('id', $request->id_device)
      ->first();
    //sid1
    if($update_device['id_sid2' != 0]) {
      $update_sid_1 = Sids::where('id', $update_device['id_sid1'])->first();
      $update_port_number_1 = PortNumbers::where('id', $update_sid_1['id_number_port'])
        ->first();
      $update_converter_1 = Converters::where('id', $update_port_number_1['id_converter'])
        ->first();
      $update_ip_converter_1 = IP::where('id', $update_converter_1['id_ip'])
        ->first();
      $electrical_cabinet_converter_1 = InstallationLocation::where('id', $update_converter_1['id_installation_location'])
        ->first();
      $room_converter_1 = Room::where('id', $electrical_cabinet_converter_1['id_room'])
        ->first();
      $building_converter_1 = Building::where('id', $electrical_cabinet_converter_1['id_building'])
        ->first();
      $manufacture_converter_1 = Manufacture::where('id', $electrical_cabinet_converter_1['id_manufacture'])
        ->first();
    }

    //sid2
    if ($update_device['id_sid2'] != 0) {
      $update_sid_2 = Sids::where('id', $update_device['id_sid2'])->first();
      $update_port_number_2 = PortNumbers::where('id', $update_sid_2['id_number_port'])
        ->first();
      $update_converter_2 = Converters::where('id', $update_port_number_2['id_converter'])
        ->first();
      $update_ip_converter_2 = IP::where('id', $update_converter_2['id_ip'])
        ->first();
      $electrical_cabinet_converter_2 = InstallationLocation::where('id', $update_converter_2['id_installation_location'])
        ->first();
      $room_converter_2 = Room::where('id', $electrical_cabinet_converter_2['id_room'])
        ->first();
      $building_converter_2 = Building::where('id', $electrical_cabinet_converter_2['id_building'])
        ->first();
      $manufacture_converter_2 = Manufacture::where('id', $electrical_cabinet_converter_2['id_manufacture'])
        ->first();
    }

    //ip1
    if ($update_device['id_ip1'] != 0) {
      $update_ip_1 = IP::where('id', $update_device['id_ip1'])->first();
    }

    //ip2
    if ($update_device['id_ip2'] != 0) {
      $update_ip_1 = IP::where('id', $update_device['id_ip2'])->first();
    }

    //location device
    $electrical_cabinet_device = InstallationLocation::where('id', $update_device['id_installation_location'])
      ->first();
    $room_device = Room::where('id', $electrical_cabinet_device['id_room'])
      ->first();
    $building_device = Building::where('id', $electrical_cabinet_device['id_building'])
      ->first();
    $manufacture_device = Manufacture::where('id', $electrical_cabinet_device['id_manufacture'])
      ->first();

    //projects
    $update_projects = Projects::where('id_device', $update_device['id'] )
      ->get();
    $update_file_project = [];
    if (isset($update_projects)) {
      foreach ($update_projects as $project) {
        array_push($update_file_project , [
                                            'url'=>Storage::url($project['project']),
                                            'id_project'=>$project['id'],
                                          ]);
      }
    }

    //Заполняем выходной массив данных
    $data = [
              'update_device'=>$update_device,
              'update_file_project'=>$update_file_project,
              'electrical_cabinet_device'=>$electrical_cabinet_device,
              'room_device'=>$room_device,
              'building_device'=>$building_device,
              'manufacture_device'=>$manufacture_device,
              'update_sid_1'=>isset($update_sid_1)?$update_sid_1:'none',
              'update_port_number_1'=>isset($update_port_number_1)?$update_port_number_1:'none',
              'update_converter_1'=>isset($update_converter_1)?$update_converter_1:'none',
              'update_ip_converter_1'=>isset($update_ip_converter_1)?$update_ip_converter_1:'none',
              'electrical_cabinet_converter_1'=>isset($electrical_cabinet_converter_1)?$electrical_cabinet_converter_1:'none',
              'room_converter_1'=>isset($room_converter_1)?$room_converter_1:'none',
              'building_converter_1'=>isset($building_converter_1)?$building_converter_1:'none',
              'manufacture_converter_1'=>isset($manufacture_converter_1)?$manufacture_converter_1:'none',
              'update_sid_2'=>isset($update_sid_2)?$update_sid_2:'none',
              'update_port_number_2'=>isset($update_port_number_2)?$update_port_number_2:'none',
              'update_converter_2'=>isset($update_converter_2)?$update_converter_2:'none',
              'update_ip_converter_2'=>isset($update_ip_converter_2)?$update_ip_converter_2:'none',
              'electrical_cabinet_converter_2'=>isset($electrical_cabinet_converter_2)?$electrical_cabinet_converter_2:'none',
              'room_converter_2'=>isset($room_converter_2)?$room_converter_2:'none',
              'building_converter_2'=>isset($building_converter_2)?$building_converter_2:'none',
              'manufacture_converter_2'=>isset($manufacture_converter_2)?$manufacture_converter_2:'none',
              'update_ip_1'=>isset($update_ip_1)?$update_ip_1:'none',
              'update_ip_2'=>isset($update_ip_2)?$update_ip_2:'none',
    ];

    return view('editDevice', ['data'=>$data]);
  }

//-----------------------Обработка converters----------------------------------
  if ($device === 'converter') {


    return view('editConverter', ['data'=>$data]);
  }

//-----------------------Обработка switch--------------------------------------
  if ($device === 'switch') {


    return view('editSwitch', ['data'=>$data]);
  }












    }
}
