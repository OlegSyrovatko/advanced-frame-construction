
window.addEventListener('scroll', function () {
  var header = document.querySelector('header');
  if (window.scrollY > 1) {
    header.classList.add('sticky');
  } else {
    header.classList.remove('sticky');
  }
});

function projects(dir, page) {

    var next_div = "next_div" + page;
    document.getElementById(next_div).style.display = 'none';
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    var formData = {
        dir: dir,
        page: page
    };
    $.ajax({
        type: 'POST',
        url: '/projects',
        data: formData,
        cache: false,
        success: function success(data) {
            document.getElementById("projects").innerHTML += data;
        }
    });

}
