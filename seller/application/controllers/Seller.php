<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seller extends CI_Controller {

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

    public function index()
	{
	    $data['title'] = ucfirst('home'); $data['page'] = 'home';
	    if ($this->session->achausertype == 'A' || $this->session->achausertype == 'S') {}
	    else { redirect('account/login','location'); exit; } 
	    $data['success'] = $this->circle();
	    $data['circles'] = $this->page->circle('get_all',NULL);
	    $this->load->view('seller/template/head',$data);
		$this->load->view('seller/template/header',$data);
		$this->load->view('seller/template/sidebar',$data);
		$this->load->view('seller/home',$data);
		$this->load->view('seller/template/footer',$data);
	}
	    
	public function page($page)
	{
	    $data['charges'] = $this->page->get('charges');
	    $data['title'] = ucfirst($page); $data['page'] = $page;
	    if ($this->session->achausertype == 'A' || $this->session->achausertype == 'S') {}
	    else { redirect('','location'); exit; } 
	    
	    $data['attribute'] = $this->page->get('attribute');
	    if ($page == 'home') {
	        $data['success'] = $this->circle();
	        $data['circles'] = $this->page->circle('get_all',NULL);
	    }
	    if ($page == 'logout') {
	        $this->session->sess_destroy();
	        redirect();
	        exit;
	    }
	    if ($page == 'circle') {
	        $data['success'] = $this->circle();
	        $data['circles'] = $this->page->circle('get_all',NULL);
	    }
	    
	    if ($page == 'charges') {
	        if ($this->input->get('q')) $this->page->delete('charges',array('id' => $this->input->get('q'), 'type' => 'Courier'));
	        $data['success'] = $this->update_charges();
	    }
	    if ($page == 'new_charges') {
	        $this->form_validation->set_rules('amount', 'Amount', 'required');
	        $this->form_validation->set_rules('charge', 'Charge', 'required');
            if ($this->form_validation->run() === TRUE) {
                $this->page->insert('charges',array('amount' => $this->input->post('amount'), 'type' => 'Courier', 'charge' => $this->input->post('charge')));
            }
            redirect('charges','location'); exit;
	    }
	    
	    if ($page == 'new_number') { 
	        $data['charges'] = $this->page->get_where_multi('charges',array('type!=' => 'Courier'));
	        $data['operators'] = $this->page->get_where_multi('attribute',array('name' => 'operator'));
	        $data['circles'] = $this->page->get_where_multi('attribute',array('name' => 'circle'));
	        $data['success'] = $this->new_number();
	    }
	    if ($page == 'new_postpaid') { 
	        $data['charges'] = $this->page->get_where_multi('charges',array('type!=' => 'Courier'));
	        $data['operators'] = $this->page->get_where_multi('attribute',array('name' => 'operator'));
	        $data['cities'] = $this->page->get_where_multi('cities',array('state_id' => 13));
	        $data['success'] = $this->new_postpaid();
	    }
	    if ($page == 'bulk_upload') {
	        $this->form_validation->set_rules('submit', 'Submit', 'required');
            if ($this->form_validation->run() === TRUE) {
	            $this->ExcelDataAdd();
            }
	    }
	    if ($page == 'postpaid_numb') $this->numb();
	    if ($page == 'postpaid_active_numbers') { 
	        $data['numbers'] = $this->postpaid_my_numbers(array('cStatus' => 'Y'));
	        if ($this->input->get('pid')) { //array(1 => , 2=> )
	            $data['success'] = $this->page->postpaid('update',array(1 => array('id' => $this->input->get('pid'), 'upBy' => $this->session->achauser), 2 => array('cStatus' => 'U'))); 
	        } 
	        $page = 'postpaid_numbers'; 
	    }
	    if ($page == 'postpaid_my_numbers') { $data['numbers'] = $this->postpaid_my_numbers(array()); $page = 'postpaid_numbers'; }
	    if ($page == 'postpaid_my_sold') { $data['numbers'] = $this->postpaid_my_numbers(array('cStatus' => 'U')); $page = 'postpaid_numbers'; }
	    
	    if ($page == 'numb') $this->numb();
	    if ($page == 'active_numbers') { 
	        $data['numbers'] = $this->my_numbers(array('cStatus' => 'Y')); 
	        if ($this->input->get('pid')) { //array(1 => , 2=> )
	            $data['success'] = $this->page->number('update',array(1 => array('id' => $this->input->get('pid'), 'upBy' => $this->session->achauser), 2 => array('cStatus' => 'U'))); 
	        } 
	        $page = 'my_numbers'; 
	    }
	    if ($page == 'my_numbers') { $data['numbers'] = $this->my_numbers(array()); $page = 'my_numbers'; }
	    if ($page == 'expired_numbers') { $data['numbers'] = $this->my_numbers(array('cStatus' => 'E')); $page = 'my_numbers'; }
	    if ($page == 'sold_numbers') { $data['numbers'] = $this->my_numbers(array('cStatus' => 'S')); $page = 'my_numbers'; }
	    if ($page == 'my_sold') { $data['numbers'] = $this->my_numbers(array('cStatus' => 'U')); $page = 'my_numbers'; }
	    
	    if ($page == 'new_orders') {
	        $data['orders'] = $this->page->order('get_multi',array('orderStatus' => 'Credit', 'innerStatus' => 'Processed','upBy' => $this->session->achauser),NULL);
	    }
	    if ($page == 'my_orders') {
	        $data['orders'] = $this->page->order('get_multi',array('orderStatus' => 'Credit', 'innerStatus' => 'Delivered','upBy' => $this->session->achauser),NULL); 
	        $page = 'new_orders';
	    }
	    if ($page == 'order_details') {
	        if (!$this->input->get('pid')) redirect('new_orders','location');
	        $data['order'] = $this->page->order('get_this',array('orderID' => $this->input->get('pid')),NULL);
	        $data['number'] = $this->page->number('get_this',array('id' => $data['order']->numberID));
	        if ($data['number']->upBy != $this->session->achauser) redirect('my_orders','location');
	        $data['seller'] = $this->page->user('get_where',array('userID' => $data['number']->upBy),NULL);
	        $data['buyer'] = $this->page->user('get_where',array('userID' => $data['order']->userID),NULL);
	        $data['buyerAddress'] = $this->page->address('get_this',array('addrID' => $data['order']->addrID));
	    }
	    
	    if ($page == 'enquiry') { $data['enquiry'] = $this->enquiry(); }
	    if ($page == 'ad_numbers') { $data['numbers'] = $this->ad_numbers(array());}
	    if ($page == 'ad_active') { $data['numbers'] = $this->ad_numbers(array('cStatus' => 'Y')); $page = 'ad_numbers';}
	    if ($page == 'ad_sold') { $data['numbers'] = $this->ad_numbers(array('cStatus' => 'S')); $page = 'ad_numbers';}
	    
	    if ($page == 'ad_users') { $data['users'] = $this->ad_users(array()); }
	    if ($page == 'ad_customers') { $data['users'] = $this->ad_users(array('userType' => 'C')); $page = 'ad_users';}
	    if ($page == 'ad_sellers') { $data['users'] = $this->ad_users(array('userType' => 'S')); $page = 'ad_users';}
	    if ($page == 'ad_nsellers') { if ($this->input->get('pid')) $this->page->user('update',array('userID' => $this->input->get('pid')),array('sellerStatus' => 'Y')); $data['users'] = $this->ad_users(array('userType' => 'S', 'sellerStatus' => 'N')); $page = 'ad_users';}
	    if ($page == 'user_details') {
	        if (!$this->input->get('pid')) redirect('ad_users','location');
	        $data['user'] = $this->page->get_where('users',array('userID' => $this->input->get('pid')),NULL);
	        $data['useradd'] = $this->page->get_where('userAddress',array('userID' => $this->input->get('pid')),NULL);
	        $data['bank'] = $this->page->get_where('banking_details',array('userID' => $this->input->get('pid')),NULL);
	    }
	    
	    if ($page == 'ad_norders') { $this->cancel_order(); $this->process_order('Hold', 'Processed'); $data['orders'] = $this->ad_orders(array('innerStatus' => 'Hold')); $page = 'ad_orders'; }
	    if ($page == 'ad_porders') { $this->cancel_order(); $this->process_order('Processed', 'Delivered'); $data['orders'] = $this->ad_orders(array('innerStatus' => 'Processed')); $page = 'ad_orders';}
	    if ($page == 'ad_dorders') { $data['orders'] = $this->ad_orders(array('innerStatus' => 'Delivered')); $page = 'ad_orders';}
	    if ($page == 'ad_corders') { $data['orders'] = $this->ad_orders(array('innerStatus' => 'Cancelled')); $page = 'ad_orders';}
	    
	    if ($page == 'team_member') {
	        if ($this->input->get('contact')) $data['contact'] = $this->page->get_where('users',array('userContact' => $this->input->get('contact')));
	        if ($this->input->post('contact')) {$this->page->update('users', array('userContact' => $this->input->post('contact')), array('parent' => $this->session->achauser)); }
	        if ($this->input->post('remove')) {$this->page->update('users', array('userContact' => $this->input->post('remove'), 'parent' => $this->session->achauser), array('parent' => 0)); }
	        $data['team'] = $this->page->get_where_multi('users',array('parent' => $this->session->achauser));
	    }
	    
		$this->load->view('seller/template/head',$data);
		$this->load->view('seller/template/header',$data);
		$this->load->view('seller/template/sidebar',$data);
		$this->load->view('seller/'.$page,$data);
		$this->load->view('seller/template/footer',$data);
	}
	function new_postpaid () {
	    $this->form_validation->set_rules('number','Number', 'required|min_length[10]|max_length[10]|numeric');
	    $this->form_validation->set_rules('operator','Operator', 'required');
	    $this->form_validation->set_rules('price','Price', 'required|min_length[2]|max_length[3]|numeric');
	    $this->form_validation->set_rules('circle','Circle Name', 'required');
	    if ($this->form_validation->run() === TRUE) {
	        return $this->page->postpaid('new_number',NULL);
	    }
	}
	
	function update_charges() {
	    $this->form_validation->set_rules('update', 'From submit', 'required');
        if ($this->form_validation->run() === TRUE) {
            foreach($this->input->post('row') as $key => $value) {
                $this->page->update('charges',array('id' => $value), array('charge' => $this->input->post('val')[$key]));
            }
            return TRUE;
        }
	}
	
	function numb() {
	    //$this->form_validation->set_rules('ci', 'Circle', 'required');
	    //$this->form_validation->set_rules('op', 'Operator', 'required');
        //if ($this->form_validation->run() === TRUE) {
            $nb = $this->input->post('nb');
            $op = $this->input->post('op');
            $ci = $this->input->post('ci');
	        $type = $this->input->post('status');
            $data1 = array('limit' => 500,'like' => array('number' => $nb, 'operator' => $op, 'circle' => $ci,'cStatus' => $type), 'get_where' => array('upBy' => $this->session->achauser));
            $numbers = $this->page->number('get_like',$data1); $i =1;
            foreach ($numbers as $row) {
                echo "<tr>
    									<td>$i</td>
    									<td>$row->number</td>
    									<td>$row->operator</td>
    									<td>$row->circle</td>
    									<td>$row->price</td>
    									<td>$row->seller_price</td>";
    		    if ($row->cStatus == 'S') { echo "<td>$row->soldDate</td>"; } 
    		    else { echo "<td>$row->ddTime</td>"; }
    			if ($row->cStatus == 'Y') { 
    			    echo '<td><a class="btn btn-success btn-xs" alt="Mark sold" title="Mark sold" href="'.base_url().'active_numbers?pid='.$row->id.'" onclick="return confirm("Are you sure to mark it as Sold?")">
    											<i class="fa fa-check"></i>
    										</a></td>';
    			}
    			echo '</tr>'; $i++;
            }
        //}
        exit;
	}
	
	function process_order ($data1, $data2) {
	    if ($this->input->get('pid')) {
            $order = $this->page->order('get_this',array('orderID' => $this->input->get('pid')), NULL);
            if ($order->innerStatus == $data1 && $order->orderStatus == 'Credit') {
                $this->page->order('update',array('orderID' => $this->input->get('pid')), array('innerStatus' => $data2));
            }
        }
	}
	function cancel_order () {
	    if ($this->input->get('cid')) {
            $order = $this->page->order('get_this',array('orderID' => $this->input->get('cid')), NULL);
            if ($order->innerStatus != 'Delivered' && $order->orderStatus == 'Credit') { 
                $this->page->order('update',array('orderID' => $this->input->get('cid')), array('innerStatus' => 'Cancelled'));
            }
        }
	}
	
	function ad_orders ($data) {
	    if ($this->input->get('q')) {
            $data1 = array('orderStatus' => 'Credit', 'orderID<' => $this->input->get('q'));
        } else {
            $data1 = array('orderStatus' => 'Credit');
        }
        $data1 = array_merge($data1,$data);
        return $this->page->order('get_multi',$data1,NULL);
	}
	
	function ad_users ($data) {
	    if ($this->input->get('q')) {
            $data1 = array('userID<' => $this->input->get('q'));
        } else {
            $data1 = array();
        }
        $data1 = array_merge($data1,$data);
        return $this->page->user('get_where_multi',20,$data1);
	}
	
	function ad_numbers ($data) {
	    if ($this->input->get('q')) {
            $data1 = array('limit' => 20, 'get_where' => array('openListing' => 'N', 'id<' => $this->input->get('q')));
        } else {
            $data1 = array('limit' => 20, 'get_where' => array('openListing' => 'N'));
        } $data1['get_where'] = array_merge($data1['get_where'],$data);
        $numbers = $this->page->number('get_where',$data1);
        return $numbers;
	}
	
	function enquiry () {
	    if ($this->input->get('q')) {
            $data1 = array('limit' => 20, 'get_where' => array('nID<' => $this->input->get('q')));
        } else {
            $data1 = array('limit' => 20, 'get_where' => array());
        }
        $enquiries = $this->page->enquiries('get_where',$data1);
        return $enquiries;
	}
	
	public function account($page)
	{
	    $data['title'] = ucfirst($page); $data['page'] = $page;
	    if ($this->session->achausertype == 'A' || $this->session->achausertype == 'S') {
	        redirect('home','location'); exit;
	    }
	    
	    if ($page == 'login') $data['success'] = $this->login();
	    if ($page == 'accver') $data['success'] = $this->accver();
	    
		$this->load->view('seller/'.$page,$data);
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
                        if ($this->session->achausertype == 'A') redirect('home');
                        if ($this->session->achapage) redirect($this->session->achapage,'location');
                        else redirect("home",'location');
                        exit;
                    } else {
                        return 'Account is not verified. <a href="https://www.ciesta.in/account/accver?m='.$this->input->post('mobile').'"> Click here </a> to verify.';
                    }
                } else return 'Invalid password';
            } else return 'Please check your details.';
        }
	}
	function accver() {
	    $this->form_validation->set_rules('otp', 'OTP', 'required|min_length[6]|max_length[6]|numeric');
        $this->form_validation->set_rules('mobile', 'Contact', 'required');
        if ($this->form_validation->run() === TRUE) {
            $data1 = array('userContact' => $this->input->post('mobile'), 'vrf_code' => $this->input->post('otp'));
            $data2 = array('vrf_code' => '', 'userStatus' => 'Y');
            return $this->page->user('update',$data1, $data2);
        }
	}
	function postpaid_my_numbers ($data) {
	    if ($this->input->get('q')) {
            $data1 = array('limit' => 10, 'get_where' => array('upBy' => $this->session->achauser, 'openListing' => 'N', 'id<' => $this->input->get('q')));
        } else {
            $data1 = array('limit' => 10, 'get_where' => array('upBy' => $this->session->achauser, 'openListing' => 'N'));
        }
        $data1['get_where'] = array_merge($data,$data1['get_where']);
        $numbers = $this->page->postpaid('get_where',$data1);
        return $numbers;
	}
	function my_numbers ($data) {
	    if ($this->input->get('q')) {
            $data1 = array('limit' => 10, 'get_where' => array('upBy' => $this->session->achauser, 'openListing' => 'N', 'id<' => $this->input->get('q')));
        } else {
            $data1 = array('limit' => 10, 'get_where' => array('upBy' => $this->session->achauser, 'openListing' => 'N'));
        }
        $data1['get_where'] = array_merge($data,$data1['get_where']);
        $numbers = $this->page->number('get_where',$data1);
        return $numbers;
	}
	
	function new_number () {
	    $this->form_validation->set_rules('number','Number', 'required|min_length[10]|max_length[10]|numeric');
	    $this->form_validation->set_rules('operator','Operator', 'required');
	    $this->form_validation->set_rules('price','Price', 'required|min_length[2]|max_length[3]|numeric');
	    $this->form_validation->set_rules('circle','Circle Name', 'required');
	    $this->form_validation->set_rules('type','Type', 'required');
	    $this->form_validation->set_rules('vip','VIP', 'required');
	    if ($this->form_validation->run() === TRUE) {
	        return $this->page->number('new_number',NULL);
	    }
	}
	public	function ExcelDataAdd()	{  
	    require_once APPPATH.'third_party/PHPExcel.php';
	    $this->excel = new PHPExcel();
	    //Path of files were you want to upload on localhost (C:/xampp/htdocs/ProjectName/uploads/excel/)	 
         $configUpload['upload_path'] = FCPATH.'public/uploads/';
         $configUpload['allowed_types'] = 'xls|xlsx|csv';
         $configUpload['max_size'] = '5000';
         $this->load->library('upload', $configUpload);
         $this->upload->do_upload('numbers');	
         $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
         $file_name = $upload_data['file_name']; //uploded file name
		 $extension=$upload_data['file_ext'];    // uploded file extension
		
        //$objReader =PHPExcel_IOFactory::createReader('Excel5');     //For excel 2003 
        $objReader= PHPExcel_IOFactory::createReader('Excel2007');	// For excel 2007 	  
          //Set to read only
          $objReader->setReadDataOnly(true); 		  
        //Load excel file
		 $objPHPExcel=$objReader->load(FCPATH.'public/uploads/'.$file_name);		 
         $totalrows=$objPHPExcel->setActiveSheetIndex(0)->getHighestRow();   //Count Numbe of rows avalable in excel      	 
         $objWorksheet=$objPHPExcel->setActiveSheetIndex(0);                
         //loop from first data untill last data
         if ($this->input->post('vip')) $vip = $this->input->post('vip');
         else $vip = 'N';
          $charges = $this->page->get_where_multi('charges',array('type!=' => 'Courier'));
        for($i=2;$i<=$totalrows;$i++)
         {
             $UNIX_DATE = ($objWorksheet->getCellByColumnAndRow(5,$i)->getValue() - 25569) * 86400;
             $price = intval($objWorksheet->getCellByColumnAndRow(4,$i)->getValue()+($objWorksheet->getCellByColumnAndRow(4,$i)->getValue()*($charges[0]->charge+$charges[1]->charge+$charges[2]->charge)/100));
			  $data = array(
                        'number' => $objWorksheet->getCellByColumnAndRow(0,$i)->getValue(),
                        'operator' => $objWorksheet->getCellByColumnAndRow(1,$i)->getValue(),
                        'circle' => $objWorksheet->getCellByColumnAndRow(2,$i)->getValue(),
                        'type' => $objWorksheet->getCellByColumnAndRow(3,$i)->getValue(),
                        'seller_price' => $objWorksheet->getCellByColumnAndRow(4,$i)->getValue(), 'upBy' => $this->session->achauser,
                        'price' => $price, 'openListing' => 'N', 'vip' => $vip,
                        'uplDate' => date("Y-m-d"),
                        'ddTime' => gmdate("Y-m-d H:i:s", $UNIX_DATE),
                        'cStatus' => 'Y'
                        );
			  $this->page->insert('numbers',$data); 
         }
        unlink(FCPATH.'public/uploads/'.$file_name); //File Deleted After uploading in database .			 
        redirect('new_number?uploaded=s','location');
	    exit;
    }

	function circle () {
	    $this->form_validation->set_rules('name','Circle Name', 'required');
	    if ($this->form_validation->run() === TRUE) {
	        $data = array('name' =>'circle', 'val' => $this->input->post('name'));
	        return $this->page->circle('insert',$data);
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
        $this->load->view('seller/template/head',$data);
		$this->load->view('seller/template/header',$data);
		$this->load->view('seller/template/sidebar',$data);
		$this->load->view('seller/'.$page,$data);
		$this->load->view('seller/template/footer',$data);
	}
}
