<div id="menu">
  <div id="menu-button">
    @foreach ($menu as $key => $value)
      <div id="{{$value}}" class="button-menu">
        {{$key}}
      </div>
      @endforeach
  </div>
  <div id="logo">
    <div id="logotype"></div>
    <div id="welcome">
      <div id="user">Пушкин Александр Леонидович  </div>
      <div id="severstal">Публичное акционерное общество "Северсталь"</div>
    </div>
  </div>
</div>
