const token = 'pk.eyJ1IjoiYXJ0c2NpbGFiIiwiYSI6ImNqdjhqdnBkZjAwOWk0NW8wNDZuZ3h4bmMifQ.wVIiTbEStJHjLC7My-Ayjg';
// this should go to master //
let opts = {
  container: 'map',
  style: 'mapbox://styles/mapbox/dark-v9',
  zoom: 2,
  pitch: 15,
  center: [-40.587286, 28.456455]
};

let geojson = {
  type: "FeatureCollection",
  features: []
};

mapboxgl.accessToken = token;
let map = new mapboxgl.Map(opts);

let results = featuredPosts.map(async (post) => {
  let response = await fetch(`https://restcountries.eu/rest/v2/alpha/${post.countryCode}`);
  response = await response.json();
  console.log(response);
  post.coordinates = [];
  post.coordinates[0] = response.latlng[1];
  post.coordinates[1] = response.latlng[0];

  let x = {
    type: "Feature",
    geometry: {
      type: "Point",
      coordinates: post.coordinates
    },
    properties: {
      title: post.title,
      series: post.series,
      link: post.link
    }
  };
  geojson.features.push(x);
  return post;
});

Promise.all(results).then(() => {
  geojson.features.forEach(function(marker) {
    var el = document.createElement('div');
    el.className = 'mapMarker';

    let h3 =`<h3>${marker.properties.title}</h3>`;
    let p = `<p>from <span class="font-weight-bold">${marker.properties.series}</span></p>`;
    let link = `<a class="btn btn-primary btn-outline popup-link" href="${marker.properties.link}">Listen</a>`;

    new mapboxgl.Marker(el)
      .setLngLat(marker.geometry.coordinates)
      .setPopup(new mapboxgl.Popup({ offset: 25 }) // add popups
        .setHTML(h3 + p + link))
      .addTo(map);
  });
});