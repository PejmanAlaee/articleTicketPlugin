<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body dir="rtl" style="background-color:#ECEFF1; text-align: right;">
    <div class="container">
        <div style="text-align: center; margin:10px 0px ;">
            <h4 style=" padding:20px;">صفحه اضافه کردن اطلاعات به کاربر</h4>
        </div>
        <div class="row" style="margin: 20px 0px ;">
            <div class="col-md-12">
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
                <div style="margin: 20px 0px;">
                    <table class="table table-hover table-sm">
                        <thead>
                            <tr style="font-size:10.5px ;">
                                <th scope="col"><span>سرویس های ارائه شده برای کاربر جاری</span></th>
                                <th scope="col"><span>حذف کردن</span></th>

                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach (array_reverse($addinformations) as $key => $sample) : ?>
                                <?php if ($sample->current_Id == $_GET['idPage']) { ?>
                                    <?php if ($sample->customer_service_name != null) { ?>
                                        <tr style="font-size:10.5px ;">
                                            <td> <?php echo $sample->customer_service_name;
                                                    ?>
                                            </td>
                                            <td> <a href="<?php echo add_query_arg(['z' => 'removeService', 'serviceDelete' => $sample->customer_id]) ?>"><span class="dashicons dashicons-trash"></span></a>
                                            </td>
                                        </tr>
                            <?php }
                                }
                            endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row" style="margin: 80px 0px ;">

            <div class="col-md-12">
                <form action="" method="post">
                    <select id="sectionPerson" name="sectionPerson" style="width: 180px;">
                        <?php foreach ($sectionInformation as $sample) : ?>
                            <option><?php echo $sample->customer_name ?></option>
                        <?php
                        endforeach;
                        ?>
                    </select>
                    <input style="padding: 0px 20px;" type="submit" class="button" value="ثبت" name="saveCurrentPersonSection" />
                </form>
                <div style="margin: 20px 0px;">
                    <table class="table table-hover table-sm">

                        <thead>
                            <tr style="font-size:10.5px ;">
                                <th scope="col"><span>بخش های ارائه شده برای کاربر جاری</span></th>
                                <th scope="col"><span>حذف کردن</span></th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($addinformations as $key => $sample) : ?>
                                <?php $idCp  = $_GET['idPage']; ?>
                                <?php if ($sample->current_Id == $_GET['idPage']) { ?>
                                    <?php if ($sample->customer_section_name != null) { ?>
                                        <tr style="font-size:10.5px ;">
                                            <td> <?php echo $sample->customer_section_name;
                                                    ?>
                                            </td>
                                            <td> <a href="<?php echo add_query_arg(['z' => 'removeSection', 'sectionDelete' => $sample->customer_id]) ?>"><span class="dashicons dashicons-trash"></span></a>
                                            </td>
                                        </tr>
                            <?php }
                                }
                            endforeach; ?>

                        </tbody>
                    </table>
                </div>


            </div>

        </div>
    </div>




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