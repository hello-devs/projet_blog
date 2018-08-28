$(document).ready(function(){

    $('.side-nav').sidenav();  //Initialise le volet glissant
    
    $('.suppBdd').click( (e)=>
    {
        if(confirm('Etes vous sur de vouloir supprimer'))
        {
            console.log('supprimé');
        }
        else
        {
            e.preventDefault();
        }    
    });

  });
