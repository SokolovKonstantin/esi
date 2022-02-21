<div class="site-div">
  <h1>Потеряна связь со следующими приборами:</h1>
  @foreach ($listDevices as $device)
    <form action="/edit_device" method="POST" class="device" id="{{$device['type']}}-{{$device['id']}}">
      @csrf
      <input type="text" name="id_device" value="{{$device['id']}}" hidden>
      <input type="text" name="type_device" value="{{$device['type']}}" hidden>
      {{$device['manufacture']}}
        \{{$device['building']}}
        \{{$device['room']}}
        \{{$device['electrical_cabinet']}}
        \{{$device['type']}} зав.№{{$device['manufacture_number']}}
        <br>
        {{$device['comment_device']}}

        <br>
        Порт №1 RS-485
          @if ($device['sid1']!=='none')
            sid={{$device['sid1']}}
            \port№{{$device['number_port_converter1']}}
            \{{$device['type_converter1']}}
            \IP:{{$device['ip_converter1']}}
            <br>
            {{$device['manufacture_converter1']}}
            \{{$device['building_converter1']}}
            \{{$device['room_converter1']}}
            \{{$device['electrical_cabinet_converter1']}}
            <br>
            {{$device['comments_converter1']}}
          @else
            none
          @endif

          <br>
          Порт №2 RS-485
            @if ($device['sid2']!=='none')
              sid={{$device['sid2']}}
              \port№{{$device['number_port_converter2']}}
              \{{$device['type_converter2']}}
              \IP:{{$device['ip_converter2']}}
              <br>
              {{$device['manufacture_converter2']}}
              \{{$device['building_converter2']}}
              \{{$device['room_converter2']}}
              \{{$device['electrical_cabinet_converter2']}}
              <br>
              {{$device['comments_converter2']}}
            @else
              none
            @endif

          <br>
          Порт №1 Ethernet
          @if ($device['ip_1_device']!=='none')
            IP:{{$device['ip_1_device']}}
          @else
            none
          @endif

          <br>
          Порт №2 Ethernet
          @if ($device['ip_2_device']!=='none')
            IP:{{$device['ip_2_device']}}
          @else
            none
          @endif
    </form>
  @endforeach
</div>
