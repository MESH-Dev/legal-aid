jQuery(document).ready(function($){

  //Are we loaded?
  console.log('New theme loaded!');

  //Let's do something awesome!

  // $('.ga-close').click(function(){
  // 	$('.global-alert').hide();
  // })

function createCookie(name,value,days) {
if (days) {
    var date = new Date();
    date.setTime(date.getTime()+(days*24*60*60*1000));
    var expires = "; expires="+date.toGMTString();
}
else var expires = "";
document.cookie = name+"="+value+expires+"; path=/";
}

function readCookie(name) {
var nameEQ = name + "=";
var ca = document.cookie.split(';');
for(var i=0;i < ca.length;i++) {
    var c = ca[i];
    while (c.charAt(0)==' ') c = c.substring(1,c.length);
    if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
}
return null;
}

//console.log(readCookie());

function eraseCookie(name) {
createCookie(name,"",-1); 
}

$('.ga-close').click(function(){
  $('.global-alert').hide();
  //console.log('Clicked!');
  //console.log(readCookie('dismissed'));
  createCookie('dismissed','true',1);
});

var $hideAlert = readCookie('dismissed');
console.log($hideAlert);

if($hideAlert !== 'true'){
	
	 //$('.global-alert').show();
}

// Mixitup functionality
if($('.results').length > 0){ //Run this code only if the results container exists on the page.
var containerEl = document.querySelector('.results');
var container = $('.results');
var mixer = mixitup(containerEl, {   
          // ## 2 - callbacks onMixEnd 
         callbacks: {
	         onMixEnd: function(state){
	           // ## 3 - hasFailed true? show alert
	           if(state.hasFailed){  
	              //noItemsFoundMessage.style.display = "block";
	              $('.nothing-found').show();
	              //alert("No items found");
	           } // end if
	           // ## 3 - hasFailed false? hide alert
	           else{
	              //noItemsFoundMessage.style.display = "none";
	              $('.nothing-found').hide();
	              //alert("Items found");

	           } //end else
	         }, //end onMixEnd

	         //Start hash filtering setup
	         onMixStart: function(state, futureState) {
			        },
	        
			onMixEnd: function() {
				container
					.find('.resource-item:visible:first')
					.focus();
			}
					
  		 } //end of callback
  		});

		//If the hash exists in the link, run the following code to filter based on the hash
		if (location.hash) {
			console.log(location.hash);
			var hash = location.hash.replace('#', '.')
			var oldBtn = $('.filter-button.active');
			var newBtn = $(".filter-button").find("[data-toggle='" + hash + "']");
			mixer.filter(hash)
			oldBtn.removeClass('active');
			newBtn.addClass('active');
		}
}

// if ($('.program-card-container')) {
// 					var container = $('.program-card-container')
// 					var mixer = mixitup(container, {
// 						callbacks: {
// 			        onMixStart: function(state, futureState) {
// 			        },
// 							onMixEnd: function() {
// 								container
// 									.find('.card:visible:first')
// 									.focus();
// 							}
// 				    }
// 					});
// 					if (location.hash) {
// 						var hash = location.hash.replace('#', '.')
// 						var oldBtn = $('button.selected');
// 						var newBtn = $("button").find("[data-filter='" + hash + "']");
// 						mixer.filter(hash)
// 						oldBtn.removeClass('selected');
// 						newBtn.addClass('selected');
// 					}
// 				}

//$a_cnt=0;
//$('.accordion').each(function(){
	$a_cnt=0;
	$('.accordion-title').click(function(){
			$(this).next('.accordion-content').slideToggle('fast');
			$(this).toggleClass('active');
		// $a_cnt++;
		// console.log($a_cnt);
		// if($a_cnt == 1){
		// 	$(this).next('.accordion-content').slideDown('fast');
		// 	$(this).addClass('active');
		// }else{
		// 	$(this).next('.accordion-content').slideUp('fast');
		// 	$(this).removeClass('active');
		// 	$a_cnt = 0;
		// }
	});
//});

 var t_click = 0;
 $('.top-link .trigger').click(function(){
 	t_click++;
 	if(t_click == 1){

		$('.top-link .links').slideDown('fast');
		$(this).addClass('active');
	}else{
		$('.top-link .links').slideUp('fast');
		$(this).removeClass('active');
		t_click = 0;
	}
	//`alert("Top link clicked!");


});

  // function leavenow() {
  //        window.open("http://www.google.com/search?q=weather") document.location="http://www.google.com";
	 // }

$('.sidr-trigger').sidr({
      name: 'sidr-main',
      renaming: false,
      source: '.main-navigation, .gateway',
      side: 'left',
      displace:false
    });

$('.sidr-close').click(
    function(){
      $.sidr('close', 'sidr-main');
       //console.log("Sidr should be closed");
    });


 }); //end jquery



