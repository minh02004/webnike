
        
        <div class="row">
            <div class="row form_title">
                <h1>DANH SÁCH HÀNG HÓA</h1>
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
                        <th width="3%"></th>
                        <th>Mã sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Hình ảnh</th>
                        <th>Mô tả</th>
                        <th>Danh mục</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                    <?php
                        foreach($listSanPham as $item){
                            extract($item);
                            echo '<tr>
                                <td><input type="checkbox" name="" id=""></td>
                                <td>'.$id.'</td>
                                <td>'.$name.'</td>
                                <td>'.number_format($price).' <u style="color: crimson;">₫</u></td>
                                <td><img src="../img/'.$img.'" width="100" height="100"></td>
                                <td>'.$mota.'</td>
                                <td>'.$iddm.'</td>
                                <td>
                                    <a href="index.php?act=suasp&id='.$id.'"><input type="button" value="Sửa"></a>
                                </td>
                                <td>
                                    <a href="index.php?act=xoasp&id='.$id.'"><input type="button" value="Xóa"></a>
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
                <a href="index.php?act=addsp"><input type="button" value="NHẬP THÊM"></a>
            </div>
        </div>