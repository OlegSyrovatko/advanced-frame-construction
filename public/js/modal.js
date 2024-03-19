

function contact_add() {

    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')}
    });
    var username = document.getElementById('username').value;
    var tel = document.getElementById('tel').value;
    var area = document.getElementById('area').value;
    var comment = document.getElementById('comment').value;

    var formData = {
        username: username, tel: tel, 'area': area, 'comment': comment
    };
    $.ajax({
        type: 'POST',
        url: '/subscribe',
        data: formData,
        cache: false,
        success: function(data) {
            toggleModal();
            Swal.fire({
                icon: 'success',
                title: data.title,
                text: data.message,
                showConfirmButton: false,
                timer: 3000
            });

        },
        error: function(response) {
            const errorData = response.responseJSON;

            Swal.fire({
                icon: 'error',
                title: errorData.title,
                text: errorData.error,
            });

            console.error('Error:', errorData);
        }
    });
}

function deleteContact(id) {

    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')}
    });
    const idpwd = "pwd" + id;
    var pwd = document.getElementById(idpwd).value;


    var formData = {
        id: id, pwd: pwd
    };
    $.ajax({
        type: 'POST',
        url: '/delete_contact',
        data: formData,
        cache: false,
        success: function(data) {
            document.getElementById(id).innerHTML = data;
        }
    });
}

function order_add() {

    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')}
    });
    var username = document.getElementById('username').value;
    var tel = document.getElementById('tel').value;
    var link = document.getElementById('link').value;
    var comment = document.getElementById('comment').value;

    var formData = {
        username: username, tel: tel, 'link': link, 'comment': comment
    };
    $.ajax({
        type: 'POST',
        url: '/order',
        data: formData,
        cache: false,
        success: function(data) {
            toggleModal();
            Swal.fire({
                icon: 'success',
                title: data.title,
                text: data.message,
                showConfirmButton: false,
                timer: 3000
            });

        },
        error: function(response) {
            const errorData = response.responseJSON;

            Swal.fire({
                icon: 'error',
                title: errorData.title,
                text: errorData.error,
            });

            console.error('Error:', errorData);
        }
    });
}

function deleteOrder(id) {

    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')}
    });
    const idpwd = "pwd" + id;
    var pwd = document.getElementById(idpwd).value;


    var formData = {
        id: id, pwd: pwd
    };
    $.ajax({
        type: 'POST',
        url: '/delete_order',
        data: formData,
        cache: false,
        success: function(data) {
            document.getElementById(id).innerHTML = data;
        }
    });
}

function q_add() {

    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')}
    });
    var username = document.getElementById('username').value;
    var tel = document.getElementById('tel').value;
    var option = document.querySelector('input[name="option"]:checked').value;
    var new_option = document.getElementById('new_option').value;
    var formData = {
        username: username, tel: tel, option: option, new_option: new_option
    };
    $.ajax({
        type: 'POST',
        url: '/question',
        data: formData,
        cache: false,
        success: function(data) {

            Swal.fire({
                icon: 'success',
                title: data.title,
                text: data.message,
                showConfirmButton: false,
                timer: 3000
            });

        },
        error: function(response) {
            const errorData = response.responseJSON;

            Swal.fire({
                icon: 'error',
                title: errorData.title,
                text: errorData.error,
            });

            console.error('Error:', errorData);
        }
    });


}
