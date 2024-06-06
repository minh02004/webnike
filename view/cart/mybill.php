
<div class="mb flgap30">

            <div class="boxleft">
                 <div class="banner">
                  <div class="box_title">Đơn hàng của tôi</div>
                  <div class="row boxcontent form_account form_dslh">
                        <div class="row boxcontent cart">
                            <table>
                                <tr>
                                    <th>Mã đơn hàng</th>
                                    <th>Ngày đặt</th>
                                    <th>Số lượng mặt hàng</th>
                                    <th>Tổng giá trị mặt hàng</th>
                                    <th>Tình trạng đơn hàng</th>
                                </tr>

                                <?php
                                    if(is_array($listbill)){
                                        foreach ($listbill as $bill) {
                                            extract($bill);
                                            $ttdh = get_ttdh($bill['bill_status']);
                                            $countsp = loadall_cart_count($bill['id']);
                                            echo '<tr>
                                                    <td>'.$bill['id'].'</td>
                                                    <td>'.$bill['ngaydathang'].'</td>
                                                    <td>'.$countsp.'</td>
                                                    <td>'.$bill['total'].'</td>
                                                    <td>'.$ttdh .'</td>
                                                </tr>';
                                        }
                                    }
                                ?>

                                

                            </table>
                        </div>
                      
                  </div>
                 </div>
           
            
            </div>
            <?php
                include "view/boxright.php";
            ?>