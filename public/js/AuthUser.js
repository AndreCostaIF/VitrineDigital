function onSignIn(googleUser) {
    var profile = googleUser.getBasicProfile();
   // var userID = profile.getId(); // Do not send to your backend! Use an ID token instead.
    var userName = profile.getName();
    var userPhoto = profile.getImageUrl();
    var userEmail = profile.getEmail(); // This is null if the 'email' scope is not present.
    
    
    if(userName !== ''){

      //DADOSO DO GOOGLE
      var dados = {
        userName:userName,
        userEmail:userEmail,
        userPhoto:userPhoto,
      }

      var j = JSON.stringify(dados);
      
      
      $.ajax({
        type: 'POST', 
        url: siteUrl+'/Validation/salvar',
        data: {'dados': j},
        success: function(condition){
          if (condition != 500) {
            window.location.replace(siteUrl+'/Index/index');
            
          }else{
            window.location.replace(siteUrl+'/AddressUser/index/');
            
          }
        
        }
      });
                
    }
    
  }

  function confirmCompra(){ 
    // retorna true se confirmado, ou false se cancelado
    return confirm('Deseja realmente realizar esta compra?');
 }

  function confirmDelete(url){  
     if (confirm("Deseja realmente deletar este produto?")){        
    
        window.location = url;   
    }
  }

   function addCart(url){  
    alert("Produto adicionado ao carrinho!");        
   
   window.location = url;}



    function attValor(id){
        $(".quantidade"+id).keyup(atualizar_total(id));
    }


   function atualizar_total(id){

    
    $.ajax({
        type: 'GET',
        url:siteUrl+"/Checkout/atualizar_total",
      
        data:{"quantidade":$(".quantidade"+id).val(),
              "preco": $(".preco"+id).val()},

        success: function(resultado){
          
          $(".total"+id).html("R$" + resultado);

         
        }
        
    })

    
}

function verificarUser(){
  
  $.ajax({
      url:siteUrl+"/Partner/verificar_user",
      data:{"UserLojista":$("#usuario").val()},
      dataType:'json',
      success:function(res){
          if (res.usuario != null){
              $("#usernameMsg").html("Este usuário já está cadastrado");
          } else if (res.valido){
              $("#usernameMsg").html("O usuário digitado é válido");
          } else if(!res.valido) {
              $("#usernameMsg").html("O usuário deve ter mais de 6 caracteres");
          }else{
              $("#usernameMsg").html("usuário valido");
          }
      }
  })
}

$(function(){
  $("#usuario").keyup(verificarUser);

//INICIO BANNER
  let time = 5000,
    currentImageIndex = 0,
    images = document.querySelectorAll("#slider img")
    max = images.length;

    function nextImage(){
      images[currentImageIndex].classList.remove("selected");
      currentImageIndex++;

      if(currentImageIndex >= max)
      currentImageIndex = 0;

      images[currentImageIndex].classList.add("selected");
    }

    function start(){
        setInterval(() => {
          nextImage();
        }, time)
    }

window.addEventListener("load", start)
//FINAL BANNER
  
class MobileNavbar{
    constructor(mobileMenu, navList){
      this.mobileMenu = document.querySelector(mobileMenu);
      this.navList = document.querySelector(navList);
      //this.navLinks = document.querySelectorAll(navLinks);
      this.activeClass = "active";
      this.handleClick = this.handleClick.bind();
    }

    handleClick(){
      
      mobileNavbar.navList.classList.toggle(mobileNavbar.activeClass);
      
    }

    addClickEvent(){
      this.mobileMenu.addEventListener("click", this.handleClick);
      
    }

    init(){
      if(this.mobileMenu){
        this.addClickEvent();
      }
      return this;
    }
  }

  const mobileNavbar = new MobileNavbar(
    ".mobile-menu",
    ".nav-list",
    ".nav-list li",
  );
  mobileNavbar.init();


 
});




   

