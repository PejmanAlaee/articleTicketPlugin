<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body dir="rtl" style="background-color:#ECEFF1; text-align: right;">
    <div style="text-align: center; margin:10px 0px ; font-size: 20px;">
        <h4 style="align-items: center;">لیست اطلاعات</h4>
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
            <div class="col-md-12">
                <button class="btn btn-light " style="border-radius: 10px; font-size: 12px; margin-top: 4px;" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    اضافه کردن بخش
                </button>
                <div class="collapse" id="collapseExample">
                    <div class="card card-body" style="width: fit-content; background-color: #ECEFF1;  padding-right: 0px; border: none;">
                        <div>
                            <span>
                                <form action="" method="post">
                                    <input placeholder="بخش" type="text" name="sectionPerson" id="sectionPerson" style="width: 150px; height: 1px;">
                                    <input type="submit" class="button" value="ثبت" name="saveSection" />
                                </form>

                            </span>
                        </div>
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

                                <th scope="col"><span>ردیف</span></th>
                                <th scope="col"><span>بخش های مربوطه</span></th>
                                <th style="text-align: center;" scope="col"><span>عملیات</span></th>

                            </tr>
                        </thead>

                        <tbody>
                            <?php $idCounter = 1; ?>
                            <?php $pageSection = 1; ?>
                            <?php $setCounterSection  = 0; ?>
                            <?php $countOfTicketSection = count($sectionInformation); ?>
                            <?php $countOfPageSection = ceil($countOfTicketSection / 3); ?>
                            <?php foreach (array_reverse($sectionInformation) as $key => $sample) : ?>
                                <?php if (isset($_GET['pinInfo'])) {
                                    $pageSection =  $_GET['pinInfo'];
                                } ?>
                                <?php if ($setCounterSection >= (($pageSection - 1) * 3) && $setCounterSection <= (3 * $pageSection) - 1) {
                                ?>

                                    <tr style="font-size:10.5px ;">

                                        <td class="border border-white-50"><?php echo $idCounter ?> </td>

                                        <td class="border border-white-50"><?php echo $sample->customer_name; ?> </td>
                                        <td style="text-align: center;" class="border border-white-50"> <a href="<?php echo add_query_arg(['sectionAddPage' => 'remove', 'sectionItem' => $sample->customer_id]) ?>" onclick="return  confirm('ایا از حذف مطمئن هستین ؟')"><span class="dashicons dashicons-trash"></span></a>
                                            <a href="<?php echo add_query_arg(['sectionAddPage' => 'edit', 'sectionItem' => $sample->customer_id, 'sectionName' => $sample->customer_name]) ?>"><span class="dashicons dashicons-edit"></span>
                                        </td>
                                    </tr>
                                <?php } ?>
                                <?php $setCounterSection += 1;
                                $idCounter += 1; ?>
                            <?php endforeach; ?>

                        </tbody>
                    </table>

                </div>
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
                        for ($a = $countOfPageSection - 1; $a >= 0; $a--) { ?>

                            <?php if ($pageSection == $countOfPageSection && $pageSection == $a + 1) { ?>
                                <li class=" page-item"> <a class=" page-link" style=" text-decoration: none;" href="<?php echo add_query_arg(['pinInfo' => $a + 1]) ?>"> <?php echo $a + 1 ?></a>
                                </li>
                                <?php if ($countOfPageSection > 2) { ?>
                                    <li class=" page-item"> <a class=" page-link" style="text-decoration: none;" href="<?php echo add_query_arg(['pinInfo' => $a]) ?>"> <?php echo $a  ?></a>
                                    </li>
                                <?php } ?>
                                <?php if ($countOfPageSection > 3) { ?>
                                    <li class=" page-item"> <a class=" page-link" style="text-decoration: none;" href="<?php echo add_query_arg(['pinInfo' => $a - 1]) ?>"> <?php echo $a - 1 ?></a>
                                    </li>
                                <?php } ?>

                                <?php if ($countOfPageSection > 4) {
                                ?>
                                    <li class="page-item"> <span class="sm page-link" style="text-decoration: none;">...</span>
                                    </li>
                                <?php } ?>


                            <?php } elseif ($pageSection == 1 && $a == 0) { ?>
                                <?php if ($countOfPageSection > 4) {
                                ?>
                                    <li class="page-item"> <span class="sm page-link" style="text-decoration: none;">...</span>
                                    </li>
                                <?php } ?>


                                <?php if ($a + 3 < $countOfPageSection) { ?>
                                    <li class=" page-item"> <a class=" page-link" style="text-decoration: none;" href="<?php echo add_query_arg(['pinInfo' => $a + 3]) ?>"> <?php echo $a + 3 ?></a>
                                    <?php } ?>

                                    </li>
                                    <?php if ($a + 2 < $countOfPageSection) { ?>
                                        <li class=" page-item"> <a class=" page-link" style="text-decoration: none;" href="<?php echo add_query_arg(['pinInfo' => $a + 2]) ?>"> <?php echo $a + 2 ?></a>
                                        <?php } ?>

                                        </li>
                                        <li class=" page-item"> <a class=" page-link" style="text-decoration: none;" href="<?php echo add_query_arg(['pinInfo' => $a + 1]) ?>"> <?php echo $a + 1 ?></a>

                                        </li>


                                    <?php } else { ?>

                                        <?php if ($a == $countOfPageSection - 1 && $a + 1 !=  $pageSection) {  ?>

                                            <li class=" page-item"> <a class=" page-link" style=" text-decoration: none;" href="<?php echo add_query_arg(['pinInfo' => $a + 1]) ?>"> <?php echo $a + 1 ?></a>

                                            </li>

                                        <?php } ?>
                                        <?php if ($a == 0) { ?>
                                            <li class=" page-item"> <a class=" page-link" style=" text-decoration: none;" href="<?php echo add_query_arg(['pinInfo' => $a + 1]) ?>"> <?php echo $a + 1 ?></a>

                                            </li>

                                        <?php } ?>
                                        <?php if ($pageSection == $a + 1) { ?>
                                            <?php if ($countOfPageSection - $pageSection > 2) { ?>
                                                <li class="page-item"> <span class="sm page-link" style="text-decoration: none;">...</span>
                                                </li>
                                            <?php }  ?>


                                            <?php if ($a + 2 != $countOfPageSection) { ?>

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