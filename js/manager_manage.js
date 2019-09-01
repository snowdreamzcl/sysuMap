function change_manager_permission(obj, name) {
    var permission = obj.value;
    
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
            if (permission == 2)
                obj.value="1";
            else 
                obj.value="2";
        }
    }
    
    xmlhttp.open("GET","change_manager_permission.php?name="+name+"&permission="+permission,true);
    xmlhttp.send();
    
}

function delete_manager(obj, name) {
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
    xmlhttp.open("GET","delete_manager.php?name="+name,true);
    xmlhttp.send();
}