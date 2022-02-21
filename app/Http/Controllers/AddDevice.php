<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manufacture;
use App\Models\Building;
use App\Models\Room;
use App\Models\InstallationLocation;
use App\Models\IP;
use App\Models\Converters;
use App\Models\PortNumbers;
use App\Models\Devices;
use App\Models\Projects;

class AddDevice extends Controller
{
    //for device
    private $id_manufacture_device;
    private $id_building_device;
    private $id_room_device;
    private $id_installation_location_device;

    private $id_device;
    private $type_device;
    private $manufacture_number_device;
    private $metrology_device;
    private $communication_setting_device;
    private $software_device;
    private $comments_device;
    private $verification_date_device;
    private $communication_status_device;
    private $name_of_adjuster_device;


    //for location id_sid1
    private $id_manufacture_converter_1;
    private $id_building_converter_1;
    private $id_room_converter_1;
    private $id_installation_location_converter_1;
    private $id_ip_converter_1;
    private $id_converter_1;
    private $id_port_numbers_converter_1;
    private $id_sids_converter_1;

    //for location id_sid2
    private $id_manufacture_converter_2;
    private $id_building_converter_2;
    private $id_room_converter_2;
    private $id_installation_location_converter_2;
    private $id_ip_converter_2;
    private $id_converter_2;
    private $id_port_numbers_converter_2;
    private $id_sids_converter_2;

    //for ip_1
    private $id_ip_1;

    //for ip_2
    private $id_ip_2;

    public function addDeviceToBase(Request $request) {

  //---------------Добавление локализации прибора-----------------------------
      //Определение id manufacture
      $manufacture = Manufacture::where('manufacture',(isset($request->new_manufacture_device))?$request->new_manufacture_device:$request->manufacture_device)->first();
      if (!isset($manufacture)) {
        $insert_manufacture = new Manufacture;
        $insert_manufacture->manufacture = (isset($request->new_manufacture_device))?$request->new_manufacture_device:$request->manufacture_device;
        $insert_manufacture->save();
        $this->id_manufacture_device = $insert_manufacture->id;
      } else {
        $this->id_manufacture_device = $manufacture['id'];
      }

      //Определение id building
      $building = Building::where('building',(isset($request->new_building_device))?$request->new_building_device:$request->building_device)->first();
      if (!isset($building)) {
        $insert_building = new Manufacture;
        $insert_building->building = (isset($request->new_building_device))?$request->new_building_device:$request->building_device;
        $insert_building->save();
        $this->id_building_device = $insert_building->id;
      } else {
        $this->id_building_device = $building['id'];
      }

      //Определение id room
      $room = Room::where('room',(isset($request->new_room_device))?$request->new_room_device:$request->room_device)->first();
      if (!isset($room)) {
        $insert_room = new Room;
        $insert_room->room = (isset($request->new_room_device))?$request->new_room_device:$request->room_device;
        $insert_room->save();
        $this->id_room_device = $insert_room->id;
      } else {
        $this->id_room_device = $room['id'];
      }


      //Определение id installation_location
        $installation_location = InstallationLocation::where('id_manufacture', $this->id_manufacture_device)
                ->where('id_building', $this->id_building_device)
                ->where('id_room', $this->id_room_device)
                ->where('electrical_cabinet', (isset($request->new_electrical_cabinet_device))?$request->new_electrical_cabinet_device:$request->electrical_cabinet_device)
                ->first();
        if (!isset($installation_location)) {
          $insert_installation_location = new InstallationLocation;
          $insert_installation_location->electrical_cabinet
            = (isset($request->new_electrical_cabinet_device))?$request->new_electrical_cabinet_device:$request->electrical_cabinet_device;
          $insert_installation_location->id_manufacture = $this->id_manufacture_device;
          $insert_installation_location->id_building = $this->id_building_device;
          $insert_installation_location->id_room = $this->id_room_device;
          if (isset($request->location_comment_device)) {
            $insert_installation_location->comments = $request->location_comment_device;
          } else {
            $insert_installation_location->comments = 'none';
          }
          $insert_installation_location->save();
          $this->id_installation_location_device = $insert_installation_location->id;
        } else {
          $this->id_installation_location_device = $installation_location['id'];
        }

  //-----------------------------Добавление sid1----------------------------
  if (isset($request->sid1)) {
      //---------------Добавление локализации преобразователя sid1--------------

        //Определение id manufacture
        $manufacture = Manufacture::where('manufacture',(isset($request->new_manufacture_converter_1))?$request->new_manufacture_converter_1:$request->manufacture_converter_1)->first();
        if (!isset($manufacture)) {
          $insert_manufacture = new Manufacture;
          $insert_manufacture->manufacture = (isset($request->new_manufacture_converter_1))?$request->new_manufacture_converter_1:$request->manufacture_converter_1;
          $insert_manufacture->save();
          $this->id_manufacture_converter_1 = $insert_manufacture->id;
        } else {
          $this->id_manufacture_converter_1 = $manufacture['id'];
        }

        //Определение id building
        $building = Building::where('building',(isset($request->new_building_converter_1))?$request->new_building_converter_1:$request->building_converter_1)->first();
        if (!isset($building)) {
          $insert_building = new Manufacture;
          $insert_building->building = (isset($request->new_building_converter_1))?$request->new_building_converter_1:$request->building_converter_1;
          $insert_building->save();
          $this->id_building_converter_1 = $insert_building->id;
        } else {
          $this->id_building_converter_1 = $building['id'];
        }

        //Определение id room
        $room = Room::where('room',(isset($request->new_room_converter_1))?$request->new_room_converter_1:$request->room_converter_1)->first();
        if (!isset($room)) {
          $insert_room = new Room;
          $insert_room->room = (isset($request->new_room_converter_1))?$request->new_room_converter_1:$request->room_converter_1;
          $insert_room->save();
          $this->id_room_converter_1 = $insert_room->id;
        } else {
          $this->id_room_converter_1 = $room['id'];
        }


        //Определение id installation_location
          $installation_location = InstallationLocation::where('id_manufacture', $this->id_manufacture_converter_1)
                  ->where('id_building', $this->id_building_converter_1)
                  ->where('id_room', $this->id_room_converter_1)
                  ->where('electrical_cabinet', (isset($request->new_electrical_cabinet_converter_1))?$request->new_electrical_cabinet_converter_1:$request->electrical_cabinet_converter_1)
                  ->first();
          if (!isset($installation_location)) {
            $insert_installation_location = new InstallationLocation;
            $insert_installation_location->electrical_cabinet = (isset($request->new_electrical_cabinet_converter_1))?$request->new_electrical_cabinet_converter_1:$request->electrical_cabinet_converter_1;
            $insert_installation_location->id_manufacture = $this->id_manufacture_converter_1;
            $insert_installation_location->id_building = $this->id_building_converter_1;
            $insert_installation_location->id_room = $this->id_room_converter_1;
            if (isset($request->location_comment_converter_1)) {
              $insert_installation_location->comments = $request->location_comment_converter_1;
            } else {
              $insert_installation_location->comments = 'none';
            }
            $insert_installation_location->save();
            $this->id_installation_location_converter_1 = $insert_installation_location->id;
          } else {
            $this->id_installation_location_converter_1 = $installation_location['id'];
          }

          //------------Определение id_ip_converter_1---------------------------
          $ip_converter_1 = IP::where('ip', $request->ip_converter_1)->first();
          if (!isset($ip_converter_1)) {
            $insert_ip_converter_1 = new IP;
            $insert_ip_converter_1->ip = $request->ip_converter_1;
            $insert_ip_converter_1->mask = $request->mask_converter_1;
            $insert_ip_converter_1->gateway = $request->gateway_converter_1;
            
            $insert_ip_converter_1->save();
            $this->id_ip_converter_1 = $insert_ip_converter_1->id;
          } else {
            $this->id_ip_converter_1 = $ip_converter_1['id'];
          }

          //---------------Определение id_converter_1---------------------------
          $converter_1 = Converters::where('type', (isset($request->new_type_converter_1))?$request->new_type_converter_1:$request->type_converter_1)
            ->where('id_ip',$this->id_ip_converter_1)
            ->where('id_installation_location', $this->id_installation_location_converter_1)
            ->first(1);
          if (!isset($converter_1)) {
            $insert_converter_1 = new Converters;
            $insert_converter_1->type = (isset($request->new_type_converter_1))?$request->new_type_converter_1:$request->type_converter_1;
            $insert_converter_1->id_ip = $this->id_ip_converter_1;
            $insert_converter_1->id_installation_location = $this->id_installation_location_converter_1;
            $insert_converter_1->comments = $request->converter_comments_converter_1;
            $insert_converter_1->save();
            $this->id_converter_1 = $insert_converter_1->id;
          } else {
            $this->id_converter_1 = $converter_1['id'];
            $converter['comments'] = $request->converter_comments_converter_1;
            $converter_1->save();
          }

          //--------------------Определение id_number_port_converter_1----------
          $port_number_converter_1 = PortNumbers::where('number_port', $request->number_port_converter_converter_1)
            ->where('id_converter', $this->id_converter_1)
            ->first();
          if (!isset($port_number_converter_1)) {
            $insert_port_number_converter_1 = new PortNumbers;
            $insert_port_number_converter_1->number_port = $request->number_port_converter_converter_1;
            $insert_port_number_converter_1->id_converter = $this->id_converter_1;
            $insert_port_number_converter_1->save();
            $this->id_port_numbers_converter_1 = $insert_port_number_converter_1->id;
          } else {
            $this->id_port_numbers_converter_1 = $port_number_converter_1['id'];
          }

          //------------------Определение id_sids_converter_1-------------------
          $sid_converter_1 = Sids::where('sid', $request->sid1)
            ->where('id_number_port', $this->id_port_numbers_converter_1)
            ->first(1);
          if (!isset($sid_converter_1)) {
            $insert_sid_converter_1 = new Sids;
            $insert_sid_converter_1->sid = $request->sid1;
            $insert_sid_converter_1->id_number_port = $this->id_port_numbers_converter_1;
            $insert_sid_converter_1->save();
            $this->id_sids_converter_1 = $insert_sid_converter_1['id'];
          } else {
            $this->id_sids_converter_1 = $sid_converter_1['id'];
          }
  }

  //-----------------------------Добавление sid2----------------------------
  if (isset($request->sid2)) {
          //---------------Добавление локализации преобразователя sid1--------------

            //Определение id manufacture
            $manufacture = Manufacture::where('manufacture',(isset($request->new_manufacture_converter_2))?$request->new_manufacture_converter_2:$request->manufacture_converter_2)->first();
            if (!isset($manufacture)) {
              $insert_manufacture = new Manufacture;
              $insert_manufacture->manufacture = (isset($request->new_manufacture_converter_2))?$request->new_manufacture_converter_2:$request->manufacture_converter_2;
              $insert_manufacture->save();
              $this->id_manufacture_converter_2 = $insert_manufacture->id;
            } else {
              $this->id_manufacture_converter_2 = $manufacture['id'];
            }

            //Определение id building
            $building = Building::where('building',(isset($request->new_building_converter_2))?$request->new_building_converter_2:$request->building_converter_2)->first();
            if (!isset($building)) {
              $insert_building = new Manufacture;
              $insert_building->building = (isset($request->new_building_converter_2))?$request->new_building_converter_2:$request->building_converter_2;
              $insert_building->save();
              $this->id_building_converter_2 = $insert_building->id;
            } else {
              $this->id_building_converter_2 = $building['id'];
            }

            //Определение id room
            $room = Room::where('room',(isset($request->new_room_converter_2))?$request->new_room_converter_2:$request->room_converter_2)->first();
            if (!isset($room)) {
              $insert_room = new Room;
              $insert_room->room = (isset($request->new_room_converter_2))?$request->new_room_converter_2:$request->room_converter_2;
              $insert_room->save();
              $this->id_room_converter_2 = $insert_room->id;
            } else {
              $this->id_room_converter_2 = $room['id'];
            }


            //Определение id installation_location
              $installation_location = InstallationLocation::where('id_manufacture', $this->id_manufacture_converter_2)
                      ->where('id_building', $this->id_building_converter_2)
                      ->where('id_room', $this->id_room_converter_2)
                      ->where('electrical_cabinet', (isset($request->new_electrical_cabinet_converter_2))?$request->new_electrical_cabinet_converter_2:$request->electrical_cabinet_converter_2)
                      ->first();
              if (!isset($installation_location)) {
                $insert_installation_location = new InstallationLocation;
                $insert_installation_location->electrical_cabinet = (isset($request->new_electrical_cabinet_converter_2))?$request->new_electrical_cabinet_converter_2:$request->electrical_cabinet_converter_2;
                $insert_installation_location->id_manufacture = $this->id_manufacture_converter_2;
                $insert_installation_location->id_building = $this->id_building_converter_2;
                $insert_installation_location->id_room = $this->id_room_converter_2;
                if (isset($request->location_comment_converter_2)) {
                  $insert_installation_location->comments = $request->location_comment_converter_2;
                } else {
                  $insert_installation_location->comments = 'none';
                }
                $insert_installation_location->save();
                $this->id_installation_location_converter_2 = $insert_installation_location->id;
              } else {
                $this->id_installation_location_converter_2 = $installation_location['id'];
              }

              //------------Определение id_ip_converter_1---------------------------
              $ip_converter_2 = IP::where('ip', $request->ip_converter_2)->first();
              if (!isset($ip_converter_2)) {
                $insert_ip_converter_2 = new IP;
                $insert_ip_converter_2->ip = $request->ip_converter_2;
                $insert_ip_converter_2->mask = $request->mask_converter_2;
                $insert_ip_converter_2->gateway = $request->gateway_converter_2;
                $insert_ip_converter_2->save();
                $this->id_ip_converter_2 = $insert_ip_converter_2->id;
              } else {
                $this->id_ip_converter_2 = $ip_converter_2['id'];
              }

              //---------------Определение id_converter_1---------------------------
              $converter_2 = Converters::where('type', (isset($request->new_type_converter_2))?$request->new_type_converter_2:$request->type_converter_2)
                ->where('id_ip',$this->id_ip_converter_2)
                ->where('id_installation_location', $this->id_installation_location_converter_2)
                ->first();
              if (!isset($converter_2)) {
                $insert_converter_2 = new Converters;
                $insert_converter_2->type = (isset($request->new_type_converter_2))?$request->new_type_converter_2:$request->type_converter_2;
                $insert_converter_2->id_ip = $this->id_ip_converter_2;
                $insert_converter_2->id_installation_location = $this->id_installation_location_converter_2;
                $insert_converter_2->comments = $request->converter_comments_converter_2;
                $insert_converter_2->save();
                $this->id_converter_2 = $insert_converter_2->id;
              } else {
                $this->id_converter_2 = $converter_2['id'];
                $converter['comments'] = $request->converter_comments_converter_2;
                $converter_2->save();
              }

              //--------------------Определение id_number_port_converter_1----------
              $port_number_converter_2 = PortNumbers::where('number_port', $request->number_port_converter_converter_2)
                ->where('id_converter', $this->id_converter_2)
                ->first();
              if (!isset($port_number_converter_2)) {
                $insert_port_number_converter_2 = new PortNumbers;
                $insert_port_number_converter_2->number_port = $request->number_port_converter_converter_2;
                $insert_port_number_converter_2->id_converter = $this->id_converter_2;
                $insert_port_number_converter_2->save();
                $this->id_port_numbers_converter_2 = $insert_port_number_converter_2->id;
              } else {
                $this->id_port_numbers_converter_2 = $port_number_converter_2['id'];
              }

              //------------------Определение id_sids_converter_1-------------------
              $sid_converter_2 = Sids::where('sid', $request->sid2)
                ->where('id_number_port', $this->id_port_numbers_converter_2)
                ->first();
              if (!isset($sid_converter_2)) {
                $insert_sid_converter_2 = new Sids;
                $insert_sid_converter_2->sid = $request->sid1;
                $insert_sid_converter_2->id_number_port = $this->id_port_numbers_converter_2;
                $insert_sid_converter_2->save();
                $this->id_sids_converter_2 = $insert_sid_converter_2['id'];
              } else {
                $this->id_sids_converter_2 = $sid_converter_2['id'];
              }
    }

  //-----------------------------Добавление ip1-----------------------------
  if (isset($request->ip_1)) {
        $ip_1 = IP::where('ip', $request->ip_1)
          ->first();
        if (!isset($ip_1)) {
          $insert_ip_1 = new IP;
          $insert_ip_1->ip = $request->ip_1;
          $insert_ip_1->mask = $request->mask_1;
          $insert_ip_1->gateway = $request->gateway_1;
          $insert_ip_1->save();
          $this->id_ip_1 = $insert_ip_1['id'];
        } else {
          $this->id_ip_1 = $ip_1['id'];
        }
  }

  //-----------------------------Добавление ip2-----------------------------
  if (isset($request->ip_2)) {
        $ip_2 = IP::where('ip', $request->ip_2)
          ->first();
        if (!isset($ip_2)) {
          $insert_ip_2 = new IP;
          $insert_ip_2->ip = $request->ip_2;
          $insert_ip_2->mask = $request->mask_2;
          $insert_ip_2->gateway = $request->gateway_2;
          $insert_ip_2->save();
          $this->id_ip_2 = $insert_ip_2['id'];
          } else {
            $this->id_ip_2 = $ip_2['id'];
          }
  }

  //---------------------------Добавление device----------------------------
    //Подготовка данных для добавления устройства
    if ($request->new_type_device != '') {
      $this->type_device = $request->new_type_device;
    } else {
      $this->type_device = $request->type_device;
    }

    $this->manufacture_number_device = $request->manufacture_number_device;
    if (isset($request->metrology)) {
      $this->metrology_device = $request->metrology;
    } else {
      $this->metrology_device = 'none';
    }
    if (isset($request->communication_setting)) {
      $this->communication_setting_device = $request->communication_setting;
    } else {
      $this->communication_setting_device = 'none';
    }
    if (isset($request->software)) {
      $this->software_device = $request->software;
    } else {
      $this->software_device = 'none';
    }
    if (isset($request->comments)) {
      $this->comments_device = $request->comments;
    } else {
      $this->comments_device = 'none';
    }
    if (isset($request->verification_date)) {
      $this->verification_date_device = $request->verification_date;
    } else {
      $this->verification_date_device = '1970-01-01';
    }
    if ($request->communication_status === 'true') {
      $this->communication_status_device = true;
    } else {
      $this->communication_status_device = false;
    }
    if (isset($request->name_of_adjuster)) {
      $this->name_of_adjuster_device = $request->name_of_adjuster;
    } else {
      $this->name_of_adjuster_device = 'unknown';
    }

    //Внесение устройства в базу
      //Проверка наличия устройства в базе
      $search_device = Devices::where('type', $this->type_device)
              ->where('manufacture_number', $this->manufacture_number_device)
              ->first();
      //Устройство найдено в базе
      if (isset($search_device)) {
        $request->session()->flash('flash_message', 'Прибор уже найден в базе. Удалите старый прибор. Подсказка: Воспользуйтесь поиском.)');
        return redirect('/working_with_devices');
      } else {
        $insert_device = new Devices;
        $insert_device->type = $this->type_device;
        $insert_device->manufacture_number = $this->manufacture_number_device;
        $insert_device->metrology = $this->metrology_device;
        $insert_device->communication_setting = $this->communication_setting_device;
        if ($this->id_sids_converter_1 != '') {
          $insert_device->id_sid1 = $this->id_sids_converter_1;
        } else {
          $insert_device->id_sid1 = 0;
        }
        if ($this->id_sids_converter_2 != '') {
          $insert_device->id_sid2 = $this->id_sids_converter_2;
        } else {
          $insert_device->id_sid2 = 0;
        }
        if ($this->id_ip_1 != '') {
          $insert_device->id_ip1 = $this->id_ip_1;
        } else {
          $insert_device->id_ip1 = 0;
        }
        if ($this->id_ip_2 != '') {
          $insert_device->id_ip2 = $this->id_ip_2;
        } else {
          $insert_device->id_ip2 = 0;
        }
        $insert_device->id_installation_location = $this->id_installation_location_device;
        $insert_device->software = $this->software_device;
        $insert_device->comments = $this->comments_device;
        if ($this->verification_date_device!='') {
          $insert_device->verification_date = $this->verification_date_device;
        } else {
          $insert_device->verification_date = '1970-01-01';
        }
        $insert_device->communication_status = $this->communication_status_device;
        $insert_device->name_of_adjuster = $this->name_of_adjuster_device;
        $insert_device->checklist = 'none';
        $insert_device->save();
        $this->id_device = $insert_device->id;
      }

  //--------------------------Загрузка файлов проекта-----------------------
    if ($request->file('projects')!=null){
      foreach ($request->file('projects') as $project) {
        $path_project = $project->store('public');
        $insert_project = new Projects;
        $insert_project->project = $path_project;
        $insert_project->id_device = $this->id_device;
        $insert_project->save();
      }
    }

    //Извлечение добавленного прибора из базы


    $request->session()->flash('flash_message', 'Прибор добавлен в базу.');

    return redirect('/working_with_devices');
}
}
