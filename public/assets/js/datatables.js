$(document).ready(function(){
       var oTable=$('#datatables').DataTable({
            "ajax":{
                "url":baseurl+"getdatatables",
                "dataType": "json"
            },
            "sServerMethod": "POST",
            "bServerSide": true,
            "bAutoWidth": true,
            // "bDeferRender": true,
            "bSortClasses": false,
            "bscrollCollapse": true,    
            // "bStateSave": true,
            "responsive": true,
            "scrollX":true,
            "sScrollX":true,
            'fixedHeader': true,
            'iDisplayLength':50,
              "language": { "decimal": ",", "thousands": "." },
              "columnDefs":[{"type":"html","targets":0}],

        });
       
    console.clear();
});   


  