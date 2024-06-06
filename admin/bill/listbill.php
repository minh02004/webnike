
        
        <div class="row">
            <div class="row form_title">
                <h1>DANH SÁCH ĐƠN HÀNG</h1>
            </div>
            <form action="" method="POST" style="border-left: 1px #ccc solid; border-right: 1px #ccc solid;">
                <input type="text" name ="kyw" placeholder="nhập vào tên khách hàng..." style="padding: 0px 3px;">
                    <select name="listbill" id="">
                    <option value="0" selected>-Tất cả-</option>
                    <?php
                            foreach($listbill as $bill){
                                extract($bill);
                                echo '<option value="'.$bill['id'].'">'.$bill['bill_name'].'</option>';
                            }
                        ?>
                </select>
                <input type="submit" name="listok" value="Search">
            </form>
                
            <div class="row boxcontent form_account form_dslh">
                
                <table>
                    <tr>
                        <th width="3%"></th>
                        <th>Mã đơn hàng</th>
                        <th>Khách hàng</th>
                        <th>Số lượng hàng</th>
                        <th>Giá trị đơn hàng</th>
                        <th>Tình trạng đơn hàng</th>
                        <th>Ngày đặt hàng</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                    <?php
                        foreach ($listbill as $bill) {
                            extract($bill);
                            $kh = $bill["bill_name"].'
                                <br>'.$bill["bill_email"].'
                                <br>'.$bill["bill_address"].'
                                <br>'.$bill["bill_tel"];
                            $ttdh = get_ttdh($bill['bill_status']);
                            $countsp = loadall_cart_count($bill['id']);
                            echo '<tr>
                                    <td><input type="checkbox" name="" id=""></td>
                                    <td>'.$bill['id'].'</td>
                                    <td style="text-align: left; padding-left: 10px;">'.$kh.'</td>
                                    <td>'.$countsp.'</td>
                                    <td>'.$bill['total'].'</td>
                                    <td>'.$ttdh.'</td>
                                    <td>'.$bill['ngaydathang'].'</td>
                                    <td>
                                        <a href="index.php?act=suabill&id='.$bill['id'].'"><input type="button" value="Sửa"></a>
                                    </td>
                                    <td>
                                        <a href="index.php?act=xoabill&id='.$bill['id'].'"><input type="button" value="Xóa"></a>
                                    </td>
                                </tr>';
                        }
                    ?>
                    
                </table>
            </div>
            <br>
            <div class="row mb10 box_button" style="display: block; text-align: left;">
                <input type="button" value="CHỌN TẤT CẢ">
                <input type="button" value="BỎ CHỌN TẤT CẢ">
                <!-- <a href="index.php?act=addsp"><input type="button" value="NHẬP THÊM"></a> -->
            </div>
        </div>