$(document).ready(function(){ //permet que le code html soit bien chargé
    
    $("select").select2();
    $("table").DataTable();
    $("textarea").summernote();
    
    
    // Confirmation sur suppression
    $(".form-delete").submit(function(event){
        var reponse = confirm("Êtes-vous certain ?");
        if (!reponse) {
            event.preventDefault();
        }
    });
    
});