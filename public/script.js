

$('.app-form').on('submit', function (event) {

    event.preventDefault();

    const CSRF_TOKEN = $('input[name="_token"]').val();                    

    $.ajax({
        url: this.action + "?_token=" + CSRF_TOKEN,
        type: "POST",
        data: new FormData($('.app-form')[0]),
        processData: false,
        contentType: false,
        success: function (response) {

            let formMessage = document.querySelector('.form-message');

            if(formMessage) {

                formMessage.innerHTML += '<div class="alert alert-success">'+response.message+'</div>';

            }
         
        },
        error: function (response) {

            let formMessage = document.querySelector('.form-message');

            if(formMessage) {

                formMessage.innerHTML = '<div class="alert alert-danger">'+response.message+'</div>';

            }
           
        }
    });
});