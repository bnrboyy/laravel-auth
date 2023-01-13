async function onLogout() {
    const response = await axios({
        url: "api/auth/logout",
        method: "GET",
    });
    if (response.data.message == "ok") {
        alert("Logout success");
        location.href = "/login";
    } else {
        alert("Error");
        location.reload();
    }
}

// function onClick() {
//     const data = document.querySelector('.box-container') // insert html function
//     let html = '<h1>This is content</h1>'
//     data.insertAdjacentHTML('afterbegin', html)
// }

function onClickAdmin() {
    axios({
        url: "/api/auth/adminData",
        method: "GET",
    })
        .then(() => {
            console.log("ok");
            location.reload();
        })
        .catch((error) => {
            console.log("error");
        });
}

function onClickUser() {
    axios({
        url: "/api/auth/userData",
        method: "GET",
    })
        .then(() => {
            console.log("ok");
            location.reload();
        })
        .catch((error) => {
            console.log("error");
        });
}
