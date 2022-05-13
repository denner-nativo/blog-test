
const user = JSON.parse(localStorage.getItem('user'));
const token = JSON.parse(localStorage.getItem('token'));

getData()

function getData() {

    $.ajax({
        url: "/api/v1/blogs/counter/" + user.id,
        type: 'GET',
        headers: { "Authorization": token },
        success: (data, textStatus, xhr) => {
            if (xhr.status === 200) {
                //Render blogs
                $('#info').append(`<li>Name: ${user.name}</li>`)
                $('#info').append(`<li>Lastname: ${user.lastname}</li>`)
                $('#info').append(`<li>Email: ${user.email}</li>`)
                $('#info').append(`<li>Blogs counter: ${data}</li>`)
            }
        },
        error: (xhr) => {
            if (xhr.status === 401) {
                Swal.fire({
                    title: "Unauthorized",
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
}

$('#name').val(user.name)
$('#lastname').val(user.lastname)
$('#email').val(user.email)


$('#modalEdit').on('submit', (e) => {
    e.preventDefault();

    const data = {
        name: $('#name').val().trim(),
        lastname: $('#lastname').val().trim(),
        email: $('#email').val().toLowerCase().trim(),
        role_id: user.role_id,
        __token: $('input[name="_token"]').val(),
    }

    $.ajax({
        url: `/api/v1/user/${user.id}`,
        type: 'PUT',
        data: data,
        success: (data, textStatus, xhr) => {
            if (xhr.status === 200) {
                user.name = data.name;
                user.lastname = data.lastname;
                user.email = data.email;

                localStorage.setItem('user', JSON.stringify(user));

                Swal.fire({
                    title: "User updated!",
                    confirmButtonText: "Accept",
                    icon: 'success',
                    confirmButtonColor: "#0B5ED7"
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
})