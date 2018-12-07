// hi
const token = 'pk.eyJ1IjoiYXJ0c2NpbGFiIiwiYSI6ImNqbndpM2pkejBrN3EzdnBnYmYyZHNhMzEifQ.I-w2OQJhG3YAwlgCoF6MFQ';

mapboxgl.accessToken = token;
let opts = {
  container: 'map',
  style: 'mapbox://styles/mapbox/dark-v9',
  zoom: 3,
  pitch: 10,
  center: [122.420679, 37.772537]
};

let map = new mapboxgl.Map(opts);