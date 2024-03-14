$(function () {
    $("#form-data-asisten-edit").on("submit", function (e) {
        e.preventDefault();
        var route = $("#form-data-asisten-edit").data("route");
        var form_data_metaheader = $(this);
        var id = $("input[name=id]").val();
        var id_asisten = $("input[name=id_asistenU]").val();
        var name = $("input[name=nameU]").val();
        var created_at = $("input[name=created_atU]").val();
        var role = $("select[name=roleU]").val();
        var role2 = $("input[name=roleU2").val();
        var photo = $("input[name=photoU]")[0].files[0];
        var email = $("input[name=emailU]").val();
        var password1 = $("input[name=password1U]").val();
        var password2 = $("input[name=password2U]").val();
        var formData = new FormData();
        formData.append("id", id);
        formData.append("id_asisten", id_asisten);
        formData.append("name", name);
        formData.append("created_at", created_at);
        formData.append("role", role);
        formData.append("role2", role2);
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
                console.log(res.data);
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
