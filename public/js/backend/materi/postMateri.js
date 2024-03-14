$(function () {
    $("#form-data-materi").on("submit", function (e) {
        e.preventDefault();
        var route = $("#form-data-materi").data("route");
        var form_data_metaheader = $(this);
        var materi = $("input[name=nama_materi]").val();
        var formData = new FormData();
        formData.append("nama_materi", materi);
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
                }
            })
            .catch((err) => { });
    });
});
