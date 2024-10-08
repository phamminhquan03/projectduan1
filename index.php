<?php

session_start();
include "model/pdo.php";
include "model/danhmuc.php";
include "model/sanpham.php";
include "model/taikhoan.php";
$dsdm = loadall_danhmuc();
ob_start();
include "model/cart.php";
include "view/header.php";
include "update_session.php";

if(!isset($_SESSION['mycart']))$_SESSION['mycart']=[];
$spnew = loadall_sanpham_home();
$dstop10 = loadall_sanpham_top10();
include "global.php";


if(isset($_GET['act'])&&($_GET['act']!="")){
    $act = $_GET['act'];
    switch($act){
        case 'sanpham':
            if(isset($_POST['kyw'])&&($_POST['kyw']!="")){
                $kyw = $_POST['kyw'];
            }else{
                $kyw ="";
            }

            if(isset($_GET['iddm'])&&($_GET['iddm']>0)){
                $iddm = $_GET['iddm'];    
                
            }else{
                $iddm = 0;
            }
                $dssp = loadall_sanpham($kyw,$iddm);
                $tendm = load_ten_dm($iddm);
                include "view/sanpham.php";
            break;
        case 'sanphamct':
            if(isset($_GET['idsp'])&&($_GET['idsp']>0)){
                $id = $_GET['idsp'];
                $onesp = loadone_sanpham($id);

                // var_dump($onesp);die;
                extract($onesp);
                $sp_cung_loai = load_sanpham_cungloai($id,$iddm);
                include "view/sanphamct.php";
            }else{
                include 'view/home.php';
            }
            
            break;
            case 'dangky':
                if (isset($_POST['dangky']) && ($_POST['dangky'])) {
                    $email = $_POST['email'];
                    $user = $_POST['user'];
                    $pass = $_POST['pass'];
                    
                    // Assign a default role, e.g., 'user'
                    $role = $_POST['role']; 
            
                    // Insert the user with role
                    insert_taikhoan($email, $user, $pass, $role);
                    
                    $thongbao = "Đã đăng ký thành công. Vui lòng đăng nhập để thực hiện chức năng";
                }
                include "view/taikhoan/dangky.php";
                break;
            
        case 'dangnhap':
                if(isset($_POST['dangnhap'])&&($_POST['dangnhap'])){
                    $user = $_POST['user'];
                    $pass = $_POST['pass'];
                    $checkuser = checkuser($user,$pass);
                    if(is_array($checkuser)){
                        $_SESSION['user']= $checkuser;
                        //$thongbao ="Bạn đã đăng nhập thành công" ;
                        header('location: index.php');
                    }else{
                        $thongbao ="Tài khoản không tồn tại vui lòng kiểm tra lại hoặc đăng ký!";
                    }
                    
                }
                include "view/taikhoan/dangnhap.php";
                break;
        case 'edit_taikhoan':
                    if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                        $user = $_POST['user'];
                        $pass = $_POST['pass'];
                        $email = $_POST['email'];
                        $address = $_POST['address'];
                        $tel = $_POST['tel'];
                        $id = $_POST['id'];
                        
                        capnhat_taikhoan($id,$user,$pass,$email,$address,$tel);
                        $_SESSION['user']= checkuser($user,$pass);
                        header('location: index.php?act=edit_taikhoan');
                        
                    }
                    include "view/taikhoan/edit_taikhoan.php";
                    break;
        case 'quenmk':
                        if(isset($_POST['guiemail'])&&($_POST['guiemail'])){
                            
                            $email = $_POST['email'];
                            
                            $checkemail = checkemail($email);
                            if(is_array($checkemail)){
                                $thongbao = "Mật khẩu của bạn là: ".$checkemail['pass'];
                            }else{
                                $thongbao = "Email không tồn tại";
                            }
                            
                        }
                        include "view/taikhoan/quenmk.php";
                        break;

        case 'addtocart':
            // if(!isset($_SESSION['mycart'])) $_SESSION['mycart'] = array();
            if(isset($_POST['addtocart'])){
                // session_destroy();die;
                $id=$_POST['id'];
                $name=$_POST['name'];
                $img=$_POST['img'];
                $price=$_POST['price'];
                $soluong=1;
                $ttien=$soluong * $price;

                $spadd = [
                    'id'=>$id,
                    'name' => $name,
                    'img' => $img,
                    'price' => $price,
                    'soluong' => $soluong,
                    'ttien' => $price * $soluong
                ];
                $i=0;
                $fg=0;
                
                //Kiểm tra xem đã có giỏ hàng chưa
                if (!isset($_SESSION['mycart'])){
                    $_SESSION['mycart'][$id] = $spadd;
                } else {
                    //Kiểm tra sản phẩm đã có trong giỏ hàng thì tăng soluong
                    if (isset($_SESSION['mycart'][$id])) {
                        $_SESSION['mycart'][$id]['soluong'] ;
                    } else {
                        $_SESSION['mycart'][$id] = $spadd;
                    }
                }
                
            }
            include "view/cart/viewcart.php";
            break;
        case 'delcart':
            if(isset($_GET['idcart'])){
                unset($_SESSION['mycart'][$_GET['idcart']]);
            }else{
                $_SESSION['mycart']=[];
            }
            // include "view/gioithieu.php";
            header('Location: index.php?act=viewcart');
            break;
        
        case 'viewcart':
            include "view/cart/viewcart.php";
            break;
        case 'bill':
            include "view/cart/bill.php";
            break;
            case 'billcomfirm':
                // Create bill
                if (isset($_POST['dongydathang']) && $_POST['dongydathang']) {
                    // Get user ID or set to 0 if not logged in
                    $iduser = isset($_SESSION['user']) ? $_SESSION['user']['id'] : 0;
            
                    // Gather information from the form
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $address = $_POST['address'];
                    $tel = $_POST['tel'];
                    $pttt = $_POST['pttt']; // Payment method
                    $ngaydathang = date('h:i:sa d/m/y'); // Current date and time
                    $tongdonhang = tongdonhang(); // Calculate total order amount
            
                    // Set the payment status to pending by default
                    $thanhtoan = 0; // 0 represents "Pending"
            
                    // Insert bill
                    $idbill = insert_bill($iduser, $name, $email, $address, $tel, $pttt, $ngaydathang, $tongdonhang, $thanhtoan);
            
                    // Check if the bill was successfully created
                    if ($idbill) {
                        // Insert items into the cart associated with the bill
                        foreach ($_SESSION['mycart'] as $cart) {
                            insert_cart($_SESSION['user']['id'], $cart['id'], $cart['img'], $cart['name'], $cart['price'], $cart['soluong'], $cart['ttien'], $idbill);
                        }
                        // Clear the shopping cart session
                        $_SESSION['mycart'] = [];
                    } else {
                        // Handle the case where bill insertion fails
                        echo "Error creating the bill. Please try again.";
                        break; // Exit the case to avoid proceeding with empty bill data
                    }
            
                    // Load the bill and cart details
                    $bill = loadone_bill($idbill);
                    $billct = loadall_cart($idbill);
                    include "view/cart/billconfirm.php"; // Show the confirmation page
                } else {
                    // Handle the case where the form was not submitted correctly
                    echo "Please complete the form to create a bill.";
                }
                break;
            
        case 'mybill':
            $listbill=loadall_bill($_SESSION['user']['id']);
            include "view/cart/mybill.php";
            break;
            case 'xoabill':
                if (isset($_GET['id']) && $_GET['id']) {
                    // Xóa đơn hàng và các sản phẩm trong đơn
                    delete_bill($_GET['id']);
                }
                // Lấy tất cả các đơn hàng sau khi xóa
                $listbill = loadall_bill();  
                include 'view/cart/mybill.php';  // Hiển thị lại danh sách đơn hàng
                break;

        case 'thoat':
            unset($_SESSION['user']);
            header('location: index.php');
            break; 
        case 'gioithieu':
            include "view/gioithieu.php";
            break;
        case 'lienhe':
                include "view/lienhe.php";
                break;
                
        default:
            include "view/home.php";
            break;
    }
}else{
    include "view/home.php";
}
include "view/footer.php";
?>