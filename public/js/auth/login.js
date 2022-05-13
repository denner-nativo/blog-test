
$("#loginForm").on('submit', (e) => {
    e.preventDefault();

    const data = {
        email: $('#emailLogin').val().trim().toLowerCase(),
        password: $('#passwordLogin').val().trim(),
        __token: $('input[name="_token"]').val(),
    }

    // if (data.confirmPassword !== data.password) {
    //     Swal.fire({
    //         title: "Passwords are different",
    //         text: "Please confirm your password",
    //         confirmButtonText: "Accept",
    //         icon: 'error',
    //         confirmButtonColor: "#0B5ED7"
    //     })
    //     return;
    // }

    $.ajax({
        url: '/api/v1/auth/login',
        type: 'POST',
        data: data,
        success: (data, textStatus, xhr) => {
            if (xhr.status === 201) {
                localStorage.setItem('token', JSON.stringify(data.token));
                localStorage.setItem('user', JSON.stringify(data.user));
                window.location.href = "/home";
            }
        },
        error: (xhr) => {
            if (xhr.status === 401) {
                Swal.fire({
                    title: "Credentials invalid",
                    text: "Please use a valid email and password.",
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