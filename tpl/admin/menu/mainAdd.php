<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body dir="rtl" style="background-color:#ECEFF1; text-align: right;">


    <div style="text-align: center; margin:10px 0px ; font-size: 20px;">
        <h4 style="align-items: center;">لیست افراد ثبت نام شده</h4>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <div style="margin: 20px 0px;">
                        <form action="" method="post">
                            <input type="text" name="saveSearchMainAddPage" style="width: 150px; height: 1px;margin-right:6px ;">
                            <input type="submit" class="button" name="saveSearchMainAdd" value="جست و جو" />
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">

                <button class="btn btn-light " style="border-radius: 10px; font-size: 12px; margin-top: 4px;" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    اضافه کردن اکانت
                </button>
                <div class="collapse" id="collapseExample">
                    <div class="card card-body" style=" background-color: #ECEFF1; border: none; width: fit-content;">
                        <div>
                            <div class="addPerson" style="display: flex;">
                                <h4 style="font-size: 16px;">ثبت نام کاربر جدید </h4>
                                <a style="margin-right: 20px;" href="<?php echo add_query_arg(['action' => 'RegisterPerson']) ?>"><span class="dashicons dashicons-database-add"></span></span>
                                </a>
                            </div>

                        </div>


                    </div>
                </div>






            </div>
        </div>


        <div class="row">
            <div class="col-md-12 " style="padding: 20px; margin-top:20px ;">
                <div class="tableStl">
                    <table class="table table-hover table-sm tableStyle">
                        <thead class="bgThead">
                            <tr style="font-size:10.5px ;">
                            <th scope="col"><span>ردیف</span></th>
                                <th scope="col"><span>نام</span></th>
                                <th scope="col"><span>ایمیل</span></th>
                                <th scope="col" style="text-align: center;"><span>اضافه کردن سرویس</span></th>
                                <th scope="col" style="text-align: center;"><span>اضافه کردن بخش</span></th>

                                <th scope="col" style="text-align: center;"><span>عملیات</span></th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $pageMainAdd = 1; ?>
                            <?php $counterMainAddTable = 1 ; ?>
                            <?php $setCounterMainAdd  = 0; ?>
                            <?php $countOfTicketMainAdd = count($user); ?>
                            <?php $countOfPageMainAdd = ceil($countOfTicketMainAdd / 3); ?>
                            <?php foreach ($user as $key => $sample) : ?>
                                <?php if (isset($_GET['pinInfo'])) {
                                    $pageMainAdd =  $_GET['pinInfo'];
                                } ?>
                                <?php if ($setCounterMainAdd >= (($pageMainAdd - 1) * 3) && $setCounterMainAdd <= (3 * $pageMainAdd) - 1) {
                                ?>
                                    <tr style="font-size:10.5px ;">
                                    <td><?php echo $counterMainAddTable ?></td>
                                        <td><?php echo $sample->display_name; ?></td>
                                        <td><?php echo $sample->user_email; ?> </td>
                                        <td style="text-align: center;"> <a href="<?php echo add_query_arg(['action' => 'show', 'idPage' => $sample->ID]) ?>"><span class="dashicons dashicons-admin-comments"></span></a>
                                        </td>
                                        <td style="text-align: center;"> <a href="<?php echo add_query_arg(['action' => 'showSction', 'idPage' => $sample->ID]) ?>"><span class="dashicons dashicons-admin-comments"></span></a>
                                        </td>
                                        <td style="text-align: center;">
                                            <a href="<?php echo add_query_arg(['action' => 'edit', 'personId' => $sample->ID]) ?>"><span class="dashicons dashicons-edit"></span>
                                                <a href="<?php echo add_query_arg(['action' => 'remove', 'personRemoveId' =>  $sample->ID]) ?>" onclick="return  confirm('ایا از حذف مطمئن هستین ؟')"><span class="dashicons dashicons-trash"></span></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            <?php $setCounterMainAdd += 1;
                            $counterMainAddTable +=1; 
                            endforeach; ?>

                        </tbody>
                    </table>
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



    <div class="row">
        <div class="col-sm-12">
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
                                for ($a = $countOfPageMainAdd - 1; $a >= 0; $a--) { ?>

                                    <?php if ($pageMainAdd == $countOfPageMainAdd && $pageMainAdd == $a + 1) { ?>
                                        <li class="a page-item"> <a class=" page-link" style="background-color: #FFFDE7; text-decoration: none;" href="<?php echo add_query_arg(['pinInfo' => $a + 1]) ?>"> <?php echo $a + 1 ?></a>
                                        </li>
                                        <?php if ($countOfPageMainAdd > 2) { ?>
                                            <li class="a page-item"> <a class=" page-link" style="text-decoration: none;" href="<?php echo add_query_arg(['pinInfo' => $a]) ?>"> <?php echo $a  ?></a>
                                            </li>
                                        <?php } ?>
                                        <?php if ($countOfPageMainAdd > 3) { ?>
                                            <li class="a page-item"> <a class=" page-link" style="text-decoration: none;" href="<?php echo add_query_arg(['pinInfo' => $a - 1]) ?>"> <?php echo $a - 1 ?></a>
                                            </li>
                                        <?php } ?>

                                    <?php } elseif ($pageMainAdd == 1 && $a == 0) { ?>
                                        <?php if ($a + 3 < $countOfPageMainAdd) { ?>
                                            <li class="a page-item"> <a class=" page-link" style="text-decoration: none;" href="<?php echo add_query_arg(['pinInfo' => $a + 3]) ?>"> <?php echo $a + 3 ?></a>
                                            <?php } ?>

                                            </li>
                                            <?php if ($a + 2 < $countOfPageMainAdd) { ?>
                                                <li class="a page-item"> <a class=" page-link" style="text-decoration: none;" href="<?php echo add_query_arg(['pinInfo' => $a + 2]) ?>"> <?php echo $a + 2 ?></a>
                                                <?php } ?>

                                                </li>
                                                <li class="a page-item"> <a class=" page-link" style="background-color: #FFFDE7;  text-decoration: none;" href="<?php echo add_query_arg(['pinInfo' => $a + 1]) ?>"> <?php echo $a + 1 ?></a>

                                                </li>


                                            <?php } else { ?>

                                                <?php if ($a == $countOfPageMainAdd - 1 && $a + 1 !=  $pageMainAdd) {  ?>

                                                    <li class="a page-item"> <a class=" page-link" style="background-color: #FFFDE7; text-decoration: none;" href="<?php echo add_query_arg(['pinInfo' => $a + 1]) ?>"> <?php echo $a + 1 ?></a>

                                                    </li>

                                                <?php } ?>
                                                <?php if ($a == 0) { ?>
                                                    <li class="a page-item"> <a class=" page-link" style="background-color: #FFFDE7; text-decoration: none;" href="<?php echo add_query_arg(['pinInfo' => $a + 1]) ?>"> <?php echo $a + 1 ?></a>

                                                    </li>

                                                <?php } ?>
                                                <?php if ($pageMainAdd == $a + 1) { ?>
                                                    <?php if ($a + 2 != $countOfPageMainAdd) { ?>

                                                        <li class="a page-item"> <a class=" page-link" style="text-decoration: none;" href="<?php echo add_query_arg(['pinInfo' => $a + 2]) ?>"> <?php echo $a + 2 ?></a>

                                                        </li>

                                                    <?php } ?>

                                                    <li class="a page-item"> <a class=" page-link" style="text-decoration: none;" href="<?php echo add_query_arg(['pinInfo' => $a + 1]) ?>"> <?php echo $a + 1 ?></a>

                                                    </li>

                                                    <?php if ($a != 1) { ?>


                                                        <li class="a page-item"> <a class=" page-link" style="text-decoration: none;" href="<?php echo add_query_arg(['pinInfo' => $a]) ?>"> <?php echo $a  ?></a>
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

    <script>
        const next = document.querySelector('.nextPage');
        const previousPage = document.querySelector('.previousPage');
        const li = document.querySelectorAll('.a');
        let page = <?php echo $pageMainAdd ?>;
        let countOfPage = <?php echo $countOfPageMainAdd ?>;

        next.addEventListener('click', function HandelerCell(event) {

            if (page < countOfPage) {
                next.href = "<?php echo add_query_arg(['pinInfo' =>  $pageMainAdd + 1]) ?>";

            }


        });
        previousPage.addEventListener('click', function HandelerCell(event) {
            if (page > 1) {
                previousPage.href = "<?php echo add_query_arg(['pinInfo' =>  $pageMainAdd - 1]) ?>";

            }

        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

</body>