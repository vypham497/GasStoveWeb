<?php

function construct() {

    load_model('index');
}

function indexAction() {

}



function listAction() {
	$data_tmp = getAllOrder();
	foreach ($data_tmp as $key => $value) {
		$data_tmp[$key]['fullname'] = getNameCus($data_tmp[$key]['custom_id']);
	}
// phan trang
	$page;
	if(!empty($_GET['page'])){
		$page = $_GET['page'];
	}else{
		$page =1;
	}
	
	$numProduct = count($data_tmp);
	$productOnPage = 5;
	$num = ceil($numProduct/$productOnPage);
	if(!empty($_GET['page']) && $_GET['page']>$num){
		$page =$num;
	}
	$start = ($page - 1) * $productOnPage;
	$res =[];
	for ($i=$start; $i < $start+$productOnPage; $i++) { 
		if(isset($data_tmp[$i]))
        $res[] = $data_tmp[$i];
	};
	$data = [$res, $num, $page];
	load_view('list',$data);


}

function listNoAction() {

	$data_tmp = getAllOrderNo();
	// echo "<pre>";
	// print_r($data);
	foreach ($data_tmp as $key => $value) {
		$data_tmp[$key]['fullname'] = getNameCus($data_tmp[$key]['custom_id']);
	}
	
// phan trang
	$page;
	if(!empty($_GET['page'])){
		$page = $_GET['page'];
	}else{
		$page =1;
	}
	
	$numProduct = count($data_tmp);
	$productOnPage = 5;
	$num = ceil($numProduct/$productOnPage);
	if(!empty($_GET['page']) && $_GET['page']>$num){
		$page =$num;
	}
	$start = ($page - 1) * $productOnPage;
	$res =[];
	for ($i=$start; $i < $start+$productOnPage; $i++) { 
		if(isset($data_tmp[$i]))
        $res[] = $data_tmp[$i];
	};
	$data = [$res, $num, $page];
	load_view('listNo',$data);

}

?>