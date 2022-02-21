<div id="add-a-device">

  <select id="type-of-device" name="device_converter_switch">
    <option selected disabled hidden>Вид устройства</option>
    <option>Прибор</option>
    <option>Преобразователь интерфейсов</option>
    <option>Коммутатор</option>
  </select>

  <!--****************Форма добавления прибора*****************************-->
  <div id="device-form" class="add-device">
  <form action="/add_device_to_base" enctype = "multipart/form-data" method="POST" id="add-device-form">
    @csrf

      <div id="type-device-div">
        <select name="type_device" id="type-device">
          <option selected disabled hidden>Тип прибора</option>
          <option>Добавить новый тип...</option>
          @foreach ($addDevice['type']['type_devices'] as $type)
            <option>{{$type}}</option>
          @endforeach
        </select>
        <input type="text" name="new_type_device" id="new-type-device" value="" placeholder="Новый тип прибора">
      </div>

      <input id="manufacture-number-device" type="text" name="manufacture_number_device" placeholder="заводской номер">

      <div id="verification-date">
        <label>Дата поверки: </label><input type="date" name="verification_date">
      </div>

      <x-location :location="['type'=>'device','location'=>$addDevice['location']]" />

      <textarea id="metrology-notes" name="metrology" placeholder="Заметки по метрологии (Ктт, Ктн,..)"></textarea>
      <textarea id="communication-notes" name="communication_setting" placeholder="Заметки по коммуникации (Скорость, кол-во бит,..)"></textarea>

      <!--Добавление порта RS-485 №1-->
      <input class="expanding-button" id="expanding_sid1" type="button" name="enable_add_sid1" value="Добавить Sid">
      <x-add-sid :sid="1">
        <x-slot name="option">
          @foreach ($addDevice['type']['type_converters'] as $type)
            <option>{{$type}}</option>
          @endforeach
        </x-slot>
        <x-location :location="['type'=>'converter_1','location'=>$addDevice['location']]" />
      </x-add-sid>

      <!--Добавление порта RS-485 №2-->
      <input class="expanding-button" id="expanding_sid2" type="button" name="enable_add_sid2" value="Добавить Sid">
      <x-add-sid :sid="2">
        <x-slot name="option">
          @foreach ($addDevice['type']['type_converters'] as $type)
            <option>{{$type}}</option>
          @endforeach
        </x-slot>
        <x-location :location="['type'=>'converter_2','location'=>$addDevice['location']]" />
      </x-add-sid>

      <!--Добавление порта Ethernet №1-->
      <input class="expanding-button" id="expanding_ip1" type="button" name="enable_add_ip1" value="Добавить IP">
      <x-add-ip :ip="1" />

      <!--Добавление порта Ethernet №2-->
      <input class="expanding-button" id="expanding_ip2" type="button" name="enable_add_ip2" value="Добавить IP">
      <x-add-ip :ip="2" />

      <textarea name="comments" placeholder="Комментарии к прибору."></textarea>

      <input id="name-of-adjuster" type="text" name="name_of_adjuster" placeholder="Ф.И.О лиц проводивших наладку">

      <div class="checkbox">
        <input type="checkbox" name="communication_status" value="true"><label>Прибор доступен удаленно.</label>
      </div>

      <div class="add-files">
        <label>Добавить проекты: </label><input type="file" name="projects[]" multiple caption="Добавить проекты">
      </div>

      <textarea id="software-notes" name="software" placeholder="Укажите необходимое ПО для наладки."></textarea>

      <input id="button-add-device" class="button-submit" type="button" value="Добавить прибор" >
    </form>
  </div>

  <!--****************Форма добавления преобразователя интерфейсов*****************************-->
  <div id="converter-form" class="add-device">
    <h1>В разработке</h1>


  </div>

  <!--****************Форма добавления преобразователя коммутатора*****************************-->
  <div id="switch-form" class="add-device">
    <h1>В разработке</h1>


  </div>

</div>
