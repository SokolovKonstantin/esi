<?php

namespace App\Http\Controllers;
use App\Models\Manufacture;
use App\Models\Building;
use App\Models\Room;
use App\Models\InstallationLocation;
use App\Models\IP;
use App\Models\Converters;
use App\Models\Devices;
use App\Models\NetworkSwitch;

use Illuminate\Http\Request;

class WorkingWithDevices extends Controller
{
  private $menu = [
    'Главная'=>'/',
    'Работа с приборами'=>'/working_with_devices',
    'Работа с IP адресами'=>'/',
    'Чек листы'=>'/',
  ];

  private $search_results;
  private $manufacture, $manufactures;
  private $building, $buildings;
  private $room, $rooms;
  private $electrical_cabinet, $electrical_cabinets;
  private $devices, $converters, $network_switchs;

  public function mainMethod(Request $request){

//-------------Подготовка данных для локализации------------------
    if (!isset($this->manufactures)) {
      $all_manufactures = Manufacture::all();
      $this->manufactures = [];
      foreach ($all_manufactures as $manufacture) {
        array_push($this->manufactures, $manufacture['manufacture']);
      }
    }

    if (!isset($this->buildings)) {
      $all_buildings = Building::all();
      $this->buildings = [];
      foreach ($all_buildings as $building) {
        array_push($this->buildings, $building['building']);
      }
    }

    if (!isset($this->rooms)) {
      $all_rooms = Room::all();
      $this->rooms = [];
      foreach ($all_rooms as $room) {
        array_push($this->rooms, $room['room']);
      }
    }

    if (!isset($this->electrical_cabinets)) {
      $all_electrical_cabinets = InstallationLocation::all();
      $this->electrical_cabinets = [];
      foreach ($all_electrical_cabinets as $electrical_cabinet) {
        array_push($this->electrical_cabinets, $electrical_cabinet['electrical_cabinet']);
      }
    }

//-----------------Подготовка данных для добавления прибора (типы приборов)-----
  if (!isset($this->devices)) {
    $all_devices = Devices::all();
    $this->devices = [];
    foreach ($all_devices as $device) {
      if ( array_search($device['type'], $this->devices)===false ) {
        array_push($this->devices, $device['type']);
      }
    }
  }

  if (!isset($this->converters)) {
    $all_converters = Converters::all();
    $this->converters = [];
    foreach ($all_converters as $converter) {
      if ( array_search($converter['type'], $this->converters)===false) {
        array_push($this->converters,$converter['type']);
      }
    }
  }

  if (!isset($this->network_switchs)) {
    $all_network_switch = NetworkSwitch::all();
    $this->network_switchs = [];
    foreach ($all_network_switch as $network_switch) {
      if ( array_search($network_switch['type'], $this->network_switchs)===false) {
        array_push($this->network_switchs,$network_switch['type']);
      }
    }
  }

    $data = [
        'menu'=>$this->menu,
        'location'=>[
            'manufacture'=>$this->manufactures,
            'building'=>$this->buildings, 'room'=>$this->rooms,
            'electrical_cabinet'=>$this->electrical_cabinets,
            ],
        'search_results'=>$request->session()->get('search_results'),
        'flash_message'=>$request->session()->get('flash_message'),
        'add_device'=>[
            'type_devices'=>$this->devices,
            'type_converters'=>$this->converters,
            'type_switchs'=>$this->network_switchs,
        ]
        ];
    return view('workingWithDevices', ['data'=>$data]);
  }

  public function searchByIP(Request $request) {
    $this->search_results = [];

    $ip = IP::where('ip', $request->ip)->get();

    if (isset($ip)) {

      foreach ($ip as $one_ip) {

        $converters = Converters::where('id_ip', $one_ip['id'])->get();
        if (isset($converters)) {
          foreach ($converters as $converter)
          array_push($this->search_results, [
            'ip'=>$one_ip['ip'],
            'id'=>$converter['id'],
            'type'=>$converter['type'],
            'comments'=>$converter['comments'],
            'locations'=>$this->searchLocation($converter['id_installation_location'])
          ]);
        }

        $devices = Devices::where('id_ip1', $one_ip['id'])->get();
        if (isset($devices)) {
          foreach ($devices as $device) {
            array_push($this->search_results, [
              'ip'=>$one_ip['ip'],
              'id'=>$device['id'],
              'type'=>$device['type'],
              'comments'=>$device['comments'],
              'locations'=>$this->searchLocation($device['id_installation_location'])
            ]);
          }
        }


        $devices = Devices::where('id_ip2', $one_ip['id'])->get();
        if (isset($devices)) {
          foreach ($devices as $device) {
            array_push($this->search_results, [
              'ip'=>$one_ip['ip'],
              'id'=>$device['id'],
              'type'=>$device['type'],
              'comments'=>$device['comments'],
              'locations'=>$this->searchLocation($device['id_installation_location'])
            ]);
            }
        }

        $network_switchs = NetworkSwitch::where('id_ip', $one_ip['id'])->get();
        if (isset($network_switchs)) {
          foreach ($network_switchs as $network_switch) {
          array_push($this->search_results, [
              'ip'=>$one_ip['ip'],
              'id'=>$network_switch['id'],
              'type'=>$network_switch['type'],
              'comments'=>$network_switch['comments'],
              'locations'=>$this->searchLocation($network_switch['id_installation_location'])
          ]);
          }
        }


      }
    }

    $request->session()->flash('search_results', $this->search_results);
    return redirect('/working_with_devices');//$this->mainMethod();
  }

  public function searchByLocation(Request $request) {
    $this->search_results = [];

    if ($request->manufacture != '' &&
        $request->building == '' &&
        $request->room == '' &&
        $request->electrical_cabinet == '') {
      $manufacture = Manufacture::where('manufacture', $request->manufacture)->first();

      $all_installation_locations = InstallationLocation::where('id_manufacture', $manufacture['id'])->get();
      foreach ($all_installation_locations as $installation_location) {
        $all_devices = Devices::where('id_installation_location', $installation_location['id'])->get();
        foreach ($all_devices as $device) {
          array_push($this->search_results, [
              'id'=>$device['id'],
              'type'=>$device['type'],
              'comments'=>$device['comments'],
              'locations'=>$this->searchLocation($device['id_installation_location'])
          ]);
        }
      }
    }

    if ($request->manufacture != '' &&
        $request->building != '' &&
        $request->room == '' &&
        $request->electrical_cabinet == '') {
      $manufacture = Manufacture::where('manufacture', $request->manufacture)->first();
      $building = Building::where('building', $request->building)->first();

      $all_installation_locations = InstallationLocation::where('id_manufacture', $manufacture['id'])->get();
      foreach ($all_installation_locations as $installation_location) {
        $all_devices = Devices::where('id_installation_location', $installation_location['id'])->get();
        foreach ($all_devices as $device) {
          if ($installation_location['id_building']==$building['id']) {
            array_push($this->search_results, [
              'id'=>$device['id'],
              'type'=>$device['type'],
              'comments'=>$device['comments'],
              'locations'=>$this->searchLocation($device['id_installation_location'])
            ]);
          }
        }
      }
    }

    if ($request->manufacture != '' &&
        $request->building != '' &&
        $request->room != '' &&
        $request->electrical_cabinet == '') {
      $manufacture = Manufacture::where('manufacture', $request->manufacture)->first();
      $building = Building::where('building', $request->building)->first();
      $room = Room::where('room', $request->room)->first();

      $all_installation_locations = InstallationLocation::where('id_manufacture', $manufacture['id'])->get();
      foreach ($all_installation_locations as $installation_location) {
        $all_devices = Devices::where('id_installation_location', $installation_location['id'])->get();
        foreach ($all_devices as $device) {
          if ($installation_location['id_building']==$building['id'] &&
              $installation_location['id_room']==$room['id']) {
            array_push($this->search_results, [
              'id'=>$device['id'],
              'type'=>$device['type'],
              'comments'=>$device['comments'],
              'locations'=>$this->searchLocation($device['id_installation_location'])
            ]);
          }
        }
      }
    }

    if ($request->manufacture != '' &&
        $request->building != '' &&
        $request->room != '' &&
        $request->electrical_cabinet != '') {
      $manufacture = Manufacture::where('manufacture', $request->manufacture)->first();
      $building = Building::where('building', $request->building)->first();
      $room = Room::where('room', $request->room)->first();
      $installation_location_from_form = InstallationLocation::where('electrical_cabinet', $request->electrical_cabinet)->first();

      $all_installation_locations = InstallationLocation::where('id_manufacture', $manufacture['id'])->get();
      foreach ($all_installation_locations as $installation_location) {
        $all_devices = Devices::where('id_installation_location', $installation_location['id'])->get();
        foreach ($all_devices as $device) {
          if ($installation_location['id_building']==$building['id'] &&
              $installation_location['id_room']==$room['id'] &&
              $installation_location_from_form['id']==$device['id_installation_location']) {
            array_push($this->search_results, [
              'id'=>$device['id'],
              'type'=>$device['type'],
              'comments'=>$device['comments'],
              'locations'=>$this->searchLocation($device['id_installation_location'])
            ]);
          }
        }
      }
    }

    $request->session()->flash('search_results', $this->search_results);
    return redirect('/working_with_devices');
    //return $this->mainMethod();
  }

  private function searchLocation($id_location) {
    $installation_location = InstallationLocation::where('id', $id_location)->first();
    $room = Room::where('id', $installation_location['id_room'])->first();
    $building = Building::where('id', $installation_location['id_building'])->first();
    $manufacture = Manufacture::where('id', $installation_location['id_manufacture'])->first();
    return [$manufacture['manufacture'], $building['building'], $room['room'], $installation_location['electrical_cabinet']];
  }

}
