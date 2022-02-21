window.addEventListener('load',function()
{
  //---------открытие пунктов выбора поиска-------------------------------------
  document.querySelector('#select-search-building').disabled='disabled';
  document.querySelector('#select-search-room').disabled='disabled';
  document.querySelector('#select-search-electrical-cabinet').disabled='disabled';
  document.querySelector('#select-search-manufacture').onchange = (event)=> {
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

    if (event.target.value !== '') {
      document.querySelector('#select-search-building').disabled='';
    }
  };

  document.querySelector('#select-search-building').onchange = (event)=> {
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

    if (event.target.value !== '') {
      document.querySelector('#select-search-room').disabled='';
    }
  };

  document.querySelector('#select-search-room').onchange = (event)=> {
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

    if (event.target.value !== '') {
      document.querySelector('#select-search-electrical-cabinet').disabled='';
    }
  };

});
