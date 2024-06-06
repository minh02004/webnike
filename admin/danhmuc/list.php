
        
        <div class="row">
            <div class="row form_title">
                <h1>DANH SÁCH LOẠI HÀNG HÓA</h1>
            </div>
            <form action="" method="POST" style="border-left: 1px #ccc solid; border-right: 1px #ccc solid;">
                <input type="text" name = "kyw" placeholder="nhập vào tên sản phẩm..." style="padding: 0px 3px;">
                    <select name="iddm" id="">
                    <option value="0" selected>-Tất cả-</option>
                    <?php
                            foreach($listdm as $item){
                                extract($item);
                                echo '<option value="'.$id.'">'.$name.'</option>';
                            }
                        ?>
                </select>
                <input type="submit" name="listok" value="Search">
            </form>
                
            <div class="row boxcontent form_account form_dslh">
                <table>
                        <tr>
                            <th></th>
                            <th>MÃ LOẠI</th>
                            <th>TÊN LOẠI</th>
                            <th>Sửa | Xóa</th>
                        </tr>
                    <?php
                        foreach($listDanhmuc as $item){
                            extract($item);
                            $suadm = "index.php?act=suadm&id=".$id;
                            $xoadm = "index.php?act=xoadm&id=".$id;
                            echo '<tr>
                                <td><input type="checkbox" name="" id=""></td>
                                <td>'.$id.'</td>
                                <td>'.$name.'</td>
                                <td>
                                <a href="index.php?act=suadm&id='.$id.'"><input type="button" value="Sửa"></a>
                                <a href="index.php?act=xoadm&id='.$id.'" ><input type="button" value="Xóa" disabled ></a>
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
                <a href="index.php?act=adddm"><input type="button" value="NHẬP THÊM"></a>
            </div>
        </div>
