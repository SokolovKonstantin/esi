<div class="add-ip" id="add-ip{{$ip}}">
  <fieldset>
  <legend>IP адрес порта №{{$ip}} прибора.</legend>
    <input class="device-ip" type="text" name="ip_{{$ip}}" placeholder="IP" title="IP">
    <input class="device-ip" type="text" name="mask_{{$ip}}" placeholder="Маска" title="mask">
    <input class="device-ip" type="text" name="gateway_{{$ip}}" placeholder="Шлюз"title="gateway">
  </fieldset>
</div>
