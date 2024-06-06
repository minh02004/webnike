<div class="mb flgap30">

    <div class="boxleft">
        <div class="banner">
            <?php
            extract($onesp);
            ?>
            <div class="box-title">
                <form action="index.php?act=addtocart" method="POST" class="title">
                    <div class="name"><?= $name ?></div>
                    <p><a href="index.php?act=addtocart"><i class="fa-solid fa-cart-plus"></i></a></p>
                    </div>
                </form>
            <div class="box_content form_product">
                <?php
                extract($onesp);
                echo '<img src="img/' . $img . '" alt="" width="60%" height="430px"><br>';
                echo '<h3 style="text-align:left;">Mô tả: </h3>';
                echo "<p class='description_content'>$mota</p>";
                ?>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                $("#binhluan").load("view/binhluan/binhluanform.php", {
                    idpro: <?= $id ?>
                });
            });
        </script>
        <br>

        <div class="banner">
            <div class="box_title">Bình luận</div>
            <div class="box_content form_product">
                <div class="boxbinhluan" id="binhluan"></div>
            </div>
            
        </div><br>

        <div class="banner">
            <div class="box_title">Sản phẩm cùng loại</div>
            <div class="box_content form_product" style="text-align:left;">
                <?php
                foreach ($spcl as $item) {
                    extract($item);
                    $linksp = "index.php?act=sanphamct&id=" . $id;
                    echo '<li><a href="' . $linksp . '">' . $name . '</a></li>';
                }
                ?>
            </div>
        </div><br>


    </div>
    <?php
    include "view/boxright.php";
    ?>
<!-- </div> -->