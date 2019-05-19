<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('page');
        date_default_timezone_get("Asia/Kolkata");
    }

	public function index($page = 'home')
	{
	    $ip = $this->get_client_ip();
	    $x = $this->page->get_where_multi('ips',array('ip' => $ip));
	    if (count($x) == 1) {
	        $this->page->update('ips',array('ip' => $ip), array('clicks' => $x[0]->clicks+1));
	    } else {
	        $this->page->insert('ips',array('ip' => $ip, 'clicks' => 1, 'status' => 'Y'));
	    } 
	    $data['title'] = 'Home'; $data['page'] = $page; $data['title'] = ucfirst($page);
	    $data1 = array('limit' => 50,'get_where' => array('cart!=' => 'Y', 'cStatus' => 'Y'));
        $data2 = array('limit' => 25,'get_where' => array('cart!=' => 'Y', 'cStatus' => 'Y', 'upBy' => 1));
        $data['numbers'] = $this->page->number('get_where',$data1);
        $data['admin_numbers'] = $this->page->number('get_where',$data2);
        $data['attribute'] = $this->page->get('attribute');
	    $this->page->number('update',array(1 => array('cart' => 'Y', 'cartTime<=' => date("Y-m-d H:i:s")), 2 => array('cart' => 'N', 'user' => 0,'cartTime' => '')));
		$this->load->view('public/template/head',$data);
		$this->load->view('public/template/header',$data);
		$this->load->view('public/home',$data);
		$this->load->view('public/template/footer',$data);
	}
	
	public function page($page = 'home') {
	    
	    $this->page->number('update',array(1 => array('cart' => 'Y', 'cartTime<=' => date("Y-m-d H:i:s")), 2 => array('cart' => 'N', 'user' => 0,'cartTime' => '')));
	    $data['title'] = 'New User'; $data['page'] = $page; $data['title'] = ucfirst($page);
	    $ip = $this->get_client_ip();
	    $x = $this->page->get_where_multi('ips',array('ip' => $ip));
	    if (count($x) == 1) {
	        $this->page->update('ips',array('ip' => $ip), array('clicks' => $x[0]->clicks+1));
	    } else {
	        $this->page->insert('ips',array('ip' => $ip, 'clicks' => 1, 'status' => 'Y'));
	    } 
	    if ($page == 'new_user' || $page == 'ver_otp' || $page == 'login' || $page == 'reset_password' || $page == 'reset_code') {
	        if ($this->session->achauser) {
	            redirect('','location'); exit;
	        }
	    }
	    if ($page == 'orders') {
	        if (!$this->session->achauser) {
	            $this->session->achapage = $page;
	            redirect('login','location'); exit;
	        }
	    }
	    if ($page == 'home') {
	        $data1 = array('limit' => 50,'get_where' => array('cart!=' => 'Y', 'cStatus' => 'Y'));
            $data2 = array('limit' => 25,'get_where' => array('cart!=' => 'Y', 'cStatus' => 'Y', 'upBy' => 1));
            $data['numbers'] = $this->page->number('get_where',$data1);
            $data['admin_numbers'] = $this->page->number('get_where',$data2);
	    }
	    
	    if ($page == 'search') {
	        $data['attribute'] = $this->page->get('attribute');
	        if ($this->input->get('number')) $number = $this->input->get('number'); else $number = '';
	        if ($this->input->get('operator')) $operator = $this->input->get('operator'); else $operator = '';
	        if ($this->input->get('circle')) $circle = $this->input->get('circle'); else $circle = '';
	        $data1 = array('limit' => 200, 'like' => array('number' => $number, 'operator' => $operator, 'circle' => $circle),'get_where' => array('cart!=' => 'Y', 'cStatus' => 'Y'));;
            $data['numbers'] = $this->page->number('get_like',$data1);
            $data['pageno'] = 5;
            $page = 'numbers';
	    }
	    
	    if ($page == 'contact') $data['success'] = $this->contact();
	    
	    if ($page == 'new_user') $data['success'] = $this->new_user();
	    if ($page == 'ver_otp') $data['success'] = $this->ver_otp();
	    if ($page == 'login') $data['success'] = $this->login();
	    if ($page == 'reset_password') { $data['success'] = $this->reset_password(); $data['page'] = 'reset_code'; } 
	    if ($page == 'reset_code')  { $data['success'] = $this->reset_pass(); $data['page'] = 'enter_code'; $page='reset_password'; }  
	    if ($page == 'logout') $data['success'] = $this->logout();
        
        if ($page == 'vendor-registration') {
            $data['states'] = $this->page->get('states');
            $data['success'] = $this->new_vendor();
        }
        
        if ($page == 'checkout') { if (!$this->input->get('q')) redirect('','location'); }
        if ($page == 'proceed_payment') $this->pay_now();
        if ($page == 'paid') {
            $status = $this->payment_details();
            if ($status == 'Completed') $page = 'paid';
            else $page = 'failed';
        }
        if ($page == 'orders') {
            $data['orders'] = $this->page->order('get_multi',array('userID' => $this->session->achauser), NULL);
        }
        if ($page == 'city') $this->cities();
        
        if ($page == 'enquiries') {
            if ($this->session->achauser) {
                $data['user'] = $this->page->get_where('users',array('userID' => $this->session->achauser));
                $data['address'] = $this->page->get_where('userAddress',array('userID' => $this->session->achauser));
            }
            $data['success'] = $this->enquiries(); 
        }
        
        if ( ! file_exists(APPPATH.'views/public/'.$page.'.php')) show_404();
        $this->load->view('public/template/head',$data);
		$this->load->view('public/template/header',$data);
		$this->load->view('public/'.$page,$data);
		$this->load->view('public/template/footer',$data);
	}
	
	public function numbers ($from) {
	    $data['attribute'] = $this->page->get('attribute');
	    $ip = $this->get_client_ip();
	    $x = $this->page->get_where_multi('ips',array('ip' => $ip));
	    if (count($x) == 1) {
	        $this->page->update('ips',array('ip' => $ip), array('clicks' => $x[0]->clicks+1));
	    } else {
	        $this->page->insert('ips',array('ip' => $ip, 'clicks' => 1, 'status' => 'Y'));
	    } 
	    $this->page->number('update',array(1 => array('cart' => 'Y', 'cartTime<=' => date("Y-m-d H:i:s")), 2 => array('cart' => 'N', 'user' => 0,'cartTime' => '')));
	    $data['from'] = $from = str_replace('page-','',$from);
	    $data['page'] = $data['title'] = 'Numbers | Page '.$from;
        if ($from != 1) {
            $start = count($this->page->number('get_all',NULL))-($from-1)*30;
            $data1 = array('limit' => '30','get_where' => array('cart!=' => 'Y', 'cStatus' => 'Y','numbers.id<' => $start));
            $data['numbers'] = $this->page->number('get_where',$data1);
            $data['pageno'] = $from;
        } else {
            if ($this->input->get('r')) {
                $data1 = array('limit' => 50,'get_where' => array('cart!=' => 'Y', 'cStatus' => 'Y', 'vip' => 'Y'));
                $data2 = array('limit' => 26,'get_where' => array('cart!=' => 'Y', 'cStatus' => 'Y', 'upBy' => 1, 'vip' => 'Y'));
            } else {
                $data1 = array('limit' => 20,'get_where' => array('cart!=' => 'Y', 'cStatus' => 'Y'));
                $data2 = array('limit' => 11,'get_where' => array('cart!=' => 'Y', 'cStatus' => 'Y', 'upBy' => 1));
            }
            $data['numbers'] = $this->page->number('get_where',$data1);
            $data['admin_numbers'] = $this->page->number('get_where',$data2);
            $data['pageno'] = 1;
        }
        if ( count($data['numbers']) == 0) redirect('numbers/page-1','location');
        $this->load->view('public/template/head',$data);
		$this->load->view('public/template/header',$data);
		$this->load->view('public/numbers',$data);
		$this->load->view('public/template/footer',$data);
	}
	public function postpaid ($from) {
	    $data['attribute'] = $this->page->get('attribute');
	    $ip = $this->get_client_ip();
	    $x = $this->page->get_where_multi('ips',array('ip' => $ip));
	    if (count($x) == 1) {
	        $this->page->update('ips',array('ip' => $ip), array('clicks' => $x[0]->clicks+1));
	    } else {
	        $this->page->insert('ips',array('ip' => $ip, 'clicks' => 1, 'status' => 'Y'));
	    } 
	    $this->page->postpaid('update',array(1 => array('cart' => 'Y', 'cartTime<=' => date("Y-m-d H:i:s")), 2 => array('cart' => 'N', 'user' => 0,'cartTime' => '')));
	    $data['from'] = $from = str_replace('page-','',$from);
	    $data['page'] = $data['title'] = 'Numbers | Page '.$from;
        if ($this->session->achateam == 0) {
            if ($from != 1) {
                $start = count($this->page->postpaid('get_all',NULL))-($from-1)*30;
                $data1 = array('limit' => '30','get_where' => array('cart!=' => 'Y', 'cStatus' => 'Y','postpaidNumbers.id<' => $start));
                $data['numbers'] = $this->page->postpaid('get_where',$data1);
                $data['pageno'] = $from;
            } else {
                $data1 = array('limit' => 30,'get_where' => array('cart!=' => 'Y', 'cStatus' => 'Y'));
                $data2 = array('limit' => 11,'get_where' => array('cart!=' => 'Y', 'cStatus' => 'Y', 'upBy' => 1));
                $data['numbers'] = $this->page->postpaid('get_where',$data1);
                $data['admin_numbers'] = $this->page->postpaid('get_where',$data2);
                $data['pageno'] = 1;
            }
        } else {
            if ($this->input->post('sr')) { $this->page->update('postpaidNumbers',array('id' => $this->input->post('sr'), 'upBy' => $this->session->achateam), array('cStatus' => 'U', 'user' => $this->session->achauser));}
            if ($from != 1) {
                $start = count($this->page->postpaid('get_all',NULL))-($from-1)*30;
                $data1 = array('limit' => '30','get_where' => array('cStatus' => 'Y','postpaidNumbers.id<' => $start,'upBy' => $this->session->achateam));
                $data['numbers'] = $this->page->postpaid('get_where',$data1);
                $data['pageno'] = $from;
            } else {
                $data1 = array('limit' => 30,'get_where' => array('cStatus' => 'Y','upBy' => $this->session->achateam));
                $data['numbers'] = $this->page->postpaid('get_where',$data1);
                $data['pageno'] = 1;
            }
        }
        $this->load->view('public/template/head',$data);
		$this->load->view('public/template/header',$data);
		$this->load->view('public/postpaid',$data);
		$this->load->view('public/template/footer',$data);
	}
	
	public function checkout($number) {
	    $ip = $this->get_client_ip();
	    $x = $this->page->get_where_multi('ips',array('ip' => $ip));
	    if (count($x) == 1) {
	        $this->page->update('ips',array('ip' => $ip), array('clicks' => $x[0]->clicks+1));
	    } else {
	        $this->page->insert('ips',array('ip' => $ip, 'clicks' => 1, 'status' => 'Y'));
	    } 
	    $this->page->number('update',array(1 => array('cart' => 'Y', 'cartTime<=' => date("Y-m-d H:i:s")), 2 => array('cart' => 'N', 'user' => 0,'cartTime' => '')));
	    $data['title'] = $data['page'] = 'Checkout | Achanumber';
	    if (!$this->session->achauser) { $this->session->achapage = "checkout/".$number; redirect('login','location'); exit; }
	    $data['number'] = $this->page->number('get_this',array('number' => $number, 'cStatus' => 'Y'));
	    if ($data['number']->cart == 'Y' && $data['number']->user !=$this->session->achauser) {
	        redirect('numbers','location'); exit;
	    }
	    if (!isset($data['number']->number)) redirect('numbers','location');
	    $this->page->number('update',array(1 => array('id' => $data['number']->id), 2 => array('clicks' => $data['number']->clicks+1)));
	    $data['success'] = $this->new_address();
	    $data['states'] = $this->page->get('states');
	    $data['addresses'] = $this->page->address('get_where',array('userID' => $this->session->achauser));
	    $this->session->number = $number;
	    $this->session->numberid = $data['number']->id;
	    
    	if ( ! file_exists(APPPATH.'views/public/checkout.php')) show_404();
        $this->load->view('public/template/head',$data);
		$this->load->view('public/template/header',$data);
		$this->load->view('public/checkout',$data);
		$this->load->view('public/template/footer',$data);
	}
	function payment_details() {
	    if ($this->input->get('payment_request_id') && $this->input->get('payment_id')) {
	        $this->load->library('instamojo');
	        $response = $this->instamojo->paymentRequestStatus($this->input->get('payment_request_id')); 
	        if ($response['payments'][0]['payment_id']) {
	            $number = str_replace('Order payment: ','',$response['purpose']); //, [2] => array() 
	            $this->page->order('update',array('pRequestID' => $this->input->get('payment_request_id'), 'orderStatus' => 'I'), array('pID' => $response['payments'][0]['payment_id'], 'orderStatus' => $response['payments'][0]['status']));
	            $this->page->number('update',array(1 => array('number' => $number, 'cStatus' => 'Y', 'cart' => 'Y', 'user' => $this->session->achauser), 2 => array('cStatus' => 'S', 'cart' => 'N', 'soldDate' => date("Y-m-d h:i:s"))));
	        }
	        return $response['status'];
	    } else 
	        redirect('numbers','location');
	}
	function pay_now() {
	    if (!$this->session->achauser) { redirect('login?req=checkout/'.$number,'location'); exit; }
	    if ($this->session->number && $this->session->numberid) {
	        $this->page->number('update',array(1 => array('id' => $this->session->numberid), 2 => array('cart' => 'Y', 'user' => $this->session->achauser,'cartTime' => date("Y-m-d H:i:s", strtotime("+20 minutes")))));
	        $this->form_validation->set_rules('address', 'Address', 'required');
	        $number = $this->page->number('get_this',array('id' => $this->session->numberid, 'cStatus' => 'Y'));
	        $user = $this->page->user('get_where',array('userID'=>$this->session->achauser), NULL);
	        if ($this->form_validation->run() === TRUE) {
	            $order = $this->page->order('get_this',array('userID' => $this->session->achauser, 'numberID' => $this->session->numberid,'orderStatus' => 'P'), NULL);
	            if (!$order) {
    	            $data = array (
    	                        'purpose' => 'Order payment: '.$this->session->number,
    	                        'amount' => $number->price,
    	                        'buyer_name' => $user->userName,
    	                        'phone' => $user->userContact,
    	                        'send_sms' => true,
    	                        'allow_repeated_payments' => false,
    	                        'redirect_url' => 'https://www.achanumber.com/paid',
    	                        'webhook' => 'https://www.achanumber.com/paid',
    	                        'email' => 'bills@achanumber.com',
    	                        'send_email' => true
    	                        );
    	            $this->load->library('instamojo');
                    $response = $this->instamojo->paymentRequestCreate($data);
                    $this->page->order('new',$response['id'],$number->price);
                    redirect($response['longurl'],'location');
                    exit;
	            } else {
	                $this->page->order('update',array('orderID' => $order->orderID),array('addrID' => $this->input->post('address'), 'orderDate' => date("Y-m-d h:i:s")));
	                redirect('https://www.instamojo.com/@payachanumber/'.$order->pRequestID,'location');
                    exit;
	            }
            }
	    }
	}
	function cities () {
	    if ($this->input->post('state')) {
            $cities = $this->page->get_where_multi('cities',array('state_id' => $this->input->post('state')));
            foreach ($cities as $row) {
                echo "<option value='$row->name'>$row->name</option>";
            }
        }
        exit;
	}
	function new_address() {
	    $this->form_validation->set_rules('add1', 'Address Line 1', 'required');
	    $this->form_validation->set_rules('state', 'State', 'required');
	    $this->form_validation->set_rules('city', 'City', 'required');
	    $this->form_validation->set_rules('pincode', 'Pincode', 'required|numeric|min_length[6]|max_length[6]');
	    $this->form_validation->set_rules('contact', 'Contact', 'required|min_length[10]|max_length[10]|numeric');
        if ($this->form_validation->run() === TRUE) {
            return $this->page->address('new',$this->session->achauser);
        }
	}
	
	function contact() {
	    $this->form_validation->set_rules('name', 'Name', 'required');
	    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
	    $this->form_validation->set_rules('message', 'Message', 'required');
        if ($this->form_validation->run() === TRUE) {
            $this->load->library('email');
            $this->email->from($this->input->post('email'), $this->input->post('name'));
            $this->email->to('info@example.com');
            $this->email->cc('info@example.com');
            $this->email->bcc('info@example.com');
            $this->email->subject('Contact | Acha number');
            $this->email->message($this->input->post('message'));
            return $this->email->send();
        }
	}
	
	function enquiries() {
	    $this->form_validation->set_rules('name', 'Name', 'required');
	    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
	    $this->form_validation->set_rules('contact', 'Contact', 'required|min_length[10]|max_length[10]|numeric');
        $this->form_validation->set_rules('choice', 'Choice', 'required');
        $this->form_validation->set_rules('city', 'City', 'required');
        $this->form_validation->set_rules('state', 'State', 'required');
        $this->form_validation->set_rules('pincode', 'Pincode', 'required');
        if ($this->form_validation->run() === TRUE) {
            return $this->page->enquiries('insert',NULL);
        }
	}
	
	function logout() {
	    $this->session->unset_userdata('achauser');
        $this->session->unset_userdata('achausername');
        $this->session->unset_userdata('achausercontact');
        $this->session->unset_userdata('achauseremail');
        $this->session->unset_userdata('achausertype');
        redirect('','location');
        exit;
	}
	function reset_pass() {
	    $this->form_validation->set_rules('code', 'OTP', 'required|min_length[6]|max_length[6]|numeric');
	    $this->form_validation->set_rules('pass', 'Password', 'required');
	    $this->form_validation->set_rules('cpass', 'Confirm Password', 'required|matches[pass]');
        if ($this->form_validation->run() === TRUE) {
            $data1 = array('reset_code' => $this->input->post('code'));
            $success = $this->page->get_where('reset',$data1, NULL); 
            if ($success !== TRUE && $success !== FALSE) {
                if (count($success) == 1) {
                    $p_salt = $this->page->rand_string(20);
                    $password = hash('sha256', $this->input->post('pass').'achcha'.$p_salt);
                    $data2 = array('userContact' => $success->contact);
                    $data3 = array('userPass' => $password, 'psalt' => $p_salt);
                    if($this->page->user('update',$data2,$data3)) {
                        return $this->page->delete('reset',$data1);
                    }
                } else return 'Please check your details.';
            } else return 'Please check your details.';
        }
	}
	function reset_password() {
	    $this->form_validation->set_rules('mobile', 'Contact', 'required|min_length[10]|max_length[10]|numeric');
        if ($this->form_validation->run() === TRUE) {
            $data1 = array('userContact' => $this->input->post('mobile'));
            $success = $this->page->user('get_where',$data1, NULL); 
            if ($success !== TRUE && $success !== FALSE) {
                if (count($success) == 1) {
                    $code = rand(100000,999999);
                    $message = "Your Mobile Verification OTP code is: " . $code;
                    if ($this->page->sendsms($success->userContact,$message)) {
                        $this->page->insert('reset',array('contact' => $success->userContact, 'reset_code' => $code, 'date' => date("Y-m-d h:i:s")));
                        redirect('reset_code','location');
                        exit;
                    }
                } else return 'Please check your details.';
            } else return 'Please check your details.';
        }
	}
	function login() {
	    $this->form_validation->set_rules('mobile', 'Contact', 'required|min_length[10]|max_length[10]|numeric');
        $this->form_validation->set_rules('pass', 'Password', 'required');
        if ($this->form_validation->run() === TRUE) {
            $data1 = array('userContact' => $this->input->post('mobile'));
            $success = $this->page->user('get_where',$data1, NULL);
            if ($success !== TRUE && $success !== FALSE && isset($success->userID)) {
                if (hash('sha256', $this->input->post('pass').'achcha'.$success->psalt) == $success->userPass) {
                    if ($success->userStatus == 'Y') {
                        $this->session->achauser = $success->userID;
                        $this->session->achausername = $success->userName;
                        $this->session->achausercontact = $success->userContact;
                        $this->session->achauseremail = $success->userEmail;
                        $this->session->achausertype = $success->userType;
                        $this->session->achateam = $success->parent;
                        if ($this->session->achausertype == 'A' || $this->session->achausertype == 'S') redirect('https://seller.achanumber.com/');
                        if ($this->session->achapage) {
                            $page = $this->session->achapage; $this->session->unset_userdata('achapage');
                            redirect($page,'location');
                        }
                        else redirect("",'location');
                        exit;
                    } else {
                        return 'Account is not verified. <a href="https://www.achanumber.com/ver_otp"> Click here </a> to verify.';
                    }
                } else return 'Invalid password';
            } else return 'Please check your details.';
        }
	}
	function ver_otp() {
	    $this->form_validation->set_rules('otp', 'OTP', 'required|min_length[6]|max_length[6]|numeric');
        $this->form_validation->set_rules('mobile', 'Contact', 'required');
        if ($this->form_validation->run() === TRUE) {
            $data1 = array('userContact' => $this->input->post('mobile'), 'vrf_code' => $this->input->post('otp'));
            $data2 = array('vrf_code' => '', 'userStatus' => 'Y');
            return $this->page->user('update',$data1, $data2);
        }
	}
	function new_user () {
	    $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('mobile', 'Contact', 'required|min_length[10]|max_length[10]|is_unique[users.userContact]|numeric');
        $this->form_validation->set_rules('pass', 'Password', 'required');
        $this->form_validation->set_rules('cpass', 'Confirm Password', 'required|matches[pass]');
        if ($this->form_validation->run() === TRUE) {
            if($this->page->user('new',NULL,NULL)) {
                redirect('ver_otp?m='.$this->input->post('mobile'),'location'); exit;
            }
        }
	}
	
	function new_vendor () {
	    $this->form_validation->set_rules('name', 'Name', 'required');
	    $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email|is_unique[users.userEmail]');
        $this->form_validation->set_rules('contact', 'Contact', 'required|min_length[10]|max_length[10]|is_unique[users.userContact]|numeric');
        $this->form_validation->set_rules('addr1', 'Address 1', 'required');
        $this->form_validation->set_rules('state', 'State', 'required');
        $this->form_validation->set_rules('city', 'City', 'required');
        $this->form_validation->set_rules('pincode', 'Pincode', 'required');
        $this->form_validation->set_rules('accName', 'Account Holder Name', 'required');
        $this->form_validation->set_rules('accNo', 'Account No.', 'required');
        $this->form_validation->set_rules('bank', 'Bank', 'required');
        $this->form_validation->set_rules('branch', 'Branch', 'required');
        $this->form_validation->set_rules('ifsc', 'IFS Code', 'required');
        if ($this->form_validation->run() === TRUE) {
            return $this->page->new_vendor();
        }
	}
	
	function get_client_ip() {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
           $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }
}
