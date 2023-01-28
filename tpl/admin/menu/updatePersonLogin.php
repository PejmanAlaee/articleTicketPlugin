<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body dir="rtl" style="background-color:#ECEFF1; text-align: right;">
    <div style="text-align: center; margin:40px 0px ;">
        <h4 style="align-items: center;">صفحه ثبت تغییرات شخص مورد نظر </h4>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div style="box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px; padding: 80px;background-color:#ECEFF1 ;">
                    <form style="margin-top: 60px;"method="post">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="personNameEdit">نام</label>
                                <input type="text" class="form-control" id="personNameEdit" name="personNameEdit" value="<?php echo $personName ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="personEmailEdit">ایمیل</label>
                                <input type="email" class="form-control" id="personEmailEdit" name="personEmailEdit" value="<?php echo $personEmail  ?>">
                            </div>
                        </div>
                        <input type="submit" class="button" name="saveCurrentPersonUpdate" value="ثبت" />
                    </form>
                </div>

            </div>

        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

</body>

</html>