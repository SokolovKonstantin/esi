window.addEventListener('load',function()
{
  //Обработка селектора "Вид устройства"
  document.querySelector('#device-form').style.display = 'none';
  document.querySelector('#converter-form').style.display = 'none';
  document.querySelector('#switch-form').style.display = 'none';
  document.querySelector('#type-of-device').onchange = ()=> {
    if (document.querySelector('#type-of-device').value=='Прибор') {
      document.querySelector('#converter-form').style.display = 'none';
      document.querySelector('#switch-form').style.display = 'none';
      document.querySelector('#device-form').style.display = 'flex';
    }
    if (document.querySelector('#type-of-device').value=='Преобразователь интерфейсов') {
      document.querySelector('#converter-form').style.display = 'flex';
      document.querySelector('#switch-form').style.display = 'none';
      document.querySelector('#device-form').style.display = 'none';
    }
    if (document.querySelector('#type-of-device').value=='Коммутатор') {
      document.querySelector('#converter-form').style.display = 'none';
      document.querySelector('#switch-form').style.display = 'flex';
      document.querySelector('#device-form').style.display = 'none';
    }
  };

  //----------отправка формы добавление прибора---------------------------------
  document.querySelector('#button-add-device').onclick = ()=>{
    document.querySelector('#add-device-form').submit();
  }
});
