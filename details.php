<?php
$filepath = realpath(dirname(__FILE__));
include_once $filepath . '/inc/header.php';
$filepath = realpath(dirname(__FILE__));
include_once $filepath . '/classes/sach.php';
$filepath = realpath(dirname(__FILE__));
include_once $filepath . '/classes/khuyenmai.php';
ob_start();
?>

<?php
if (isset($_GET['id_book'])) {
    $id_book = $_GET['id_book'];
    $book = new sach();
    $showBookById = $book->showBookByID($id_book);
    $result = $showBookById->fetch_assoc();
}
?>
<!-- Kết thúc header -->
<!-- Content -->
<div class="details-link">
    <span><a href="index.php">Trang chủ</a> / <a href="#">THÔNG TIN SẢN PHẨM</a></span>
</div>
<br>

<div class="deltails-content">
    <div class="deltails-content-left">
        <img id="del-img" src="image/SaleOFF/Slide-right/introductionPython.jpg" alt="">
    </div>
    <div class="deltails-content-right">
        <h4 id="del-title" class="del-name-product" style="text-transform: uppercase;">
            <?php echo $result['name_book'] ?>
        </h4>

        <div class="del-block">
            <div class="price-quantity">
                <div id="del-price" style="font-size: 30px; font-weight: 500; display: inline; color: #C73736;" class="_price">
                    <?php echo $result['price_book'] ?>đ
                </div>
                <?php if ($result['salecheck_book'] == '2') {
                    $booksale = new khuyenmai();
                    $showBookSale = $booksale->showBookSaleById_book($id_book);
                    $result1 = $showBookSale->fetch_assoc();
                ?>
                    <span id="del-origin-price" style="font-size: 20px; text-decoration: line-through; font-style: italic;" class="_origin-price"><?php echo $result1['price_book'] * (1 - $result1['discountpercent']) ?>đ</span>
                <?php } ?>
            </div>
            <div class="del-description">
                <p style="font-size: 20px;font-weight: 500;">Dịch vụ của chúng tôi</p>
                <i style="margin-right: 10px; float: left;font-size: 30px;" class="fa fa-truck" aria-hidden="true"></i>
                <span>Giao hàng tận nhà toàn quốc, thanh toán khi nhận hàng (COD).</span>
                <br>
                <br>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star-half-o" aria-hidden="true"></i>
                <span style="margin-left: 5px;">Sách hay, rẻ, chất lượng tốt.</span>
            </div>
        </div>
        <div style="margin-left: 30px;" class="del-btn">
            <a style="float: left; width: 125px; height: 37px;" href="cart.phpindex.php">
                <div class="button buy">MUA NGAY</div>
            </a>
            <a style="margin-left: 30px; float: left;width: 190px; height: 37px; cursor: pointer;">
                <div class="button addcart">THÊM VÀO GIỎ HÀNG</div>
            </a>

        </div>
    </div>
</div>

<?php
$filepath = realpath(dirname(__FILE__));
include_once $filepath . '/inc/footer.php';
ob_flush();
?>