<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body dir="rtl" style="background-color:#ECEFF1; text-align: right;">
    <div style="text-align: center; margin:10px 0px ; font-size: 20px;">
        <h4 style="align-items: center;font-family:bNazanin">صفحه اصلی </h4>
    </div>
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

            <div class="col-md-12 " style="padding: 20px;">
                <div>
                    <table class="table table-hover table-sm tableStyle">
                        <thead class="bgThead">
                            <tr style="font-size:12px ;font-family:bNazanin">
                                <th scope="col"><span>ردیف</span></th>
                                <th scope="col"><span>نام</span></th>
                                <th scope="col"><span>بخش</span></th>
                                <th scope="col"><span>موضوع</span></th>
                                <th scope="col"><span>وضعیت</span></th>
                                <th scope="col"><span>زمان ارسال</span></th>
                                <th scope="col"><span>بروزرسانی</span></th>
                                <th style="text-align: center;" scope="col"><span>عملیات</span></th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $counterTable = 1; ?>
                            <?php $page = 1; ?>
                            <?php $setCounter  = 0; ?>
                            <?php $countOfTicket = count($samples); ?>
                            <?php $countOfPage = ceil($countOfTicket / 5); ?>
                            <?php foreach (array_reverse($samples) as $key => $sample) : ?>
                                <?php $setCounter += 1; ?>
                                <?php if (isset($_GET['pageSection'])) {
                                    $page =  $_GET['pageSection'];
                                } ?>
                                <?php if ($setCounter >= (($page - 1) * 5) && $setCounter <= (5 * $page) - 1) {
                                ?>
                                    <tr style="font-size:12px ;font-family:bNazanin">
                                        <td><?php echo  $counterTable ?> </td>
                                        <td><?php echo $sample->name; ?> </td>
                                        <td><?php echo $sample->SupportCenter; ?> </td>
                                        <td><?php echo $sample->inputAddress; ?> </td>
                                        <td><?php echo $sample->conditionType; ?></td>
                                        <td><?php echo $sample->t; ?></td>
                                        <td><?php echo $sample->lastEdit; ?> </td>
                                        <th style="text-align: center;" scope="row">
                                            <a href="<?php echo add_query_arg(['action' => 'showChat', 'pageSection' => 1, 'idPage' => $sample->id]) ?>"><span class="dashicons dashicons-admin-comments"></span></a>
                                            <a href="<?php echo add_query_arg(['action' => 'remove', 'item' => $sample->id]) ?>" onclick="return  confirm('ایا از حذف مطمئن هستین ؟')"><span class="dashicons dashicons-trash"></span></a>
                                        </th>
                                    </tr>

                            <?php }
                                $counterTable += 1;
                            endforeach;  ?>

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
                                    <li class="a page-item"> <a class=" page-link" style="text-decoration: none;" href="<?php echo add_query_arg(['pageSection' => $a + 1]) ?>"> <?php echo $a + 1 ?></a>
                                    </li>
                                    <?php if ($countOfPage > 2) { ?>
                                        <li class="a page-item"> <a class=" page-link" style="text-decoration: none;" href="<?php echo add_query_arg(['pageSection' => $a]) ?>"> <?php echo $a  ?></a>
                                        </li>
                                    <?php } ?>
                                    <?php if ($countOfPage > 3) { ?>
                                        <li class="a page-item"> <a class=" page-link" style="text-decoration: none;" href="<?php echo add_query_arg(['pageSection' => $a - 1]) ?>"> <?php echo $a - 1 ?></a>
                                        </li>
                                    <?php } ?>
                                    <?php if ($countOfPage > 4) {
                                    ?>
                                        <li class="a smm page-item"> <span class="sm page-link" style="text-decoration: none;">...</span>
                                        </li>
                                    <?php } ?>



                                <?php } elseif ($page == 1 && $a == 0) { ?>
                                    <?php if ($countOfPage > 4) {
                                    ?>
                                        <li class="a smm page-item"> <span class="sm page-link" style="text-decoration: none;">...</span>
                                        </li>
                                    <?php } ?>

                                    <?php if ($a + 3 < $countOfPage) { ?>
                                        <li class="a page-item"> <a class=" page-link" style="text-decoration: none;" href="<?php echo add_query_arg(['pageSection' => $a + 3]) ?>"> <?php echo $a + 3 ?></a>
                                        <?php } ?>

                                        </li>
                                        <?php if ($a + 2 < $countOfPage) { ?>
                                            <li class="a page-item"> <a class=" page-link" style="text-decoration: none;" href="<?php echo add_query_arg(['pageSection' => $a + 2]) ?>"> <?php echo $a + 2 ?></a>
                                            <?php } ?>

                                            </li>
                                            <li class="a page-item"> <a class=" page-link" style="text-decoration: none;" href="<?php echo add_query_arg(['pageSection' => $a + 1]) ?>"> <?php echo $a + 1 ?></a>

                                            </li>


                                        <?php } else { ?>

                                            <?php if ($a == $countOfPage - 1 && $a + 1 !=  $page) {  ?>

                                                <li class="a page-item"> <a class=" page-link" style=" text-decoration: none;" href="<?php echo add_query_arg(['pageSection' => $a + 1]) ?>"> <?php echo $a + 1 ?></a>

                                                </li>

                                            <?php } ?>
                                            <?php if ($a == 0) { ?>
                                                <li class="a page-item"> <a class=" page-link" style=" text-decoration: none;" href="<?php echo add_query_arg(['pageSection' => $a + 1]) ?>"> <?php echo $a + 1 ?></a>

                                                </li>

                                            <?php } ?>
                                            <?php if ($page == $a + 1) { ?>
                                                <?php if ($countOfPage - $page > 2) { ?>
                                                    <li class="a smm page-item"> <span class="sm page-link" style="text-decoration: none;">...</span>
                                                    </li>
                                                <?php }  ?>

                                                <?php if ($a + 2 != $countOfPage) { ?>

                                                    <li class="a page-item"> <a class=" page-link" style="text-decoration: none;" href="<?php echo add_query_arg(['pageSection' => $a + 2]) ?>"> <?php echo $a + 2 ?></a>

                                                    </li>

                                                <?php } ?>

                                                <li class="a page-item"> <a class=" page-link" style="text-decoration: none;" href="<?php echo add_query_arg(['pageSection' => $a + 1]) ?>"> <?php echo $a + 1 ?></a>

                                                </li>

                                                <?php if ($a != 1) { ?>


                                                    <li class="a page-item"> <a class=" page-link" style="text-decoration: none;" href="<?php echo add_query_arg(['pageSection' => $a]) ?>"> <?php echo $a  ?></a>
                                                    </li>

                                                    <?php if ($page > 3) { ?>
                                                        <li class="a smm page-item"> <span class="sm page-link" style="text-decoration: none;">...</span>
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



    </div>
    <style>
        .tableStyle {
            background-color: #FAFAFA;
        }

        .bgThead {
            background-color: #B0BEC5;
        }
    </style>
    <script>
        const next = document.querySelector('.nextPage');
        const previousPage = document.querySelector('.previousPage');
        const li = document.querySelectorAll('.a');
        let page = <?php echo $page ?>;
        let countOfPage = <?php echo $countOfPage ?>;


        next.addEventListener('click', function HandelerCell(event) {

            if (page < countOfPage) {
                if (next.classList.contains('smm')){
                    next.href = "<?php echo add_query_arg(['pageSection' =>  $page + 2]) ?>";
                }else{
                next.href = "<?php echo add_query_arg(['pageSection' =>  $page + 1]) ?>";
                }
            }


        });
        previousPage.addEventListener('click', function HandelerCell(event) {
            if (page > 1) {
                if (next.classList.contains('smm')){
                previousPage.href = "<?php echo add_query_arg(['pageSection' =>  $page - 2]) ?>";
                }else{
                    previousPage.href = "<?php echo add_query_arg(['pageSection' =>  $page - 1]) ?>";
                }
            }

        });
    </script>



    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

</body>

</html>