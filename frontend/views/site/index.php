<?php use yii\helpers\Html;
use yii\helpers\Url;
 ?>
<!-- Slide -->
<div id="home_slider" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#home_slider" data-slide-to="0" class=""></li>
        <li data-target="#home_slider" data-slide-to="1" class=""></li>
        <li data-target="#home_slider" data-slide-to="2" class="active"></li>
    </ol>
    <div class="carousel-inner">
        <div class="item">
            <img src="images/slider.jpg">
        </div>
        <div class="item">
            <img src="images/slider.jpg">
        </div>
        <div class="item active">
            <img src="images/slider.jpg">
        </div>
    </div>
    <a class="left carousel-control" href="#home_slider" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
    <a class="right carousel-control" href="#home_slider" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
</div>
<!-- /Slide-->
<!-- Noi dung chinh-->
<div id="content">
    <!-- Tin y khoa -->
    <section class="gioithieu" id="gioithieu">
        <div class="container">
            <ul id="list_gioithieu" class="owl-carousel">
            <?php foreach ($List_TinYKhoa as $TinYKhoa ): ?>
                <li>
                    <div class="box_gioithieu">
                        <figure>
                            <img class="img-responsive" src="<?php echo $TinYKhoa->getLinkAnh(); ?>">
                        </figure>
                        <h3>
                            <a href="<?php echo $TinYKhoa->getLink(); ?>"><?php echo $TinYKhoa->Title; ?></a>
                        </h3>
                    </div>
                </li>
            <?php endforeach; ?>
            </ul>
        </div>
    </section>
    <!-- /Tin y khoa -->

    <!-- Đặt hàng -->
    <section class="dat_hang" id="dat_hang">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h3 class="text-center">Tác dụng của Curmin Lead</h3>
                    <img src="images/tacdung.png" alt="tac dung" class="img-responsive">
                </div>
                <div class="col-md-4">
                    <h3 class="text-center">Đặt hàng Online</h3>
                    <form action="index_submit" method="get" accept-charset="utf-8">
                        <div class="row">
                            <div class="col-md-12 col-sm-6">
                                <p>Giao hàng miễn phí cho đơn hàng từ 500.000đ trở lên</p>
                                <input type="text" name="hoten" placeholder="Họ tên">
                                <input type="email" name="email" placeholder="Email">
                                <input type="text" name="dienthoai" placeholder="Điện thoại">
                                <textarea name="diachi" placeholder="Địa chỉ"></textarea>
                            </div>
                            <div class="col-md-12 col-sm-6">
                                <div class="row dathang_sanpham">
                                    <div class="col-md-6">
                                        <img class="img-responsive" src="images/sanpham.png" />
                                        <p>173.000 VNĐ</p>
                                        <label>SL</label>
                                        <input type="number" name="sl1" placeholder="0">
                                        
                                    </div>
                                    <div class="col-md-6">
                                        <img class="img-responsive" src="images/sanpham.png" />
                                        <p>173.000 VNĐ</p>
                                        <label>SL</label>
                                        <input type="number" name="sl2" placeholder="0">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>                            
                        <div class="coupon">
                            <input type="text" name="coupon" placeholder="Mã giảm giá (nếu có)">
                            <button type="button">Apply</button>
                        </div>
                        <div class="clearfix"></div>
                        <p class="sum">Tổng tiền: <span>0</span></p>
                        <input type="submit" name="submit" value="Đặt hàng ngay">
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- /Đặt hàng -->

    <!-- Sản xuất-->
    <section class="sanxuat_ungdung" id="sanxuat_ungdung" data-parallax="scroll" data-image-src="images/bg_thanhphan.png" data-speed="0.3">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <img src="images/day-chuyen-hien-dai.png" alt="" class="img-responsive">
                    <p>Ứng dụng công nghệ Nano trong tinh chế Curcumin</p>
                </div>
                <div class="col-sm-6">
                    <p>Sản xuất trên dây chuyền hiện đại, đạt tiêu chuẩn quốc tế</p>
                    <img class="img-responsive" src="images/nghe.png"></img>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <a href="#" class="btn-primary-blue">Xem chi tiết</a>
                </div>
            </div>
        </div>
    </section>
    <!-- /Sản xuất-->

    <!-- Chuyên gia -->
    <section class="chuyengia" id="chuyengia">
        <div class="container">
            <h3 class="textcenter">SẢN PHẨM ĐƯỢC CÁC CHUYÊN GIA KHUYÊN DÙNG</h3>
            <div class="row">
                <?php
                    $count = 0;
                    foreach ($List_ChuyenGia as $chuyengia):
                        $count++;
                ?>
                    <div class="col-md-6">
                        <div class="box_chuyengia <?php echo $count==1?'left':'right'; ?>">
                            <img src="<?php echo $chuyengia->getLinkAnh(); ?>" class="img-responsive">
                            <?php echo $chuyengia->description; ?>
                            <div class="clearfix"></div>
                            <span class="name"><?php echo $chuyengia->title; ?></span>
                        </div>
                    </div>
                <?php
                    endforeach;
                ?>
            </div>
        </div>
    </section>
    <!-- Chuyên gia -->


    <section class="mangluoi" id="mangluoi" data-parallax="scroll" data-image-src="images/bg_mangluoi.jpg" data-speed="0.3">
        <div class="container">
            <h3>Mạng lưới phân phối rộng rãi toàn quốc</h3>
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <img src="images/giaithuong.png" alt="" class="img-responsive">
                </div>
                <div class="col-md-5 col-sm-6">
                    <img src="images/man.png" alt="" class="img-responsive">
                </div>
                <div class="col-md-2 col-sm-6">
                    <img src="images/bando.png" alt="" class="img-responsive">
                </div>
            </div>
        </div>
    </section>

    <section class="nhanxet_video" id="nhanxet_video">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h3>Nhận xét của người dùng</h3>
                    <ul id="list_nguoidung" class="owl-carousel">
                    <?php foreach ($List_NhanXet as $NhanXet ): ?>
                        <li>
                            <div class="box_nguoidung">
                                <figure>
                                    <img class="img-responsive" src="<?php echo $NhanXet->getLinkAnh(); ?>">
                                </figure>
                                <?php echo $NhanXet->description; ?>
                                <h4><?php echo $NhanXet->title; ?></h4>
                            </div>
                        </li>
                    <?php endforeach; ?>
                    </ul>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12 col-sm-6">
                            <div class="box_video">
                                <h3><a href="#">Video</a></h3>
                                
                                <a data-toggle="modal" href='#modal-id'>
                                    <div class="box-content-video">
                                    <img src="images/video.jpg" class="img-responsive" />
                                    <h4>TVC CURMIN LEAD</h4>
                                    </div>
                                </a>
                            </div>                            
                            <div class="modal fade" id="modal-id">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title">Video</h4>
                                        </div>
                                        <div class="modal-body">
                                            
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-md-12 col-sm-6">
                            <div class="box_fanpage">
                                <h3>FANPAGE</h3>
    <!--                                     <div class="fb-page" data-href="https://www.facebook.com/dieutribenhdaudaday/?fref=ts" data-tabs="timeline" data-width="500" data-height="200" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/dieutribenhdaudaday/?fref=ts" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/dieutribenhdaudaday/?fref=ts">Curmin Lead -  Dập tắt cơn đau dạ dày sau 2 tuần</a></blockquote></div> -->
                            </div>
                        </div>
                    </div>
                </div>
                    
                </div>
            </div>
        </div>
    </section>

    <section class="tintuc" id="tintuc">
        <div class="container">
            <h2><a href="#">Tin tức - sự kiện</a></h2>
            <div class="row">
                <div class="col-md-7 col-sm-5">
                    <ul class="list_tintuc first">
                    <?php foreach ($List_TinTuc_Big as $TinTuc_Big ): ?>
                        <li>
                            <img src="<?php echo $TinTuc_Big->getLinkAnh(); ?>" alt="" class="img-responsive">
                            <h3>
                                <a href="<?php echo $TinTuc_Big->getLink(); ?>"><?php echo $TinTuc_Big->title; ?></a>
                            </h3>
                        </li>
                    <?php endforeach ?>
                    </ul>
                </div>
                <div class="col-md-5 col-sm-7">
                    <ul class="list_tintuc">
                        <?php foreach ($List_TinTuc_Small as $TinTuc_Small ): ?>
                            <li>
                                <img src="<?php echo $TinTuc_Small->getLinkAnh(); ?>" alt="" class="img-responsive">
                                <h3>
                                    <a href="<?php echo $TinTuc_Small->getLink(); ?>"><?php echo $TinTuc_Small->title; ?></a>
                                </h3>
                                <p class="date">Ngày <?php echo $TinTuc_Small->getTime() ?></p>
                            </li>
                        <?php endforeach ?>
                    </ul>
                </div>
                
            </div>
        </div>
    </section>
    
    <section id="mocthoigian">
        <div class="container-fluid">
            <div class="row">
                <img src="images/moc_thoi_gian.png" alt="Mốc thời gian" class="img-responsive">
            </div>
        </div>
    </section>
</div>
<!-- /content -->