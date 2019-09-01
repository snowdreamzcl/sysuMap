function change_comment_lever(obj, comment_id) {
    var lever;
    if (obj.value == "取消")
        lever = 1;
    else 
        lever = 0;
    
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
            if (lever == 0)
                obj.value="取消";
            else 
                obj.value="精选";
        }
    }
    
    xmlhttp.open("GET","change_comment_lever.php?comment_id="+comment_id+"&lever="+lever,true);
    xmlhttp.send();
    
}

function delete_comment(obj, comment_id) {
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
    xmlhttp.open("GET","delete_comment.php?comment_id="+comment_id,true);
    xmlhttp.send();
}