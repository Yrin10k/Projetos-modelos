$(function(){
    //Aqui vai todo nosso codigo de javascript
  $('nav.mobile').click(function(){
    // O que vai acontecer quando clicarmos na nav.mobile
   var listaMenu = $('nav.mobile ul');
   // Abrir menu através do fadein 
   /*if(listaMenu.is(':hidden') == true)
   listaMenu.fadeIn(); // abrir menu
   else 
   listaMenu.fadeOut(); // fechar o menu 
  }) */
listaMenu.slideToggle(); // <-- também abre o menu, só que em formato de slide


// Abrir ou fechar sem efeitos 
  
 /**  if(listaMenu.is(':hidden') == true)
   //listaMenu.show(); // abrir menu
 listaMenu.css('display','block'); // <-- 1° parametro : propiedade  2° parametro : valor
   else 
  // listaMenu.hide(); // fechar o menu 
  listaMenu.css('display','none');
 */
})
 
})