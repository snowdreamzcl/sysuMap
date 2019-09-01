function change_user_permission(obj, name) {
    var permission;
    if (obj.value == "取消")
        permission = 0;
    else 
        permission = 1;
    
    if (window.XMLHttpRequest)
    {
        // IE7+, Firefox, Chrome, Opera, Safari 浏览器执行的代码
        xmlhttp=new XMLHttpRequest();
    }
    else
    {    
        //IE6, IE5 浏览器执行的代码
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            if (permission == 0)
                obj.value="禁言";
            else 
                obj.value="取消";
        }
    }
    
    xmlhttp.open("GET","change_user_permission.php?name="+name+"&permission="+permission,true);
    xmlhttp.send();
    
}

function delete_user(obj, name) {
    if (window.XMLHttpRequest)
    {
        // IE7+, Firefox, Chrome, Opera, Safari 浏览器执行的代码
        xmlhttp=new XMLHttpRequest();
    }
    else
    {    
        //IE6, IE5 浏览器执行的代码
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            var child = obj.parentNode.parentNode;
            child.parentNode.removeChild(child);
        }
    }
    xmlhttp.open("GET","delete_user.php?name="+name,true);
    xmlhttp.send();
}