
<div class="mb flgap30">

            <div class="boxleft">
                 <div class="banner">
                  <div class="box_title">Giỏ hàng</div>
                  <div class="row boxcontent form_account form_dslh">
                        <div class="row boxcontent cart">
                            <table>
                                <?php
                                    viewcart(1);
                                ?>

                            </table>
                        </div>
                      
                  </div>
                  <div class="row mb bill_vc" style="text-align:left; margin-top: 10px; padding: 0 0 0 2px;">
                            
                            <a href="index.php?act=bill"><input type="button" value="Tiếp tục đặt hàng"></a>
                            <a href="index.php?act=delcart"><input type="button" value="Xóa giỏ hàng"></a>  
                        </div>
                 </div>
           
            
            </div>
            <?php
                include "view/boxright.php";
            ?>