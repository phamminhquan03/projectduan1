<div class="row">
            <div class="row formtitle">
                <h1>THÊM MỚI SÁCH</h1>
            </div>
            <div class="row formcontent">
                <form action="index.php?act=addsach" method="post" enctype="multipart/form-data">
                    <div class="row margin10">
                        Danh mục <br>
                        <select name="iddm" id="">
                            <?php 
                            foreach($list_nxb as $nxb){
                                extract($nxb);
                                echo '<option value="'.$id_nhaxuatban.'">'.$ten_nhaxuatban.'</option>';
                            }
                            ?>
                            
                        </select>
                    </div>
                    <div class="row margin10">
                        Tên sách <br>
                        <input type="text" name="ten_sach">
                    </div>
                    <div class="row margin10">
                        Hình ảnh <br>
                        <input type="file" name="hinh_anh">
                    </div>
                    <div class="row margin10">
                        Giá <br>
                        <input type="text" name="gia">
                    </div>
                    
                    <div class="row margin10">
                        Mô tả <br>
                        <textarea name="mo_ta" id="" cols="30" rows="10"></textarea>
                    </div>
                    <div class="row margin10">
                        <input type="submit" name="themmoi" value="THÊM MỚI">
                        <input type="reset" value="NHẬP LẠI">
                        <a href="index.php?act=listsach"><input type="button" value="Danh sách"></a>
                    </div>
                    <?php
                        if(isset($thongbao)&&($thongbao!="")) echo $thongbao;
                    ?>
                </form>
            </div>
        </div>
    </div>