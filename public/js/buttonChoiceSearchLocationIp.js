window.addEventListener('load',function()
{
  //---------------Обработка кнопки search-ip-----------------------------
  document.querySelector('#search-by-location').style.display = 'none';
  document.querySelector('#search-ip').onclick = ()=> {
    document.querySelector('#search-by-location').style.display = 'none';

    document.querySelector('#search-location').style.fontWeight = 'normal';

    document.querySelector('#search-ip').style.fontWeight = 'bold';
    document.querySelector('#ip-search').style.display='flex';
  };

  //---------------Обработка кнопки search-location-----------------------------

  document.querySelector('#search-location').onclick = ()=> {
    document.querySelector('#ip-search').style.display='none';

    document.querySelector('#search-ip').style.fontWeight = 'normal';
    
    document.querySelector('#search-location').style.fontWeight = 'bold';
    document.querySelector('#search-by-location').style.display = 'flex';
  };
});
