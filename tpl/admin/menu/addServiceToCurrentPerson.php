<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body dir="rtl" style="background-color:#ECEFF1; text-align: right;">
    <div class="container">
        <div style="text-align: center; margin:10px 0px ;">
            <h4 style=" padding:20px;">صفحه اضافه کردن سرویس به کاربر</h4>
        </div>
        <div class="row">
            <div class="col-md-12">
                <button class="btn btn-light " style="border-radius: 10px; font-size: 12px; margin-top: 4px;" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    اضافه کردن سرویس
                </button>
                <div class="collapse" id="collapseExample">
                    <div class="card card-body" style="width: fit-content; background-color: #ECEFF1;  padding-right: 0px; border: none;">
                        <div>
                            <span>
                                <form action="" method="post">
                                    <select id="servicePerson" name="servicePerson" style="width: 180px;">
                                        <?php foreach ($serviceInformation as $sample) : ?>
                                            <option><?php echo $sample->customer_service ?></option>
                                        <?php
                                        endforeach;
                                        ?>
                                    </select>
                                    <input style="padding: 1px 20px;" type="submit" class="button" value="ثبت" name="saveCurrentPersonService" />
                                </form>

                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" style="margin: 20px 0px ;">
            <div class="col-md-12">

                <div style="margin: 20px 0px;">
                    <table class="table table-hover table-sm tableStyle ">
                        <thead class="bgThead">
                            <tr style="font-size:10.5px ;">
                                <th scope="col"><span>سرویس های ارائه شده برای کاربر جاری</span></th>
                                <th scope="col"><span>حذف کردن</span></th>

                            </tr>
                        </thead>

                        <tbody>
                            <?php $count = 0; ?>
                            <?php foreach (array_reverse($addinformations) as $key => $sample) : ?>
                                <?php if ($sample->current_Id == $_GET['idPage']) {
                                    if ($sample->customer_service_name != null) {
                                        $count += 1;
                                    }
                                ?>

                            <?php }
                                if ($count == 0) {
                                    $count = 1;
                                }
                            endforeach; ?>
                            <?php $idCounter = 1; ?>
                            <?php $pageSection = 1; ?>
                            <?php $setCounterService  = 0; ?>
                            <?php $countOfPageSrvice = ceil($count / 3);
                            ?>

                            <?php foreach (array_reverse($addinformations) as $key => $sample) : ?>

                                <?php if ($sample->current_Id == $_GET['idPage']) { ?>
                                    <?php if (isset($_GET['pinInfo'])) {
                                        $pageSection =  $_GET['pinInfo'];
                                    } ?>
                                    <?php if ($sample->customer_service_name != null) { ?>
                                        <?php if ($setCounterService >= (($pageSection - 1) * 3) && $setCounterService <= (3 * $pageSection) - 1) {
                                        ?>

                                            <tr style="font-size:10.5px ;">
                                                <td> <?php echo $sample->customer_service_name;
                                                        ?>
                                                </td>
                                                <td> <a href="<?php echo add_query_arg(['z' => 'removeService', 'serviceDelete' => $sample->customer_id, 'servicePersonId' => $_GET['idPage']]) ?>"><span class="dashicons dashicons-trash"></span></a>
                                                </td>
                                            </tr>
                            <?php }
                                    }
                                    $setCounterService += 1;
                                }
                          
                                $idCounter += 1;
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
                            for ($a = $countOfPageSrvice - 1; $a >= 0; $a--) { ?>

                                <?php if ($pageSection == $countOfPageSrvice && $pageSection == $a + 1) { ?>
                                    <li class=" page-item"> <a class=" page-link" style="background-color: #FFFDE7; text-decoration: none;" href="<?php echo add_query_arg(['pinInfo' => $a + 1]) ?>"> <?php echo $a + 1 ?></a>
                                    </li>
                                    <?php if ($countOfPageSrvice > 2) { ?>
                                        <li class=" page-item"> <a class=" page-link" style="text-decoration: none;" href="<?php echo add_query_arg(['pinInfo' => $a]) ?>"> <?php echo $a  ?></a>
                                        </li>
                                    <?php } ?>
                                    <?php if ($countOfPageSrvice > 3) { ?>
                                        <li class=" page-item"> <a class=" page-link" style="text-decoration: none;" href="<?php echo add_query_arg(['pinInfo' => $a - 1]) ?>"> <?php echo $a - 1 ?></a>
                                        </li>
                                    <?php } ?>

                                    <?php if ($countOfPageSrvice > 4) {
                                    ?>
                                        <li class="page-item"> <span class="sm page-link" style="text-decoration: none;">...</span>
                                        </li>
                                    <?php } ?>


                                <?php } elseif ($pageSection == 1 && $a == 0) { ?>

                                    <?php if ($countOfPageSrvice > 4) {
                                    ?>
                                        <li class="page-item"> <span class="sm page-link" style="text-decoration: none;">...</span>
                                        </li>
                                    <?php } ?>

                                    <?php if ($a + 3 < $countOfPageSrvice) { ?>
                                        <li class=" page-item"> <a class=" page-link" style="text-decoration: none;" href="<?php echo add_query_arg(['pinInfo' => $a + 3]) ?>"> <?php echo $a + 3 ?></a>
                                        <?php } ?>

                                        </li>
                                        <?php if ($a + 2 < $countOfPageSrvice) { ?>
                                            <li class=" page-item"> <a class=" page-link" style="text-decoration: none;" href="<?php echo add_query_arg(['pinInfo' => $a + 2]) ?>"> <?php echo $a + 2 ?></a>
                                            <?php } ?>

                                            </li>
                                            <li class=" page-item"> <a class=" page-link" style="background-color: #FFFDE7;  text-decoration: none;" href="<?php echo add_query_arg(['pinInfo' => $a + 1]) ?>"> <?php echo $a + 1 ?></a>

                                            </li>


                                        <?php } else { ?>

                                            <?php if ($a == $countOfPageSrvice - 1 && $a + 1 !=  $pageSection) {  ?>

                                                <li class=" page-item"> <a class=" page-link" style="background-color: #FFFDE7; text-decoration: none;" href="<?php echo add_query_arg(['pinInfo' => $a + 1]) ?>"> <?php echo $a + 1 ?></a>

                                                </li>

                                            <?php } ?>
                                            <?php if ($a == 0) { ?>
                                                <li class=" page-item"> <a class=" page-link" style="background-color: #FFFDE7; text-decoration: none;" href="<?php echo add_query_arg(['pinInfo' => $a + 1]) ?>"> <?php echo $a + 1 ?></a>

                                                </li>

                                            <?php } ?>
                                            <?php if ($pageSection == $a + 1) { ?>

                                                <?php if ($countOfPageSrvice - $pageSection > 2) { ?>
                                                    <li class="page-item"> <span class="sm page-link" style="text-decoration: none;">...</span>
                                                    </li>
                                                <?php }  ?>

                                                <?php if ($a + 2 != $countOfPageSrvice) { ?>

                                                    <li class=" page-item"> <a class=" page-link" style="text-decoration: none;" href="<?php echo add_query_arg(['pinInfo' => $a + 2]) ?>"> <?php echo $a + 2 ?></a>

                                                    </li>

                                                <?php } ?>

                                                <li class=" page-item"> <a class=" page-link" style="text-decoration: none;" href="<?php echo add_query_arg(['pinInfo' => $a + 1]) ?>"> <?php echo $a + 1 ?></a>

                                                </li>

                                                <?php if ($a != 1) { ?>


                                                    <li class=" page-item"> <a class=" page-link" style="text-decoration: none;" href="<?php echo add_query_arg(['pinInfo' => $a]) ?>"> <?php echo $a  ?></a>
                                                    </li>
                                                    <?php if ($pageSection > 3) { ?>
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












    </div>
    <style>
        .tableStyle {
            background-color: #FAFAFA;
        }

        .bgThead {
            background-color: #B0BEC5;
        }
    </style>



    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
</body>

</html>