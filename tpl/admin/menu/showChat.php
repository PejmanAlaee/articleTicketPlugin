<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body dir="rtl" style="background-color:#ECEFF1; text-align: right;">
    <div style="text-align: center; margin:10px 0px ; font-size: 20px;">
        <h4 style="align-items: center;">پیام افراد
        </h4>
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

    <?php $flag = 1; ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <div style="margin: 20px 0px;">
                        <form action="" method="post">
                            <input type="text" name="search" style="width: 150px; height: 1px;">
                            <input type="submit" class="button" name="saveSearch" value="جست و جو" />
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 " style="padding: 20px;margin-top:20px ;">
                <div>
                    <table class="table table-hover table-sm  tableStyle">
                        <thead class="bgThead">
                            <tr style="font-size:10.5px ;">
                                <th scope="col">فرستنده </th>
                                <th scope="col">زمان ارسال </th>
                                <th scope="col">تاریخ</th>
                                <th scope="col">پیام</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $idCounter = 1; ?>
                            <?php $pageSection = 1; ?>
                            
                            <?php $setCounterSection  = 0; ?>
                     
                            <?php foreach (array_reverse($samples) as $sample) : ?>
                                <?php if (isset($_GET['pinInfo'])) {
                                    $pageSection =  $_GET['pinInfo'];
                                } ?>
                                <?php if (($sample->id == $_GET['idPage'])) { ?>
                                    <?php foreach (array_reverse($chatPerson) as $chat) : ?>

                                        <?php if ((int)$chat->receiver == (int)$sample->id) {
                                            $setCounter += 1;
                                            if (isset($_GET['pageSection'])) {
                                                $page =  $_GET['pageSection'];
                                                if ($setCounter >= (($pageSection - 1) * 3) && $setCounter <= (3 * $pageSection) - 1) {
                                                    if ($f == 0) {
                                                        $f = 1;
                                                        foreach (array_reverse($chatPerson) as $sam2) :
                                                            if ((int)$sam2->receiver == $_GET['idPage']) {
                                                                $counterAll =  $counterAll + 1;
                                                                $flagTwo  = 1;
                                                            }
                                                        endforeach;

                                                        $vl =  $counterAll + 1;
                                                        $value = $vl;
                                                        $counterAll = 0;
                                                        $countOfPage = ceil($value / 5);
                                                    
                                                    } ?>
                                                    <tr style="font-size:10.5px ;">
                                                        <td class="border border-white-50"><?php echo $chat->sender_type; ?></td>
                                                        <td class="border border-white-50"><?php echo $chat->timeSender; ?></td>
                                                        <td class="border border-white-50"><?php echo $chat->History; ?></td>
                                                        <td class="border border-white-50"><?php echo $chat->text; ?> </td>
                                                    <?php } ?>
                                                    </tr>
                                        <?php }
                                        }
                                    endforeach;  ?>
                                        <?php if ($setCounter <= (5 * $page) - 1) {
                                        ?>
                                            <tr style="font-size:10.5px ;">
                                                <td class="border border-white-50">User</td>
                                                <td class="border border-white-50"><?php echo $sample->t; ?></td>
                                                <td class="border border-white-50"><?php echo $sample->cd; ?></td>
                                                <td class="border border-white-50"><?php echo $sample->msg; ?> </td>
                                            </tr>
                                            <tr>
                                            <tr>
                                                <td>
                                                </td>
                                            </tr>
                                            </tr>
                                <?php }
                                        $setCounter = 0;
                                    }
                                endforeach; ?>
                        </tbody>
                    </table>

                </div>
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
                                    <li class=" page-item"> <a class=" page-link" style=" text-decoration: none;" href="<?php echo add_query_arg(['pinInfo' => $a + 1]) ?>"> <?php echo $a + 1 ?></a>
                                    </li>
                                    <?php if ($countOfPage > 2) { ?>
                                        <li class=" page-item"> <a class=" page-link" style="text-decoration: none;" href="<?php echo add_query_arg(['pinInfo' => $a]) ?>"> <?php echo $a  ?></a>
                                        </li>
                                    <?php } ?>
                                    <?php if ($countOfPage > 3) { ?>
                                        <li class=" page-item"> <a class=" page-link" style="text-decoration: none;" href="<?php echo add_query_arg(['pinInfo' => $a - 1]) ?>"> <?php echo $a - 1 ?></a>
                                        </li>
                                    <?php } ?>

                                    <?php if ($countOfPage > 4) {
                                    ?>
                                        <li class="page-item"> <span class="sm page-link" style="text-decoration: none;">...</span>
                                        </li>
                                    <?php } ?>


                                <?php } elseif ($page == 1 && $a == 0) { ?>
                                    <?php if ($countOfPage > 4) {
                                    ?>
                                        <li class="page-item"> <span class="sm page-link" style="text-decoration: none;">...</span>
                                        </li>
                                    <?php } ?>


                                    <?php if ($a + 3 < $countOfPage) { ?>
                                        <li class=" page-item"> <a class=" page-link" style="text-decoration: none;" href="<?php echo add_query_arg(['pinInfo' => $a + 3]) ?>"> <?php echo $a + 3 ?></a>
                                        <?php } ?>

                                        </li>
                                        <?php if ($a + 2 < $countOfPage) { ?>
                                            <li class=" page-item"> <a class=" page-link" style="text-decoration: none;" href="<?php echo add_query_arg(['pinInfo' => $a + 2]) ?>"> <?php echo $a + 2 ?></a>
                                            <?php } ?>

                                            </li>
                                            <li class=" page-item"> <a class=" page-link" style="text-decoration: none;" href="<?php echo add_query_arg(['pinInfo' => $a + 1]) ?>"> <?php echo $a + 1 ?></a>

                                            </li>


                                        <?php } else { ?>

                                            <?php if ($a == $countOfPage - 1 && $a + 1 !=  $page) {  ?>

                                                <li class=" page-item"> <a class=" page-link" style=" text-decoration: none;" href="<?php echo add_query_arg(['pinInfo' => $a + 1]) ?>"> <?php echo $a + 1 ?></a>

                                                </li>

                                            <?php } ?>
                                            <?php if ($a == 0) { ?>
                                                <li class=" page-item"> <a class=" page-link" style=" text-decoration: none;" href="<?php echo add_query_arg(['pinInfo' => $a + 1]) ?>"> <?php echo $a + 1 ?></a>

                                                </li>

                                            <?php } ?>
                                            <?php if ($page == $a + 1) { ?>
                                                <?php if ($countOfPage - $pageSection > 2) { ?>
                                                    <li class="page-item"> <span class="sm page-link" style="text-decoration: none;">...</span>
                                                    </li>
                                                <?php }  ?>


                                                <?php if ($a + 2 != $countOfPage) { ?>

                                                    <li class=" page-item"> <a class=" page-link" style="text-decoration: none;" href="<?php echo add_query_arg(['pinInfo' => $a + 2]) ?>"> <?php echo $a + 2 ?></a>

                                                    </li>

                                                <?php } ?>


                                                <li class=" page-item"> <a class=" page-link" style="text-decoration: none;" href="<?php echo add_query_arg(['pinInfo' => $a + 1]) ?>"> <?php echo $a + 1 ?></a>

                                                </li>

                                                <?php if ($a != 1) { ?>


                                                    <li class=" page-item"> <a class=" page-link" style="text-decoration: none;" href="<?php echo add_query_arg(['pinInfo' => $a]) ?>"> <?php echo $a  ?></a>
                                                    </li>

                                                    <?php if ($page > 3) { ?>
                                                        <li class="page-item"> <span class="sm page-link" style="text-decoration: none;">...</span>
                                                        </li>
                                                    <?php }  ?>

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
        <div class="row">
            <div class="col-md-12">
                <div style="display:flex ; margin-top: 40px;">
                    <?php foreach (array_reverse($samples) as $sample) : ?>
                        <?php if (($sample->id == $_GET['idPage'])) { ?>
                            <?php if ($sample->conditionType == " باز است") { ?>
                                <span style="justify-content: flex-end;border: 2px dotted gray; align-items: center; padding-top: 20px; padding-right:10px; padding-left: 10px;">
                                    <a style="text-decoration: none;text-align: center;" href="<?php echo add_query_arg(['send' => 'sendMessage', 'id' => $sample->id]) ?>"><span class="dashicons dashicons-admin-comments"></span>ارسال پیام</a>
                                </span>
                                <span style="justify-content: flex-start; margin-right: 40px; border: 2px dotted gray; padding: 16px;">
                                    <form action="" method="post">
                                        <input type="submit" class="button" value="بستن تیکت" name="closeTicket" />
                                    </form>
                                </span> <?php
                                    } else if ($sample->conditionType == "بسته است") {
                                        ?>
                                <div style="  display: flex; justify-content: center; align-items: center ; width: 1500px;">
                                    <span style="margin:0px 10px;border: 2px solid #FFAB91; padding: 20px;">
                                        تیکت بسته شده است</span>
                                </div>
                    <?php   }
                                }
                            endforeach; ?>
                </div>


            </div>
        </div>
    </div>
    <style>
        .tableStyle {
            background-color: #FAFAFA;
        }

        .bgThead {
            background-color: #B0BEC5;
        }

        body {
            overflow-x: hidden;
        }
    </style>
    <script>
        const next = document.querySelector('.nextPage');
        const previousPage = document.querySelector('.previousPage');
        const li = document.querySelectorAll('.a');
        let page = <?php echo $pageSection ?>;
        let countOfPage = <?php echo $countOfPageSection ?>;


        next.addEventListener('click', function HandelerCell(event) {

            if (page < countOfPage) {
                next.href = "<?php echo add_query_arg(['pinInfo' =>  $pageSection + 1]) ?>";

            }


        });
        previousPage.addEventListener('click', function HandelerCell(event) {
            if (page > 1) {
                previousPage.href = "<?php echo add_query_arg(['pinInfo' =>  $pageSection - 1]) ?>";

            }

        });
    </script>


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

</body>