function updateLoginDate(){
    if(username != '' && localStorage){
        var ldate = localStorage.getItem(username + "lastvisit");
        if(ldate){
            $("#lastLogin").html("Last login: " + ldate);
        }
        var date = new Date();
        localStorage.setItem(username + "lastvisit", date.toDateString());
    }
    
    else{
        alert("Sorry, your browser does not support local storage.");
    }
}

function saveFav(items){
    
    var form = document.createElement('form');
    form.setAttribute("method", "post");
    form.setAttribute("action", "/favorite.php");
    for(var key in items){
        if(items.hasOwnProperty(key)){
            var hidden = document.createElement("input");
            hidden.setAttribute("type", "hidden");
            hidden.setAttribute("name", key);
            hidden.setAttribute("value", items[key]);
            
            form.appendChild(hidden);
        }
    }
            
    document.body.appendChild(form);
    form.submit();
}