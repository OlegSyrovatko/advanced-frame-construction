

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
    var option = document.querySelector('input[name="option"]:checked');
    var new_option = document.getElementById('new_option').value;
    var optionValue = option ? option.value : '';
    var newOptionValue = new_option ? new_option : '';
    var option2 = document.querySelector('input[name="option2"]:checked');
    var optionValue2 = option2 ? option2.value : '';
    var option3 = document.querySelector('input[name="option3"]:checked');
    var new_option3 = document.getElementById('new_option3').value;
    var optionValue3 = option3 ? option3.value : '';
    var newOptionValue3 = new_option3 ? new_option3 : '';
    var option4 = document.querySelector('input[name="option4"]:checked');
    var optionValue4 = option4 ? option4.value : '';
    var new_option5 = document.getElementById('new_option5').value;
    var option6 = document.querySelector('input[name="option6"]:checked');
    var new_option6 = document.getElementById('new_option6').value;
    var optionValue6 = option6 ? option6.value : '';
    var newOptionValue6 = new_option6 ? new_option6 : '';
    var option7 = document.querySelector('input[name="option7"]:checked');
    var new_option7 = document.getElementById('new_option7').value;
    var optionValue7 = option7 ? option7.value : '';
    var newOptionValue7 = new_option7 ? new_option7 : '';
    var option9 = document.querySelector('input[name="option9"]:checked');
    var new_option9 = document.getElementById('new_option9').value;
    var optionValue9 = option9 ? option9.value : '';
    var newOptionValue9 = new_option9 ? new_option9 : '';
    var option10 = document.querySelector('input[name="option10"]:checked');
    var new_option10 = document.getElementById('new_option10').value;
    var optionValue10 = option10 ? option10.value : '';
    var newOptionValue10 = new_option10 ? new_option10 : '';
    var option11 = document.querySelector('input[name="option11"]:checked');
    var new_option11 = document.getElementById('new_option11').value;
    var optionValue11 = option11 ? option11.value : '';
    var newOptionValue11 = new_option11 ? new_option11 : '';
    var option12 = document.querySelector('input[name="option12"]:checked');
    var new_option12 = document.getElementById('new_option12').value;
    var optionValue12 = option12 ? option12.value : '';
    var newOptionValue12 = new_option12 ? new_option12 : '';
    var option13 = document.querySelector('input[name="option13"]:checked');
    var new_option13 = document.getElementById('new_option13').value;
    var optionValue13 = option13 ? option13.value : '';
    var newOptionValue13 = new_option13 ? new_option13 : '';
    var option14 = document.querySelector('input[name="option14"]:checked');
    var new_option14 = document.getElementById('new_option14').value;
    var optionValue14 = option14 ? option14.value : '';
    var newOptionValue14 = new_option14 ? new_option14 : '';
    var option15 = document.querySelector('input[name="option15"]:checked');
    var new_option15 = document.getElementById('new_option15').value;
    var optionValue15 = option15 ? option15.value : '';
    var newOptionValue15 = new_option15 ? new_option15 : '';
    var option16 = document.querySelector('input[name="option16"]:checked');
    var new_option16 = document.getElementById('new_option16').value;
    var optionValue16 = option16 ? option16.value : '';
    var newOptionValue16 = new_option16 ? new_option16 : '';
    var option17 = document.querySelector('input[name="option17"]:checked');
    var new_option17 = document.getElementById('new_option17').value;
    var optionValue17 = option17 ? option17.value : '';
    var newOptionValue17 = new_option17 ? new_option17 : '';
    var option18 = document.querySelector('input[name="option18"]:checked');
    var new_option18 = document.getElementById('new_option18').value;
    var optionValue18 = option18 ? option18.value : '';
    var newOptionValue18 = new_option18 ? new_option18 : '';
    var new_option19 = document.getElementById('new_option19').value;
    var option20 = document.querySelector('input[name="option20"]:checked');
    var new_option20 = document.getElementById('new_option20').value;
    var optionValue20 = option20 ? option20.value : '';
    var newOptionValue20 = new_option20 ? new_option20 : '';
    var new_option21 = document.getElementById('new_option21').value;

    var formData = {
        username: username, tel: tel,
        option: optionValue,
        new_option: newOptionValue,
        option2: optionValue2,
        option3: optionValue3,
        new_option3: newOptionValue3,
        option4: optionValue4,
        new_option5: new_option5,
        option6: optionValue6,
        new_option6: newOptionValue6,
        option7: optionValue7,
        new_option7: newOptionValue7,
        option9: optionValue9,
        new_option9: newOptionValue9,
        option10: optionValue10,
        new_option10: newOptionValue10,
        option11: optionValue11,
        new_option11: newOptionValue11,
        option12: optionValue12,
        new_option12: newOptionValue12,
        option13: optionValue13,
        new_option13: newOptionValue13,
        option14: optionValue14,
        new_option14: newOptionValue14,
        option15: optionValue15,
        new_option15: newOptionValue15,
        option16: optionValue16,
        new_option16: newOptionValue16,
        option17: optionValue17,
        new_option17: newOptionValue17,
        option18: optionValue18,
        new_option18: newOptionValue18,
        new_option19: new_option19,
        option20: optionValue20,
        new_option20: newOptionValue20,
        new_option21: new_option21,
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
