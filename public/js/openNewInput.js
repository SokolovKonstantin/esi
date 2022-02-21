window.addEventListener('load',function()
{
  document.querySelector('#new-type-device').style.display='none';
  document.querySelector('#type-device').onchange = (event)=> {
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
    if (event.target.value === 'Добавить новый тип...') {
      document.querySelector('#new-type-device').style.display='flex';
    } else {
      document.querySelector('#new-type-device').value='';
      document.querySelector('#new-type-device').style.display='none';
    }
  };

  document.querySelector('#new-type-converter-1').style.display='none';
  document.querySelector('#type-converter-1').onchange = (event)=> {
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
    if (event.target.value === 'Добавить новый тип...') {
      document.querySelector('#new-type-converter-1').style.display='flex';
    } else {
      document.querySelector('#new-type-converter-1').value='';
      document.querySelector('#new-type-converter-1').style.display='none';
    }
  };

  document.querySelector('#new-type-converter-2').style.display='none';
  document.querySelector('#type-converter-2').onchange = (event)=> {
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
    if (event.target.value === 'Добавить новый тип...') {
      document.querySelector('#new-type-converter-2').style.display='flex';
    } else {
      document.querySelector('#new-type-converter-2').value='';
      document.querySelector('#new-type-converter-2').style.display='none';
    }
  };


    //-device
    document.querySelector('#new-choice-manufacture-device').style.display = 'none';
    document.querySelector('#new-choice-building-device').style.display = 'none';
    document.querySelector('#new-choice-room-device').style.display = 'none';
    document.querySelector('#new-choice-electrical-cabinet-device').style.display = 'none';

    document.querySelector('#choice-manufacture-device').onchange = (event)=> {
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
      if (event.target.value === 'Добавить новое производство...') {
        document.querySelector('#new-choice-manufacture-device').style.display='flex';
      } else {
        document.querySelector('#new-choice-manufacture-device').value='';
        document.querySelector('#new-choice-manufacture-device').style.display='none';
      }
    };

    document.querySelector('#choice-building-device').onchange = (event)=> {
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
      if (event.target.value === 'Добавить новое РП(здание)...') {
        document.querySelector('#new-choice-building-device').style.display='flex';
      } else {
        document.querySelector('#new-choice-building-device').value='';
        document.querySelector('#new-choice-building-device').style.display='none';
      }
    };

    document.querySelector('#choice-room-device').onchange = (event)=> {
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
      if (event.target.value === 'Добавить новое РУ(помещение)...') {
        document.querySelector('#new-choice-room-device').style.display='flex';
      } else {
        document.querySelector('#new-choice-room-device').value='';
        document.querySelector('#new-choice-room-device').style.display='none';
      }
    };

    document.querySelector('#choice-electrical-cabinet-device').onchange = (event)=> {
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
      if (event.target.value === 'Добавить новую ячейку(шкаф)...') {
        document.querySelector('#new-choice-electrical-cabinet-device').style.display='flex';
      } else {
        document.querySelector('#new-choice-electrical-cabinet-device').value='';
        document.querySelector('#new-choice-electrical-cabinet-device').style.display='none';
      }
    };

    //-converter_1
    document.querySelector('#new-choice-manufacture-converter_1').style.display = 'none';
    document.querySelector('#new-choice-building-converter_1').style.display = 'none';
    document.querySelector('#new-choice-room-converter_1').style.display = 'none';
    document.querySelector('#new-choice-electrical-cabinet-converter_1').style.display = 'none';

    document.querySelector('#choice-manufacture-converter_1').onchange = (event)=> {
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
      if (event.target.value === 'Добавить новое производство...') {
        document.querySelector('#new-choice-manufacture-converter_1').style.display='flex';
      } else {
        document.querySelector('#new-choice-manufacture-converter_1').value='';
        document.querySelector('#new-choice-manufacture-converter_1').style.display='none';
      }
    };

    document.querySelector('#choice-building-converter_1').onchange = (event)=> {
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
      if (event.target.value === 'Добавить новое РП(здание)...') {
        document.querySelector('#new-choice-building-converter_1').style.display='flex';
      } else {
        document.querySelector('#new-choice-building-converter_1').value='';
        document.querySelector('#new-choice-building-converter_1').style.display='none';
      }
    };

    document.querySelector('#choice-room-converter_1').onchange = (event)=> {
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
      if (event.target.value === 'Добавить новое РУ(помещение)...') {
        document.querySelector('#new-choice-room-converter_1').style.display='flex';
      } else {
        document.querySelector('#new-choice-room-converter_1').value='';
        document.querySelector('#new-choice-room-converter_1').style.display='none';
      }
    };

    document.querySelector('#choice-electrical-cabinet-converter_1').onchange = (event)=> {
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
      if (event.target.value === 'Добавить новую ячейку(шкаф)...') {
        document.querySelector('#new-choice-electrical-cabinet-converter_1').style.display='flex';
      } else {
        document.querySelector('#new-choice-electrical-cabinet-converter_1').value='';
        document.querySelector('#new-choice-electrical-cabinet-converter_1').style.display='none';
      }
    };

    //-converter_2
    document.querySelector('#new-choice-manufacture-converter_2').style.display = 'none';
    document.querySelector('#new-choice-building-converter_2').style.display = 'none';
    document.querySelector('#new-choice-room-converter_2').style.display = 'none';
    document.querySelector('#new-choice-electrical-cabinet-converter_2').style.display = 'none';

    document.querySelector('#choice-manufacture-converter_2').onchange = (event)=> {
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
      if (event.target.value === 'Добавить новое производство...') {
        document.querySelector('#new-choice-manufacture-converter_2').style.display='flex';
      } else {
        document.querySelector('#new-choice-manufacture-converter_2').value='';
        document.querySelector('#new-choice-manufacture-converter_2').style.display='none';
      }
    };

    document.querySelector('#choice-building-converter_2').onchange = (event)=> {
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
      if (event.target.value === 'Добавить новое РП(здание)...') {
        document.querySelector('#new-choice-building-converter_2').style.display='flex';
      } else {
        document.querySelector('#new-choice-building-converter_2').value='';
        document.querySelector('#new-choice-building-converter_2').style.display='none';
      }
    };

    document.querySelector('#choice-room-converter_2').onchange = (event)=> {
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
      if (event.target.value === 'Добавить новое РУ(помещение)...') {
        document.querySelector('#new-choice-room-converter_2').style.display='flex';
      } else {
        document.querySelector('#new-choice-room-converter_2').value='';
        document.querySelector('#new-choice-room-converter_2').style.display='none';
      }
    };

    document.querySelector('#choice-electrical-cabinet-converter_2').onchange = (event)=> {
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
      if (event.target.value === 'Добавить новую ячейку(шкаф)...') {
        document.querySelector('#new-choice-electrical-cabinet-converter_2').style.display='flex';
      } else {
        document.querySelector('#new-choice-electrical-cabinet-converter_2').value='';
        document.querySelector('#new-choice-electrical-cabinet-converter_2').style.display='none';
      }
    };

});
