
const user = JSON.parse(localStorage.getItem('user'));
const token = JSON.parse(localStorage.getItem('token'));

getBlogs();

function getBlogs() {
    const url = user.role_id === 1 ? "/api/v1/blogs" : `/api/v1/blogs/${user.id}`;
    $.ajax({
        url,
        type: 'GET',
        headers: {"Authorization": token},
        success: (data, textStatus, xhr) => {
            if (xhr.status === 200) {
                //Render blogs
                console.log(data)
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


function getBlogHtml(data, id) {
    return `<div class="card" style="width: 100%;">
        <div class="card-body">
            <h5 class="card-title">${data.title}</h5>
            <h6 class="card-subtitle mb-2 text-muted">By ${data.blogger}</h6>
            <p class="card-text">${data.description}</p>
            <a class="btn btn-primary" id="blog-update-${id}">Update</a>
            <a class="btn btn-danger" id="blog-delete-${id}">Delete</a>
        </div>
    </div>`;
}

//Btn actions
