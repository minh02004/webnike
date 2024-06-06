
        
        <div class="row">
            <div class="row form_title">
                <h1>DANH SÁCH TÀI KHOẢN</h1>
            </div>
            <div class="row boxcontent form_account form_dslh">
            <table >
                <tr>
                    <th></th>
                    <th>MÃ TK</th>
                    <th>Tên đăng nhập</th>
                    <th>Mật khẩu</th>
                    <th>Email</th>
                    <th>Địa chỉ</th>
                    <th>Điện thoại</th>
                    <th>Vai trò</th>
                    <th style="width: 11%;">Function</th>
                </tr>
                <?php
                
                foreach ($listtk as $taikhoan) {
                    extract($taikhoan);
                    $suatk="index.php?act=edit_taikhoanad&id=".$id;
                    $xoatk="index.php?act=xoatk&id=".$id;
                    echo '<tr>
                                <td><input type="checkbox" name="" id=""></td>
                                <td>' . $id . '</td>
                                <td>' . $user . '</td>
                                <td>' . $pass . '</td>
                                <td>' . $email . '</td>
                                <td>' . $address . '</td>
                                <td>' . $tel . '</td>
                                <td>' . $role . '</td>
                                <td>
                                <a href="'.$xoatk.'"><input type="button" value="Xóa"></a>
                            </tr>';
                }
                ?>

            </table>
            </div>
            <br>
            <div class="row mb10 box_button" style="display: block; text-align: left;">
                <input type="button" value="CHỌN TẤT CẢ">
                <input type="button" value="BỎ CHỌN TẤT CẢ">
            </div>
        </div>