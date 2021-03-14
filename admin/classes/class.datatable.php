<?php

class datatable{

	public function datatable_ajax($sql,$columns,$filter_columns,$obj){
		
		$requestData= $_REQUEST;		

		$query=$obj->data_select($sql);

		$totalData = count($query);

		if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter

			$sql.=" AND (";
			$i = 1;
			foreach ($filter_columns as $key => $value) {

				if($i == 1){
					$sql.=" ".$filter_columns[$key]." LIKE '".$requestData['search']['value']."%' ";   
				}else{
					$sql.=" OR ".$filter_columns[$key]." LIKE '".$requestData['search']['value']."%' ";
				}

				$i++;
				
			}

			$sql.="  )";

		}

		$query=$obj->data_select($sql);

		$totalFiltered = count($query);

		// when there is a search parameter then we have to modify total number filtered rows as per search result. 
		$sql.= " LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
		
		$query=$obj->data_select($sql);

		$data = array();
		foreach ($query as $key => $value) {
			 // preparing an array
			$nestedData=array();
			
			foreach ($columns as $key2 => $value2) {
				$nestedData[] = $query[$key][$columns[$key2]];
			}

			$data[] = $nestedData;
		}

		$json_data = array(
					"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
					"recordsTotal"    => intval( $totalData ),  // total number of records
					"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
					"data"            => $data   // total data array
					);

		return json_encode($json_data);  // send data as json format
		
	}

}

?>