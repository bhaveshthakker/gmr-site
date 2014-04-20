$(document).ready(function(){

	// event handler for window resize
	$(window).resize(function(e){
		updateUI();
	});
	updateUI();

});
// event handler for window resize
function updateUI(){

	if($(window).width() <= 480){

		// mobile view instructions
		tabsToAccordions();

	} else {

		// desktop view instructions
		accordionsToTabs();
	}

}

// changes tabs to accordions (jquery ui)
function tabsToAccordions(){
	$('.tabs').each(function(index, element){
		var idAttr = $(element).attr('id');
		var a = $('<div class="accordion">');
		a.attr('data-id', idAttr);
		var b = new Array();
		$(this).find('>ul>li').each(function(){
			b.push('<h3>'+$(this).html()+'</h3>');
		});
		var c = new Array();
		$(this).find('>div').each(function(){
			c.push('<div>'+$(this).html()+'</div>');
		});
		for(var i = 0; i < b.length; i++){
			a.append(b[i]).append(c[i]);
		}
		$(this).before(a);
		$(this).remove();
	})
	$('.accordion').accordion({
		active: false,
  		collapsible: true
  	});
}

// changes accordions to tabs (jquery ui)
function accordionsToTabs(){
	$('.accordion').each(function(index, element){
		var dataId = $(element).attr('data-id');
		var a = $('<div class="tabs">');
		$(a).attr('id', dataId);
		var count = 0;
		var b = $('<ul>');
		$(this).find('>h3').each(function(){
			count++;
			b.append('<li><a href="#tabs-'+count+'">'+$(this).text()+'</a></li>');
		});
		var count = 0;
		var c = $('');
		$(this).find('>div').each(function(){
			count++;
			c=c.add('<div id="tabs-'+count+'">'+$(this).html()+'</div>');
		});
		a.append(b).append(c);
		$(this).before(a);
		$(this).remove();
	});
	$('.tabs').tabs();
}