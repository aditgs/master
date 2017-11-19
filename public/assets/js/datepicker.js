$('.input-daterange').datepicker({
    format: "yyyy-mm-dd",
    todayBtn: "linked",
    language: "id",
    multidate: false,
    calendarWeeks: true,
    autoclose: true,
    todayHighlight: true,
    orientation: "top auto"
});
$('#tgl_kedaluarsa').datepicker({
    format: "yyyy-mm-dd",
     language: "id",
    startDate:"+10d",
    
});