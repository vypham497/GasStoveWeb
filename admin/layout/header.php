<!DOCTYPE html>
<html>
    <head>
        <title>MANAGER GAS VIET</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="public/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/bootstrap/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="public/reset.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="public/style.css" rel="stylesheet" type="text/css"/>
        <link href="public/responsive.css" rel="stylesheet" type="text/css"/>
        <script src="public/js/jquery-2.2.4.min.js" type="text/javascript"></script>
        <script src="public/js/bootstrap/bootstrap.min.js" type="text/javascript"></script>
        <script src="public/js/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
        <script src="public/js/main.js" type="text/javascript"></script>
    </head>
    <body>
        <div id="site">
            <div id="container">
                <div id="header-wp">
                    <div class="wp-inner clearfix">
                        <a href="?modules=home" title="" id="logo" class="fl-left">GAS VIET</a>
                        <ul id="main-menu" class="fl-left">
                            <li>
                                <a href="?modules=home" title="">Trang chủ</a>
    
                            </li>
                            <li>
                                <a href="?modules=blogs&controllers=index&action=list" title="">Bài viết</a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="?modules=blogs&controllers=index&action=add" title="">Thêm mới</a> 
                                    </li>
                                    <li>
                                        <a href="?modules=blogs&controllers=index&action=list" title="">Danh sách bài viết</a> 
                                    </li>
                                    
                                </ul>
                            </li>
                            <li>
                                <a href="?modules=products&controllers=index&action=list" title="">Sản phẩm</a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="?modules=products&controllers=index&action=list" title="">Danh sách sản phẩm</a> 
                                    </li>
                                    <li>
                                        <a href="?modules=categorys&controllers=index&action=list" title="">Danh mục sản phẩm</a> 
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="?modules=orders&controllers=index&action=list" title="">Bán hàng</a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="?modules=orders&controllers=index&action=list" title="">Đơn hàng thành công</a> 
                                    </li>
                                    <li>
                                        <a href="?modules=orders&controllers=index&action=listNo" title="">Đơn hàng cần xử lý</a> 
                                    </li>
                                    <li>
                                        <a href="?modules=customers&controllers=index&action=list" title="">Danh sách khách hàng</a> 
                                    </li>
                                </ul>
                            </li>
            
                        </ul>
                        <div id="dropdown-user" class="dropdown dropdown-extended fl-right">
                            <button class="dropdown-toggle clearfix" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                       
                            <h3 id="account" class="fl-right"><?php echo $_SESSION['fullname'];?></h3>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="?modules=users&controller=index&action=info" title="Thông tin cá nhân">Thông tin tài khoản</a></li>
                                <li><a href="?modules=users&controller=index&action=logout" title="Thoát">Thoát</a></li>
                            </ul>
                        </div>
                    </div>
                </div>