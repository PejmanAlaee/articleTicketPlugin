<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
    <div class=" container userEdit" style="box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 6px -1px, rgba(0, 0, 0, 0.06) 0px 2px 4px -1px;">
        <nav class="navbar navbar-expand-lg navbar-light "style="background-color: #455A64 ; height: 100px ; border-radius: 10px; border:1px solid #3d5a5d">
            <a class="navbar-brand text-decoration-none text-white" style="background-color: #78909C ; padding: 2px 20px ; border-radius: 4px">ثبت تیکت</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="nav">
                <ul class=" navbar-nav mr-auto">
                    <li class="nav-item active liStyle">
                        <div style="text-align: center; align-items: center; margin-top: 20px ;">
                            <a style=" text-decoration: none; " href="<?php echo add_query_arg(['action' => 1]) ?> ">
                                <span style="margin-top: 60px; font-family: bNazanin; color:white; font-family:bNazanin ; "> ثبت درخواست
                                </span>
                            </a>
                        </div>

                    </li>
                    <li class="nav-item liStyle">
                        <div style="text-align: center; align-items: center;margin-top: 20px;  ">
                            <a style=" text-decoration: none; " href="/">
                                <span style=" margin-top: 60px; font-family: bNazanin; color:white; font-family:bNazanin ; "> صفحه اصلی
                                </span>
                            </a>
                        </div>
                    </li>

                </ul>
            </div>
        </nav>
        <div style="display: flex; margin-left: 0; " id="divForm">
            <div style="margin: 20px 10px;">
                <form class="form-inline" method="post">
                    <input type="text" name="searchForm" id="searchFormMain" placeholder="جست و جو" style="width: 180px;height: 32px ; border-color: white ;background-color: #384a54 ; border-color:#455A64 ">
                    <input type="submit" class="button " id="btnSearch" name="saveSearchMain" value="ثبت" style="padding: 17px 24px; background-color: #384a54 ; color: blue  ; margin-right: 6px ; border:1px solid #455A64" />
                </form>
            </div>
        </div>

        <div class="row">

            <div class="col-md-12">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th style="text-align:center ;font-family: bNazanin;" class="bg-light">بخش</th>
                            <th style="text-align:center ;font-family: bNazanin;" class="bg-light">موضوع</th>
                            <th style="text-align:center ;font-family: bNazanin;" class="bg-light">وضعیت</th>
                            <th style="text-align:center ;font-family: bNazanin;" class="bg-light">آخرین بروزرسانی</th>
                        </tr>
                    </thead>
                    <?php
                    $l = 0;
                    foreach (array_reverse($userTable) as $sample) :
                        if ($sample->CEmail == $userCurrentEmail) {
                            $l += 1;
                        }
                    endforeach;
                    $countOfPageTwo =  ceil($l / 5);
                    $setCounterr = 0;
                    $pageSection = 1;
                    ?>
                    <?php foreach (array_reverse($userTable) as $sample) :
                        $a = 0;
                        if ($sample->CEmail == $userCurrentEmail) {
                            $setCounterr += 1;
                            if (isset($_GET['another'])) {
                                $pageSection =  $_GET['another'];
                            }
                    ?>
                            <?php if ($setCounterr >= (($pageSection - 1) * 5) && $setCounterr <= (5 * $pageSection) - 1) { ?>
                                <tbody>
                                    <tr>
                                        <td style="text-align:right ;" class="bg-white"> <a class="text-decoration-none text-muted" style="font-family:bNazanin; font-size: 16px;" href="<?php echo add_query_arg(['action' => 'a', 'idSett' => $sample->id, 'section' => $a + 1]) ?>
                            <?php ?>" id="buttonHome"> <?php echo $sample->SupportCenter; ?></a></td>
                                        <td style="text-align:right ;font-family:bNazanin; font-size: 16px;" class="bg-white"><?php echo $sample->inputAddress; ?></td>
                                        <td style="text-align:right;font-size: 12px; font-size: bNazanin;" class="bg-white">
                                            <?php if ($sample->conditionType == " باز است") { ?>
                                                <div style="background-color:#AED581; padding:4px; color:white;border-radius:4px ;width: 60px; text-align: center;font-family:bNazanin"><span><?php echo $sample->conditionType; ?></span></div>
                                            <?php } elseif ($sample->conditionType == "بسته است") { ?>
                                                <div style="background-color:#E57373; padding:4px; color:white;border-radius:4px ;width: 60px; text-align: center; font-family:bNazanin"><span><?php echo $sample->conditionType; ?></span></div>
                                            <?php } ?>
                                        </td>
                                        <td style="text-align:center ; font-family:bNazanin" class="bg-white"><?php echo $sample->lastEdit; ?></td>
                                    </tr>
                                </tbody>
                        <?php }
                        } ?>
                    <?php endforeach; ?>
                </table>
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
                            for ($a = $countOfPageTwo - 1; $a >= 0; $a--) { ?>

                                <?php if ($pageSection == $countOfPageTwo && $pageSection == $a + 1) { ?>
                                    <li class=" page-item"> <a class=" page-link" style=" text-decoration: none;" href="<?php echo add_query_arg(['another' => $a + 1]) ?>"> <?php echo $a + 1 ?></a>
                                    </li>
                                    <?php if ($countOfPageTwo > 2) { ?>
                                        <li class=" page-item"> <a class=" page-link" style="text-decoration: none;" href="<?php echo add_query_arg(['another' => $a]) ?>"> <?php echo $a  ?></a>
                                        </li>
                                    <?php } ?>
                                    <?php if ($countOfPageTwo > 3) { ?>
                                        <li class=" page-item"> <a class=" page-link" style="text-decoration: none;" href="<?php echo add_query_arg(['another' => $a - 1]) ?>"> <?php echo $a - 1 ?></a>
                                        </li>
                                    <?php } ?>
                                    <?php if ($countOfPageTwo > 4) {
                                    ?>
                                        <li class="page-item"> <span class="sm page-link" style="text-decoration: none;">...</span>
                                        </li>
                                    <?php } ?>

                                <?php } elseif ($pageSection == 1 && $a == 0) { ?>
                                    <?php if ($countOfPageTwo > 4) {
                                    ?>
                                        <li class="page-item"> <span class="sm page-link" style="text-decoration: none;">...</span>
                                        </li>
                                    <?php } ?>

                                    <?php if ($a + 3 < $countOfPageTwo) { ?>
                                        <li class=" page-item"> <a class=" page-link" style="text-decoration: none;" href="<?php echo add_query_arg(['another' => $a + 3]) ?>"> <?php echo $a + 3 ?></a>
                                        <?php } ?>

                                        </li>
                                        <?php if ($a + 2 < $countOfPageTwo) { ?>
                                            <li class=" page-item"> <a class=" page-link" style="text-decoration: none;" href="<?php echo add_query_arg(['another' => $a + 2]) ?>"> <?php echo $a + 2 ?></a>
                                            <?php } ?>

                                            </li>
                                            <li class=" page-item"> <a class=" page-link" style="  text-decoration: none;" href="<?php echo add_query_arg(['another' => $a + 1]) ?>"> <?php echo $a + 1 ?></a>

                                            </li>


                                        <?php } else { ?>

                                            <?php if ($a == $countOfPageTwo - 1 && $a + 1 !=  $pageSection) {  ?>

                                                <li class=" page-item"> <a class=" page-link" style=" text-decoration: none;" href="<?php echo add_query_arg(['another' => $a + 1]) ?>"> <?php echo $a + 1 ?></a>

                                                </li>

                                            <?php } ?>
                                            <?php if ($a == 0) { ?>
                                                <li class=" page-item"> <a class=" page-link" style=" text-decoration: none;" href="<?php echo add_query_arg(['another' => $a + 1]) ?>"> <?php echo $a + 1 ?></a>

                                                </li>

                                            <?php } ?>
                                            <?php if ($pageSection == $a + 1) { ?>
                                                <?php if ($countOfPageTwo - $pageSection > 2) { ?>
                                                    <li class="page-item"> <span class="sm page-link" style="text-decoration: none;">...</span>
                                                    </li>
                                                <?php }  ?>
                                                <?php if ($a + 2 != $countOfPageTwo) { ?>

                                                    <li class=" page-item"> <a class=" page-link" style="text-decoration: none;" href="<?php echo add_query_arg(['another' => $a + 2]) ?>"> <?php echo $a + 2 ?></a>

                                                    </li>

                                                <?php } ?>

                                                <li class=" page-item"> <a class=" page-link" style="text-decoration: none;" href="<?php echo add_query_arg(['another' => $a + 1]) ?>"> <?php echo $a + 1 ?></a>

                                                </li>

                                                <?php if ($a != 1) { ?>


                                                    <li class=" page-item"> <a class=" page-link" style="text-decoration: none;" href="<?php echo add_query_arg(['another' => $a]) ?>"> <?php echo $a  ?></a>
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
        body {
            overflow-x: hidden;

        }
    </style>
    <script>
        const next = document.querySelector('.nextPage');
        const previousPage = document.querySelector('.previousPage');
        const li = document.querySelectorAll('.a');
        let page = <?php echo $pageSection ?>;
        let countOfPage = <?php echo $countOfPageTwo ?>;

        next.addEventListener('click', function HandelerCell(event) {

            if (page < countOfPage) {
                next.href = "<?php echo add_query_arg(['another' =>  $pageSection + 1]) ?>";

            }


        });
        previousPage.addEventListener('click', function HandelerCell(event) {
            if (page > 1) {
                previousPage.href = "<?php echo add_query_arg(['another' =>  $pageSection - 1]) ?>";

            }

        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

</html>