<?php

class Web_paypal extends CI_Controller{
	
	function ipn()
	{

		$id = $this->input->get('id');
		$property = $this->Property->get();		
		$payment_status = $this->input->post('payment_status'); 
		$property = $this->Property->get();
				
		//if($payment_status == "Completed"){

			$arr['payment_detail'] = json_encode($_POST);
			$arr['payment_status'] = $payment_status;
			
			$this->Payment->update($id, $arr);

			$invoice = $this->Payment->get_id($id);
			$customer = json_decode($invoice[0]->customer, true);
			$country = $this->Country->get_code($customer['country']);
			$items = json_decode($invoice[0]->item,true);
			$currency = $this->Currency->get_code($invoice[0]->currency);
			
			$subject = '['.$property[0]->property_name.'] - Payment  Completed #invoice'.$invoice[0]->id;
			$from = $property[0]->property_email;
			$to = $invoice[0]->customer_email;
			
			$message = '<h3>Thank you for your order #invoice'.$invoice[0]->id.'</h3>
      <p>Thank you for shopping with us. We have received your order and it is currently being processed</p>
      <p><strong>Customer information</strong></p>';

			$message.= '<p>';
			$message.= $customer['firstname'] . ' '.$customer['lastname'].'<br>';
			$message.= '<strong>Address</strong>: ' . $customer['address'] . ' '.$customer['city'] . ' ';
			$message.= $customer['state'] . ' '. $customer['zipcode']. ' '.$country[0]->name. '<br>';
			$message.= '<strong>Phone</strong>: '.$customer['phone']. ' ';
			$message.= '<strong>Fax</strong>: '.$customer['fax'] . ' ';
			$message.= '<strong>Email</strong>: <a href="mailto:'.$invoice[0]->customer_email.'">'.$invoice[0]->customer_email.'</a>';
			$message.= '<br>';
			$message.= '<strong>Pick up area:</strong> ';
					if($invoice[0]->pickup_area){
			$message.= $invoice[0]->pickup_area;
					}else{
			$message.= '-';
					}
			$message.= '</p>';
			$message.= '<p><strong>Order Information</strong></p>
      <table class="table">
        <thead>
          <tr>
            <th nowrap="nowrap">Items</th>
            <th width="68" nowrap="nowrap">Check-in</th>
            <th width="66" nowrap="nowrap">Adults</th>
            <th width="31" nowrap="nowrap">Child</th>
            <th width="31" nowrap="nowrap">Cost</th>
            <th width="26" nowrap="nowrap">Tax</th>
            <th nowrap="nowrap" class="text-right">Total</th>
          </tr>
        </thead>
        <tbody>';
					foreach($items as $index=>$value){
          $message.= '<tr>
            <td>'.$value['name'].'</td>
            <td nowrap="nowrap">'.date('F d Y',strtotime($value['checkin']));
						if(isset($value['time'])){
							$message .= ' ';
							$message .= substr($value['time'],0,5);
						}
            $message.= '</td>
            <td nowrap="nowrap">'.$value['adults'].'</td>
            <td nowrap="nowrap">'.$value['child'].'</td>
            <td nowrap="nowrap">'.$value['cost'].'</td>
            <td nowrap="nowrap">'.$value['tax'].'</td>
            <td align="right" nowrap="nowrap">'.$value['total'].'</td>
          </tr>';
          
					}
					
        $message.= '</tbody>
        <tr>
          <td colspan="6" align="right" nowrap="nowrap"><strong>Total:</strong></td>
          <td width="80" align="right" nowrap="nowrap"><strong>'.$invoice[0]->cost.'</strong></td>
        </tr>
        <tr>
          <td colspan="6" align="right" nowrap="nowrap"><strong>Tax:</strong></td>
          <td align="right" nowrap="nowrap"><strong>'.$invoice[0]->tax.'</strong></td>
        </tr>
        <tr>
          <td colspan="5" nowrap="nowrap" >* Currencies are in '.$currency[0]->name.'</td>
          <td align="right" nowrap="nowrap"><strong>Grand Total:</strong></td>
          <td align="right" nowrap="nowrap"><strong>'.$invoice[0]->total.'</strong></td>
        </tr>
      </table>';
			
			
			$this->Sendmail->send($to, $from, $subject, $message);
			$this->Sendmail->send($property[0]->property_email, $from, $subject, $message);
		//}		
	}	
}