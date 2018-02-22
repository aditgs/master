$('.input-daterange,.tglvalidasi').datepicker({
    format: "dd/mm/yyyy",
    // startDate: new Date(),
    startDate: "01/01/1980",
    todayBtn: "linked",
    language: "en",
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
$('.input-tanggal').datepicker({
     format: "dd-mm-yyyy",
     todayBtn: "linked",
     language: "en",
     multidate: false,
     calendarWeeks: true,
     autoclose: true,
     todayHighlight: true,
     orientation: "top auto"
 });
 
