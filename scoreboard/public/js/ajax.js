function addResult()
{
    var data={
        teams: $('#match').val(),
        score1: $('#score1').val(),
        score2: $('#score2').val(),
        time: $('#time').val(),
        status: $('#status').val()
    };    
    var json = JSON.stringify(data);    
    if (window.XMLHttpRequest)
    {
        xmlhttp = new XMLHttpRequest();
    }
    else
    { // for old IE's
        xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
    }
    xmlhttp.onreadystatechange = function ()
    {
        if (this.readyState == 4 && this.status == 200)
        {
           alert(xmlhttp.responseText);
        }
    }
    xmlhttp.open('POST', 'addResult', true);
    xmlhttp.setRequestHeader('Content-type','application/json; charset=utf-8');
    xmlhttp.send(json);
}

function delResults()
{
    var data={
        teams: $('#match').val()
    };    
    var json = JSON.stringify(data);
    if (window.XMLHttpRequest)
    {
        xmlhttp = new XMLHttpRequest();
    }
    else
    { // for old IE's
        xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
    }
    
    xmlhttp.onreadystatechange = function ()
    {
        if (this.readyState == 4 && this.status == 200)
        {
             alert(xmlhttp.responseText);
        }
    }
    
    xmlhttp.open('DELETE', 'delResults', true);
   xmlhttp.setRequestHeader('Content-type','application/json; charset=utf-8');
    xmlhttp.send(json);
}

