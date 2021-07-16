$('.ui.dropdown')
  .dropdown({
      on: 'hover'
    })
;

$('.ui.rating')
  .rating({
    initialRating: 3,
    maxRating: 5
  })
;

$('.special.cards .card').dimmer({
  on: 'hover'
});
$('.tip')
  .popup()
;

$('.browse')
  .popup({
    inline     : true,
    hoverable  : true,
    position   : 'bottom left',
    delay: {
      show: 100,
      hide: 800
    }
  })
;

// $('.sidebar').first()
//   .sidebar('attach events', '.toggle.button')
// ;




$('.toggle.button')
  .removeClass('disabled')
;

var content = [
  { title: 'Andorra' },
  { title: 'United Arab Emirates' },
  { title: 'Afghanistan' },
  { title: 'Antigua' },
  { title: 'Anguilla' },
  { title: 'Albania' },
  { title: 'Armenia' },
  { title: 'Netherlands Antilles' },
  { title: 'Angola' },
  { title: 'Argentina' },
  { title: 'American Samoa' },
  { title: 'Austria' },
  { title: 'Australia' },
  { title: 'Aruba' },
  { title: 'Aland Islands' },
  { title: 'Azerbaijan' },
  { title: 'Bosnia' },
  { title: 'Barbados' },
  { title: 'Bangladesh' },
  { title: 'Belgium' },
  { title: 'Burkina Faso' },
  { title: 'Bulgaria' },
  { title: 'Bahrain' },
  { title: 'Burundi' }
  // etc
];


$('.ui.search')
  .search({
    source : content,
    searchFields   : [
      'title'
    ],
    fullTextSearch: false
  })
;
$('#example2').progress({
  percent: 22
});



$('.ui.checkbox')
  .checkbox()
;


$('.ui.button')
  .on('click', function() {
    $.tab('change tab', 'tab-name');
  });