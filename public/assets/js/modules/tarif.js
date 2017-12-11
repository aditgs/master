$(document).ready(function(){
	 $("#modal-form").on("hidden.bs.modal", function() {
       $('#modal-form .modal-body #addform #reset').trigger('click');
    });
})