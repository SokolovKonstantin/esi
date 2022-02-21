<div id="search-by-location">
  <form action="/search_by_location" method="POST">
    @csrf

    <select id="select-search-manufacture" name="manufacture">
      <option selected disabled hidden>Производство</option>
      @foreach ($location['manufacture'] as $manufacture)
        <option>{{$manufacture}}</option>
      @endforeach
    </select>

    <select id="select-search-building" name="building">
      <option selected disabled hidden>РП(здание)</option>
      @foreach ($location['building'] as $building)
        <option>{{$building}}</option>
      @endforeach
    </select>

    <select id="select-search-room" name="room">
      <option selected disabled hidden>РУ(помещение)</option>
      @foreach ($location['room'] as $room)
        <option>{{$room}}</option>
      @endforeach
    </select>

    <select id="select-search-electrical-cabinet" name="electrical_cabinet">
      <option selected disabled hidden>Ячейка(шкаф)</option>
      @foreach ($location['electrical_cabinet'] as $electrical_cabinet)
        <option>{{$electrical_cabinet}}</option>
      @endforeach
    </select>


    <input type="submit" value="Поиск" >
  </form>
</div>
