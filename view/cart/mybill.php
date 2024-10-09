<?php
include_once 'model/cart.php'; // Đảm bảo chỉ bao gồm một lần

// Kiểm tra nếu có yêu cầu hủy đơn
if (isset($_GET['id']) && isset($_GET['action']) && $_GET['action'] == 'delete') {
    $id = $_GET['id'];
    delete_bill($id);  // Gọi hàm delete_bill từ cart.php
    header('Location: mybill.php?status=success');  // Chuyển hướng về trang danh sách đơn hàng với thông báo thành công
    exit;
}
?>

<div class="mb">
    <div class="boxtrai mr">
        <div class="row mb frmdsloai">
            <center>
                <h3 class="dn">ĐƠN HÀNG CỦA BẠN</h3>
            </center>

            <!-- Hiển thị thông báo thành công khi đơn hàng bị hủy -->
            <?php if (isset($_GET['status']) && $_GET['status'] == 'success') : ?>
                <div class="alert alert-success">
                    Đơn hàng đã được hủy thành công.
                </div>
            <?php endif; ?>

            <div class="boxcontent cart">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>MÃ ĐƠN HÀNG</th>
                            <th>NGÀY ĐẶT</th>
                            <th>SỐ LƯỢNG MẶT HÀNG</th>
                            <th>TỔNG GIÁ TRỊ ĐƠN HÀNG</th>
                            <th>TÌNH TRẠNG ĐƠN</th>
                            <th>TÌNH TRẠNG THANH TOÁN</th>
                            <th>HÀNH ĐỘNG</th> <!-- Thêm cột hành động -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $listbill = loadall_bill();  // Lấy tất cả các đơn hàng từ CSDL
                        if (is_array($listbill) && count($listbill) > 0) {
                            foreach ($listbill as $bill) {
                                $xoabill = "index.php?act=xoabill&id=".$bill['id'];
                                extract($bill);
                                $ttdh = get_ttdh($bill['bill_status']);
                                $tttt = get_tttt($bill['bill_thanhtoan']);
                                $countsp = loadall_cart_count($bill['id']);
                                
                                echo '<tr>
                                        <td>DA1-' . $bill['id'] . '</td>
                                        <td>' . htmlspecialchars($bill['ngaydathang']) . '</td>
                                        <td>' . htmlspecialchars($countsp) . '</td>
                                        <td>' . htmlspecialchars($bill['total']) . ' USD</td>
                                        <td>' . htmlspecialchars($ttdh) . '</td>
                                        <td>' . htmlspecialchars($tttt) . '</td>
                                        <td>';

                                // Kiểm tra nếu trạng thái đơn hàng là "đang giao hàng" (giả sử trạng thái "đang giao hàng" là '1')
                                if ($bill['bill_status'] != '2' && $bill['bill_status'] != '3') {
                                    echo '<a href="'. $xoabill .'" onclick="return confirm(\'Bạn có chắc chắn muốn hủy đơn hàng?\')">
                                            <button class="btn btn-danger btn-sm">Hủy Đơn</button>
                                          </a>';
                                } else {
                                    echo 'Không thể hủy';
                                }

                                echo '</td>
                                    </tr>';
                            }
                        } else {
                            echo '<tr><td colspan="7" class="text-center">Bạn chưa có đơn hàng nào.</td></tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
