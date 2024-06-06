<?php
    if(is_array($sanpham)){
        extract($sanpham);
    }
    $hinhpath="../img/".$img;
    if(is_file($hinhpath)){
        $imgTag= "<img src ='".$hinhpath."' width = 100 height = 100>";
    }else{
        $imgTag = "Không có hình minh họa";
    }
?>

<div class="row">
            <div class="row form_title">
                <h1>CẬP NHẬT HÀNG HÓA</h1>
            </div>
            <div class="row box_content form_account">
            <form action="index.php?act=updatesp" method="POST" enctype="multipart/form-data">
                    <input name="id" type="hidden" value="<?=$id?>">
                    <div class="row2 mb10 form_content_container">
                        <label style="color: #c72092;"> Danh mục</label> <br>
                        <select name="iddm" id="">
                        <?php
                            foreach($listdm as $key => $value){
                                
                                if($iddm==$id){
                                    echo '<option value="'.$value['id'].'" selected>'.$value['name'].'</option>';
                                }else{
                                    echo '<option value="'.$value['id'].'">'.$value['name'].'</option>';
                                }
                                
                            }

                        ?>
                        </select>
                    </div>
           <p class="mb10" style="color: #c72092; float:left">
                    Tên sản phẩm</p>
                    <input type="text" name="name" placeholder="nhập vào tên sản phẩm" value="<?=$name?>">

                    <p class="mb10" style="color: #c72092; float:left">
                    Giá</p>
                    <input type="text" name="price" placeholder="nhập vào giá" value="<?=$price?>">

                    <div class="row2 mb10">
                        <label style="color: #c72092;">Ảnh</label> <br>
                        <input type="file" name="img">
                        <?php echo $imgTag ?>
                    </div>
                    <label style="color: #c72092;">Mô tả</label> <br>
                    <textarea name="mota" id="" cols="30" rows="10" style="padding: 5px;" value="<?=$mota?>"></textarea>

                    <div class="row mb10" style="display: block; text-align: left;">
                        <input type="submit" name="updatesp" value="CẬP NHẬT">
                        <input type="reset" value="NHẬP LẠI">
                        <a href="index.php?act=listsp"><input type="button" value="DANH SÁCH"></a>
                    </div>
                </form>
            </div>
        </div>