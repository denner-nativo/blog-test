const user = JSON.parse(localStorage.getItem('user'));
const token = JSON.parse(localStorage.getItem('token'));

if(!user || !token){
    localStorage.clear()
    window.location.href = "/auth/login"
}

$('#blogForm').on('submit', (e) => {
    e.preventDefault();

    const dataToPost = {
        title: $('#blogTitle').val().trim(),
        description: $('#descriptionBlog').val().trim(),
        user_id: user.id
    }

    $.ajax({
        url: "/api/v1/blog",
        type: 'POST',
        headers: { "Authorization": token },
        data: dataToPost,
        success: (data, textStatus, xhr) => {
            if (xhr.status === 201) {
                //Render blogs
                Swal.fire({
                    title: "Blog created!",
                    text: "Now you can see the blog",
                    confirmButtonText: "Accept",
                    icon: 'success',
                    confirmButtonColor: "#0B5ED7"
                }).then(res => {
                    window.location.href = "/blogs";
                })
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
})



