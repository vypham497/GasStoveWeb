<?php get_header(); ?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Sửa sản phẩm</h3>
                    <a href="?modules=products&controllers=index&action=list" title="" id="add-new" class="fl-left">Danh sách</a>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    
                    <?php if(!empty($data)) foreach ($data as $value) {?>
                    <form method="POST" action="?modules=products&controllers=index&action=update&id=<?php echo $value['id'] ;?>" enctype="multipart/form-data">
                        <div style="display: flex;">
                            <div style="width: 400px;">
                        
                                <label for="product-name">Tên sản phẩm</label>
                                <input type="text" name="name" id="product-name" value="<?php echo $value['name']; ?>" style="display: block;width: 300px;">
                                <label for="product-code">Mã sản phẩm</label>
                                <input type="text" name="code" id="product-code" value="<?php echo $value['code']; ?>" style="display: block;width: 300px;">
                                <label for="price">Giá sản phẩm</label>
                                <input type="text" name="price" id="price" value="<?php echo $value['price']; ?>" style="display: block;width: 300px;">
                                <label for="price">Giá khuyến mãi</label>
                                <input type="text" name="promotional_price" id="price" value="<?php echo $value['promotional_price']; ?>" style="display: block;width: 300px;">
                                <label for="price">Số lượng</label>
                                <input type="text" name="quantity" id="price" value="<?php echo $value['quantity']; ?>" style="display: block;width: 300px;">
                                <label for="price">Người tạo</label>
                                <input type="text" name="user" id="price" value="<?php echo $value['user']; ?>" style="display: block;width: 300px;">
                                <label for="price">Độ hot sản phẩm</label>
                                <input type="text" name="level" id="price" value="<?php echo $value['level']; ?>" style="display: block;width: 300px;">
    
                            </div>
                            <div style="width: 400px;">
                                <label for="price">Loại bếp</label>
                                <input type="text" name="type_of_gas_stove" id="price" value="<?php echo $value['type_of_gas_stove']; ?>" style="display: block;width: 300px;">
                                <label for="price">Đánh lửa</label>
                                <input type="text" name="igniters" id="price" value="<?php echo $value['igniters']; ?>" style="display: block;width: 300px;">
                                <label for="price">Gas tiêu thụ</label>
                                <input type="text" name="gas_consumption" id="price" value="<?php echo $value['gas_consumption']; ?>" style="display: block;width: 300px;">
                                <label for="price">Đầu đốt</label>
                                <input type="text" name="burners" id="price" value="<?php echo $value['burners']; ?>" style="display: block;width: 300px;">
                                <label for="price">Tiện ích</label>
                                <input type="text" name="utilities" id="price" value="<?php echo $value['utilities']; ?>" style="display: block;width: 300px;">
                                <label for="price">Sản xuất tại</label>
                                <input type="text" name="manufacturer_in" id="price" value="<?php echo $value['manufacturer_in']; ?>" style="display: block;width: 300px;">
                                <label for="price">Năm sản xuất</label>
                                <input type="text" name="year_of_manufacture" id="price" value="<?php echo $value['year_of_manufacture']; ?>" style="display: block;width: 300px;">
                          </div>
                          <div style="width: 400px;">
                            <label for="price">Trạng thái</label>
                                <input type="text" name="status" id="price" value="<?php echo $value['status']; ?>" style="display: block;width: 300px;">
                                <label for="price">Ngày đăng</label>
                                <input type="text" name="create_date" id="price" value="<?php echo $value['create_date']; ?>" style="display: block;width: 300px;">
                                <label>Hình ảnh</label>
                                <div id="uploadFile">
                                    <input type="file" name="image" id="upload-thumb">
                                    <img src="<?php echo $value['image']; ?>">
                                </div>
                            </div>
                            </div>        
                        </div>
                        <label for="desc">Mô tả</label>
                        <textarea name="description" class="ckeditor" id="desc"><?php echo $value['description']; ?></textarea>

                    <?php };?>

                        <input type="submit" name="btn_submit" id="btn-submit" value="Cập Nhật" style="height: 40px;
                                                                                                border-radius: 60px;
                                                                                                width: 150px;
                                                                                                color: green;
                                                                                                border-color: white;
                                                                                                color: white;
                                                                                                background-color: #48ad48;">
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
