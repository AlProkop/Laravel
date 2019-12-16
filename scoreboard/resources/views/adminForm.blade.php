<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css"/>
        <title>AdminForm</title>
        
        <script src="js/ajax.js"></script>
    </head>
    <body>
       <h2> Football match - admin form </h2>
        <div>
            <form action="logout">
             <input type="submit" value="Logout">
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
       <br>  
       
    <div>
        <p id="team1"></p>
        <input class="score" id="score1" type="text" name="t1score">
    </div>
    <div>
        <p id="team2"></p>
        <input class="score" id="score2" type="text" name="t2score">
    </div>
    <br>
    
    <div id="sel_status">
    <lable>Time when the goal was scored:
        <input id="time" type="text" name="time">
    </lable>
    <lable>Status:
            <select id="status">
            <option value="ongoing">Ongoing</option>
            <option value="ended">Ended</option>
            </select>
    </lable>

    </div>
    <br>
    <button onclick="addResult()">Add new result</button>
       
    <button onclick="delResults()">Delete results</button>
        
    <p id="result"></p>
    </body>
</html>

<script>
$(document).ready(function(){

 $('#match').change(function(){
  if($(this).val() != '')
  {
   var value = $(this).val();
   $.ajax({
    url:"../scoreboard/fetch",
    method:"POST",
    data:{value:value},
    success:function(res)
    {
        var result = JSON.parse(res);
        var teams_arr = $('#match').val().split('-');
        $('#team1').html(teams_arr[0]);
        $('#team2').html(teams_arr[1]);
        if(result.length > 0){
            var last = result.length-1;          
            $('#score1').val(result[last].t1_score);
            $('#score2').val(result[last].t2_score);
            $('#status option:selected').text(result[last].status);
            $('#time').val(result[last].time);
        }
        else{
            $('#score1').val(0);
            $('#score2').val(0);
            $('#status option:selected').text('not started');
            $('#time').val('00:00');
        }
            
    }
   })
  }
 });
});
</script>