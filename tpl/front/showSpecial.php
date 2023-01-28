<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

    <div class="container setArticlee"style="box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 6px -1px, rgba(0, 0, 0, 0.06) 0px 2px 4px -1px;">
        <nav class="navbar navbar-expand-lg navbar-light "style="background-color: #455A64 ; height: 100px ; border-radius: 10px; border:1px solid #3d5a5d">
            <a class="navbar-brand text-decoration-none text-white" style="background-color: #78909C ; padding: 2px 20px ; border-radius: 4px">ثبت تیکت</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="nav">
                <ul class=" navbar-nav mr-auto">
                    <li class="nav-item liStyle">
                        <div style="text-align: center; align-items: center; ">
                            <a style=" text-decoration: none; " href="/">
                                <span style=" margin-top: 60px; font-family: bNazanin; color:white; font-family:bNazanin ; "> صفحه اصلی
                                </span>
                            </a>
                        </div>
                    </li>

                </ul>
            </div>
        </nav>
        <?php $counterAll = 0;
        $m = 0;
        ?>
        <?php $arrr = [];
        $numberOfTicket = 0;
        $counterTenShow = 1;
        $value = 0;
        $page = 1;
        $flag = 0;
        $vl = 0;
        $setCounter = 0;
        $countOfPage = 0;
        $f = 0;
        $flagTwo = 0;
        $counterAll  = 0;
        ?>

        <div class="container bg-light" style="padding: 40px;">
            <div class="row">
                <div class="col-md-12">
                    <?php foreach (array_reverse($userTable) as $sample) : ?>
                        <?php if ($sample->CEmail == $userCurrentEmail) { ?>
                            <?php if ($sample->id == $idSenderUse) {
                            ?>
                                <div class="card " style="width: auto; height: 150px; margin-top: 10px; margin-right:40px ;">
                                    <div style="display:flex;">
                                        <?php if ($sample->conditionType == "بسته است") {  ?>
                                            <div style=" border-radius:6px; margin:20px;margin-top:36px ; text-align: right; background-color:#F44336 ;padding: 4px;">
                                                <a style="text-decoration: none; " id=" buttonHome">
                                                    <span style="color:white; size: 80px;padding:4px 8px;  font-family:bNazanin ; "> بسته شده
                                                    </span>
                                                </a>
                                            </div>
                                        <?php } else { ?>
                                            <div style="text-align: center; border: 1px solid;border-radius:4px; margin-right:20px; margin-bottom:20px;margin-top:37px ; text-align: right;">
                                                <a style=" text-decoration: none;" href="<?php echo add_query_arg(['action' => 'answerAgain', 'id' => $sample->id]) ?> " id=" buttonHome">
                                                    <span style="color:gray; size: 80px; padding:4px 8px; font-family:bNazanin ; "> پاسخ
                                                    </span>
                                                </a>
                                            </div>
                                            <div style=" border-radius:6px; margin:20px;margin-top:36px ; text-align: right; background-color:#66BB6A ;padding: 4px;">
                                                <a style="text-decoration: none; " id=" buttonHome">
                                                    <span style="color:white; size: 80px;padding:4px 8px;  font-family:bNazanin ; "> باز است
                                                    </span>
                                                </a>
                                            </div>

                                        <?php } ?>
                                        <div style="margin-right:2px; margin-bottom:20px;margin-top:44px ;font-family:bNazanin;">
                                            <h5>مشاهده تیکت #<?php echo $sample->id ?></h5>
                                        </div>

                                    </div>
                                    <div class="card-body " style="margin-bottom: 20px;">
                                        <p class="card-text" style="text-align:right; margin-bottom: 8px;  font-family:bNazanin ; font-size: 14px; ">موضوع : <span class="font-weight-bold"><?php echo $sample->inputAddress ?></span></p>
                                    </div>
                                </div>
                                <?php
                                $numberOfTicket = 0;
                                ?>
                                <?php $counterTenShow = 1;
                                $value = 0;
                                $page = 1;
                                $flag = 0;
                                $vl = 0;
                                $setCounter = 0;
                                $countOfPage = 0;
                                $f = 0;
                                $flagTwo = 0;
                                $counterAll  = 0;
                                ?>
                                <?php
                                ?>
                                <?php foreach (array_reverse($chatTable) as  $key => $sam) : ?>
                                    <?php if ((int)$sam->receiver == (int)$sample->id) {
                                        $setCounter += 1;
                                        if (isset($_GET['section'])) {
                                            $page =  $_GET['section'];
                                            if ($setCounter >= (($page - 1) * 3) && $setCounter <= (3 * $page) - 1) {
                                                if ($f == 0) {
                                                    $f = 1;
                                                    foreach (array_reverse($chatTable) as $sam2) :
                                                        if ((int)$sam2->receiver == (int)$sample->id) {
                                                            $counterAll =  $counterAll + 1;
                                                            $flagTwo  = 1;
                                                        }
                                                    endforeach;
                                                    if ($flagTwo == 0) {
                                                        $counterAll =  $counterAll + 1;
                                                    }
                                                    $vl =  $counterAll + 1;
                                                    $value = $vl;
                                                    $counterAll = 0;
                                                    $countOfPage = ceil($value / 3);
                                                }
                                    ?>
                                                <?php
                                                if ($sam->sender_type == 'Admin') { ?>

                                                    <div class="sender" style="margin-top:6px;">
                                                        <h6 style="font-family: vazir;font-weight: 900; color: #90A4AE; text-align:right; margin-right: 40px; padding-top:20px; padding-right: 10px; font-size: 12px;"><span class="boxShow" style="margin-left:6px;">اپراتور</span>ارسال شده توسط : <?php echo $sam->sender_type ?> در <span><?php echo $sam->History ?></span> <span><?php echo $sam->timeSender ?></span></h6>
                                                    </div>
                                                    <div class="card " style="width: auto; height: auto; margin-top: 10px; margin-right:40px;">
                                                        <div class="card-body">
                                                            <p class="card-text" style=" text-align:right; font-family:bNazanin ;"><?php echo  $sam->text ?></p>
                                                        </div>
                                                    </div>
                                                <?php

                                                } elseif ($sam->sender_type == 'User') {

                                                ?>
                                                    <div class="sender " style="margin-top:6px;">
                                                        <h6 style="font-family: bNazanin;font-weight: 900; color: #90A4AE; text-align:right; margin-right: 40px; padding-top:20px; padding-right: 10px; font-size: 13px;"><span class="boxShowUser" style="margin-left:6px; ">مالک</span>ارسال شده توسط : <?php echo  $sample->name  ?> در <span><?php echo $sam->History ?></span> <span><?php echo $sam->timeSender ?></span></h6>
                                                    </div>
                                                    <div class="card " style="width: auto; height: auto; margin-top: 10px; margin-right:40px ;">
                                                        <div class="card-body">
                                                            <p class="card-text" style="text-align:right; font-family:bNazanin ;"><?php echo $sam->text ?></p>
                                                        </div>
                                                    </div>
                                    <?php
                                                }
                                            }
                                            $flag = 0;
                                            $vl = 0;
                                        }
                                    }
                                    ?>

                                <?php endforeach;
                                ?>
                                <?php if ($setCounter <= (7 * $page) - 1) {
                                ?>
                                    <div class="sender" style="margin-top:6px;">
                                        <h6 style="font-family: bNazanin;font-weight: 900; color: #90A4AE; text-align:right; margin-right: 40px; padding-top:20px; padding-right: 10px; font-size: 13px;"><span class="boxShowUser" style="margin-left:6px;">مالک</span>ارسال شده توسط : <?php echo $sample->name ?> در <span><?php echo $sample->cd ?></span> <span><?php echo $sample->t ?></span></h6>
                                    </div>
                                    <div class="card " style="width: auto; height: auto; margin-top: 10px; margin-right:40px ;">
                                        <div class="card-body">
                                            <p class="card-text" style="text-align:right; font-family:bNazanin ;"><?php echo $sample->msg ?></p>
                                        </div>
                                    </div>
                            <?PHP $counterTenShow = $counterTenShow + 1;
                                    $setCounter = 0;
                                }
                            }
                            ?>
                        <?php }
                        ?>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div style="margin-top: 50px;">
                        <nav aria-label="Page navigation  example">
                            <ul class="pagination justify-content-center">
                                <li class="page-item">
                                    <a class="nextPage page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <?php
                                for ($a = $countOfPage - 1; $a >= 0; $a--) { ?>

                                    <?php if ($page == $countOfPage && $page == $a + 1) { ?>
                                        <li class="a page-item"> <a class=" page-link" style="background-color: #FFFDE7; text-decoration: none;" href="<?php echo add_query_arg(['section' => $a + 1]) ?>"> <?php echo $a + 1 ?></a>
                                        </li>
                                        <?php if ($countOfPage > 2) { ?>
                                            <li class="a page-item"> <a class=" page-link" style="text-decoration: none;" href="<?php echo add_query_arg(['section' => $a]) ?>"> <?php echo $a  ?></a>
                                            </li>
                                        <?php } ?>
                                        <?php if ($countOfPage > 3) { ?>
                                            <li class="a page-item"> <a class=" page-link" style="text-decoration: none;" href="<?php echo add_query_arg(['section' => $a - 1]) ?>"> <?php echo $a - 1 ?></a>
                                            </li>
                                        <?php } ?>

                                    <?php } elseif ($page == 1 && $a == 0) { ?>
                                        <?php if ($a + 3 < $countOfPage) { ?>
                                            <li class="a page-item"> <a class=" page-link" style="text-decoration: none;" href="<?php echo add_query_arg(['section' => $a + 3]) ?>"> <?php echo $a + 3 ?></a>
                                            <?php } ?>

                                            </li>
                                            <?php if ($a + 2 < $countOfPage) { ?>
                                                <li class="a page-item"> <a class=" page-link" style="text-decoration: none;" href="<?php echo add_query_arg(['section' => $a + 2]) ?>"> <?php echo $a + 2 ?></a>
                                                <?php } ?>

                                                </li>
                                                <li class="a page-item"> <a class=" page-link" style="background-color: #FFFDE7;  text-decoration: none;" href="<?php echo add_query_arg(['section' => $a + 1]) ?>"> <?php echo $a + 1 ?></a>

                                                </li>


                                            <?php } else { ?>

                                                <?php if ($a == $countOfPage - 1 && $a + 1 !=  $page) {  ?>

                                                    <li class="a page-item"> <a class=" page-link" style="background-color: #FFFDE7; text-decoration: none;" href="<?php echo add_query_arg(['section' => $a + 1]) ?>"> <?php echo $a + 1 ?></a>

                                                    </li>

                                                <?php } ?>
                                                <?php if ($a == 0) { ?>
                                                    <li class="a page-item"> <a class=" page-link" style="background-color: #FFFDE7; text-decoration: none;" href="<?php echo add_query_arg(['section' => $a + 1]) ?>"> <?php echo $a + 1 ?></a>

                                                    </li>

                                                <?php } ?>
                                                <?php if ($page == $a + 1) { ?>
                                                    <?php if ($a + 2 != $countOfPage) { ?>

                                                        <li class="a page-item"> <a class=" page-link" style="text-decoration: none;" href="<?php echo add_query_arg(['section' => $a + 2]) ?>"> <?php echo $a + 2 ?></a>

                                                        </li>

                                                    <?php } ?>

                                                    <li class="a page-item"> <a class=" page-link" style="text-decoration: none;" href="<?php echo add_query_arg(['section' => $a + 1]) ?>"> <?php echo $a + 1 ?></a>

                                                    </li>

                                                    <?php if ($a != 1) { ?>


                                                        <li class="a page-item"> <a class=" page-link" style="text-decoration: none;" href="<?php echo add_query_arg(['section' => $a]) ?>"> <?php echo $a  ?></a>
                                                        </li>

                                                    <?php } ?>
                                                <?php } ?>
                                            <?php } ?>
                                        <?php } ?>
                                        <li class="page-item">
                                            <a class="previousPage page-link" href="#" aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </li>
                            </ul>
                        </nav>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <style>
         body {
            overflow-x: hidden;
            
        }
    </style>


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <script>
      
        function fncHomee() {
            window.location.href = "/";
        }

        const next = document.querySelector('.nextPage');
        const previousPage = document.querySelector('.previousPage');
        const li = document.querySelectorAll('.a');
        let page = <?php echo $page ?>;
        let countOfPage = <?php echo $countOfPage ?>;

        next.addEventListener('click', function HandelerCell(event) {

            if (page < countOfPage) {
                next.href = "<?php echo add_query_arg(['section' =>  $page + 1]) ?>";

            }


        });
        previousPage.addEventListener('click', function HandelerCell(event) {
            if (page > 1) {
                previousPage.href = "<?php echo add_query_arg(['section' =>  $page - 1]) ?>";

            }

        });

    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->

</html>