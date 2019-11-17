'use strict';

/////////////////////////////////////////////////////////////////////////////////////////
// FONCTIONS                                                                           //
/////////////////////////////////////////////////////////////////////////////////////////
$(function(){
	$('#meals').on('change', function(){
		getMealById($('#meals').val());
	});
});


function getMealById(id) {
	$.get(ServerConfig.requestUrl + '/api/meals?id=' + id, detailsArticleCommande); 
		
	
}

function detailsArticleCommande(article){
	$('#target .mealName').html(article.Name);
	$('#target .mealDesc').html(article.Description);
	$('#target img').attr('src', ServerConfig.wwwUrl + '/images/meals/' + article.Photo);
}



/////////////////////////////////////////////////////////////////////////////////////////
// CODE PRINCIPAL                                                                      //
/////////////////////////////////////////////////////////////////////////////////////////

