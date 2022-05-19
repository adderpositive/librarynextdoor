
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
            ${library.content} 
            <b>City size:</b> ${library.citySize} <br />
            <b>Type:</b> ${library.type}<br /> 
          `)
          .openPopup();
      }
    });
  }

 
})();