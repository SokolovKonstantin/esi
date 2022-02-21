  <div class="add-sid" id="add-sid{{$sid}}">
    <fieldset>
    <legend>Добавление связного адреса порта №{{$sid}} преобразователя</legend>

      <input class="sid-device" type="text" name="sid{{$sid}}" placeholder="sid прибора" title="SID прибора">

        <select class="type-converter" id="type-converter-{{$sid}}"name="type_converter_{{$sid}}">
          <option selected disabled hidden>Тип преобразователя</option>
          <option>Добавить новый тип...</option>
            {{$option}}
          </select>
        <input class="type-converter" id="new-type-converter-{{$sid}}" type="text" name="new_type_converter_{{$sid}}" value="" placeholder="Новый тип преобразователя" title="Новый тип преобразователя">


      <textarea class="type-converter" name="converter_comments_{{$sid}}" placeholder="Комментарии"></textarea>

      <input class="converter-ip" type="text" name="ip_converter_{{$sid}}" placeholder="IP преобразователя" title="IP преобразователя">
      <input class="converter-ip" type="text" name="mask_converter_{{$sid}}" placeholder="Маска преобразователя" title="Маска преобразователя">
      <input class="converter-ip" type="text" name="gateway_converter_{{$sid}}" placeholder="Шлюз преобразователя" title="Шлюз преобразователя">
      <input class="converter-ip" type="text" name="number_port_converter_{{$sid}}" placeholder="Номер порта преобразователя" title="Номер порта преобразователя">
      {{$slot}}
  </fieldset>
</div>
