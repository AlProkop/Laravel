<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use Illuminate\Support\Facades\DB; // for database connection
/**
 * Description of BoardController
 *
 * @author turunent
 */
class BoardController extends Controller
{
    public function adminForm(Request $request)
    {
        $matches = DB::table('matches')->pluck('teams');
        return view('adminForm')->with('matches', $matches);
    }
    
    public function delResults(Request $request)
    {
        $teams = $request->input('teams');
        //$request->session()->put('status', 'deleted');
    //    DB::delete("delete from match_info where id_match=(select id_match from matches where teams='$teams');"); // delete all information about specific match
        DB::delete("delete from match_info"); // delete all information about specific match
        return $teams;
    }
    public function addResult(Request $request)
    {
        $teams = $request->input('teams');
        $score1 = $request->input('score1');
        $score2 = $request->input('score2');
        $time = $request->input('time');
        $status = $request->input('status');
        
        DB::insert("insert into match_info (id_match, t1_score, t2_score, time, status)"
                . " values((select id_match from matches where teams='$teams'), '$score1', '$score2', '$time', '$status');");
        return "Add";
    }
    
    public function selectMatch(Request $request){
        $matches = DB::table('matches')->pluck('teams');
        return view('userForm')->with('matches', $matches);
    }
    public function fetch(Request $request)
    {
     $value = $request->get('value');
     $data = DB::select("select m.teams, m_i.t1_score, m_i.t2_score, m_i.time, m_i.status 
         from matches as m join match_info as m_i on m.id_match=m_i.id_match
         and m.teams='$value' order by m_i.id;");// desc limit 1;");  
     $output = json_encode($data);
     echo $output;
    }

    public function checkLogin(Request $request)
    {
        $login = $request->input('user');
        $passwd = $request->input('passwd');     
        $count = DB::select("select count(login) as count from admin where login='$login' and password='$passwd'");
                          
        if($count[0]->count!=0){
            $request->session()->put('loggedin', 'true');
            $matches = DB::table('matches')->pluck('teams');
            return view('adminForm')->with('matches', $matches);
        //    return view('adminForm');
        }
        else{
            $request->session()->put('loggedin', 'false');
            echo "<script type='text/javascript'>alert('Wrong');</script>";
            return view('loginForm');
           //return redirect('adminForm');
        }
    }
  
    public function logout(Request $request)
    {
        $request->session()->put('loggedin', 'false');
        return redirect('userForm');
    }
}