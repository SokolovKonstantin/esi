<x-page-template>
  <x-slot name="head">
     <script src="/js/main.js"></script>
     <script src="/js/initEditButton.js"></script>
     <script src="/js/gotoForMenu.js"></script>
  </x-slot>
  <x-menu :menu="$data['menu']"/>
  <div id="main">
    <x-list-of-problematic-devices :listDevices="$data['list']" />
  </div>
</x-page-template>
