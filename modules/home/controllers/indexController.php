<?php


function construct() {

	load_model('index');	

}





function indexAction() {
	$BepGaAm = getAllBepGaAm();
	$BepGaDuong = getAllBepGaDuong();
	$BepGaMini = getAllBepGaMini();
	$hots = getAllHot();
	$sliders = getAllSlider();
	$_SESSION['product_hot'] = $hots;
	$data = [ $BepGaAm, $BepGaDuong, $BepGaMini, $hots, $sliders];
	load_view('index',$data);
}




function addAction() {

}




function editAction() {

}
