<?php 

class Web_cart extends CI_Controller{

	var $module = 'cart';

	function index()
	{

		$session_id = $this->Session->getcode();
		$sess = $this->Session->web_track($session_id);
		$property = $this->Property->get();
		$cart = $this->Cart->get($session_id);
		$languages = $this->Language->get_all();
		$sumcart = $this->Cart->get_sum($session_id);

		$this->lang->load('var_lang.php', substr($sess[0]->lang,0,2));

		if($this->input->post('save')){
			
			$cart = $this->Cart->get($sess[0]->session_id);
			
			$customer['firstname'] = $this->input->post('firstname');
			$customer['lastname'] = $this->input->post('lastname');
			$customer['address'] = $this->input->post('address');
			$customer['city'] = $this->input->post('city');
			$customer['state'] = $this->input->post('state');
			$customer['zipcode'] = $this->input->post('zipcode');
			$customer['country'] = $this->input->post('country');
			$customer['phone'] = $this->input->post('phone');
			$customer['fax'] = $this->input->post('fax');
			
			foreach($cart as $index=>$value){
				$items[$index]['id'] = $value->cart_id;
				$items[$index]['name'] = $value->item;
				$items[$index]['checkin'] = $value->checkin;
				if($value->checkin_time != '00:00:00'){
					$items[$index]['time'] = $value->checkin_time;
				}
				$items[$index]['adults'] = $value->adults;
				$items[$index]['child'] = $value->child;
				$items[$index]['cost'] = $value->cost;
				$items[$index]['tax'] = $value->tax;
				$items[$index]['total'] = $value->total;
				$items[$index]['currency'] = $value->currency;
			}
						
			$arr['member_id'] = $sess[0]->member_id;
			$arr['customer'] = json_encode($customer);
			$arr['customer_email'] = $this->input->post('email');
			$arr['item'] = json_encode($items);
			$arr['cost'] = $sumcart[0]->cart_total;
			$arr['tax'] = $sumcart[0]->cart_tax; 
			$arr['total'] = $sumcart[0]->cart_total;	
			$arr['currency'] = $sumcart[0]->currency;
			$arr['payment_type'] = $this->input->post('payment_type');
			$arr['pickup_area'] = $this->input->post('pickup_area');
			$arr['payment_entered'] = date('Y-m-d H:i:s');
			$arr['payment_status'] = 'Pending';
			$id = $this->Payment->insert($arr);
			
			switch($this->input->post('payment_type'))
			{
				case'PayPal';
					header('location:'.base_url().'/checkout/paypal?id=' . $id);
					exit;
				break;
				case'Skrill';
					header('location:'.base_url().'/checkout/skrill?id=' . $id);
					exit;
				break;
				default;
					
					if($this->input->post('payment_type') == 'Credit Card'){
						$card['card'] = $this->input->post('card');
						$card['card_number'] = $this->input->post('card_number');
						$card['card_bank_issue'] = $this->input->post('card_bank_issue');
						$card['card_holder'] = $this->input->post('card_holder');
						$card['card_cvc'] = $this->input->post('card_cvc');
						
						$arr_update = array('payment_detail'=>json_encode($card));
						$this->Payment->update($id, $arr_update);
					}else{
						$arr_update = array('payment_detail'=>'Bank Transfer');
						$this->Payment->update($id, $arr_update);
					}
					
					$subject = $property[0]->property_name.' - Order number #invoice '.$id;
					$from = 'administrator@'.str_replace(array('http://www.', 'http://'),'', $property[0]->property_website);
					$to = $this->input->post('email');
					
					$message = "<p>";
					$message .= "Thank you for shopping with us. We have received your order and it is currently being processed.";
					$message .= "</p>";
					$message .= '<p style="font-size: 12px;"><strong>Customer information</strong></p>';
					$message .= '<hr>';					
					$message .= '<p style="font-size: 12px;">';
					
					$country = $this->Country->get_code($customer['country']);
					$currency = $this->Currency->get_code($arr['currency']);
					
					$message .= $customer['firstname'] .' '.$customer['lastname'].'<br>';
					$message .= '<strong>Address</strong>: ';
					$message .= $customer['address'] .' '. $customer['city']. ' '.$customer['state'] ;
					$message .= $customer['zipcode']. ' '.$country[0]->name. ' ';
					$message .= '<br>';
					$message .= '<strong>Phone</strong>: '.$customer['phone'].' ';
					if($customer['fax']){
						$message .= '<strong>Fax</strong>: '.$customer['fax'].' ';
					}
					$message .= '<strong>Email</strong>: <a href="mailto:'.$arr['customer_email'].'">'.$arr['customer_email'].'</a>';
					$message .= '<br>';
					$message .= '<strong>Pickup Area:</strong> ';
					if($arr['pickup_area']){
						$message .= $arr['pickup_area'];
					}else{
						$message .= '-';
					}

					$message .= '</p>';
					
					$message .= '<p style="font-size: 12px;"><strong>Order Information</strong></p>';
					$message .= '<hr>';					
					$message .= '<table width="100%">';
					$message .= '<tr>';
					$message .= '<td style="font-weight:bold; font-size: 12px;">Items</td>';
					$message .= '<td style="font-weight:bold; font-size: 12px;">Check-In</td>';
					$message .= '<td style="font-weight:bold; font-size: 12px;" nowrap>Adults</td>';
					$message .= '<td style="font-weight:bold; font-size: 12px;" nowrap>Child</td>';
					$message .= '<td style="font-weight:bold; font-size: 12px;">Cost</td>';
					$message .= '<td style="font-weight:bold; font-size: 12px;">Tax</td>';
					$message .= '<td style="font-weight:bold; font-size: 12px;">Total</td>';
					$message .= '</tr>';
					foreach($items as $index=>$value){
						
						$message .= '<tr>';
						$message .= '<td style="font-size: 12px;">';
						$message .= $value['name']. ' ';
						$message .= 'Adults: '. $value['adults']. ' ';
						$message .= '</td>';
						$message .= '<td style="font-size: 12px;">'.$value['checkin'];
						
						if(isset($value['time'])){ 
							$message .= ' ';
							$message .= substr($value['time'],0,5); 
						}

						$message .= '</td>';
						$message .= '<td style="font-size: 12px;">'.$value['adults'].'</td>';
						$message .= '<td style="font-size: 12px;">'.$value['child'].'</td>';
						$message .= '<td style="font-size: 12px;">'.$value['cost'].'</td>';
						$message .= '<td style="font-size: 12px;">'.$value['tax'].'</td>';
						$message .= '<td style="font-size: 12px;">'.$value['total'].'</td>';
						$message .= '</tr>';
					}
					$message .= '</table>';
					$message .= '<hr>';					
					$message .= '<table width="100%">';
					$message .= '<tr>';
					$message .= '<td colspan="2" align="right" style="font-size: 12px;font-weight: bold;">Toal Cost</td>';
					$message .= '<td align="right" width="80" style="font-size: 12px;font-weight: bold;">'.$arr['cost'].'</td>';
					$message .= '</tr>';
					$message .= '<tr>';
					$message .= '<td colspan="2" align="right" style="font-size: 12px;font-weight: bold;">Toal Tax</td>';
					$message .= '<td align="right" style="font-size: 12px;font-weight: bold;">'.$arr['tax'].'</td>';
					$message .= '</tr>';
					$message .= '<tr>';
					$message .= '<td style="font-size: 12px;">* Currencies are in '.$currency[0]->name.'</td>';
					$message .= '<td align="right" style="font-size: 12px;font-weight: bold;">Grand Total</td>';
					$message .= '<td align="right" style="font-size: 12px;font-weight: bold;">'.number_format($arr['total'],2,'.','').'</td>';
					$message .= '</tr>';
					$message .= '</table>';
					$message .= '<hr>';

					if($arr['payment_type'] == 'Bank Transfer'){
						$banktransfer = $this->Payment->get_setting_type('Bank Transfer');
						$message .= '<p style="font-size: 12px;">You can make payments by making transactions directly to seller\'s bank account. Details are as follow:</p>';
						$message .= '<table width="100%">';
						$message .= '<tbody>';
						$message .= '<tr>';
						$message .= '<td style="font-size: 12px;"><strong>Bank</strong></td>';
						$message .= '<td style="font-size: 12px;"><strong>Branch</strong></td>';
						$message .= '<td style="font-size: 12px;"><strong>Account number</strong></td>';
						$message .= '<td style="font-size: 12px;"><strong>Account type</strong></td>';
						$message .= '<td style="font-size: 12px;"><strong>Account name</strong></td>';
						$message .= '</tr>';

						foreach($banktransfer as $index=>$value){ 
							$arr = json_decode($value->detail, true);
							$message .= '<tr>';
							$message .= '<td style="font-size: 12px;">'.$arr['bankname'].'</td>';
							$message .= '<td style="font-size: 12px;">'.$arr['branch'].'</td>';
							$message .= '<td style="font-size: 12px;">'.$arr['accountnumber'].'</td>';
							$message .= '<td style="font-size: 12px;">'.$arr['accounttype'].'</td>';
							$message .= '<td style="font-size: 12px;">'.$arr['accountname'].'</td>';
							$message .= '</tr>';
						}
						$message .= '</tbody>';
						$message .= '</table>';						
					}

					$rs = $this->Country->get_code($property[0]->property_country);
					
					$message .= '<p style="font-size: 12px;">';
					$message .= '<strong>'.$property[0]->property_name. '</strong><br>';
					$message .= '<strong>Address</strong>: '.$property[0]->property_address. ' ';
					$message .= $property[0]->property_city. ' ';
					$message .= $property[0]->property_state. ' ';
					$message .= $property[0]->property_zipcode. ' ';
					$message .= $rs[0]->name .'<br>';
					$message .= '<strong>Phone</strong>: '.$property[0]->property_phone. ' ';
					$message .= '<strong>Fax</strong>: '.$property[0]->property_fax. ' ';
					$message .= '<strong>Email</strong>: <a href="mailto:'.$property[0]->property_email.'">'.$property[0]->property_email. '</a> ';
					$message .= '</p>';
										
					$this->Sendmail->send($to, $from, $subject, $message);
					$this->Sendmail->send($property[0]->property_email, $from, $subject, $message);
					
				break;
			}
			
			$this->Cart->remove($session_id);
			
			header('location:'.base_url().'thankyou?id='.$id);			
			exit;
		}
		
		$language = $this->Language->get_code($sess[0]->lang);
		
		$data['sess'] = $sess;
		$data['seo'] = $this->Seo->get_lang($language[0]->code);
		$data['module'] = $this->module;
		$data['property'] = $property;
		$data['currency'] = $this->Currency->get_array();
		$data['currencies'] = $this->Currency->get_all();
		$data['languages'] = $languages;		
		$data['language'] = $language;
		$data['cart'] = $cart;
		$data['sumcart'] = $sumcart;
		$data['payment_setting'] = $this->Payment->get_setting_arr();
		$data['payment'] = $this->Payment->get_type();
		$data['countries'] = $this->Country->get();
		if(isset($sess[0]->member_id)){
			$data['member'] = $this->Member->get_id($sess[0]->member_id);
		}

		if(count($cart)){
			$this->load->view('website/page.cart.php', $data);
		}else{
			$this->load->view('website/page.cart.empty.php', $data);		
		}
	}
	
	function delete()
	{
		$session_id = $this->Session->getcode();
		$cart_id = $this->input->get('cart_id'); 
		$this->Cart->delete($session_id, $cart_id);
		
		header('location:'.base_url().'cart');
		exit;
		
	}

}