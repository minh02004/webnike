<div class="row">
    <div class="row frmtitle">
        <h1>DANH SÁCH Đơn hàng</h1>
    </div>
    <div class="row frmcontent">
        <div class="row mb10 frmdsloai">
            <table border="1" class="tablelist formdangky">
                <tr>
                    <th></th>
                    <th>ID đơn hàng</th>
                    <th>user</th>
                    <th>Tên sản phẩm</th>
                    <th>ảnh</th>
                    <th>số lượng</th>
                    <th>Thành tiền</th>
                    <th>ngày đặt hàng</th>
                    <th style="width: 11%;">Chức năng</th>
                </tr>
                <?php
                
                // foreach ($listdonhang as $donhang) {
                //     extract($bl);
                //     $suabl="index.php?act=suabl&id=".$id;
                //     $xoabl="index.php?act=xoabl&id=".$id;
                //     echo '<tr>
                //                 <td><input type="checkbox" name="" id=""></td>
                //                 <td>' . $id . '</td>
                //                 <td>' . $iduser . '</td>
                //                 <td>' . $name . '</td>
                //                 <td>' . $hinh . '</td>
                //                 <td>' . $sl . '</td>
                //                 <td>' . $price . '</td>
                //                 <td>' . $gaydathang . '</td>
                //                 <td>
                //                 <a href="'.$xoabl.'"><input type="button" value="Xóa"></a>
                //             </tr>';
                // }
                // ?>

            </table>
        </div>
        <div class="row mb10 formdangky">
            <input type="button" value="Chọn tất cả">
            <input type="button" value="Bỏ chọn tất cả">
            <input type="button" value="Xóa các mục đã chọn">
            
        </div>
    </div>
</div>