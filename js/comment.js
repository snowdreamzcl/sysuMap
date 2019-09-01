var type = document.getElementsByTagName("html")[0].id;
var xmlhttp;
function loadXMLDoc(url,cfunc)
{
    if (window.XMLHttpRequest)
    {// IE7+, Firefox, Chrome, Opera, Safari 代码
        xmlhttp=new XMLHttpRequest();
    }
    else
    {// IE6, IE5 代码
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=cfunc;
    xmlhttp.open("GET",url,true);
    xmlhttp.send();
}
function showComment() {
    var url = "showComment.php?type="+type;
    loadXMLDoc(url,function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            document.getElementById("comment_list").innerHTML=xmlhttp.responseText;
        }
    });
}
function submitComment() {
    var content = document.getElementById("comment_content").value;
    var url = "submitComment.php?type="+type+"&content="+content;
    loadXMLDoc(url,function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            alert(xmlhttp.responseText);
        }
    });
}
window.onload = showComment();