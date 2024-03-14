$(function () {
    $("#form-data-kelas-edit").on("submit", function (e) {
        e.preventDefault();
        var route = $("#form-data-kelas-edit").data("route");
        var form_data_metaheader = $(this);
        var id = $("input[name=id]").val();
        var jurusan = $("input[name=jurusanU]").val();
        var fakultas = $("input[name=fakultasU]").val();
        var tingkat = $("input[name=tingkatU]").val();
        var nama_kelas = $("input[name=nama_kelasU]").val();
        var formData = new FormData();
        formData.append("id", id);
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
            .catch((err) => {});
    });
});
