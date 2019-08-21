<?php
class Transfer extends CI_Model{

	function car_brand()
	{
		
		$arr[] = 'ALFA ROMEO';
		$arr[] = 'AMC';
		$arr[] = 'ASTON MARTIN';
		$arr[] = 'ATTHAM';
		$arr[] = 'AUDI';
		$arr[] = 'AUSTIN';
		$arr[] = 'BENTLEY';
		$arr[] = 'BMW';
		$arr[] = 'BUICK';
		$arr[] = 'CADILLAC';
		$arr[] = 'CHERY';
		$arr[] = 'CHEVROLET';
		$arr[] = 'CHRYSLER';
		$arr[] = 'CITROEN';
		$arr[] = 'DAEWOO';
		$arr[] = 'DAIHATSU';
		$arr[] = 'DATSUN';
		$arr[] = 'DEVA';
		$arr[] = 'DFM';
		$arr[] = 'DODGE';
		$arr[] = 'FERRARI';
		$arr[] = 'FIAT';
		$arr[] = 'FORD';
		$arr[] = 'FOTON';
		$arr[] = 'GMC';
		$arr[] = 'HINO';
		$arr[] = 'HOLDEN';
		$arr[] = 'HONDA';
		$arr[] = 'HUMMER';
		$arr[] = 'HYUNDAI';
		$arr[] = 'INFINITI';
		$arr[] = 'ISUZU';
		$arr[] = 'JAGUAR';
		$arr[] = 'JEEP';
		$arr[] = 'JINBEI';
		$arr[] = 'JOYLONG';
		$arr[] = 'KIA';
		$arr[] = 'LAMBORGHINI';
		$arr[] = 'LAND ROVER';
		$arr[] = 'LEXUS';
		$arr[] = 'LINCOLN';
		$arr[] = 'LOTUS';
		$arr[] = 'MASERATI';
		$arr[] = 'MAXUS';
		$arr[] = 'MAYBACH';
		$arr[] = 'MAZDA';
		$arr[] = 'MCLAREN';
		$arr[] = 'MERCEDES-BENZ';
		$arr[] = 'MERCURY';
		$arr[] = 'MG';
		$arr[] = 'MINI';
		$arr[] = 'MITSUBISHI';
		$arr[] = 'MITSUOKA';
		$arr[] = 'NAZA';
		$arr[] = 'NISSAN';
		$arr[] = 'OLDSMOBILE';
		$arr[] = 'OPEL';
		$arr[] = 'PERODUA';
		$arr[] = 'PEUGEOT';
		$arr[] = 'POLARSUN';
		$arr[] = 'PONTIAC';
		$arr[] = 'PORSCHE';
		$arr[] = 'PROTON';
		$arr[] = 'RELY';
		$arr[] = 'RENAULT';
		$arr[] = 'ROLLS-ROYCE';
		$arr[] = 'ROVER';
		$arr[] = 'RUF';
		$arr[] = 'SAAB';
		$arr[] = 'SEAT';
		$arr[] = 'SKODA';
		$arr[] = 'SMART';
		$arr[] = 'SOKON';
		$arr[] = 'SPYKER';
		$arr[] = 'SSANGYONG';
		$arr[] = 'SUBARU';
		$arr[] = 'SUNBEAM';
		$arr[] = 'SUZUKI';
		$arr[] = 'TATA';
		$arr[] = 'TESLA';
		$arr[] = 'TOYOTA';
		$arr[] = 'TR';
		$arr[] = 'VOLKSWAGEN';
		$arr[] = 'VOLVO';
		$arr[] = 'WULING';		
		return $arr;
	}
	
	

	function insert_car($arr)
	{	
		$this->db->insert('cms_car',$arr);
		return $this->db->insert_id();
	}

	function update_car($car_id, $arr)
	{
		$this->db->where('car_id', $car_id);
		$this->db->update('cms_car',$arr);
	}

	function get_brand()
	{
		$sql = "SELECT * FROM cms_car GROUP BY car_brand ";
		$query = $this->db->query($sql);
		return $query->result();
	}

	function get_car($brand)
	{
		$this->db->where('car_brand',$brand);
		$query = $this->db->get('cms_car');
		return $query->result();
	}
	
	function get_car_id($car_id)
	{
		$this->db->where('car_id', $car_id);
		$query = $this->db->get('cms_car');
		return $query->result();
	}
	
	function delete_car($car_id)
	{
		$this->db->where('car_id', $car_id);
		$this->db->delete('cms_car');
	}
	
	function save_rate($arr)
	{ 
		$destination_id = $arr['destination_id'];
		$area_id_1 = $arr['area_id_1'];
		$area_id_2 = $arr['area_id_2'];
		$car_id = $arr['car_id'];
		$price = $arr['price'];
		$currency = $arr['currency'];
		$entered = $arr['entered'];
		
		$sql = "SELECT * ";
		$sql .= "FROM cms_car_pricelist ";
		$sql .= "WHERE destination_id = '$destination_id' ";
		$sql .= "AND area_id_1 = '$area_id_1' ";
		$sql .= "AND area_id_2 = '$area_id_2' ";
		$sql .= "AND car_id = '$car_id' ";
		$query = $this->db->query($sql);
		$rs  = $query->result();
		
		if(count($rs) == false){
			$sql = "INSERT INTO cms_car_pricelist ";
			$sql .= "SET ";
			$sql .= "destination_id = '$destination_id', ";
			$sql .= "area_id_1 = '$area_id_1', ";
			$sql .= "area_id_2 = '$area_id_2', ";
			$sql .= "car_id = '$car_id', ";
			$sql .= "price = '$price', ";
			$sql .= "currency = '$currency', ";
			$sql .= "entered = '$entered' ";
			$this->db->query($sql);
		}else{
			$sql = "UPDATE cms_car_pricelist ";
			$sql .= "SET ";	
			$sql .= "destination_id = '$destination_id', ";
			$sql .= "area_id_1 = '$area_id_1', ";
			$sql .= "area_id_2 = '$area_id_2', ";
			$sql .= "car_id = '$car_id', ";
			$sql .= "price = '$price', ";
			$sql .= "currency = '$currency' ";
			$sql .= "WHERE price_id = '".$rs[0]->price_id."' ";	
			$this->db->query($sql);
		}

		$sql = "SELECT * ";
		$sql .= "FROM cms_car_pricelist ";
		$sql .= "WHERE destination_id = '$destination_id' ";
		$sql .= "AND area_id_1 = '$area_id_2' ";
		$sql .= "AND area_id_2 = '$area_id_1' ";
		$sql .= "AND car_id = '$car_id' ";
		$query = $this->db->query($sql);
		$rs  = $query->result();

		if(count($rs) == false){
			$sql = "INSERT INTO cms_car_pricelist ";
			$sql .= "SET ";
			$sql .= "destination_id = '$destination_id', ";
			$sql .= "area_id_1 = '$area_id_2', ";
			$sql .= "area_id_2 = '$area_id_1', ";
			$sql .= "car_id = '$car_id', ";
			$sql .= "price = '$price', ";
			$sql .= "currency = '$currency', ";
			$sql .= "entered = '$entered' ";
			$this->db->query($sql);
		}else{
			$sql = "UPDATE cms_car_pricelist ";
			$sql .= "SET ";	
			$sql .= "destination_id = '$destination_id', ";
			$sql .= "area_id_1 = '$area_id_2', ";
			$sql .= "area_id_2 = '$area_id_1', ";
			$sql .= "car_id = '$car_id', ";
			$sql .= "price = '$price', ";
			$sql .= "currency = '$currency' ";
			$sql .= "WHERE price_id = '".$rs[0]->price_id."' ";	
			$this->db->query($sql);
		}
		
	}
	
	function get_rate($destination_id)
	{
		$price = array();
		$query = $this->db->get('cms_car_pricelist');
		$rs = $query->result();
		
		foreach($rs as $index=>$value){
			$price[$value->car_id][$value->area_id_1][$value->area_id_2] = $value->price;
		}
		
		return $price;		
	}	

	function get_car_list()
	{
		$sql = "SELECT * ";
		$sql .= "FROM cms_car ";
		$sql .= "WHERE 1 ";
		$sql .= "ORDER BY cms_car.car_brand, cms_car.car_model, cms_car.car_year ";
		$query = $this->db->query($sql);
		return $query->result();
	}
	
	function get_service()
	{
		$query = $this->db->get('cms_car_service');
		return $query->result();
	}
	
	function insert_service($arr)
	{
		$this->db->insert('cms_car_service', $arr);
		return $this->db->insert_id();
	}
	
	function update_service($id, $arr)
	{
		$this->db->where('id',$id);
		$this->db->update('cms_car_service', $arr);
	}
	
	function get_destination()
	{
		$sql = "SELECT * ";
		$sql .= "FROM cms_destination, cms_destination_area, cms_car_pricelist ";
		$sql .= "WHERE cms_destination.destination_id = cms_destination_area.destination_id ";
		$sql .= "AND cms_car_pricelist.destination_id = cms_destination.destination_id ";
		$sql .= "GROUP BY cms_destination.destination_id ";
		$query = $this->db->query($sql);
		return $query->result();
	}

}