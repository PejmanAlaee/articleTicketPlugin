<div class="wrap">

    <h1>لیست افراد ثبت نام شده</h1>
    <table class=" widefat">
        <thead>
            <tr>
                <th>عملیات</th>
                <th>نام</th>
                <th>ایمیل</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($user as $key=> $sample) : ?>
                <tr>
                    <td>
                        <a href="<?php echo add_query_arg(['action'=>'showService','idPage' => $sample->ID]) ?>"><span class="dashicons dashicons-admin-comments"></span></a>
                    </td>
                    <td><?php echo $sample->user_nicename ; ?></td>
                    <td><?php echo $sample->user_email ; ?> </td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>


</div>