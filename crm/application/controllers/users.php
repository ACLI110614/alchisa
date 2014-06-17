<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

function __construct() {
parent::__construct();
        
$this->load->library('encrypt');
$this->load->model('crud','',TRUE);
  $this->load->library('session');	
header('Access-Control-Allow-Origin: http://127.0.0.1:9000');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Content-Type');
       }	
	

  function index(){
      //if field is empty return all data 
	}
        
   function getusers(){
        $data = array(
            "tablename" =>"users",
            "fields" => array('id','username','user_type'),
            "where"=>array(),
            //"where"=>array('username'=>'alfie','user_type'=>'admin'),
            "limits"=>array('perpage'=>10,'start'=>0)
        );
          $accessToken = $this->uri->total_segments();
      $token = $this->uri->segment($accessToken);
        //if($this->logged_in($token)){
      if($this->allowed($token)){   
      //echo json_encode($this->crud->get($data));
        echo json_encode(array("result"=>"success"));  
        }else{
             echo json_encode(array("result"=>"plslogin")); 
            // echo json_encode(array("segmetcount"=>$accessToken,"token"=>$token,"sessionid"=>$this->session->userdata('session_id'),"backtoken"=>$this->session->userdata('accessToken')));
            //echo json_encode(array("token"=>$this->session->userdata('accessToken')));
            //echo json_encode($this->session->all_userdata());
        }
        
        }
   
   function logged_in($token){
     // $accessToken = $this->uri->total_segments()+1;
      //$token = $this->uri->segment($accessToken);
       
         if($token == $this->session->userdata('accessToken')){
//        if($this->encrypt->decode($this->input->post('accessToken')) == $this->session->userdata('username').$this->session->userdata('session_id')){
	//echo json_encode($this->crud->get($data));	
            return true;
        }else{
            return false;
     //  echo "plslogin";
     //  echo "user pass = ".$this->session->userdata('username').$this->session->userdata('session_id');
     //  echo "token = ".$this->encrypt->decode($this->input->post('accessToken'));//$this->encrypt->encode($data['where']['username'].$this->session->userdata('session_id'));
   }
   }
   
   function logout(){
       if($this->session->sess_destroy()){
           echo "loggedOUT";
       }
   }
   
   
   function addusers(){
    /*$data = array(
   'tablename' => 'users',
   'fields' => array(    
   'username' => $this->input->post('username'),
    // TO decode use  encrypt->decode(md5('password') 
   'password' => $this->encrypt->encode(md5($this->input->post('password'))),
   'user_type'=>$this->input->post('user_type')
        )*/
       
      
    $data = array(
   'tablename' => 'users',
   'fields' => array(    
   'username' => 'alfieschiong',
    // TO decode use  encrypt->decode(md5('password') 
   'password' => $this->encrypt->sha1('password'),
   'user_type'=>'admin'
        )
);      
    
         $accessToken = $this->uri->total_segments();
      $token = $this->uri->segment($accessToken);
        //if($this->logged_in($token)){
      if($this->allowed($token)){   
      //echo json_encode($this->crud->get($data));
        echo json_encode(array("result"=>"success"));  
        }else{
             echo json_encode(array("result"=>"plslogin")); 
      
        }
//   if($this->allowed($token)){ 
//       echo json_encode($this->crud->insert($data));	
//}else{
//    echo json_encode(array("result"=>"error"));
//}
   }
   
   function updateuser(){
        $data = array(
            'tablename'=>'users',
            'where' =>array('id'=>$this->input->post('userid')),
            'data'=>array("username"=>$this->input->post('username'))
        );
       echo json_encode($this->crud->update($data));
   }
   
   function deleteuser(){
        $data = array(
            'tablename'=>'users',
            'where'=>array('id'=>$this->input->post('userid')),
        );
       echo json_encode($this->crud->delete($data)); 
   }
      
   
function login(){
    $postdata = json_decode(file_get_contents("php://input"));
         $data = array(
            "tablename" =>"users",
            "fields" => array('id','username','password','user_type'),
           //'password'=>$this->encrypt->decode(md5('password'))
            "where"=>array('username'=>$postdata->username,'user_type'=>$postdata->user_type,'password'=>$this->encrypt->sha1($postdata->password)),
            //"where"=>array('username'=>'alfie','user_type'=>'admin'),
            "limits"=>array('perpage'=>10,'start'=>0)
        );
       
       if($this->crud->get($data)){
           $array=array(
               "username"=>$data['where']['username'],
               "session_id"=>$this->session->userdata('session_id'),
               "user_ip"=>$this->session->userdata('ip_address'),
               "accessToken"=>$this->session->userdata('session_id')
           );
         $this->session->set_userdata($array);
          // echo "yes" . json_encode($this->crud->get($data))." " . json_encode($this->encrypt->encode(($this->session->userdata('session_id'))));
          
           //echo json_encode($this->session->userdata('accessToken'));
           echo json_encode($array);
       }else{
           
           echo "none";//file_get_contents("php://input").username;//json_encode($this->crud->get($data));
          // echo json_encode($this->session->userdata('accessToken'));
            //  echo "<br><br>";
          // echo json_encode($this->encrypt->encode(($this->session->userdata('session_id'))));
       }
	//echo json_encode($this->crud->get($data));
    
    
}

function getme(){
   
         $data = array(
            "tablename" =>"users",
            "fields" => array('id','username','password','user_type'),
           //'password'=>$this->encrypt->decode(md5('password'))
            "where"=>array('username'=>$this->uri->segment(3),'user_type'=>$this->uri->segment(4),'password'=>$this->encrypt->sha1($this->uri->segment(5))),
            //"where"=>array('username'=>'alfie','user_type'=>'admin'),
            "limits"=>array('perpage'=>10,'start'=>0)
        );
       
       if($this->crud->get($data)){
           $array = array(
               "username"=>$data['where']['username'],
               "session_id"=>$this->session->userdata('session_id'),
               "user_ip"=>$this->session->userdata('ip_address'),
               "accessToken"=>$this->session->userdata('session_id')
           );
         $this->session->set_userdata($array);
         $this->addaccess($uid=2, $this->session->userdata('accessToken'));
          // echo "yes" . json_encode($this->crud->get($data))." " . json_encode($this->encrypt->encode(($this->session->userdata('session_id'))));
          
           //echo json_encode($this->session->userdata('accessToken'));
        
           echo json_encode(array("token"=>$this->session->userdata('accessToken')));
          //  
       }else{
           
           echo "none";//file_get_contents("php://input").username;//json_encode($this->crud->get($data));
          // echo json_encode($this->session->userdata('accessToken'));
            //  echo "<br><br>";
          // echo json_encode($this->encrypt->encode(($this->session->userdata('session_id'))));
       }
	//echo json_encode($this->crud->get($data));
    
    
}

function getmeout(){
    $accessToken = $this->uri->total_segments();
      $token = $this->uri->segment($accessToken);
      
      if($this ->destroyToken($token)){
          echo json_encode(array("result"=>"logged-out"));
      }
}

protected function addaccess($uid,$access){
           $data = array(
   'tablename' => 'useraccess',
   'fields' => array(    
   'userid' => $uid,
    // TO decode use  encrypt->decode(md5('password') 
   'accesskey' => $access
        )
);
       $this->crud->insert($data);
       //echo json_encode($this->crud->insert($data));	
}

protected function destroyToken($access){
     $data = array(
            "tablename" =>"useraccess",
            "fields" => array('id','userid','accesskey'),
           //'password'=>$this->encrypt->decode(md5('password'))
            "where"=>array('accesskey'=>$access)
            //"where"=>array('username'=>'alfie','user_type'=>'admin'),
            //"limits"=>array('perpage'=>10,'start'=>0)
        );
       
     $this->crud->delete($data);
}

protected function allowed($access){
      $data = array(
            "tablename" =>"useraccess",
            "fields" => array('id','userid','accesskey'),
           //'password'=>$this->encrypt->decode(md5('password'))
            "where"=>array('accesskey'=>$access)
            //"where"=>array('username'=>'alfie','user_type'=>'admin'),
            //"limits"=>array('perpage'=>10,'start'=>0)
        );
       
     if($this->crud->get($data)){
         return true;
     }else{
         return false;
     }
}
}
