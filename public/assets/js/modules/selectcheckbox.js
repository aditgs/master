$("#e1").select2();
$("#checkbox").click(function(){
    if($("#checkbox").is(':checked') ){
        $("#e1 > option").prop("selected","selected");
        $("#e1").trigger("change");
    }else{
        $("#e1 > option").removeAttr("selected");
         $("#e1").trigger("change");
     }
});

$("#button").click(function(){
       alert($("#e1").val());
});

var select = $('select');

function formatSelection(state) {
    return state.text;   
}

function formatResult(state) {
    console.log(state)
    if (!state.id) return state.text; // optgroup
    var id = 'state' + state.id.toLowerCase();
    var label = $('<label></label>', { for: id })
            .text(state.text);
    var checkbox = $('<input type="checkbox">', { id: id });
    
    return checkbox.add(label);   
}

select.select2({
    closeOnSelect: false,
    formatResult: formatResult,
    formatSelection: formatSelection,
    escapeMarkup: function (m) {
        return m;
    },
    matcher: function(term, text, opt){
         return text.toUpperCase().indexOf(term.toUpperCase())>=0 || opt.parent("optgroup").attr("label").toUpperCase().indexOf(term.toUpperCase())>=0
    }
});