function tema(){
    //Verifica qual tema esta sendo ativado atraves da classe
    let tema = $( "#tema" ).hasClass( "Dark" );
   
    if(tema == true){
       
        $.ajax({
            type: "POST",
            url: siteUrl+'/Config/tema',
            data: {'tema': 'Dark'},
            success: function(condition){
                window.location.replace(siteUrl+'/Config/index');
            }
          });

    }else{
        $.ajax({
            type: "POST",
            url: siteUrl+'/Config/tema',
            data: {'tema': 'Light'},
            success: function(condition){
                window.location.replace(siteUrl+'/Config/index');
            }
          });
    }
   
};