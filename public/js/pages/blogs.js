
const user = JSON.parse(localStorage.getItem('user'));
const token = JSON.parse(localStorage.getItem('token'));

getBlogs();

function getBlogs() {
    const url = user.role_id === 1 ? "/api/v1/blogs" : `/api/v1/blogs/${user.id}`;
    $.ajax({
        url,
        type: 'GET',
        headers: { "Authorization": token },
        success: (data, textStatus, xhr) => {
            if (xhr.status === 200) {
                //Render blogs
                
                data.data.forEach(blog => {
                    $('#blogs-container').append(getBlogHtml(blog, blog.id))
                });

                const prev = data.first_page_url ?? data.prev_page_url;
                const next = data.next_page_url ?? data.last_page_url;

                $('#paginator').append(`<li class="page-item" id="prev-page-li"><a class="page-link" id="prev-page" onclick="getLink('${prev}')">Previous</a></li>`) //"prev_page_url"
                $('#paginator').append(getSelect(data))
                $('#paginator').append(`<li class="page-item" id="next-page-li"><a class="page-link" id="next-page" onclick="getLink('${next}')">Next</a></li>`)
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
            <h6 class="card-subtitle mb-2 text-muted">By ${data.user.name} ${data.user.lastname}</h6>
            <p class="card-text">${data.description}</p>
            <a class="btn btn-primary" id="blog-update-${id}">Update</a>
            <a class="btn btn-danger" id="blog-delete-${id}">Delete</a>
        </div>
    </div> <hr>`;
}

function getSelect(data) {
    let options = "";

    for (let index = 0; index < data.last_page; index++) {

        const element = index+1 === data.current_page ?
            `<option value="${index + 1}" selected>${index + 1}</option> ` :
            `<option value="${index + 1}">${index + 1}</option> `;
        options += element;
    }

    const layout = `
        <li class="page-item">
            <select class="form-select" aria-label="" onchange="getPage(event)" id="paginatorSelect">
                ${options}
            </select>
        </li>
        `;

    return layout;
}

function getLink(link) {
    $.ajax({
        url: link,
        type: 'GET',
        headers: { "Authorization": token },
        success: (data, textStatus, xhr) => {
            if (xhr.status === 200) {
                //Render blogs
                $('#blogs-container').empty();
                data.data.forEach(blog => {
                    $('#blogs-container').append(getBlogHtml(blog, blog.id))
                });

                const prev = data.first_page_url ?? data.prev_page_url;
                const next = data.next_page_url ?? data.last_page_url;
                $('#paginator').empty();
                $('#paginator').append(`<li class="page-item" id="prev-page-li"><a class="page-link" id="prev-page" onclick="getLink('${prev}')">Previous</a></li>`);
                $('#paginator').append(getSelect(data))
                $('#paginator').append(`<li class="page-item" id="next-page-li"><a class="page-link" id="next-page" onclick="getLink('${next}')">Next</a></li>`)
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

function getPage(page) {
    const link = `http://127.0.0.1:8000/api/v1/blogs/2?page=${page.target.value}`
    $.ajax({
        url: link,
        type: 'GET',
        headers: { "Authorization": token },
        success: (data, textStatus, xhr) => {
            if (xhr.status === 200) {
                //Render blogs
                $('#blogs-container').empty();
                data.data.forEach(blog => {
                    $('#blogs-container').append(getBlogHtml(blog, blog.id))
                });

                const prev = data.first_page_url ?? data.prev_page_url;
                const next = data.next_page_url ?? data.last_page_url;
                $('#paginator').empty();
                $('#paginator').append(`<li class="page-item" id="prev-page-li"><a class="page-link" id="prev-page" onclick="getLink('${prev}')">Previous</a></li>`);
                $('#paginator').append(getSelect(data))
                $('#paginator').append(`<li class="page-item" id="next-page-li"><a class="page-link" id="next-page" onclick="getLink('${next}')">Next</a></li>`)
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

