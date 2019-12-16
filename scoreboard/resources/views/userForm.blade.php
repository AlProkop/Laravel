<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="js/ajax.js"></script>
        <link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css"/>
    <title>UserMode</title>
    </head>
    <body>
    <h2> Football match </h2>
    <div>
        <form action="adminForm">
            <input type="submit" value="Admin mode">
        </form>
    </div>    
    <div id="select">
        <select name="match" id="match">
        <option value="">Select match</option>
        @foreach($matches as $match)
        <option value="{{$match}}">{{ $match }}</option>
        @endforeach
       </select> 
    </div>
   <h2 id="stat"></h2>
  
    <div>
        <p id="team1"></p>
        <p id="score1"></p>
    </div>
    <div>
        <p id="team2"></p>
        <p id="score2"></p>
    </div>
    <h2 id="t"></h2>
    </body>
</html>

<script>
$(document).ready(function(){

 $('#match').change(function(){
  if($(this).val() != '')
  {
        
   $.ajax({
    url:"../scoreboard/fetch",
    method:"POST",
    data:{value:$(this).val()},
    success:function(res)
    {
    var result = JSON.parse(res);
    var teams_arr = $('#match').val().split('-');
    $('#team1').html(teams_arr[0]);
    $('#team2').html(teams_arr[1]);
    if(result.length > 0){
        var last = result.length-1;       
        $('#score1').html(result[last].t1_score);
        $('#score2').html(result[last].t2_score);
        if(result[last].status == "ended")
            $('#stat').html('The match is ended');
        else
            $('#stat').html('The match is ongoing');
        $('#t').html("last goal was scored on " + result[last].time);
    }
    else {
        $('#score1').html(0);
        $('#score2').html(0);
        $('#stat').html("The match hasn't been started yet");
    }
    }
   })
  }
 });
});
</script>