<div class="wrap">
    <h1> اضافه و ادیت </h1>
    <form action="" method="post">
        <table class="form-table"> 
            <tr valign="top">
                <th scope="row">نام </th>
                <td>
                <input type="text"  name="personFirstName" id="personFirstName" value="<?php echo $sName ?> ">
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">ایمیل</th>
                <td>
                <input type="email"  name="personEmail" id="personEmail" value="<?php echo  $sEmail?> ">
                </td>

            </tr>

            <tr valign="top">
                <th scope="row"> levelArticle </th>
                <td>
                <input type="text"  name="levelArticlee" id="levelArticlee" value="<?php echo  $sLevelrticle ?> ">
                </td>

            </tr>
            <tr valign="top">
                <th scope="row">textAria</th>
                <td>
                <input type="text"  name="persontx" id="persontxt" value="<?php echo  $sMsg ?> ">
                </td>
            </tr>
            <tr valign="top">
                <th scope="row"></th>
                <td>
                    <input type="submit" class="button" value="ذخیره سازی" name="saveEdit" />
                </td>
            </tr>
        </table>
    </form>
</div>