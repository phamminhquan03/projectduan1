<style>
    /* Title styling */
.formtitle h1 {
    font-size: 24px;
    font-weight: bold;
    color: #333;
    text-align: center;
    margin-bottom: 20px;
}

/* Table container styling */
.formdsloai {
    max-width: 1000px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

/* Table styling */
table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

table th, table td {
    padding: 12px 15px;
    text-align: left;
    border-bottom: 1px solid #ddd;
    font-size: 16px;
    text-align: center; /* Ensures content in each column is centered */
}

/* Ensure all columns take up equal space */
table th, table td {
    width: 25%; /* Each column will take 25% of the table width */
}

table th {
    background-color: #435ebe;
    color: white;
}

table tr:hover {
    background-color: #f1f1f1;
}

/* Checkbox alignment */
td:first-child {
    text-align: center;
    width: 5%; /* Ensures that the checkbox column is narrower */
}

/* Button styling inside the table */
table input[type="button"] {
    padding: 5px 10px;
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

/* Bottom action buttons styling */
.pt-2 {
    text-align: center;
    margin-top: 20px;
}

.pt-2 input[type="button"] {
    padding: 10px 20px;
    margin-right: 10px;
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

/* "Nhập thêm" button with a different color */
.pt-2 a input[type="button"] {
    background-color: #28a745;
}

.pt-2 a input[type="button"]:hover {
    background-color: #218838;
}

/* Margin between elements */
.row.margin10 {
    margin-bottom: 15px;
}

</style>
<div class="row">
            <div class="row formtitle">
                <h1>DANH SÁCH ĐƠN HÀNG</h1>
            </div>
            <div class="row formcontent">
                <div class="row margin10 formdsloai">
                    <table>
                        <tr>
                            <th></th>
                            <th>MÃ ĐƠN HÀNG</th>
                            <th>KHÁCH HÀNG</th>
                            <th>SỐ LƯỢNG HÀNG</th>
                            <th>GIÁ TRỊ ĐƠN HÀNG</th>
                            <th>NGÀY ĐẶT HÀNG</th>
                            <th>TÌNH TRẠNG ĐƠN HÀNG</th>
                            <th>TÌNH TRẠNG THANH TOÁN</th>
                            <th>THAO TÁC</th>
                        </tr>

                        <?php
                            foreach($listbill as $bill){
                                extract($bill);
                                $suadh = "index.php?act=suadh&id=".$id;
                               
                                $kh = $bill['bill_name'].'
                                <br> '.$bill['bill_email'].'
                                <br> '.$bill['bill_address'].'
                                <br> '.$bill['bill_tel'];
                                $ttdh =  get_ttdh($bill['bill_status']);
                                $tttt = get_tttt($bill['bill_thanhtoan']);
                                $countsp =  loadall_cart_count($bill["id"]);
                                echo '
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>DA1- '.$bill['id'].'</td>
                                        <td>'.$kh.'</td>
                                    
                                        <td>'.$countsp.'</td>
                                        <td>'.$bill['total'].' USD</td>
                                        <td>'.$bill['ngaydathang'].'</td>
                                        <td>'.$ttdh.'</td>
                                        <td>'.$tttt.'</td>
                                        <td><center><a href="'.$suadh.'"><input type="button" value="Sửa"></a></center></td>
                                    </tr>';
                            }
                        ?>
                    </table>
                </div>
            </div>