<style>
    /* General container styles */
.formtitle h1 {
    font-size: 24px;
    font-weight: bold;
    color: #333;
    text-align: center;
    margin-bottom: 20px;
}

/* Form container styling */
.formcontent {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

/* Input field styling */
input[type="text"] {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    transition: border-color 0.3s ease;
}

input[type="text"]:focus {
    border-color: #007bff;
    outline: none;
}

/* Submit and reset button styling */
.pt-2 input[type="submit"],
.pt-2 input[type="reset"],
.pt-2 input[type="button"] {
    padding: 10px 20px;
    margin-right: 10px;
    border: none;
    border-radius: 5px;
    background-color: #007bff;
    color: white;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease;
}

.pt-2 input[type="submit"]:hover,
.pt-2 input[type="reset"]:hover,
.pt-2 input[type="button"]:hover {
    background-color: #0056b3;
}

/* Link button styling */
.pt-2 a {
    text-decoration: none;
}

.pt-2 input[type="button"] {
    background-color: #28a745;
}

.pt-2 input[type="button"]:hover {
    background-color: #218838;
}

/* Margin between form items */
.row.margin10 {
    margin-bottom: 15px;
}

/* General form spacing and alignment */
.row {
    display: flex;
    flex-direction: column;
}


</style>
<?php
if(is_array($dm)){
    extract($dm);
}
?>


<div class="row">
            <div class="row formtitle">
                <h1>CẬP NHẬT LOẠI HÀNG HÓA</h1>
            </div>
            <div class="row formcontent">
                <form action="index.php?act=updatedm" method="post">
                    <div class="row margin10">
                        Mã loại <br>
                        <input type="text" name="maloai" disabled>
                    </div>
                    <div class="row margin10">
                        Tên loại <br>
                        <input type="text" name="tenloai" value="<?php if(isset($name) && ($name!=""))echo $name; ?>">
                    </div>
                    <div class="pt-2">
                        <input type="hidden" name="id" value="<?php if(isset($id) && ($id>0))echo $id; ?>">
                        <input type="submit" name="capnhat" value="CẬP NHẬT">
                        <input type="reset" value="NHẬP LẠI">
                        <a href="index.php?act=listdm"><input type="button" value="Danh sách"></a>
                    </div>
                    <?php
                        if(isset($thongbao)&&($thongbao!="")) echo $thongbao;
                    ?>
                </form>
            </div>
        </div>
    </div>