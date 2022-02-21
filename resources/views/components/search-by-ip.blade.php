<div id="ip-search">
  <form action="/search_by_ip" method="POST">
    @csrf
    <input type="text" name="ip" placeholder="IP адрес">
    <input type="submit" value="Поиск" >
  </form>
</div>
