
$.get("rest/users/readAll.php", function (data) {
    data.records.forEach((user) => {
      let userHTML = `<div class="col-3">
                <div class="user" id="user">
                    <h3>${user.name}</h3>
                    <p>${user.email}</p>
                    <p>${user.phone}</p>
                    <p>${user.country}</p>
                    <p>${user.gender}</p>
                </div>
            </div>`;

      document
        .getElementById("usersContainer")
        .insertAdjacentHTML("beforeend", userHTML);
    });
});
