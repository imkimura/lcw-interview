$(document).ready(() => {
    $('#contactForm').submit(function(e) {

        var $btn = $(this).find('button[type=submit]');
        var loadingText = '<i class="fa fa-spinner fa-spin"></i> enviando...';
    
        $btn.data('original-text', $btn.html());
        $btn.html(loadingText);
    
        console.log('cheguei aqui')
        $.ajax({
    
            type: "POST",
            url: "email.php",
            data: $('#contactForm').serialize(),
            success: function(data) {
                data = JSON.parse(data)
                console.log(data.success)
                if (!data.success) {
                    $btn.html($btn.data('original-text'));
                    $("#contactForm")[0].reset();
                    $('#msgSubmit').html(data.error).fadeIn(2000).fadeOut(4000);
                } else {
                    $btn.html($btn.data('original-text'));
                    $("#contactForm")[0].reset();
                    $('#msgSubmit').html('<p>' + data.posted + '</p>').fadeIn(2000).fadeOut(4000);
                }
            }
        });
        e.preventDefault();
    });
});