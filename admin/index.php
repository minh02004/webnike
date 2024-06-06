<?php

include "../model/pdo.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";
include "header.php";
include "../model/taikhoan.php";
include "../model/binhluan.php";
include "../model/cart.php";
if (!isset($_SESSION['mycart'])) $_SESSION['mycart'] = [];
if (isset($_GET['act']) && $_GET['act'] != "") {
    $act = $_GET['act'];
    switch ($act) {
            // DANH MUC
        case 'adddm':
            if (isset($_POST["themmoi"])) {
                $id = $_POST["id"];
                $name = $_POST["name"];
                //Gọi phương thức trong model
                insert_dm($id, $name);
                // header("Location:index.php?act=listdm");
                $thongbao = "Thêm thành công !";
            }
            // $listdm= loadall_danhmuc();
            include "danhmuc/add.php";
            break;

        case 'listdm':
            $sql = "SELECT * FROM danhmuc ORDER BY ID DESC";
            $listDanhmuc = pdo_query($sql);
            include "danhmuc/list.php";
            break;

        case 'xoadm':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_dm($_GET['id']);
            }
            $listDanhmuc = danhmuc_get_all();
            include "danhmuc/list.php";
            break;

        case 'suadm':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                // Lấy thông tin danh mục
                $danhmuc = danhmuc_get_by_id($_GET['id']);
                // var_dump($danhmuc);
            }
            // $listdm= loadall_danhmuc();

            include "danhmuc/update.php";
            break;
        case "updatedm":
            if (isset($_POST["updatedm"])) {

                $id = $_POST["id"];
                $name = $_POST["name"];
                //Gọi phương thức trong model
                update_dm($id, $name);
            }
            $listDanhmuc = danhmuc_get_all();
            include "danhmuc/list.php";
            break;

            // SAN PHAM
        case "listsp":
            if (isset($_POST["listok"]) && $_POST["listok"]) {
                $kyw = $_POST['kyw'];
                $iddm = $_POST['iddm'];
            } else {
                $kyw = '';
                $iddm = 0;
            }
            $listdm = loadall_danhmuc();
            $listSanPham = loadall_sanpham($kyw, $iddm);
            include "sanpham/list.php";
            break;
        case "addsp":
            if (isset($_POST["themmoi"])) {
                $iddm = $_POST["iddm"];
                $ten = $_POST["name"];
                $gia = $_POST["price"];
                $mota = $_POST["mota"];

                $img = $_FILES["img"]["name"];
                $target_dir = "../img/";
                $target_file = $target_dir . basename($_FILES["img"]["name"]);
                if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
                    echo "The file" . htmlspecialchars(basename($_FILES["img"]["name"])) . "has been uploading";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
                //Gọi phương thức trong model
                insert_sp($ten, $gia, $img, $mota, $iddm);
                header("Location:index.php?act=listsp");
            }
            $listdm = loadall_danhmuc();
            include "sanpham/add.php";
            break;
        case "xoasp":
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                //Thực hiện xóa
                delete_sp($_GET['id']);
            }
            $listSanPham = sanpham_get_all();
            include "sanpham/list.php";
            break;
        case "suasp":
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                // Lấy thông tin sản phẩm
                $sanpham = sanpham_get_by_id($_GET['id']);
                // var_dump($sanpham);
            }
            $listdm = loadall_danhmuc();

            include "sanpham/update.php";
            break;
        case "updatesp":
            if (isset($_POST["updatesp"])) {
                $iddm = $_POST["iddm"];
                $id = $_POST["id"];
                $ten = $_POST["name"];
                $gia = $_POST["price"];


                $img = $_FILES["img"]["name"];
                $target_dir = "../img/";
                $target_file = $target_dir . basename($_FILES["img"]["name"]);
                if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
                    echo "The file" . htmlspecialchars(basename($_FILES["img"]["name"])) . "has been uploading";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
                $mota = $_POST["mota"];
                //Gọi phương thức trong model
                update_sp($ten, $gia, $img, $mota, $iddm, $id);
            }
            $listSanPham = sanpham_get_all();
            include "sanpham/list.php";
            break;



            // binhluan
        case 'dsbl':
            $listbl = loadall_binhluan(0);
            include "binhluan/list.php";
            break;
        case 'xoabl':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_binhluan($_GET['id']);
            }

            $sql = "select * from binhluan order by id desc";
            $listbl = pdo_query($sql);
            include "binhluan/list.php";
            break;
            // tai khoan
        case 'dskh':
            $listtk = loadall_taikhoan();
            include "taikhoan/list.php";
            break;
        // case 'edit_taikhoanad':
        //     if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
        //         $email = $_POST['email'];
        //         $user = $_POST['user'];
        //         $pass = $_POST['pass'];
        //         $address = $_POST['address'];
        //         $tel = $_POST['tel'];
        //         $id = $_POST['id'];
        //         $role = $_POST['role'];
        //         update_taikhoanad($id, $user, $pass, $email, $address, $tel, $role);
        //         $_SESSION['user'] = check_user($user, $pass);
        //         // header('location:index.php?act=edit_taikhoan');
        //         $thongbao = "Cập nhật thành công!";
        //     }
        //     include "../admin/taikhoan/edit_taikhoanad.php";
        //     break;
        case 'xoatk':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                //Thực hiện xóa
                delete_tk($_GET['id']);
            }
            $listtk = loadall_taikhoan();
            include "taikhoan/list.php";
            break;
        case 'thongke':
            $listthongke = loadall_thongke();
            include "thongke/list.php";
            break;
        case 'bieudo':
            $listthongke = loadall_thongke();
            include "thongke/bieudo.php";
            break;
        case 'bieudo1':
            $listthongke = loadall_thongke();
            include "thongke/bieudo1.php";
            break;
        case 'listbill':
            if (isset($_POST['kyw']) && ($_POST['kyw'] != "")) {
                $kyw = $_POST['kyw'];
            } else {
                $kyw = "";
            }
            $listbill = loadall_bill($kyw, 0);
            include "bill/listbill.php";
            break;


        case "xoabill":
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                //Thực hiện xóa
                delete_bill($_GET['id']);
            }
            $listbill = loadall_bill(0);
            include "bill/listbill.php";
            break;
        case "suabill":
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                // Lấy thông tin sản phẩm
                $sanpham = bill_get_by_id($_GET['id']);
                // var_dump($bill);
            }
            $listbill = loadall_bill(0);
            include "bill/updatebill.php";
            break;

        case "updatebill":
            $ttdh = get_ttdh($bill['bill_status']);
            $countsp = loadall_cart_count($bill['id']);
            if (isset($_POST["updatebill"])) {
                $listbill = $_POST["listbill"];
                $id = $_POST["id"];
                $bill_name = $_POST["bill_name"];
                $bill_price = $_POST["bill_price"];
                $countsp = $_POST["countsp"];
                $total = $_POST["total"];
                $ttdh = $_POST["ttdh"];
                $ngaydathang = $_POST["ngaydathang"];

                //Gọi phương thức trong model
                update_bill($bill_name, $bill_price, $countsp, $total, $listbill, $ttdh, $ngaydathang, $id);
            }
            $listbill = loadall_bill(0);
            include "bill/listbill.php";
            break;



        default:
            include "home.php";
            break;
    }
} else {
    include "home.php";
}


include "footer.php";
