window.addEventListener('load',function()
{
  //-----------------Обработка переходов по меню---------------------------------
    const buttonMenu = document.querySelectorAll('.button-menu');
    for (let i = 0; i < buttonMenu.length; i++) {

      buttonMenu[i].onclick = (event) => {

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

        document.location.href = event.target.id;
      }
    }
});
