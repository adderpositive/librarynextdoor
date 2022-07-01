/*
(() => {
  const $form = $('.js-form');
  
  function isEmailValid(email) {
    var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
    
    if (reg.test(email)) {
      return true;
    }

    return false;
  }

  if ($form.length) { 
    $form.submit(function(e) {
      // $('.w-form-fail').css({ position: 'absolute', top: -9999, left: -9999 });
      const title = $('input[name="title"]').val();
      // const email = $('input[name="email"]').val();
      // const phone = $('input[name="phone"]').val();
      // const id = $('input[name="id"]').val();

      // const emailValidation = isEmailValid(email);
      // if (emailValidation) {
      $.ajax({
        url: window.script_data.ajax_url,
        type: 'POST',
        dataType: 'json',
        data: {
          action: 'create_post',
          title: title,
          _ajax_nonce: window.script_data.nonce
        },
        success: function (data) {            
          if (data.type === 'success') {
            console.log(data)
          }
        }
      });
      /* } else {
        $('.w-form-fail')
          .css({ position: 'static', top: 0, left: 0 })
          .children('div')
          .text($('.w-form-fail').data('error-email'));
      }
      

      e.preventDefault();
    });
  }
})();
*/


/*
  
výzvy
  1. Jak budeme centrovat mapu?
    - Krajní body? + nějaká hodnota?
    - jak ale poznvat velikost :
  2. přidávání nových 
    - podle adresy nebo přímo GPS?
  
*/

(() => {
  var map = L.map('map').setView([49.59268, 17.25819], 14 );

  /*
    MORE: 
    https://wiki.openstreetmap.org/wiki/Tiles

    Basic tile: https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png - basic
  */
  L.tileLayer('https://cartodb-basemaps-{s}.global.ssl.fastly.net/light_all/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
  }).addTo(map);

  if (libraries && libraries.length) {
    libraries.forEach((library) => {
      if (library.latlng && library.title && library.citySize && library.type && library.content) {
        L.marker(library.latlng).addTo(map)
          .bindPopup(`
            ${library.title} <br />
            ${library.content ? library.content : ''} 
            <b>City size:</b> ${library.citySize} <br />
            <b>Type:</b> ${library.type}<br /> 
          `)
          .openPopup();
      }
    });
  }

 
})();