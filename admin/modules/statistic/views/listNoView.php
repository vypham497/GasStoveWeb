<?php get_header(); ?>

<div id="main-content-wp" class="list-post-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thống kê tổng doanh thu năm 2022</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <?php
                    $conn = mysqli_connect("localhost", "root", "");
                    mysqli_select_db($conn, "store");
                    $test = array();
                    $count = 0;
                    $res = mysqli_query($conn, "SELECT tbl_category.name, SUM(total_price) 
                    FROM tbl_category, tbl_product, tbl_order, tbl_detail_order
                    WHERE tbl_order.id = tbl_detail_order.id_order
                    AND tbl_detail_order.id_product = tbl_product.id
                    AND tbl_category.id = tbl_product.id_category
                    GROUP BY tbl_category.name;");
                    while ($row = mysqli_fetch_array($res)) {
                        $test[$count]["label"] = $row["name"];
                        $test[$count]["y"] = $row["SUM(total_price)"];
                        $count = $count + 1;
                    }
                    ?>
                    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "light1",
	axisY:{
		title: "Tổng tiền (Đơn vị VNĐ)"
	},
	data: [{
		type: "column",
		indexLabelFontColor: "#5A5757",
		indexLabelPlacement: "outside",   
        yValueFormatString: "#,##0.##",
		dataPoints: <?php echo json_encode($test, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>

<?php get_footer(); ?>