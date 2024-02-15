

const refs = {
    openModalBtn: document.querySelector("[data-modal-open]"),
    closeModalBtn: document.querySelector("[data-modal-close]"),
    modal: document.querySelector("[data-modal]"),
};

function toggleModal() {
    refs.modal.classList.toggle("is-hidden");
}

(() => {
    refs.openModalBtn.addEventListener("click", toggleModal);
    refs.closeModalBtn.addEventListener("click", toggleModal);
  })();

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
