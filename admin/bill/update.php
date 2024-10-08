<<<<<<< HEAD
<style>
    /* Title styling */
    .formtitle h1 {
        font-size: 28px;
        font-weight: 600;
        color: #333;
        text-align: center;
        margin-bottom: 30px;
    }

    /* Table container styling */
    .formdsloai {
        max-width: 100%;
        margin: 0 auto;
        padding: 20px;
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        border: 1px solid #e1e1e1;
    }

    /* Table styling */
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
        font-family: 'Nunito', sans-serif;
    }

    table th,
    table td {
        padding: 12px 15px;
        text-align: left;
        border-bottom: 1px solid #ddd;
        font-size: 16px;
        text-align: center;
    }

    /* Header styling */
    table th {
        background-color: #435ebe;
        color: #ffffff;
        font-weight: 600;
    }

    /* Hover effect for rows */
    table tr:hover {
        background-color: #f8f9fa;
    }

    /* Checkbox column alignment */
    td:first-child {
        text-align: center;
        width: 5%;
    }

    /* Button styling inside the table */
    table input[type="button"] {
        padding: 6px 15px;
        background-color: #007bff;
        border: none;
        color: white;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    table input[type="button"]:hover {
        background-color: #0056b3;
    }

    /* Action buttons styling at the bottom */
    .pt-2 {
        text-align: center;
        margin-top: 30px;
    }

    .pt-2 input[type="button"] {
        padding: 12px 20px;
        margin: 0 10px;
        background-color: #007bff;
        border: none;
        color: white;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s ease;
    }

    .pt-2 input[type="button"]:hover {
        background-color: #0056b3;
    }

    /* "Add more" button with a different color */
    .pt-2 a input[type="button"] {
        background-color: #28a745;
    }

    .pt-2 a input[type="button"]:hover {
        background-color: #218838;
    }

    /* Row margin */
    .row.margin10 {
        margin-bottom: 20px;
    }

    /* Description column styling */
    table td:nth-child(6) {
        width: 30%;
        text-overflow: ellipsis;
        max-height: 100px;
        padding: 10px;
        text-align: left;
        vertical-align: top;
        overflow: hidden;
        white-space: normal;
    }

    /* Adjust widths for other columns */
    table th:nth-child(1), table td:nth-child(1) {
        width: 5%;
    }

    table th:nth-child(2), table td:nth-child(2) {
        width: 15%;
    }

    table th:nth-child(3), table td:nth-child(3) {
        width: 25%;
    }

    table th:nth-child(4), table td:nth-child(4) {
        width: 10%;
    }
    table th:nth-child(5), table td:nth-child(5) {
        width: 10%;
    }

    /* Form styling */
    .formdsloai form {
        display: flex;
        justify-content: space-between;
        margin-bottom: 30px;
    }

    .formdsloai input[type="text"], .formdsloai select {
        width: 100%;
        max-width: 250px;
        padding: 10px;
        font-size: 16px;
        border-radius: 5px;
        border: 1px solid #ddd;
    }

    .formdsloai input[type="submit"] {
        background-color: #007bff;
        color: white;
        border-radius: 5px;
        padding: 10px 20px;
        cursor: pointer;
        border: none;
        transition: background-color 0.3s ease;
    }

    .formdsloai input[type="submit"]:hover {
        background-color: #0056b3;
    }
</style>
=======


>>>>>>> 201499c99937f2d2664edc8d7cf7204c44976c2a

<div class="row">
    <div class="row formtitle">
        <h1>CẬP NHẬT ĐƠN HÀNG</h1>
    </div>
        <div class="row formcontent">
            <form action="index.php?act=updatedh&id=<?php echo $donhang['id'] ?>" method="post" enctype="multipart/form-data">
                <div class="row margin10">
                    
<<<<<<< HEAD
                    Mã đơn hàng
                    <input type="hidden" name="id" value="<?=$donhang['id']?>"> <br>
                    <input type="text" readonly name="id" value="<?=$donhang['id']?>"><br>
                    Khách hàng <br>
                    <input type="text" readonly name="id" value="<?=$donhang['bill_name']?>"><br>
=======
                    Mã đơn hàng <br>
                    <input type="hidden" name="id" value="<?=$donhang['id']?>">
                    <input type="text" readonly name="id" value="<?=$donhang['id']?>">
                    Khách hàng <br>
                    <input type="text" readonly name="id" value="<?=$donhang['bill_name']?>">
>>>>>>> 201499c99937f2d2664edc8d7cf7204c44976c2a
                          
                    Trạng thái đơn hàng <br>
                    <select name="bill_status">
                        <option value="0" <?=($donhang['bill_status'] == 0) ? 'selected' : ''  ?> >Đơn hàng mới</option>
                        <option value="1" <?=($donhang['bill_status'] == 1) ? 'selected' : ''  ?> >Đang chuẩn bị</option>
                        <option value="2" <?=($donhang['bill_status'] == 2) ? 'selected' : ''  ?> >Đang giao hàng</option>
                        <option value="3" <?=($donhang['bill_status'] == 3) ? 'selected' : ''  ?> >Giao hàng thành công</option>
                    </select>
                    
                    <br>Trạng thái thanh toán <br>
                    <select name="bill_thanhtoan">
                        <option value="0" <?=($donhang['bill_thanhtoan'] == 0) ? 'selected' : ''  ?> >Chưa thanh toán</option>
                        <option value="1" <?=($donhang['bill_thanhtoan'] == 1) ? 'selected' : ''  ?> >Đã thanh toán</option>
                    </select>
                    
                </div>
                <div class="row formcontent">
                <div class="row margin10 formdsloai">
                    
                    <table>
                        <tr>
                            <th>HÌNH ẢNH</th>
                            <th>TÊN SẢN PHẨM</th>
                            <th>ĐƠN GIÁ</th>
                            <th>SỐ LƯỢNG</th>
                            <th>THÀNH TIỀN</th>
                        </tr>
                        <?php
                        foreach($dt_bill as $bill):
                            $bill['thanhtien'] = $bill['price'] * $bill['soluong'];
                        ?>
                            <tr>
                                <td>
                                    <img width="80px" src="../<?php echo $bill['img'] ?>" alt="">
                                </td>
                                <td>
                                    <?php echo $bill['name'] ?>
                                </td>
                                <td>
                                    <?php echo $bill['price'] ?>
                                </td>
                                <td>
                                    <?php echo $bill['soluong'] ?>
                                </td>
                                <td>
                                    <?php echo $bill['thanhtien'] ?>
                                </td>
                            </tr>

                        <?php endforeach ?>
                    </table>
                </div>
                </div>
                    
                    <div class="row margin10">
                        <input type="hidden" name="id" value="<?=$donhang['id'] ?>">
                        <input type="submit" name="capnhat" value="CẬP NHẬT">
                    </div>
                    <?php
                        if(isset($thongbao)&&($thongbao!="")) echo $thongbao;
                    ?>
                </form>
            </div>
        </div>
    </div>