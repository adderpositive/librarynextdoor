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
  const libs = window.libraries
  const elMap = document.getElementById('map')
  
  if (!elMap) return
  if (!libs || libs.length === 0) return

  const map = L.map('map').setView([49.59268, 17.25819], 10 );
  const marker = new L.icon({
    iconUrl: 'https://www.librarynextdoor.net/wp-content/themes/librarynextdoor/assets/img/pin.png',
    iconSize: [44, 44]
  });


  L.tileLayer('https://cartodb-basemaps-{s}.global.ssl.fastly.net/light_all/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
  }).addTo(map);

  

  libs.forEach((library) => {
    if (library.latlng && library.title && library.citySize && library.type && library.content) {
      let tags = ''

      if (library?.tags && library.tags.length) {
        library.tags.forEach((item) => {
          tags += `<span class='tag'>${item}</span>`
        })
      }

      L.marker(library.latlng, { icon: marker })
        .addTo(map)
        .bindPopup(`
          <div class="map-title">${library.title}</div>
          <div class='map-content'>
            <p class='map-par'>
              ${library.address}
            </p>
            <b>City size:</b> ${library.citySize} <br />
            <b>Type:</b> <span class='tag'>${library.type}</span><br /> 
            <b>Tags:</b> ${tags}
          </div>
          <div class="button-wrap">
            <a class="button" href="${library.url}">Detail</a>
          </div>
        `)
        .openPopup()
    }
  });

 
})();