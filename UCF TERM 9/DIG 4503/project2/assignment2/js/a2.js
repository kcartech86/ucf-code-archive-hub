if(!window.Popup) window.Popup = {};

/**
 * Handles all the popup window stuff.
 */
Popup.Handler = function() 
{
   //Pulls up the popup background
   var popupback = function() 
   {
      width = $(document).width()+100;
      height = $(document).height()+100;
      
      $('body').prepend('<div id="popupback"></div>');
      
      $('#popupback').hide();
      $('#popupback').fadeIn(300);
      $('#popupback').width(width);
      $('#popupback').height(height);
      $('#popupback').click(killButton);
   }
   //Fades out and destroys the popup window and background.
   var killButton = function() {
      if($("#popup").length > 0) { 
         $("#popup").fadeOut(300,function(){
            $('#popup').remove();
         }); 
      }
      if($("#popupback").length > 0) { $("#popupback").fadeOut(300,function(){$('#popupback').remove();}); }
   }
   /* Creates a general template for the popup window 
    * The callback parameter takes in a function to be fired once the popup is made*/
   var popUpTemplate = function(noback, callback) {
      if(!noback) { popupback() };
      $('body').prepend('<div id="popup"></div>');
      
      $('#popup').hide();
      if(callback != undefined) { callback() };
      var leftMarginMinusWidthHalfWay = ($(window).width()/2) - ($('#popup').width()/2);
      var topMarginMinusHeightHalfWay = ($(window).height()/2) + $(window).scrollTop() - ($('#popup').height()/2);
      $('#popup').css({'left' : leftMarginMinusWidthHalfWay, 'top' : topMarginMinusHeightHalfWay});
      $('#popup').fadeIn(300);
   }
   //Makes the spinny loady thing
   var loader = function() {
      popUpTemplate(true, function() {
         $('#popup').addClass('loading_popup');
         $('#popup').html('<div class="ball"></div><div class="ball1"></div>');   
      });   
   }
   return {
      loader : loader,
      popUpTemplate : popUpTemplate,
      killButton : killButton,
   }
}();
function searching()
{
   //Keeps someone from clicking search a billion times.
   $('#search_button').unbind('click');
   Popup.Handler.loader();
   //Grabbin' the search term
   var searchTerm = $('input[type=search]').val();
   //Post blah, blah, blah
   $.post('getThumbs.php', { term : searchTerm }, function(data) {
      //Checks to make sure there are images coming back, if not then error message
      if(data.images.length > 0)
      {
         //Slides the p up, kills the loader, and emptys any images that were there
         $('#photoArea p').slideUp(function() {$('#photoArea p').remove();});
         Popup.Handler.killButton();
         $('#photoArea ul').html('');
         //Appends images to the photo ul
         for(i in data.images)
         {
            $('#photoArea ul').append("<li><img src='"+data.images[i].image+"_t.jpg' alt='"+data.images[i].alt+"' /></li>");
         }
         $('#photoArea ul').slideDown(function() {$('#search_button').click(searching);});
         $('#photoArea ul li').each(function() {
            //Adds a click handler to each photo (can also use .bind(click, function...))
            $(this).click(function() {
               Popup.Handler.popUpTemplate(false, function() {
                  //Fakes the loader, this was easier than trying to make the loader handle everything.
                  $('#popup').html('<div class="ball"></div><div class="ball1"></div>');
                  //Sets the height, if this wasn't here, the loader animation gets all wacky
                  $('#popup').height('60px');
                  //Give it some padding for the incoming picture
                  $('#popup').css('padding', '20px');
               });
               var id = $(this).children('img').attr('alt');
               //Gets the full image by slicing off the _t part, way easier than waiting for the new image.
               var img = $(this).children('img').attr('src').slice(0, -6)+".jpg";
               //The image is in an object, so it can be loaded fully before being shown to the user.
               var imgr = new Image();
               imgr.src = img;
               //Once the image is loaded, the loader can go away and the popup can populate.
               imgr.onload = function() 
               {
                  //These margins need to take into account the padding.
                  var leftMarginMinusWidthHalfWay = ($(window).width()/2) - (imgr.width/2) - 20;
                  //The height takes into account WHERE the user is scrolled to on the page.
                  var topMarginMinusHeightHalfWay = ($(window).height()/2) - (imgr.height/2) - 20 + $(window).scrollTop();
                  $('#popup div').fadeOut();
                  //Animates the popup to fit the image.
                  $('#popup').animate({
                     "min-height" : imgr.height,
                     width : imgr.width,
                     top : topMarginMinusHeightHalfWay,
                     left : leftMarginMinusWidthHalfWay
                  }, function() {
                     //After animation is when the image is applied and ajax is called.
                     $('#popup').html('<img src="'+img+'" />');
                     //This gives a nice little delay when the information slides down.
                     $.post('getPhoto.php', { 'id' : id}, function(data) {
                        $('#popup').append("<div id='photoInfo'><ul><li><strong>Title:</strong> "+data.info.title+"</li><li><strong>By:</strong> "+data.info.owner+"</li><li><strong>Date:</strong> "+data.info.date+"</li><li><strong>Tags:</strong> "+data.info.tags+"</li><li><strong>Views:</strong> "+data.info.views+"</li></div>");
                        //Slide down the info.
                        $('#popup').animate({
                           height : ($('#popup').height()+$('#photoInfo').height()),
                        }, function() {
                           $('#popup').prepend("<span class='close'>x</span>");
                           $('.close').hide().fadeIn().click(Popup.Handler.killButton);
                           $('#photoInfo').fadeIn();
                        });
                     }, "json");
                  });
               }
            });
         });
      }
      //All of this is just telling the user if no matches return.
      else
      {
         Popup.Handler.killButton();
         $('#photoArea ul').html('');
         if( $('#photoArea p').length > 0)
         {
            $('#photoArea p').slideUp(function() {
               $('#photoArea p').html('No photos matched your search.');
               $('#photoArea p').slideDown();
			   $('#search_button').click(searching);
            });
         }
         else
         {
            $('#photoArea').prepend('<p>No photos matched your search.</p>')
            $('#photoArea p').hide().slideDown();
			$('#search_button').click(searching);
         }
      }
   }, 'json');
}

$(document).ready(function() {
	//Click the search button
	$('#search_button').click(searching);
	$('header').prepend('<img id="html5pic" src="img/HTML5_Logo_64.png" alt="HTML5 Badge Image">');

});