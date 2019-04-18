'use strict';

function handlePeopleFilterChange() {
  let element = document.getElementById('peopleFilterSelect');
  let val = element.value;

  let hosts = document.getElementById('hosts');
  let voices = document.getElementById('voices');

  if (val === 'Hosts') {
    voices.style.display = 'none';
    hosts.style.display = 'inherit';
  } else if (val === 'Voices') {
    voices.style.display = 'inherit';
    hosts.style.display = 'none';
  } else {
    voices.style.display = 'inherit';
    hosts.style.display = 'inherit';
  }
}