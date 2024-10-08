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
        <h1>DANH SÁCH BÌNH LUẬN</h1>
    </div>
    <div class="row formcontent ">
        <form action="#" method="POST">
            <div class="row margin10 formdsloai">
                <table>
                    <tr>
                        <th></th>
                        <th>ID</th>
                        <th>ND BÌNH LUẬN</th>
                        <th>IDUSER</th>
                        <th>IDPRO</th>
                        <th>NGÀY BÌNH LUẬN</th>
                        <th></th>
                    </tr>
                    <?php
                    foreach ($listbinhluan as $binhluan) {
                        extract($binhluan);
                        $xoabl = "index.php?act=xoabl&id=" . $id;
                        echo '<tr>
                                <td><input type="checkbox" name="" id=""></td>
                                <td>' . $id . '</td>
                                <td>' . $noidung . '</td>
                                <td>' . $iduser . '</td>
                                <td>' . $idpro . '</td>
                                <td>' . $ngaybinhluan . '</td>
                                <td>
                                    <a href="' . $xoabl . '"> <input type="button" value="Xóa"> </a> 
                                </td>
                            </tr>';
                    }
                    ?>
                </table>
            </div>
            <div class="pt-2 ">
                <input class="" type="button" value="CHỌN TẤT CẢ">
                <input class="" type="button" value="BỎ CHỌN TẤT CẢ">
            </div>
        </form>
    </div>
</div>