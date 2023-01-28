<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body class="bg-light ">
    <div class="container setArticle"style="box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 6px -1px, rgba(0, 0, 0, 0.06) 0px 2px 4px -1px;">
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

        <div class="container">
            <div class="titleTextDiv">
                <h1 class="titleText"><span style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;padding:10px 50px ; margin: 20px 0px ">ایجاد درخواست پشتیبانی جدید</span></h1>
            </div>
            <form action="" method="post" id="FormId">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <div class="formLabel"><label for="name" style="font-family: bNazanin;font-weight: 500;">نام</label></div>
                        <input type="text" class="form-control" id="name" readonly value="<?php echo $name ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <div class="formLabel"><label for="email" style="font-family: bNazanin;font-weight: 500;">ادرس ایمیل</label></div>
                        <input type="email" class="form-control" id="email" readonly value="<?php echo  $userCurrentEmail ?> ">
                    </div>
                </div>
                <div class="form-group">
                    <div class="formLabel"><label for="inputAddress" style="font-family: bNazanin;font-weight: 500;">موضوع</label></div>
                    <input type="text" class="form-control" id="inputAddress">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <div class="formLabel"><label for="SupportCenter" style="font-family: bNazanin;font-weight: 500;">پخش</label></div>
                        <select class="custom-select" id="SupportCenter">
                            <?php foreach ($currentinformations as  $sample) :
                                if ($sample->current_Id == $currentId &&  $sample->customer_section_name!= NULL) { ?>
                                    <option style="font-family: bNazanin;font-weight: 500;"><?php echo $sample->customer_section_name ?></option>
                            <?php }
                            endforeach;
                            ?>
                        </select>

                    </div>

                    <div class="form-group col-md-5">
                        <div class="formLabel"><label for="service" style="font-family: bNazanin;font-weight: 500;">سرویس مربوطه</label></div>
                        <select class="custom-select" id="service">
                            <?php foreach ($currentinformations as $sample) :
                                if ($sample->current_Id == $currentId &&  $sample->customer_service_name!= NULL) { ?>
                                    <option style="font-family: vazir;font-weight: 500;"><?php echo $sample->customer_service_name	  ?> </option>
                            <?php }
                            endforeach;
                            ?>
                        </select>
                    </div>

                    <div class="form-group col-md-3">
                        <div class="formLabel"><label for="Priority" style="font-family: bNazanin;font-weight: 500;">اولیویت</label></div>
                        <select class="custom-select" id="Priority">
                            <option style="font-family: vazir;font-weight: 500;">متوسط</option>
                            <option style="font-family: vazir;font-weight: 500;">زیاد</option>
                            <option style="font-family: vazir;font-weight: 500;">کم</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <div class="formLabel"><label for="textAria" style="font-family: bNazanin; font-weight: 500;">پیام</label></div>
                        <textarea id="textAria" name="textAria" rows="4" cols="40"></textarea>
                    </div>
                </div>
                <input id="buttonResult" type="submit" class="button" value="ذخیره سازی" name="update" />
            </form>
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