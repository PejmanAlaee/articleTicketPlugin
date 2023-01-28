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
            <a class="navbar-brand text-decoration-none  text-white p-2">ثبت تیکت</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="nav">
                <ul class="navbar-nav mr-auto"style=" margin-left: 10%">
                    <li class="nav-item" >
                        <button class="nav-link text-decoration-none text-light" style="background-color: #455A64 ;" id="home">صفحه اصلی <span class="sr-only">(current)</span></button>
                    </li>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="container bg-light" style="padding-bottom: 20px">
            <div class="text-secondary text-center mt-4 pt-4">
                <div class="alerttt"></div>
            </div>
            <form action="" method="post" id="FormIdd">
                <div class="form-group">
                    <div class="col-md-12">
                        <div style="text-align: right; margin-right: 6px;"> <label for="textAria">پیام</label> </div>
                        <textarea class="form-control" id="textAriaa" rows="6" name="textAriaa"></textarea>
                    </div>

                </div>
                <input type="submit" class="button" value="ذخیره سازی" name="updatee" />
            </form>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <script>
        document.getElementById("home").addEventListener("click", fncHome);

        function fncHome() {
            window.location.href = "/";
        }
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->

</html>