<?php
class Page extends CI_Model {

    public function __construct() {
		$this->load->database();
		date_default_timezone_get("Asia/Kolkata");
    }
    
    public function order ($action,$data1,$data2) {
        if ($action === 'new') {
            $data = array(
                        'userID' => $this->session->achauser,
                        'addrID' => $this->input->post('address'),
                        'numberID' => $this->session->numberid,
                        'number' => $this->session->number,
                        'pRequestID' => $data1,
                        'orderDate' => date("Y-m-d h:i:s"),
                        'amount' => $data2,
                        'orderStatus' => 'I',
                        'innerStatus' => 'Processed'
                );
            return $this->db->insert('orders',$data);
        }
        if ($action === 'get_this') {
            return $this->db->get_where('orders',$data1)->row_object();
        }
        if ($action === 'get_multi') {
            $this->db->select('*');
            $this->db->from('orders');
            $this->db->join('numbers','numbers.id=orders.numberID');
            $this->db->join('attribute','attribute.val=numbers.operator');
            $this->db->limit(20);
            $this->db->order_by('orderID','DESC');
            return $this->db->get_where('',$data1)->result_object();
        }
        if ($action === 'update') {
            $this->db->where($data1);
            return $this->db->update('orders',$data2);
        }
    }
    
    public function address ($action,$data) {
        if ($action === 'get_where') {
            $this->db->select('*');
            $this->db->from('userAddress');
            $this->db->join('states','states.id=userAddress.state');
            return $this->db->get_where('',$data)->result_object();
        }
        if ($action === 'get_this') {
            $this->db->select('*');
            $this->db->from('userAddress');
            $this->db->join('states','states.id=userAddress.state');
            return $this->db->get_where('',$data)->row_object();
        }
        if ($action === 'new') {
            $data1 = array(
                        'addr1' => $this->input->post('add1'),
                        'addr2' => $this->input->post('add2'),
                        'state' => $this->input->post('state'),
                        'city' => $this->input->post('city'),
                        'zip' => $this->input->post('pincode'),
                        'mobile' => $this->input->post('contact'),
                        'country' => 'India',
                        'userID' => $data
                );
            return $this->db->insert('userAddress',$data1);
        }
    }
    
    public function postpaid($action,$data) {
        if ($action === 'get_all') {
            $this->db->select("*");
            $this->db->from('postpaidNumbers');
            return $this->db->get_where('',$data['get_where'])->result_object();
        }
        if ($action === 'get_where') {
            $this->db->select("*");
            $this->db->from('postpaidNumbers');
            $this->db->join('attribute','attribute.val=postpaidNumbers.operator');
            $this->db->join('users','users.userID=postpaidNumbers.upBy');
            $this->db->order_by('id','DESC');
            $this->db->limit($data['limit']);
            return $this->db->get_where('',$data['get_where'])->result_object();
        }
        if ($action === 'get_like') {
            $this->db->select("*");
            $this->db->from('postpaidNumbers');
            $this->db->join('attribute','attribute.val=postpaidNumbers.operator');
            $this->db->order_by('id','DESC');
            $this->db->like($data['limit']);
            $this->db->like($data['like']);
            return $this->db->get_where('',$data['get_where'])->result_object();
        }
        if ($action === 'get_this') {
            return $this->db->get_where('postpaidNumbers',$data)->row_object();
        }
        if ($action === 'update') {
            $this->db->where($data[1]);
            return $this->db->update('postpaidNumbers',$data[2]);
        }
    }
    
    public function number($action,$data) {
        if ($action === 'get_all') {
            $this->db->select("*");
            $this->db->from('numbers');
            return $this->db->get_where('',$data['get_where'])->result_object();
        }
        if ($action === 'get_where') {
            $this->db->select("*");
            $this->db->from('numbers');
            $this->db->join('attribute','attribute.val=numbers.operator');
            $this->db->join('users','users.userID=numbers.upBy');
            $this->db->order_by('id','DESC');
            $this->db->limit($data['limit']);
            return $this->db->get_where('',$data['get_where'])->result_object();
        }
        if ($action === 'get_like') {
            $this->db->select("*");
            $this->db->from('numbers');
            $this->db->join('attribute','attribute.val=numbers.operator');
            $this->db->order_by('id','DESC');
            $this->db->like($data['limit']);
            $this->db->like($data['like']);
            return $this->db->get_where('',$data['get_where'])->result_object();
        }
        if ($action === 'get_this') {
            return $this->db->get_where('numbers',$data)->row_object();
        }
        if ($action === 'update') {
            $this->db->where($data[1]);
            return $this->db->update('numbers',$data[2]);
        }
    }

    public function circle($action,$data) {
        if ($action === 'get_all') {
            $this->db->order_by('val','AESC');
            return $this->db->get_where('attribute',array('name' => 'circle'))->result_object();
        }
        if ($action === 'insert') {
            return $this->db->insert('attribute',$data);
        }
    }

    public function enquiries($action,$data) {
        if ($action === 'insert') {
            $data = array (
                        'Name' => $this->input->post('name'),
                        'Email' => $this->input->post('email'),
                        'Contact' => $this->input->post('contact'),
                        'Choice' => $this->input->post('choice'),
                        'City' => $this->input->post('city'),
                        'State' => $this->input->post('state'),
                        'Pin' => $this->input->post('pincode'),
                        'UplDate' => date("Y-m-d h:i:s")
                        );
            return $this->db->insert('AN_ENQUIRIES',$data);
        }
        if ($action === 'get_where') {
            $this->db->select("*");
            $this->db->from('AN_ENQUIRIES');
            $this->db->order_by('nID','DESC');
            $this->db->limit($data['limit']);
            return $this->db->get_where('',$data['get_where'])->result_object();
        }
    }
    
    public function user ($action, $data1,$data2) {
        if ($action == 'new') {
            $p_salt = $this->rand_string(20);
            $otp=rand(100000,999999);
            $data = array (
                        'userName' => $this->input->post('name'),
                        'userContact' => $this->input->post('mobile'),
                        'userPass' => hash('sha256', $this->input->post('pass').'achcha'.$p_salt),
                        'userRgDate' => date ("Y-m-d h:i:s"),
                        'psalt' => $p_salt,
                        'userStatus' => 'N',
                        'userType' => 'C',
                        'vrf_code' => $otp
                    );
            $query = $this->db->insert('users',$data);
            if ($query) {
                $message = "Welcome to Acha Number. Your Mobile Verification OTP code is: " . $otp;
                 return $this->sendsms($this->input->post('mobile'),$message);
            }
            else return FALSE;
            
        }
        if ($action == 'update') {
            $this->db->where($data1);
            $query = $this->db->update('users',$data2);
            if ($this->db->affected_rows() == 1) return TRUE;
            else return FALSE;
        }
        
        if ($action == 'get_where') {
            $this->db->where($data1);
            $query = $this->db->get('users');
            return $query->row_object();
        }
        if ($action == 'get_where_multi') {
            $this->db->limit($data1);
            $query = $this->db->get_where('users',$data2);
            return $query->result_object();
        }
    }
	function rand_string($length) {
        $str="";
        $chars = "subinsblogabcdefghijklmanopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $size = strlen($chars);
        for($i = 0;$i < $length;$i++) {
            $str .= $chars[rand(0,$size-1)];
        }
        return $str;
    }
    
    public function insert($table,$data) {
        return $this->db->insert($table,$data);
    }
    public function update($table,$data1,$data2) {
        $this->db->where($data1);
        return $this->db->update($table,$data2);
    }
    public function get_where($table,$data) {
        return $this->db->get_where($table,$data)->row_object();
    }
    public function get_where_multi($table,$data) {
        return $this->db->get_where($table,$data)->result_object();
    }
    public function get($table) {
        return $this->db->get($table)->result_object();
    }
    public function delete($table,$data) {
        return $this->db->delete($table,$data);
    }
    
    public function new_vendor() {
        $p_salt = $this->rand_string(20);
        $otp=rand(100000,999999);
        $otp=rand(100000,999999);
        $data = array(
            'userName' => $this->input->post('name'),
            'userEmail' => $this->input->post('email'),
            'userContact' => $this->input->post('contact'),
            'userPass' => hash('sha256', $this->input->post('pass').'achcha'.$p_salt),
            'userRgDate' => date ("Y-m-d h:i:s"),
            'psalt' => $p_salt,
            'userStatus' => 'N',
            'userType' => 'S',
            'sellerStatus' => 'N',
            'userPlan' => 'A',
            'feature' => 'N',
            'vrf_code' => $otp
        );
        $query =$this->db->insert('users',$data);
        if ($query) {
            $message = "Welcome to Acha Number. Your Mobile Verification OTP code is: " . $otp;
            $this->sendsms($this->input->post('contact'),$message);
        }
        $id = $this->db->insert_id();
        $data1 = array(
            'userID' => $id,
            'addr1' => $this->input->post('addr1'),
            'addr2' => $this->input->post('addr2'),
            'city' => $this->input->post('city'),
            'state' => $this->input->post('state'),
            'country' => $this->input->post('country'),
            'zip' => $this->input->post('pincode'),
        );
        $data2 = array(
            'userID' => $id,
            'accountName' => $this->input->post('accName'),
            'accountNo' => $this->input->post('accNo'),
            'bank' => $this->input->post('bank'),
            'branch' => $this->input->post('branch'),
            'ifsc' => $this->input->post('ifsc')
        ); 
        $this->db->insert('userAddress',$data1);
        return $this->db->insert('banking_details',$data2);
    }
    function sendsms($mob,$message){
        //Your authentication key
        $authKey = "fbcfa0c504c0f48b640b29f7b29bb6f4";
        //Multiple mobiles numbers separated by comma
        $mobileNumber = $mob;
        //Sender ID,While using route4 sender id should be 6 characters long.
        $senderId = "ACHANM";
        //Define route 
        $route = "B";
        //Prepare you post parameters
        $postData = array(
            'authkey' => $authKey,
            'mobiles' => $mobileNumber,
            'message' => $message,
            'sender' => $senderId,
            'route' => $route
        );
        //API URL
        $url = "http://sms.itsagar.com/api/send_http.php";
        // init the resource
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $postData
            //,CURLOPT_FOLLOWLOCATION => true
        ));
        //Ignore SSL certificate verification
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        //get response
        $output = curl_exec($ch);
        //Print error if any
        if (curl_errno($ch)) {
            return false;
             //echo 'error:' . curl_error($ch);
        }
        curl_close($ch);
        return true;
        //echo $output;
    }
}