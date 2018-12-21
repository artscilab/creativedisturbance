
let thingSelect = new SlimSelect({
  select: '#thingSelect',
  showSearch: false,
  data: [
    {text: 'Everything', value: 'everything'},
    {text: 'Episodes', value: 'episodes'},
    {text: 'Channels', value: 'channels'},
    {text: 'People', value: 'people'}
  ],
});

let topicSelect = new SlimSelect({
  select: '#topicSelect',
  closeOnSelect: false,
  placeholder: 'Select topics (up to 3)',
  data: categories,
});

let languageSelect = new SlimSelect({
  select: '#languageSelect',
  data: languages
});

submitFilters = function() {
  let things = thingSelect.selected();
  let topics = topicSelect.selected();
  let language = languageSelect.selected();

  console.log(things, topics, language)
};