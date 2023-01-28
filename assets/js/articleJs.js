
function numberToPersian(number) {
    const persian = {
        0: "۰", 1: "۱", 2: "۲", 3: "۳", 4: "۴", 5: "۵", 6: "۶", 7: "۷",
        8: "۸", 9: "۹"
    };
    number = number.toString().split("");
    let persianNumber = ""
    for (let i = 0; i < number.length; i++) {
        number[i] = persian[number[i]];
    }
    for (let i = 0; i < number.length; i++) {
        persianNumber += number[i];
    }
    return persianNumber;
}
function persian(time) {
    const myArray = time.split(":");
    arr = [];
    for (let i = 0; i < myArray.length; i++) {
        arr[i] = numberToPersian(myArray[i]);
    }
    let ans = "";
    arr.splice(1, 0, ":");
    arr.splice(3, 0, ":");
    for (let i = 0; i < arr.length; i++) {
        ans += arr[i];

    }
    return ans;
}


jQuery(document).ready(function ($) {
    var getUrlParameter = function getUrlParameter(sParam) {
        var sPageURL = window.location.search.substring(1),
            sURLVariables = sPageURL.split('&'),
            sParameterName,
            i;

        for (i = 0; i < sURLVariables.length; i++) {
            sParameterName = sURLVariables[i].split('=');

            if (sParameterName[0] === sParam) {
                return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
            }
        }
        return false;
    };




    $('#FormId').on('submit', function (event) {

        event.preventDefault();
        let name = $('#name').val();
        let email = $('#email').val();
        let inputAddress = $('#inputAddress').val();
        let service = $('#service').val();
        let Priority = $('#Priority').val();
        let textAria = $('#textAria').val();
        let SupportCenter = $('#SupportCenter').val();
        let notifyy = $('.alerttt');
        let cd = new Date().toLocaleDateString('fa-IR');
        let dtt = new Date();
        var timee = dtt.getHours() + ":" + dtt.getMinutes() + ":" + dtt.getSeconds();
        time = persian(timee);

        $.ajax({
            url: '/wp-admin/admin-ajax.php',
            type: 'post',
            dataType: 'json',
            data: {
                action: 'wp_articlee',
                name: name,
                email: email,
                inputAddress: inputAddress,
                service: service,
                Priority: Priority,
                textAria: textAria,
                SupportCenter: SupportCenter,
                time: time,
                cd: cd,
            },
            success: function (response) {

                notifyy.html('<p>' + response.messege + '</p>');
                notifyy.show(400);

                setTimeout(() => {
                    window.location.href = "/";

                }, 2000);

            },
            error: function (error) {
                if (error) {
                    notifyy.html('<p>' + error.responseJSON.messege + '</p>');
                    notifyy.css('display', 'block');
                    notifyy.delay(2000).hide(300);

                }
            }
        });
    });


    $('#FormIdd').on('submit', function (event) {
        event.preventDefault();
        let idSender = getUrlParameter('id');
        let textAria = $('#textAriaa').val();
        let notifyy = $('.alerttt');
        var dt = new Date();
        var timee = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
        let cd = new Date().toLocaleDateString('fa-IR');
        time = persian(timee);



        $.ajax({
            url: '/wp-admin/admin-ajax.php',
            type: 'post',
            dataType: 'json',
            data: {
                action: 'wp_article_msg',
                textAria: textAria,
                idSender: idSender,
                time: time,
                cd: cd,
            },

            success: function (response) {
                if (response.success) {
                    notifyy.html('<p>' + response.messege
                        + '</p>');
                    notifyy.show(300);

                    setTimeout(() => {
                        window.location.href = '/';
                    }, 2000);
                }
            },
            error: function (error) {
                console.log(error.responseJSON.messege);
                if (error) {
                    notifyy.html('<p>' +
                        error.responseJSON.messege + '</p>');
                    notifyy.css('display', 'block');
                    notifyy.delay(2000).hide(300);
                }
            }
        });
    });

});






