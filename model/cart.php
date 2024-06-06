<?php
require_once "pdo.php";
    function loadall_thongke(){
    $sql="select danhmuc.id as madm,danhmuc.name as tendm, 
    count(sanpham.id) as countsp, min(sanpham.price) as minprice, 
    max(sanpham.price) as maxprice, avg(sanpham.price) as avgprice 
    from sanpham left join danhmuc on danhmuc.id=sanpham.iddm 
    group by danhmuc.id order by danhmuc.id desc";

    // $sql1="select danhmuc.id as madm, danhmuc.name as tendm, 
    // count(sanpham.id) as countsp, min(sanpham.price) as minprice, 
    // max(sanpham.price) as maxprice, avg(sanpham.price) as avgprice 
    // from sanpham left join danhmuc on danhmuc.id=sanpham.iddm 
    // group by danhmuc.id order by danhmuc.id desc";
    $listtk=pdo_query($sql);
    return $listtk;
    }

    function viewcart($del){
        global $img_path;
        $tong = 0;
        $i = 0;
        // $xoa_th = '';
        // $xoa_td2 = '';
        // $xoa_td = '';
        // if(isset($xoasp_th)){
        //     echo $xoasp_th;
        //   }
          
        //   if(isset($xoasp_td)){
        //     echo $xoasp_td;  
        //   }
        if($del==1){
            $xoasp_th = '<th>Thao tác</th>';
            $xoasp_td2 = '<td></td>';
        }else{
            $xoa_th = '';
            $xoa_td2 = '';
        }
        echo '<tr>
                        <th>Img</th>
                        <th>Sản phẩm</th>
                        <th>Đơn giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                        '.$xoasp_th.'
                    </tr>';
        foreach($_SESSION['mycart'] as $cart){
            $hinh = $img_path.$cart[2];
            $ttien = $cart[3] * $cart[4];
            $tong += $ttien;
            if($del==1){
                $xoasp_td = '<td><a href="index.php?act=delcart&idcart='.$i.'"><input type="button" value=" Xóa"></a></td>';
            }else{
                $xoa_td = '';
            }
                echo '<tr>
                        <td><img src="'.$hinh.'" alt="" height="80px"></td>
                        <td>'.$cart[1].'</td>
                        <td>'.number_format($cart[3]).' <u style="color: crimson;">₫</u></td>
                        <td>'.$cart[4].'</td>
                        <td>'.number_format($ttien).' <u style="color: crimson;">₫</u></td>
                        '.$xoasp_td.'
                    </tr>';

            $i += 1;
        }
        echo '<tr>
                    <td colspan = "4">Tổng đơn hàng</td>
                    <td>'.number_format($tong).' <u style="color: crimson;">₫</u></td>
                </tr>';
    }

    function viewbill($del){
        global $img_path;
        $tong = 0;
        $i = 0;
        if($del==1){
            $xoasp_th = '<th>Thao tác</th>';
            $xoasp_td2 = '<td></td>';
        }else{
            $xoa_th = '';
            $xoa_td2 = '';
        }
        echo '<tr>
                        <th>Img</th>
                        <th>Sản phẩm</th>
                        <th>Đơn giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                    </tr>';
        foreach($_SESSION['mycart'] as $cart){
            $hinh = $img_path.$cart[2];
            $ttien = $cart[3] * $cart[4];
            $tong += $ttien;
            if($del==1){
                $xoasp_td = '<td><a href="index.php?act=delbill&idcart='.$i.'"><input type="button" value=" Xóa"></a></td>';
            }else{
                $xoa_td = '';
            }
                echo '<tr>
                        <td><img src="'.$hinh.'" alt="" height="80px"></td>
                        <td>'.$cart[1].'</td>
                        <td>'.number_format($cart[3]).' <u style="color: crimson;">₫</u></td>
                        <td>'.$cart[4].'</td>
                        <td>'.number_format($ttien).' <u style="color: crimson;">₫</u></td>
                    </tr>';

            $i += 1;
        }
        echo '<tr>
                    <td colspan = "4">Tổng đơn hàng</td>
                    <td>'.number_format($tong).' <u style="color: crimson;">₫</u></td>
                </tr>';
    }


    function bill_chi_tiet($listbill){
        global $img_path;
        $tong = 0;
        $i = 0;
        echo '<tr>
                        <th>Img</th>
                        <th>Sản phẩm</th>
                        <th>Đơn giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                    </tr>';
            if(!empty($listbill)) {
                foreach($listbill as $cart){
                $hinh = $img_path.$cart['img'];
                $tong += $cart['price'] *$cart['soluong'];
                echo '<tr>
                        <td><img src="'.$hinh.'" alt="" height="80px"></td>
                        <td>'.$cart['name'].'</td>
                        <td>'.number_format($cart['price']).' <u style="color: crimson;">₫</u></td>
                        <td>'.$cart['soluong'].'</td>
                        <td>'.number_format($cart['thanhtien']).' <u style="color: crimson;">₫</u></td>
                     </tr>';

                $i += 1;
                }
                echo '<tr>
                            <td colspan = "4">Tổng đơn hàng</td>
                            <td>'.number_format($tong).' <u style="color: crimson;">₫</u></td>
                        </tr>';
            }
    }



    function tongdonhang(){
        $tong = 0;
        foreach($_SESSION['mycart'] as $cart){
            $ttien = $cart[3] * $cart[4];
            $tong += $ttien;
        }
        return $tong;
    }
 

    function insert_bill($iduser,$name,$email,$address,$tel,$pttt,$ngaydathang,$tongdonhang){
        $sql = "INSERT INTO bill (iduser,bill_name,bill_email,bill_address,bill_tel,bill_pttt,ngaydathang,total) values ('$iduser','$name','$email','$address','$tel','$pttt','$ngaydathang','$tongdonhang')";
       
        return pdo_execute_return_lastInsertId($sql);
    }

    function insert_cart($iduser,$idpro,$img,$name,$price,$soluong,$thanhtien,$idbill){
        $sql = "INSERT INTO cart (iduser,idpro,img,name,price,soluong,thanhtien,idbill) values ('$iduser','$idpro','$img','$name','$price','$soluong','$thanhtien','$idbill')";
        return pdo_execute($sql);
    }
    
    function loadone_bill($id){
        $sql="SELECT * FROM bill where id=".$id;
        $bill=pdo_query_one($sql);
        return $bill;
    }

    function loadall_cart($idbill){
        $sql = "SELECT * FROM cart where idbill=".$idbill;
        $bill = pdo_query($sql);
        return $bill;
    }

    function loadall_cart_count($idbill){
        $sql = "SELECT * FROM cart where idbill=".$idbill;
        $bill = pdo_query($sql);
        return sizeof($bill);
    }

    function loadall_bill($kyw="",$iduser=0){
        $sql="SELECT * FROM bill where 1";
        if($iduser>0) $sql.=" AND iduser=".$iduser;
        if($kyw!="") $sql.=" AND id like '%=".$kyw."%'";
        $sql.=" ORDER BY id DESC";
        $listbill = pdo_query($sql);
        return $listbill;
    }


    function bill_get_by_id($id){
        $sql= "SELECT * FROM bill WHERE id = ".$id;
        return pdo_query_one($sql);
    }

    function update_bill($bill_name, $bill_price, $countsp, $total, $listbill, $ttdh, $ngaydathang, $id) {
        if($listbill!=""){
            $sql= "UPDATE sanpham SET `bill_name`= '$bill_name',`bill_price`= '$bill_price',`countsp`='$countsp',`total`='$total', `listbill`='$listbill',`ttdh`='$ttdh',`ngaydathang`='$ngaydathang' where `id` = '$id'";
        }else{
            $sql = "UPDATE sanpham SET `bill_name`= '$bill_name',`bill_price`= '$bill_price',`countsp`='$countsp',`total`='$total', `listbill`='$listbill',`ttdh`='$ttdh',`ngaydathang`='$ngaydathang' where `id` = '$id'";
        }
        pdo_execute($sql);
    }


    function delete_bill($id){
        $sql= "DELETE FROM bill WHERE id =".$id;
        pdo_execute($sql); 
    }

    function get_ttdh($n){
        switch ($n) {
            case '0':
                $tt = "Đơn hàng mới";
                break;
            case '1':
                $tt = "Đang xử lý";
                break;
            case '2':
                $tt = "Đang giao hàng";
                break;
            case '3':
                $tt = "Hoàn tất";
                break;
            
            default:
                $tt = "Đơn hàng mới";
                break;
        }
        return $tt;
    }

    
 ?>

            