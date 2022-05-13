

const navLinks = [
    { url: "dashboard", text: "Dashboard", roles: [1, 2, 3] },
    { url: "blogs", text: "Blogs", roles: [1, 2, 3] },
    { url: "users", text: "Users", roles: [1, 2] }
]

setNavsByUser();

function setNavsByUser() {
    const user = JSON.parse(localStorage.getItem('user'));

    const links = navLinks.filter(nl => nl.roles.includes(user.role_id));

    links.forEach(link => {
        const element = `
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="${link.url}">${link.text}</a>
        </li>
        `;
        $("#navBar").append(element);
    })

    const element = `
        <li class="nav-item">
            <a class="nav-link" aria-current="page" onclick="logout()">Log out</a>
        </li>
        `;
    $("#navBar").append(element);

}

function logout() {
    localStorage.clear();
    window.location.href = "/auth/login"
}

