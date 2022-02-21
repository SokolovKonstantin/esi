window.addEventListener('load',function()
{
  //-----------------Обработка нажатия на результат поиска приборов-------------
    const EditDevices = document.querySelectorAll('.device');
    for (let i = 0; i < EditDevices.length; i++) {

      EditDevices[i].onclick = (event) => {

        event = event || window.event // cross - browser
        if (event.stopPropagation) {
          //W3C:
          event.stopPropagation()
        } else {
          //Internet Explorer:
          event.cancelBubble = true
        }
        if (event.preventDefault) {
          //W3C:
          event.preventDefault()
        } else {
          //Internet Explorer:
          event.returnValue = false
        }

        document.querySelector('#'+ event.target.id).submit();

      }
    }
});
