<x-page-template>
  <x-slot name="head">
     <script src="/js/main.js"></script>
  </x-slot>

  <div id="main">
    <form action="" method="POST">
      <p>{{$data['manufacture_device']['manufacture']}}/ {{$data['building_device']['building']}}/ {{$data['room_device']['room']}}/ </p>
      <input disabled name="manufacture_device" value="{{$data['manufacture_device']['manufacture']}}" >
      <input disabled name="building_device" value="{{$data['building_device']['building']}}" >
      <input disabled name="room_device" value="{{$data['room_device']['room']}}" >
      <input disabled name="electrical_cabinet_device" value="{{$data['electrical_cabinet_device']['electrical_cabinet']}}" >
      <label>Комментарии к месту установки прибора: </label>
      <textarea name="installation_location_device_comment">{{$data['electrical_cabinet_device']['comments']}}</textarea>
      <input type="text" name="type_device" value="{{$data['update_device']['type']}}">
      <label>Заводской номер: </label>
      <input type="text" name="manufacture_number_device" value="{{$data['update_device']['manufacture_number']}}">
      <label>Дата поверки:</label>
      @if ($data['update_device']['verification_date'] === '1970-01-01')
        <label>не указана!</label>
        <input type="date" name="verification_date" value="">
      @else
        <input type="date" name="verification_date" value="{{$data['update_device']['verification_date'] === '1970-01-01'}}">
      @endif

      <label>Комментарии к метрологии</label>
      <textarea name="metrology_device">{{$data['update_device']['metrology']}}</textarea>
      <label>Комментарии к установкам связи: </label>
      <textarea name="communication_setting_device">{{$data['update_device']['communication_setting']}}</textarea>

      <fieldset>
        <legend>RS-485 №1 прибора</legend>
        @if ($data['update_sid_1']==='none')
          <input type="button" value="Свернуть">
          <label>Связной адрес прибора по порту RS-485 №1: </label>
          <input type="text" name="sid1_device" value="">
          <label>Номер порта преобразователя интерфейсов: </label>
          <input type="text" name="number_port_converter_converter_1" value="" >
          <input type="text" name="type_converter_1" value="" placeholder="тип">
          <fieldset>
          <legend>IP настройки преобразователя интерфейсов.</legend>
            <label>IP: </label>
            <input type="text" name="ip_converter_1" value="">
            <label>mask: </label>
            <input type="text" name="mask_converter_1" value="">
            <label>gateway: </label>
            <input type="text" name="gateway_converter_1" value="">
            <label>Номер порта коммутатора: </label>
            <input type="text" name="number_port_switch_converter_1" value="">
          </fieldset>
          <label>Комментарии к преобразователю интерфейсов</label>
          <textarea name="comments_converter_1"></textarea>
        @else
          <label>Связной адрес прибора по порту RS-485 №1: </label>
          <input type="text" name="sid1_device" value="{{$data['update_sid_1']['sid']}}">
          <label>Номер порта преобразователя интерфейсов: </label>
          <input type="text" name="number_port_converter_converter_1" value="{{$data['update_port_number_1']['number_port']}}" >
          <input type="text" name="type_converter_1" value="{{$data['update_converter_1']['type']}}">
          <fieldset>
          <legend>IP настройки преобразователя интерфейсов.</legend>
            <label>IP: </label>
            <input type="text" name="ip_converter_1" value="{{$data['update_ip_converter_1']['ip']}}">
            <label>mask: </label>
            <input type="text" name="mask_converter_1" value="{{$data['update_ip_converter_1']['mask']}}">
            <label>gateway: </label>
            <input type="text" name="gateway_converter_1" value="{{$data['update_ip_converter_1']['gateway']}}">
            <label>Номер порта коммутатора: </label>
            <input type="text" name="number_port_switch_converter_1" value="{{$data['update_ip_converter_1']['number_port_switch']}}">
          </fieldset>
          <label>Комментарии к преобразователю интерфейсов</label>
          <textarea name="comments_converter_1">{{$data['update_converter_1']['comments']}}</textarea>
          <input type="checkbox" name="must_be_deleted_converter_1" value="true">
          <label>Интерфейс больше не используется! Удалить!</label>
        @endif
      </fieldset>

      <fieldset>
        <legend>RS-485 №2 прибора</legend>
        @if ($data['update_sid_2']==='none')
          <input type="button" value="Свернуть">
          <label>Связной адрес прибора по порту RS-485 №2: </label>
          <input type="text" name="sid2_device" value="">
          <label>Номер порта преобразователя интерфейсов: </label>
          <input type="text" name="number_port_converter_converter_2" value="" >
          <input type="text" name="type_converter_2" value="" placeholder="тип">
          <fieldset>
          <legend>IP настройки преобразователя интерфейсов.</legend>
            <label>IP: </label>
            <input type="text" name="ip_converter_2" value="">
            <label>mask: </label>
            <input type="text" name="mask_converter_2" value="">
            <label>gateway: </label>
            <input type="text" name="gateway_converter_2" value="">
            <label>Номер порта коммутатора: </label>
            <input type="text" name="number_port_switch_converter_2" value="">
          </fieldset>
          <label>Комментарии к преобразователю интерфейсов</label>
          <textarea name="comments_converter_2"></textarea>
        @else
          <label>Связной адрес прибора по порту RS-485 №2: </label>
          <input type="text" name="sid2_device" value="{{$data['update_sid_2']['sid']}}">
          <label>Номер порта преобразователя интерфейсов: </label>
          <input type="text" name="number_port_converter_converter_2" value="{{$data['update_port_number_2']['number_port']}}" >
          <input type="text" name="type_converter_2" value="{{$data['update_converter_2']['type']}}">
          <fieldset>
          <legend>IP настройки преобразователя интерфейсов.</legend>
            <label>IP: </label>
            <input type="text" name="ip_converter_2" value="{{$data['update_ip_converter_2']['ip']}}">
            <label>mask: </label>
            <input type="text" name="mask_converter_2" value="{{$data['update_ip_converter_2']['mask']}}">
            <label>gateway: </label>
            <input type="text" name="gateway_converter_2" value="{{$data['update_ip_converter_2']['gateway']}}">
            <label>Номер порта коммутатора: </label>
            <input type="text" name="number_port_switch_converter_2" value="{{$data['update_ip_converter_2']['number_port_switch']}}">
          </fieldset>
          <label>Комментарии к преобразователю интерфейсов</label>
          <textarea name="comments_converter_2">{{$data['update_converter_2']['comments']}}</textarea>
          <input type="checkbox" name="must_be_deleted_converter_2" value="true">
          <label>Интерфейс больше не используется! Удалить!</label>
        @endif
      </fieldset>

      <fieldset>
        <legend>IP №1 прибора</legend>
        @if ($data['update_ip_1']==='none')
          <input type="button" value="Свернуть">
          <label>IP: </label>
          <input type="text" name="ip_1_device" value="">
          <label>mask: </label>
          <input type="text" name="mask_1_device" value="">
          <label>gateway: </label>
          <input type="text" name="gateway_1_device" value="">
          <label>Номер порта коммутатора: </label>
          <input type="text" name="number_port_switch_device_1" value="">
        @else
          <label>IP: </label>
          <input type="text" name="ip_1_device" value="{{$data['update_ip_1']['ip']}}">
          <label>mask: </label>
          <input type="text" name="mask_1_device" value="{{$data['update_ip_1']['mask']}}">
          <label>gateway: </label>
          <input type="text" name="gateway_1_device" value="{{$data['update_ip_1']['gateway']}}">
          <label>Номер порта коммутатора: </label>
          <input type="text" name="number_port_switch_device_1" value="{{$data['update_ip_1']['number_port_switch']}}">
          <input type="checkbox" name="must_be_deleted_ip_1" value="true">
          <label>Интерфейс больше не используется! Удалить!</label>
        @endif
      </fieldset>

      <fieldset>
        <legend>IP №2 прибора</legend>
        @if ($data['update_ip_2']==='none')
          <input type="button" value="Свернуть">
          <label>IP: </label>
          <input type="text" name="ip_2_device" value="">
          <label>mask: </label>
          <input type="text" name="mask_2_device" value="">
          <label>gateway: </label>
          <input type="text" name="gateway_2_device" value="">
          <label>Номер порта коммутатора: </label>
          <input type="text" name="number_port_switch_device_2" value="">
        @else
          <label>IP: </label>
          <input type="text" name="ip_2_device" value="{{$data['update_ip_2']['ip']}}">
          <label>mask: </label>
          <input type="text" name="mask_2_device" value="{{$data['update_ip_2']['mask']}}">
          <label>gateway: </label>
          <input type="text" name="gateway_2_device" value="{{$data['update_ip_2']['gateway']}}">
          <label>Номер порта коммутатора: </label>
          <input type="text" name="number_port_switch_device_2" value="{{$data['update_ip_2']['number_port_switch']}}">
          <input type="checkbox" name="must_be_deleted_ip_2" value="true">
          <label> Интерфейс больше не используется! Удалить!</label>
        @endif
      </fieldset>

      <label>Необходимое программное обеспечение: </label>
      <textarea name="software_device">{{$data['update_device']['software']}}</textarea>
      <label>Комментарии к прибору</label>
      <textarea name="comments_device">{{$data['update_device']['comments']}}</textarea>
      @if ($data['update_device']['communication_status'] === true)
        <input type="checkbox" checked name="communication_status_device" value="true">
        <label>Прибор доступен удаленно.</label>
      @else
        <input type="checkbox" name="communication_status_device" value="true">
        <label>Прибор доступен удаленно.</label>
      @endif
      <label>Лица проводившие наладку: </label>
      <input type="text" name="name_of_adjuster" value="{{$data['update_device']['name_of_adjuster']}}">

      <fieldset>
        <legend>Файлы проекта:</legend>
        @if ($data['update_file_project'] === [])
          <p>Нет файлов проекта.</p>
        @else
          @foreach ($data['update_file_project'] as $file_project)
            <a href="{{$file_project['url']}}" target="_blank">Открыть файл в новом окне.</a>
            <input type="checkbox" name="" value="{{$file_project['id_project']}}">
            <label>Файл не нужен.</label>
            <br>
          @endforeach
        @endif
        <div class="old-new">
          <input type="file" name="projects[]" multiple>
        </div>
      </fieldset>

      <input type="button" value="Удалить прибор">
      <input type="button" value="Внести изменения">

    </form>
  </div>
</x-page-template>
