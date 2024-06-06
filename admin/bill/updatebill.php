<?php
    if(isset($bill) && (is_array($bill))){
        extract($bill);
    }else{
        echo "Không thể truy cập mảng";
    }
?>

<div class="row">
            <div class="row form_title">
                <h1>CẬP NHẬT ĐƠN HÀNG</h1>
            </div>
            <div class="row box_content form_account">
            <form action="index.php?act=updatesp" method="POST" enctype="multipart/form-data">
                    <input name="id" type="hidden" value="<?=$bill['id']?>">
                    <div class="row2 mb10 form_content_container">
                        <label style="color: #c72092;"> Danh mục</label> <br>
                        <select name="listbill" id="">
                        <?php
                            foreach($listbill as $bill){
                                $ttdh = get_ttdh($bill['bill_status']);
                                $countsp = loadall_cart_count($bill['id']);
                                if($listbill==$bill){
                                    echo '<option value="'.$bill['id'].'" selected>'.$bill['bill_name'].'</option>';
                                }else{
                                    echo '<option value="'.$bill['id'].'">'.$bill['bill_name'].'</option>';
                                }
                                
                            }

                        ?>
                        </select>
                    </div>
                    <p class="mb10" style="color: #c72092; float:left">
                    Mã đơn hàng</p>
                    <input type="text" name="id" value="<?=$bill['id']?>">

                    <p class="mb10" style="color: #c72092; float:left">
                    Tên khách hàng</p>
                    <input type="text" name="bill_name" value="<?=$bill['bill_name']?>">
                    
                    <p class="mb10" style="color: #c72092; float:left">
                    Số lượng hàng</p>
                    <input type="text" name="countsp" value="<?=$countsp?>">

                    <p class="mb10" style="color: #c72092; float:left">
                    Giá</p>
                    <input type="text" name="price" value="<?=$bill['total']?>">

                    <p class="mb10" style="color: #c72092; float:left">
                    Tình trạng đơn hàng</p>
                    <input type="text" name="ttdh" value="<?=$ttdh?>">

                    <p class="mb10" style="color: #c72092; float:left">
                    Ngày đặt hàng</p><br>
                    <input type="text" name="ngaydathang" value="<?=$bill['ngaydathang']?>">
                    <input type="date" name="ngaydathang" value="<?=$bill['ngaydathang']?>">
                    <input type="time" name="ngaydathang" value="<?=$bill['ngaydathang']?>">

                    <div class="row mb10" style="display: block; text-align: left;">
                        <input type="submit" name="updatebill" value="CẬP NHẬT">
                        <input type="reset" value="NHẬP LẠI">
                        <a href="index.php?act=listbill"><input type="button" value="DANH SÁCH"></a>
                    </div>
                </form>
            </div>
        </div>
        <br>