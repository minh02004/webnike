
        
        <div class="row">
            <div class="row form_title">
                <h1>DANH SÁCH BÌNH LUẬN</h1>
            </div>
            <div class="row boxcontent form_account form_dslh">
                <table>
                <tr>
                    <th></th>
                    <th>ID</th>
                    <th>Nội dung</th>
                    <th>user</th>
                    <th>IDpro</th>
                    <th>Ngày bình luận</th>
                    <th style="width: 11%;">Chức năng</th>
                </tr>
                <?php
                
                foreach ($listbl as $bl) {
                    extract($bl);
                    $suabl="index.php?act=suabl&id=".$id;
                    $xoabl="index.php?act=xoabl&id=".$id;
                    echo '<tr>
                                <td><input type="checkbox" name="" id=""></td>
                                <td>' . $id . '</td>
                                <td>' . $noidung . '</td>
                                <td>' . $idpro . '</td>
                                <td>' . $iduser . '</td>
                                <td>' . $ngaybinhluan . '</td>
                                <td>
                                <a href="'.$xoabl.'"><input type="button" value="Xóa"></a>
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