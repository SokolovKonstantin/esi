<x-page-template>
  <x-slot name="head">
    <script src="/js/main.js"></script>
    <script src="/js/initEditButton.js"></script>
    <script src="/js/gotoForMenu.js"></script>
    <script src="/js/searchLocationButton.js"></script>
    <script src="/js/buttonEnableSidIp.js"></script>
    <script src="/js/buttonChoiceSearchLocationIp.js"></script>
    <script src="/js/openNewInput.js"></script>
    <script src="/js/workingWithDevice.js"></script>
  </x-slot>
  <x-menu :menu="$data['menu']"/>
  <div id="main">

    <div id="search">
    <fieldset>
    <legend>Поиск приборов</legend>
      <div id="search-selection">
        <div id="search-ip" class="search-selection">Поиск по IP</div>
        <div id="search-location" class="search-selection">Поиск по месту установки</div>
      </div>
      <x-search-by-ip />
      <x-search-by-location :location="$data['location']"/>
      <x-search-results :searchResults="$data['search_results']" />
    </fieldset>
    </div>
    <div id="flash-message">{{$data['flash_message']}}</div>
    <div id="add">
      <fieldset>
        <legend>Добавление прибора</legend>
          <x-add-a-device :addDevice="['location'=>$data['location'],'type'=>$data['add_device']]" />
        </legend>
    </div>
  </div>
</x-page-template>
