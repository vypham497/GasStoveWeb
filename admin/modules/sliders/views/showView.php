<?php get_header(); ?>

<div id="main-content-wp" class="add-cat-page slider-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Sửa Slider</h3>
                    <a href="?modules=sliders&controllers=index&action=list" title="" id="add-new" class="fl-left">Danh sách</a>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <?php if(!empty($data)) foreach ($data as $value) {?>
                        <form method="POST" action="?modules=sliders&controllers=index&action=update&id=<?php echo $value['id'] ;?>" enctype="multipart/form-data">
                            <label for="title">Người tạo</label>
                            <input type="text" name="user" id="title" value="<?php echo $value['user'] ;?>" style="display: block;width: 300px;" >
                            <label>Kiểu</label>
                            <select name="type">
                                <option value="ngang">Ngang</option>
                                <option value="docj">Dọc</option>
                            </select>
                            <label>Hình ảnh</label>
                            <div id="uploadFile">
                                    <input type="file" name="image" id="upload-thumb">
                                    <img src="<?php echo $value['image']; ?>">
                            </div>
                    <?php }; ?>
                        <input type="submit" name="btn_submit" id="btn-submit" value="Cập nhật"  style="height: 40px;
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
