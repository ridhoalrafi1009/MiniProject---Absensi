$(function () {
    $("#form-data-kode").on("submit", function (e) {
        e.preventDefault();
        var route = $("#form-data-kode").data("route");
        axios.post(route, {
            headers: {
                "Content-Type": "multipart/form-data",
            },
        })
            .then((res) => {
                console.log(res);
                var Response = res.data;
                console.log(Response["kode"]);
                console.log(Response["success"]);
                if (Response["success"]) {
                    Swal.fire({
                        title: "Success",
                        text: "Kode Berhasil Dibuat : " + Response["kode"],
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
                        text: "Gagal Membuat Kode",
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
