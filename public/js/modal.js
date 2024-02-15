(() => {
    const refs = {
      openModalBtn: document.querySelector("[data-modal-open]"),
      closeModalBtn: document.querySelector("[data-modal-close]"),
      modal: document.querySelector("[data-modal]"),
    };

    refs.openModalBtn.addEventListener("click", toggleModal);
    refs.closeModalBtn.addEventListener("click", toggleModal);

    function toggleModal() {
      refs.modal.classList.toggle("is-hidden");
    }
  })();

function contact_add() {

    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')}
    });
    var username = document.getElementById('username').value;
    var tel = document.getElementById('tel').value;
    var area = document.getElementById('area').value;
    var area = document.getElementById('area').value;
    var formData = {
        username: username, tel: tel, memt: memt, 'area': area, 'comment': comment
    };
    $.ajax({
        type: 'POST',
        url: '/mem_add',
        data: formData,
        cache: false,
        success:function(data){
            document.getElementById("memt_res").innerHTML=data;
            var nseek = data.indexOf("avatar/s");
            if(nseek>0){
                var txt = document.getElementById('memt');
                txt.value = "";
                document.getElementById('mem_add').style.display = 'none';
            }
        }
    });
    document.getElementById('app_mem').innerHTML = "";
    document.getElementById('app_mem_add').innerHTML = "";
}
