$(function () {
    $("#form-data-materi-edit").on("submit", function (e) {
        e.preventDefault();
        var route = $("#form-data-materi-edit").data("route");
        var form_data_metaheader = $(this);
        var id = $("input[name=id]").val();
        var materi = $("input[name=materiU]").val();
        var formData = new FormData();
        formData.append("nama_materi", materi);
        formData.append("id", id);
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
                        text: "Data Has Been Updated",
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
                }
            })
            .catch((err) => { });
    });
});
