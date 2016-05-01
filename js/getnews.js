var feeds = {
	usnews : "http://www.economist.com/sections/united-states/rss.xml",
	world : "http://feeds.bbci.co.uk/news/world/rss.xml?edition=uk",
	sports : "http://espn.go.com/espn/rss/",
	weather: "http://w1.weather.gov/xml/current_obs/KROC.rss",
	tech : "http://www.cnet.com/rss/news/"
};

$(document).ready(function(){
	loadAll();
	updateLoginDate();
});

$('.feed-filter').click(function(){
	
		var select = $(this).text();
		var feed = '';
		if(select == "Favorites"){
			$("#newsfeed").html("");
			getFavorites();
		}
		else{
			if( select == "US News (The Economist)" ){
				feed = feeds.usnews;
			}
			if( select == "World News (BBC)" ){
				feed = feeds.world;
			}
			if( select == "Sports (ESPN)" ){
				feed = feeds.sports;
			}
			if( select == "Weather(Rochester, NY)" ){
				feed = feeds.weather;
			}
			if( select == "Technology (CNET)" ){
				feed = feeds.tech;
			}
			if(select == 'All'){
				loadAll();
			}
			$("#newsfeed").html("");
			getRSS(feed);
		}
});


function loadAll(){
	for(url in feeds){
		feed = feeds[url];
		$("#newsfeed").html("");
		getRSS(feed);
	}
}

function getRSS(feed){
	$.ajax({
			type: "GET",
			url: document.location.protocol + '//ajax.googleapis.com/ajax/services/feed/load?v=1.0&num=10&callback=?&q=' + encodeURIComponent(feed),
			dataType: 'json',
			success: function(data){
				if (data.responseData.feed && data.responseData.feed.entries) {
					feedItems = [];
	      			$.each(data.responseData.feed.entries, function (i, e) {
	      			$('#newsfeed').append('<div class="feed-item"><a href="' + e.link + '"><h3> ' + e.title + '</h3></a><button class="btn btn-default btn-fav">Favorite</button><p> ' + e.contentSnippet + '</p></div>');
	      			
	        		//console.log("------------------------");
	        		//console.log("title      : " + e.title);
	        		//console.log("author     : " + e.author);
	        		//console.log("description: " + e.contentSnippet);
	      			});
	      			
	    		}
	    		$('.btn-fav').click(function(){
	   				var title = $(this).prev().text();
	   				var link = $(this).prev().attr("href");
	   				var desc = $(this).next().text();
	   
	   				var newFav = {
	       			"title" : title,
	       			"link" : link,
	       			"desc" : desc,
	       			"file" : 'favorites/'+username+'.json'
	       			};
	   				saveFav(newFav);
				});
			},
			error: function(xhr){
				alert("An error occured: " + xhr.status + " " + xhr.statusText);
			}
		});
}

function getFavorites(){
	$.ajax({
		type: "GET",
		url: "favorites/"+username+".json",
		dataType: "json",
		success: function(data){
			$.each(data, function(i, e) {
				$("#newsfeed").append('<div class="feed-item"><a href="' + e.link + '"><h3> ' + e.title + '</h3></a><p> ' + e.contentSnippet + '</p></div>');  
			})

		},
		error: function(xhr){
			alert("An error occured: " + xhr.status + " " + xhr.statusText);
		}
	});
}

