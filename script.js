$(document).ready(function() {
    $('#registrationForm').on('submit', function(e) {
        let valid = true;
        $('.error-message').hide();

        const fullName = $('#fullName').val().trim();
        if (!fullName) { showError('#fullName','Full Name is required'); valid = false; }

        const email = $('#email').val().trim();
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!email) { showError('#email','Email is required'); valid = false; }
        else if (!emailRegex.test(email)) { showError('#email','Enter a valid email'); valid = false; }

        const phone = $('#phone').val().trim();
        if (!phone) { showError('#phone','Phone is required'); valid = false; }

        if (!$('#course').val()) { showError('#course','Select a course'); valid = false; }

        if (!valid) e.preventDefault();
    });

    function showError(selector, message) {
        $(selector).css('border-color','var(--error)').next('.error-message').text(message).show();
    }

    $('input,select,textarea').on('input change', function(){
        $(this).css('border-color','').next('.error-message').hide();
    });
});
