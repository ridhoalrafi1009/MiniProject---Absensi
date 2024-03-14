$(function () {
    $("#form-data-kelas").on("submit", function (e) {
        e.preventDefault();
        var route = $("#form-data-kelas").data("route");
        var form_data_metaheader = $(this);
        var jurusan = $("input[name=jurusan]").val();
        var fakultas = $("input[name=fakultas]").val();
        var tingkat = $("input[name=tingkat]").val();
        var nama_kelas = $("input[name=nama_kelas]").val();
        var formData = new FormData();
        formData.append("jurusan", jurusan);
        formData.append("fakultas", fakultas);
        formData.append("tingkat", tingkat);
        formData.append("nama_kelas", nama_kelas);
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
            .catch((err) => {});
    });
});
