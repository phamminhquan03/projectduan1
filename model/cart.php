<?php
function loadall_thongke(){
    $sql = "SELECT dm.id, dm.name, COUNT(*) 'soluong', MIN(price)'gia_min', MAX(price)
    'gia_max', AVG(price) 'gia_avg' FROM danhmuc dm JOIN sanpham sp ON
    dm.id = sp.iddm GROUP BY dm.id, dm.name ORDER BY soluong DESC";

    return pdo_query($sql);
    
}
?>
<?php

        function viewcart($del){
            
            $tong = 0;
    $i = 0;

    if ($del == 1) {
        $xoasp_th = '<th>THAO TÁC </th>';
        $xoasp_td2 = '<td></td>';
    } else {
        $xoasp_th = '';
        $xoasp_td2 = '';
    }

    echo '<tr>
            <th>HÌNH</th>
            <th>SẢN PHẨM</th>
            <th>ĐƠN GIÁ</th>
            <th>SỐ LƯỢNG</th>
            <th>THÀNH TIỀN</th>
            ' . $xoasp_th . '
        </tr>';

    foreach ($_SESSION['mycart'] as $cart) {
        $hinh = $cart['img'];
        $ttien = $cart['price'] * $cart['soluong'];
        $tong += $ttien;

        if ($del == 1) {
            $xoasp_td = '<td><a href="index.php?act=delcart&idcart=' . $cart['id'] . '"><input type="button" value=" Xóa"></a></td>';
        } else {
            $xoasp_td = '';
        }

        // Thêm một định danh duy nhất cho mỗi ô nhập số lượng (ví dụ, sử dụng ID sản phẩm)
        $quantityInputId = 'quantity_' . $cart['id'];

        echo '
        <tr>
            <td><img src="' . $hinh . '" alt="" height="80px"></td>
            <td>' . $cart['name'] . '</td>
            <td>' . $cart['price'] . ' USD</td>
            <td>' . $cart['soluong'] . '</td> <!-- Static quantity, not editable -->
            <td id="total_' . $cart['id'] . '">' . $ttien . ' USD</td>
            ' . $xoasp_td . '
        </tr>';
    
    }

    echo '<tr>
            <td colspan="4">Tổng đơn hàng</td>
            <td id="grandTotal"> ' . $tong . ' USD</td>
            ' . $xoasp_td2 . '
        </tr>';
    }
    function bill_chi_tiet($listbill){
        global $img_path;
        $tong = 0;
        $i = 0;
        
        foreach ($listbill as $cart) {
            $hinh = $cart['img'];
            $thanhtien = $cart['price'] * $cart['soluong'];  // Tính thành tiền cho từng sản phẩm
            $tong += $thanhtien;  // Cộng dồn vào tổng đơn hàng
            
            echo '
                <tr>
                    <td><img src="' . $hinh . '" alt="" height="80px"></td>
                    <td>' . $cart['name'] . '</td>
                    <td>' . $cart['price'] . ' USD</td>
                     <td>
                <input min="1" type="number" id="quantity_' . $cart['id'] . '" value="' . $cart['soluong'] . '" 
                    onchange="updateQuantity(' . $cart['id'] . ', this.value, ' . $cart['price'] . ')">
            </td>
                    <td>' . $thanhtien . ' USD</td> 
                </tr>';
            $i++;
        }
        
        // Hiển thị tổng tiền của tất cả sản phẩm trong đơn hàng
        echo '<tr>
                <td colspan="4">Tổng hàng</td>
                <td>' . $tong . ' USD</td>
            </tr>';
    }
    
    function tongdonhang(){
        $tong=0;
              
        foreach ($_SESSION['mycart'] as $cart) {      
        $ttien=$cart['price']*$cart['soluong'];
        $tong+=$ttien;       
        }
        return $tong;

    }

    function insert_bill($iduser, $name, $email, $address, $tel, $pttt, $ngaydathang, $tongdonhang, $thanhtoan) {
        $sql = "INSERT INTO bill(iduser, bill_name, bill_email, bill_address, bill_tel, bill_pttt, ngaydathang, total, bill_thanhtoan)
                VALUES ('$iduser', '$name', '$email', '$address', '$tel', '$pttt', '$ngaydathang', '$tongdonhang', '$thanhtoan')";
        return pdo_execute_return_lastInsertId($sql);
    }
    
    function insert_cart($iduser,$idpro,$img,$name,$price,$soluong,$thanhtien,$idbill){
        $sql="insert into cart(iduser,idpro,img,name,price,soluong,thanhtien,idbill) values('$iduser','$idpro','$img','$name','$price','$soluong','$thanhtien','$idbill')";
        return pdo_execute($sql);
    }
    function loadone_bill($id){
        $sql="select * from bill where id=".$id;
        $bill=pdo_query_one($sql);
        return $bill;
    }
    function loadall_cart($idbill){
        $sql="select * from cart where idbill=".$idbill;
        $bill=pdo_query($sql);
        return $bill;
    }
    function loadall_cart_count($idbill){
        // Sum the 'soluong' field to get the total number of items in the order
        $sql = "SELECT SUM(soluong) AS total_quantity FROM cart WHERE idbill = ?";
        $result = pdo_query_one($sql, [$idbill]);
    
        // Return the total quantity of products in the order
        return $result['total_quantity'];
    }
    
    
    function loadall_bill($kyw="",$iduser=0){
        
        $sql="select * from bill where 1";
        if($iduser>0) $sql.=" AND iduser=".$iduser;
        //if($kyw!="") $sql.=" AND id like '%".$kyw."%'";
        $sql.=" order by id desc";
        $listbill=pdo_query($sql);
        return $listbill;
    }
    function get_ttdh($n){
        switch ($n) {
            case '0':
               $tt=" Đơn Hàng Mới"; 
                break;
            case '1':
                $tt="Đang Chuẩn Bị"; 
                break;
            case '2':
                $tt="Đang Giao Hàng"; 
                break;
            case '3':
                $tt="Giao Hàng Thành Công"; 
                break;
            default:
            $tt=" Đơn Hàng Mới"; 
                break;
        }
        return $tt;
        
    }
    function get_tttt($n){
        switch ($n) {
            case '0':
               $tt=" Chưa thanh toán"; 
                break;
            case '1':
                $tt="Đã thanh toán"; 
                break;
            default:
            $tt=" Đơn Hàng Mới"; 
                break;
        }
        return $tt;
        
    }
    function delete_bill($id){
        $sql = "DELETE FROM bill WHERE id=".$id;
        pdo_execute($sql);
    }
    function loadall_dt_bill($idbill){
        $sql = "SELECT * FROM cart WHERE idbill= $idbill" ;
        return pdo_query($sql);
    }
    function update_donhangstatus($id, $trangthai, $thanhtoan){
        $sql = "UPDATE bill SET bill_status = '$trangthai', bill_thanhtoan = '$thanhtoan'  WHERE id = $id";
        return pdo_execute($sql);
    }
  
    

?>