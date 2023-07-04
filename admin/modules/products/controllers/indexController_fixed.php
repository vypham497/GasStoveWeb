<?php

function construct() {
	load_model('index');
}

function indexAction() {


}

function addAction() {
	$categorys = getAllCategory();
	$brands = getAllBrand();
	$data = [ $categorys,$brands ];
	$id_category;
	$id_brand;
	$name;
	$code;
	$price;
	$promotional_price;
	$quantity;
	$status;
	$description;
	$type_of_gas_stove;
	$igniters;
	$gas_consumption;
	$burners;
	$utilities;
	$manufacturer_in;
	$year_of_manufacture;
	$user;
	$create_date;
	$image;
	$level;
	$err = array();
	if(!empty($_POST['btn_submit'])){

		if(!empty($_POST['id_category'])){
			$id_category = $_POST['id_category'];
		}else{
			$err['id_category'] = "id_category không được rỗng";		
		}

		if(!empty($_POST['level'])){
			$level = $_POST['level'];
		}else{
			$err['level'] ="level không được rỗng";		
		}

		if(!empty($_POST['id_brand'])){
			$id_brand = $_POST['id_brand'];
		}else{
			$err['id_brand'] ="id_brand không được rỗng";		
		}

		if(!empty($_POST['name'])){
			$name = $_POST['name'];
		}else{
			$err['name'] ="name không được rỗng";		
		}

		if(!empty($_POST['code'])){
			$code = $_POST['code'];
		}else{
			$err['code'] ="code không được rỗng";		
		}

		if(!empty($_POST['price'])){
			$price = $_POST['price'];
		}else{
			$err['price'] ="price không được rỗng";		
		}

		if(!empty($_POST['promotional_price'])){
			$promotional_price = $_POST['promotional_price'];
		}else{
			$price = "";
		}

		if(!empty($_POST['quantity'])){
			$quantity = $_POST['quantity'];
		}else{
			$err['quantity'] ="quantity không được rỗng";
		}

		if(!empty($_POST['status'])){
			$status = $_POST['status'];
		}else{
			$err['status'] ="status không được rỗng";
		}

		if(!empty($_POST['description'])){
			$description = $_POST['description'];
		}else{
			$err['description'] ="description không được rỗng";
		}

		if(!empty($_POST['type_of_gas_stove'])){
			$type_of_gas_stove = $_POST['type_of_gas_stove'];
		}else{
			$err['type_of_gas_stove'] ="type_of_gas_stove không được rỗng";
		}

		if(!empty($_POST['igniters'])){
			$igniters = $_POST['igniters'];
		}else{
			$err['igniters'] ="igniters không được rỗng";
		}

		if(!empty($_POST['gas_consumption'])){
			$gas_consumption = $_POST['gas_consumption'];
		}else{
			$err['gas_consumption'] ="gas_consumption không được rỗng";
		}

		if(!empty($_POST['burners'])){
			$burners = $_POST['burners'];
		}else{
			$err['burners'] ="burners không được rỗng";
		}

		if(!empty($_POST['utilities'])){
			$utilities = $_POST['utilities'];
		}else{
			$err['utilities'] ="utilities không được rỗng";
		}

		if(!empty($_POST['manufacturer_in'])){
			$manufacturer_in = $_POST['manufacturer_in'];
		}else{
			$err['manufacturer_in'] ="manufacturer_in không được rỗng";
		}

		if(!empty($_POST['year_of_manufacture'])){
			$year_of_manufacture = $_POST['year_of_manufacture'];
		}else{
			$err['year_of_manufacture'] ="year_of_manufacture không được rỗng";
		}

		if(!empty($_POST['user'])){
			$user = $_POST['user'];
		}else{
			$err['user'] ="user không được rỗng";
		}

		////// ảnh
		$target_dir = "public/uploads/";
		$target_file = $target_dir . basename($_FILES["image"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		if(isset($_POST["submit"])) {
		  $check = getimagesize($_FILES["image"]["tmp_name"]);
		  if($check !== false) {
		    $uploadOk = 1;
		  } else {
		    $uploadOk = 0;
		  }
		}

		if (file_exists($target_file)) {
		  $uploadOk = 0;
		}

		if ($_FILES["image"]["size"] > 200000000) {
		  $uploadOk = 0;
		}

		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		  $uploadOk = 0;
		}

		if ($uploadOk == 0) {
		} else {
		  if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
		    $image = $target_dir. basename( $_FILES["image"]["name"]);
		  } 
		}
		if(empty($image)){
			$err['image'] = "image không được rỗng";
		}
		if(empty($err)){
		$create_date = date("d/m/Y",time());
		$res = [
			'id_category ' =>$id_category ,
			'id_brand ' =>$id_brand ,
			'name' =>$name,
			'code' =>$code,
			'price' =>$price,
			'promotional_price' => $promotional_price,
			'quantity' => $quantity,
			'status' => $status,
			'description' => $description,
			'type_of_gas_stove' => $type_of_gas_stove,
			'igniters' => $igniters,
			'gas_consumption' => $gas_consumption,
			'burners' => $burners,
			'utilities' => $utilities,
			'manufacturer_in' => $manufacturer_in,
			'year_of_manufacture' => $year_of_manufacture,
			'user' => $user,
			'create_date' => $create_date,
			'image' => $image,
			'level' => $level

		];
			if(insert_product($res)){
				
	        	echo " <script type='text/javascript'> alert('Thêm mới thành công');</script>";
			}else{
				
	        	echo " <script type='text/javascript'> alert('Thêm mới danh mục sản phẩm thất bại');</script>";
			}

		}
		else{
			
	        echo " <script type='text/javascript'> alert('Thêm mới danh mục sản phẩm thất bại');</script>";
		}

	}

	load_view('add',$data);
}

function listAction() {

	$data_tmp = getAllProduct();

	for ($i=0; $i <count($data_tmp) ; $i++) {
		
		$data_tmp[$i]['category'] = get_category_by_id($data_tmp[$i]['id_category']);
		$data_tmp[$i]['brand']  = get_brand_by_id($data_tmp[$i]['id_brand']) ;
	};

	//phân trang//////////////////////////////////////////////////
	//$id_cat = $_GET['id_cat'];
	// $name = getNameCatById($id_cat);
	// $data_tmp = getAllByIDCat($id_cat);
	// $id =$id_cat;
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
	////////////////////////////////////////////////////////////////
	load_view('list',$data);
}


function deleteAction() {

	$id = $_GET['id'];
	delete_product_by_id($id);
	header('location:?modules=products&controllers=index&action=list');
}

function editAction() {
	$id = $_GET['id'];
	$data = get_product_by_id($id);
	load_view('show',$data);
}

function updateAction() {
	$id = $_GET['id'];
	$image;
	$data = get_product_by_id($id);
	$data1 = array();
	if(!empty($_POST['btn_submit'])){

		if(empty($_POST['name'])){
			$data1['name'] = $data[0]['name'];
		}else{
			$data1['name'] = $_POST['name'];
		}

		if(empty($_POST['code'])){
			$data1['code'] = $data[0]['code'];
		}else{
			$data1['code'] = $_POST['code'];
		}

		if(empty($_POST['price'])){
			$data1['price'] = $data[0]['price'];
		}else{
			$data1['price'] = $_POST['price'];
		}

		if(empty($_POST['promotional_price'])){
			$data1['promotional_price'] = $data[0]['promotional_price'];
		}else{
			$data1['promotional_price'] = $_POST['promotional_price'];
		}

		if(empty($_POST['quantity'])){
			$data1['quantity'] = $data[0]['quantity'];
		}else{
			$data1['quantity'] = $_POST['quantity'];
		}

		if(empty($_POST['user'])){
			$data1['user'] = $data[0]['user'];
		}else{
			$data1['user'] = $_POST['user'];
		}

		if(empty($_POST['level'])){
			$data1['level'] = $data[0]['level'];
		}else{
			$data1['level'] = $_POST['level'];
		}

		if(empty($_POST['type_of_gas_stove'])){
			$data1['type_of_gas_stove'] = $data[0]['type_of_gas_stove'];
		}else{
			$data1['type_of_gas_stove'] = $_POST['type_of_gas_stove'];
		}

		if(empty($_POST['igniters'])){
			$data1['igniters'] = $data[0]['igniters'];
		}else{
			$data1['igniters'] = $_POST['igniters'];
		}

		if(empty($_POST['gas_consumption'])){
			$data1['gas_consumption'] = $data[0]['gas_consumption'];
		}else{
			$data1['gas_consumption'] = $_POST['gas_consumption'];
		}

		if(empty($_POST['burners'])){
			$data1['burners'] = $data[0]['burners'];
		}else{
			$data1['burners'] = $_POST['burners'];
		}

		if(empty($_POST['utilities'])){
			$data1['utilities'] = $data[0]['utilities'];
		}else{
			$data1['utilities'] = $_POST['utilities'];
		}
		
		if(empty($_POST['manufacturer_in'])){
			$data1['manufacturer_in'] = $data[0]['manufacturer_in'];
		}else{
			$data1['manufacturer_in'] = $_POST['manufacturer_in'];
		}

		if(empty($_POST['year_of_manufacture'])){
			$data1['year_of_manufacture'] = $data[0]['year_of_manufacture'];
		}else{
			$data1['year_of_manufacture'] = $_POST['year_of_manufacture'];
		}

		if(empty($_POST['status'])){
			$data1['status'] = $data[0]['status'];
		}else{
			$data1['status'] = $_POST['status'];
		}

		if(empty($_POST['create_date'])){
			$data1['create_date'] = $data[0]['create_date'];
		}else{
			$data1['create_date'] = $_POST['create_date'];
		}

		if(empty($_POST['description'])){
			$data1['description'] = $data[0]['description'];
		}else{
			$data1['description'] = $_POST['description'];
		}
		//// anh
		$target_dir = "public/uploads/";
		$target_file = $target_dir . basename($_FILES["image"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		if(isset($_POST["submit"])) {
		  $check = getimagesize($_FILES["image"]["tmp_name"]);
		  if($check !== false) {
		    $uploadOk = 1;
		  } else {
		    $uploadOk = 0;
		  }
		}

		if (file_exists($target_file)) {
		  $uploadOk = 0;
		}

		if ($_FILES["image"]["size"] > 200000000) {
		  $uploadOk = 0;
		}

		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		  $uploadOk = 0;
		}

		if ($uploadOk == 0) {

		} else {
		  if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
		    $image = $target_dir. basename( $_FILES["image"]["name"]);
		  } else {
		  }
		}

		if(!empty($image)){
			$data1['image'] = $image;
		}else{
			$data1['image'] = $data[0]['image'];
		}



	}
	if(update_product_by_id($id,$data1)){
		$res = get_product_by_id($id);
		load_view('show',$res);
            echo " <script type='text/javascript'> alert('Cập Nhật Thành Công');</script>";
	}else{
			load_view('show',$data);
            echo " <script type='text/javascript'> alert('Cập Nhật Thất Bại');</script>";
	}
}
