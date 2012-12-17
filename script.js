var cacher = true;

$(function() {
    $('#commentaires').hide();

    $('#voirCommentaires').click(function()
    {
        if (cacher)
        {
            $('#voirCommentaires').text("Cacher les commentaires");
            $('#commentaires').slideDown(1000);
        }
        else
        {
            $('#voirCommentaires').text("Afficher les commentaires");
            $('#commentaires').slideUp(1000);         
        }
        cacher = !cacher;
    });
});