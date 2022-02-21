window.addEventListener('load',function()
{
  //---------------Обработка кнопки enable_add_sid1-----------------------------
  document.querySelector('#add-sid1').style.display = 'none';
  document.querySelector('#expanding_sid1').onclick = ()=> {
    if (document.querySelector('#add-sid1').style.display=='none') {
      document.querySelector('#add-sid1').style.display = 'flex';
    } else {
      document.querySelector('#add-sid1').style.display = 'none';
    }
  };

  //---------------Обработка кнопки enable_add_sid2-----------------------------
  document.querySelector('#add-sid2').style.display = 'none';
  document.querySelector('#expanding_sid2').onclick = ()=> {
    if (document.querySelector('#add-sid2').style.display=='none') {
      document.querySelector('#add-sid2').style.display = 'flex';
    } else {
      document.querySelector('#add-sid2').style.display = 'none';
    }
  };

  //---------------Обработка кнопки enable_add_ip1-----------------------------
  document.querySelector('#add-ip1').style.display = 'none';
  document.querySelector('#expanding_ip1').onclick = ()=> {
    if (document.querySelector('#add-ip1').style.display=='none') {
      document.querySelector('#add-ip1').style.display = 'flex';
    } else {
      document.querySelector('#add-ip1').style.display = 'none';
    }
  };

  //---------------Обработка кнопки enable_add_ip2-----------------------------
  document.querySelector('#add-ip2').style.display = 'none';
  document.querySelector('#expanding_ip2').onclick = ()=> {
    if (document.querySelector('#add-ip2').style.display=='none') {
      document.querySelector('#add-ip2').style.display = 'flex';
    } else {
      document.querySelector('#add-ip2').style.display = 'none';
    }
  };

});
