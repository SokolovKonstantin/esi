<div class="location">
<fieldset>
  <legend>Локализация:</legend>

    <select class="location-input" id="choice-manufacture-{{$location['type']}}" name="manufacture_{{$location['type']}}">
      <option selected disabled hidden>Производство</option>
      <option>Добавить новое производство...</option>
      @foreach ($location['location']['manufacture'] as $manufacture)
        <option>{{$manufacture}}</option>
      @endforeach
    </select>
    <input class="location-input" id="new-choice-manufacture-{{$location['type']}}" type="text" name="new_manufacture_{{$location['type']}}" value="" placeholder="Новое производство">

    <select class="location-input" id="choice-building-{{$location['type']}}" name="building_{{$location['type']}}">
      <option selected disabled hidden>РП(здание)</option>
      <option>Добавить новое РП(здание)...</option>
      @foreach ($location['location']['building'] as $building)
        <option>{{$building}}</option>
      @endforeach
    </select>
    <input class="location-input" id="new-choice-building-{{$location['type']}}" type="text" name="new_building_{{$location['type']}}" value="" placeholder="Новое РП(здание)">

    <select class="location-input" id="choice-room-{{$location['type']}}" name="room_{{$location['type']}}">
      <option selected disabled hidden>РУ(помещение)</option>
      <option>Добавить новое РУ(помещение)...</option>
      @foreach ($location['location']['room'] as $room)
        <option>{{$room}}</option>
        @endforeach
    </select>
    <input class="location-input" id="new-choice-room-{{$location['type']}}" type="text" name="new_room_{{$location['type']}}" value="" placeholder="Новое РУ(помещение)">

    <select class="location-input" id="choice-electrical-cabinet-{{$location['type']}}" name="electrical_cabinet_{{$location['type']}}">
      <option selected disabled hidden>Ячейка(шкаф)</option>
      <option>Добавить новую ячейку(шкаф)...</option>
      @foreach ($location['location']['electrical_cabinet'] as $electrical_cabinet)
        <option>{{$electrical_cabinet}}</option>
      @endforeach
    </select>
    <input class="location-input" id="new-choice-electrical-cabinet-{{$location['type']}}" type="text" name="new_electrical_cabinet_{{$location['type']}}" value="" placeholder="Новая ячейка(шкаф)">

    <textarea class="location-input" name="location_comment_{{$location['type']}}" placeholder="Комментарии к месту установки."></textarea>

</fieldset>
</div>
