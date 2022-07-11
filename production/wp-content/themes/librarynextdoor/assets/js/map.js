(() => {
  const libs = window.libraries;
  const elMap = document.getElementById("map");

  if (!elMap) return;

  const map = L.map("map").setView([
    49.59268,
    17.25819
  ], 10);
  const marker = new L.icon({
    iconUrl: "https://www.librarynextdoor.net/wp-content/themes/librarynextdoor/assets/img/pin.png",
    iconSize: [
      44,
      44
    ]
  });

  L.tileLayer("https://cartodb-basemaps-{s}.global.ssl.fastly.net/light_all/{z}/{x}/{y}.png", {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
  }).addTo(map);

  if (!libs || libs.length === 0) return;

  libs.forEach((library) => {
    if (library.latlng && library.title && library.citySize && library.type && library.content) {
      console.log(library)
      let topics = "";
      if (library && library.topics && library.topics.length) library.topics.forEach((item) => {
        topics += `<span class='tag'>${item}</span>`;
      });
      L.marker(library.latlng, {
        icon: marker
      }).addTo(map).bindPopup(`
        <div class="map-title">${library.title}</div>
        <div class='map-content'>
          <p class='map-par'>
            ${library.address}
          </p>
          <b>City size:</b> ${library.citySize} <br />
          <b>Type:</b> <span class='tag'>${library.type}</span><br /> 
          <b>Topics:</b> ${topics}
        </div>
        <div class="button-wrap">
          <a class="button" href="${library.detailUrl}">Detail</a>
        </div>
      `).openPopup();
    }
  });
})();