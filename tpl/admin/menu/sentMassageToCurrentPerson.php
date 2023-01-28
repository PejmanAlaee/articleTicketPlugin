<div class="wrap">
    <h1> اضافه و ادیت </h1>

    <form action="" method="post">
        <table class="form-table">
            </tr>
        
            <tr valign="top">
                <th scope="row">answerToPerson</th>
                <td>
                    <textarea name="answer" id="answer" rows="4" style="width:250px;"></textarea>
                </td>
            </tr>
            <tr valign="top">
                <th>level of the article</th>
                <td>
                    <select id="from" name="from">
                        <option>Admin</option>
                    </select>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">currentAdminTime</th>
                <td>
                    <input type="text" name="time" id="time" value="<?php
                                                                    date_default_timezone_set("Iran");
                                                                    $currentTime =  (string)date("h:i:sa");
                                                                    echo  $currentTime ?>">
                </td>
            </tr>

            <tr valign="top">
                <th scope="row"></th>
                <td>
                    <input type="submit" class="button" value="ذخیره سازی" name="saveEdittt" />

                </td>
            </tr>




        </table>

    </form>




</div>