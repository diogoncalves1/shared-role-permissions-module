const inputCode = document.querySelector("[name='code']");
const errorFeedbackCode = document.getElementById("errorFeedbackCode");

inputCode.addEventListener("input", function () {
    checkPermissionCode(this.value);
});

async function checkPermissionCode(code) {
    var url = "/api/shared-permissions/check-code";
    var id = window.location.pathname
        .replace("/admin/shared-permissions/", "")
        .replace("/edit", "");

    var response = await $.ajax({
        url: url,
        type: "GET",
        data: {
            code: code,
            id: id ?? null,
        },
    });

    if (response.exists) {
        inputCode.classList.remove("is-valid");
        inputCode.classList.add("is-invalid");
        errorFeedbackCode.innerText = "Esse código já existe";
    } else inputCode.classList.remove("is-invalid");

    return response.exists;
}
