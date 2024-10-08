<div class="row">
            <div class="row formtitle margin10">
                <h1>SÁCH</h1>
            </div>
            
            <div class="row formcontent">
                <div class="row margin10 formdsloai">
                    <form action="" method="post">
                    <table>
                        <tr>
                            <th></th>
                            <th>Tên sách</th>
                            <th>Hình ảnh</th>
                            <th>Nhà xuất bản</th>
                            <th>Giá</th>
                            <th>Mô tả</th>
                            <th></th>
                        </tr>

                        <?php
                            foreach($listsach as $sach){
                                extract($sach);
                                $suasach = "index.php?act=suasach&id=".$id;
                                $xoasach = "index.php?act=xoasach&id=".$id;
                                $thongbaoxoa = "'"."Bạn có chắc chắn muốn xóa sách:".$ten_sach."'";

                                $hinhpath = "../upload/".$hinh_anh;
                                if(is_file($hinhpath)){
                                    $hinh = "<img src ='".$hinhpath."' height='80'>";
                                }
                                else{
                                    $hinh = "Không có hình";
                                }
                                echo '
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>'.$ten_sach.'</td>
                                        <td>'.$hinh_anh.'</td>
                                        <td>'.$id_nhaxuatban.'</td>
                                        <td>'.$gia.'</td>
                                        <td>'.$mo_ta.'</td>
                                        
                                        <td>
                                            <center>
                                                <a href="'.$suasach.'"><input type="button" value="Sửa"></a>
                                                <a href="'.$xoasach.'" onclick= "return confirm('.$thongbaoxoa.')" role="button">
                                                <input type="button" value="Xóa">
                                                </a>
                                            </center>
                                        </td>
                                    </tr>';
                            }
                        ?>
                    </table>
                    </form>
                </div>
                <div class="row margin10">
                    <input type="button" value="Chọn tất cả">
                    <input type="button" value="Bỏ chọn tất cả">
                    <input type="button" value="Xóa các mục đã chọn">
                    <a href="index.php?act=addsach"><input type="button" value="Nhập thêm"></a>
                </div>
            </div>