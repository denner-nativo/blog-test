

$("#registerForm").on('submit', (e) => {
    e.preventDefault();

    const data = {
        name: $('#name').val().trim(),
        lastname: $('#lastname').val().trim(),
        email: $('#email').val().toLowerCase().trim(),
        password: $('#password').val().trim(),
        confirmPassword: $('#confirmPassword').val().trim(),
        __token: $('input[name="_token"]').val(),
    }

    if (data.confirmPassword !== data.password) {
        Swal.fire({
            title: "Passwords are different",
            text: "Please confirm your password",
            confirmButtonText: "Accept",
            icon: 'error',
            confirmButtonColor: "#0B5ED7"
        })
        return;
    }

    $.ajax({
        url: '/api/v1/user',
        type: 'POST',
        data: data,
        success: (data, textStatus, xhr) => {
            if (xhr.status === 201) {
                Swal.fire({
                    title: "Account created!",
                    text: "Now you can log in to the Blog",
                    confirmButtonText: "Go to Log in",
                    icon: 'success',
                    confirmButtonColor: "#0B5ED7"
                }).then(res => {
                    window.location.href = "/auth/login";
                })
            }
        },
        error: (xhr) => {
            if (xhr.status === 422) {
                Swal.fire({
                    title: "Problems creating your account",
                    text: "Verify if you have complete correctly the fields.",
                    confirmButtonText: "Accept",
                    icon: 'error',
                    confirmButtonColor: "#0B5ED7"
                })
            } else {
                Swal.fire({
                    title: "We are having some issues",
                    text: "Please try again in a couple of minutes. If this error continues, please contact to support.",
                    confirmButtonText: "Accept",
                    icon: 'error',
                    confirmButtonColor: "#0B5ED7"
                })
            }
        }
    })
});