<div class="row mb">
    <div class="boxtrai mr">
        <div class="row mb frmdsloai">

        <center><h1 class="dn">GIỎ HÀNG</h1></center>
            <div class=" boxcontent cart">
                <table  id="cartTable">

                    <?php
                        viewcart(1);
                    ?>
              
                </table>
            </div>
        </div>
        <div class="row mb bill">
            <a href="index.php?act=bill"><input type="button" value=" TIẾP TỤC ĐẶT HÀNG"></a>
            <a href="index.php?act=delcart"><input type="button" value="XOÁ TẤT CẢ SẢN PHẨM TRÊN GIỎ HÀNG"></a>
            <a href="index.php?act=sanpham"><input type="button" value="TIẾP TỤC MUA SẮM"></a>
        </div>
    </div>
</div>