$(document).ready(function(){
       var oTable=$('#datatables').DataTable({
            "ajax":{
                "url":baseurl+"getdatatables",
                "dataType": "json"
            },
            "sServerMethod": "POST",
            "bServerSide": true,
            "bAutoWidth": false,
            // "bDeferRender": true,
            "bSortClasses": false,
            "bscrollCollapse": true,    
            // "bStateSave": true,
            // "responsive": true,
            "scrollX":true,
            // "sScrollX":true,
              "language": { "decimal": ",", "thousands": "." },
              "columnDefs":[{"type":"html","targets":0}],

        });
      /* var oTable=$('#data-utama').DataTable({
            "ajax":{
                "url":baseurl+"getdatatables",
                "dataType": "json"
            },
            "sServerMethod": "POST",
            "bServerSide": true,
            "bAutoWidth": false,
            "bDeferRender": true,
            "bSortClasses": false,
            "bscrollCollapse": true,    
            // "bStateSave": true,
            // "responsive": true,
            "scrollX":true,
            // "sScrollX":true,
              "language": { "decimal": ",", "thousands": "." },
              "columnDefs":[{"type":"html","targets":0}],

        });*/
       
});   


  