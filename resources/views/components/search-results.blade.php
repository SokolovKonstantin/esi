<div id="search-results">

@if ($searchResults)

  @foreach ($searchResults as $result)
  <form action="/edit_device" method="POST" class="device" id="{{$result['type']}}-{{$result['id']}}">
    @csrf
    <input type="text" name="id_device" value="{{$result['id']}}" hidden>
    <input type="text" name="type_device" value="{{$result['type']}}" hidden>
    {{$result['type']}}
    @if (isset($result['ip']))
      IP:{{$result['ip']}}
    @endif
    <br>
      @foreach ($result['locations'] as $location)
        {{$location}} \
        @endforeach

    <br>
    {{$result['comments']}}
  </form>
  @endforeach

@else
  <p>Не найдено.</p>
@endif

</div>
