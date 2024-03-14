$(function () {
    $("#form-data-asisten").on("submit", function (e) {
        e.preventDefault();
        var route = $("#form-data-asisten").data("route");
        var form_data_metaheader = $(this);
        var id_asisten = $("input[name=id_asisten]").val();
        var name = $("input[name=name]").val();
        var created_at = $("input[name=created_at]").val();
        var role = $("select[name=role]").val();
        var photo = $("input[name=photo]")[0].files[0];
        var email = $("input[name=email]").val();
        var password1 = $("input[name=password1]").val();
        var password2 = $("input[name=password2]").val();
        var formData = new FormData();
        formData.append("id_asisten", id_asisten);
        formData.append("name", name);
        formData.append("created_at", created_at);
        formData.append("role", role);
        formData.append("photo", photo);
        formData.append("email", email);
        formData.append("password1", password1);
        formData.append("password2", password2);
        axios.post(route, formData, {
            headers: {
                "Content-Type": "multipart/form-data",
            },
        })
            .then((res) => {
                var Response = res.data;
                console.log(Response["success"]);
                if (Response["success"]) {
                    Swal.fire({
                        title: "Success",
                        text: "Data Has Been Saved",
                        icon: "success",
                        confirmButtonColor: "#3085d6",
                        confirmButtonText: "Ok",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    });
                } else if (Response["error"]) {
                    Swal.fire({
                        title: "Error",
                        text: "Data can't be updated",
                        icon: "error",
                        confirmButtonColor: "#3085d6",
                        confirmButtonText: "Ok",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    });
                } else {
                    Swal.fire({
                        title: "Error",
                        text: "Re Type Password Not Same !",
                        icon: "error",
                        confirmButtonColor: "#3085d6",
                        confirmButtonText: "Ok",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    });
                }

            })
            .catch((err) => { });
    });
});
