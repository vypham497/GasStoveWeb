        <div class="sidebar fl-left">
            <div class="section" id="category-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Danh mục sản phẩm</h3>
                </div>
                <div class="secion-detail">
                    <ul class="list-item">
                        <li>
                            <a href="?modules=products&controllers=index&action=show&id_cat=13" title="dien_thoai">Bếp ga âm</a>
                       <!--     <ul class="sub-menu">
                                <li>
                                    <a href="?page=category_product" title="">Iphone</a>
                                </li>
                                <li>
                                    <a href="?page=category_product" title="">Samsung</a>
                                </li>
                                <li>
                                    <a href="?page=category_product" title="">Oppo</a>
                                </li>
                
                            </ul> -->
                        </li>
                        <li>
                            <a href="?modules=products&controllers=index&action=show&id_cat=14" title="">Bếp ga dương</a>
                       <!--     <ul class="sub-menu">
                                <li>
                                    <a href="?page=category_product" title="">Iphone</a>
                                </li>
                                <li>
                                    <a href="?page=category_product" title="">Samsung</a>
                                </li>
                                <li>
                                    <a href="?page=category_product" title="">Oppo</a>
                                </li>
                        
                            </ul> -->
                        </li>
                        <li>
                            <a href="?modules=products&controllers=index&action=show&id_cat=12" title="">Bếp ga mini</a>
                         <!--   <ul class="sub-menu">
                                <li>
                                    <a href="?page=category_product" title="">Dell</a>
                                </li>
                                <li>
                                    <a href="?page=category_product" title="">MacBook</a>
                                </li>
                                <li>
                                    <a href="?page=category_product" title="">Hp</a>
                                </li> 
                            </ul> -->
                        </li>
                       
                    </ul>
                </div>
            </div>
            <div class="section" id="selling-wp">
                <div class="section-head">
                    <h3 class="section-title">Sản phẩm bán chạy</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item">

                        <?php if(!empty($_SESSION['product_hot'])){ $i=0; foreach ($_SESSION['product_hot'] as  $value) {?>
                            <?php $i++; if($i>9) break; ?>
                        <li class="clearfix">
                            <a href="?modules=products&controllers=index&action=detail&id=<?php echo $value['id']; ?>" title="" class="thumb fl-left">
                                <img src="<?php echo $value['image']; ?>" alt="">
                            </a>
                            <div class="info fl-right">
                                <a href="?modules=products&controllers=index&action=detail&id=<?php echo $value['id']; ?>" title="" class="product-name"><?php echo $value['name']; ?></a>
                                <div class="price">
                                    <!-- <span style="display: block;" class="new"><?php echo number_format($value['promotional_price']).' VNĐ'; ?></span> -->
                                    <span style="display: block;" class="new"><?php echo number_format($value['price']).' VNĐ'; ?></span>
                                </div>
                                <a href="<?php $id = $value['id']; if(!empty($_SESSION['id_customer'])) $urlll ="?modules=carts&controllers=index&action=addByNow&id=$id"; else $urlll ="?modules=users&controllers=index&action=index&report=1" ;echo $urlll;?> " title="" class="buy-now">Mua ngay</a>
                            </div>
                        </li>
                    <?php }}; ?>
                        
                    </ul>
                </div>
            </div>
            <div class="section" id="banner-wp">
                <div class="section-detail">
                    <a href="" title="" class="thumb">
                        <img src="public/images/salebanner.jpg" alt="">
                        <br>
                        <img src="public/images/salebanner2.jpg" alt="">
                    </a>
                     
                    <!-- <a href="" title="" class="thumb" style="margin-top: 10px;">
                        <img src="public/images/banner01.png" alt="">
                    </a> 

                    <a href="" title="" class="thumb" style="margin-top: 10px;">
                        <img src="public/images/bigsale1.jpg" alt="">
                    </a>  -->

                </div>
            </div>
        </div>