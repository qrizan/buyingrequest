var deadline = 0;

$('#expired').datepicker({
  format: 'yyyy-mm-dd',
  startDate: new Date(),
  autoclose: true,
      orientation: 'auto'
    }).on('changeDate', function (selected) {
      var deadline = new Date(selected.date.valueOf());
      $('#deadline').val('');
      $('#deadline').datepicker('setStartDate', deadline);
    }
});

$('#deadline').datepicker({
  format: 'yyyy-mm-dd',
  autoclose: true,
  orientation: 'auto'
});   

$('.datepicker-default').datepicker({
  format: 'yyyy-mm-dd',
  startDate: '+1d',
  autoclose: true,
});     
