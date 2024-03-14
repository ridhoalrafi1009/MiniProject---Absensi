$(function () {
    $("#form-update-absen").on("submit", function (e) {
        e.preventDefault();
        var route = $("#form-update-absen").data("route");
        axios.post(route, {
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
                        text: "Anda Berhasil Absen Keluar, ",
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
                        text: "Error Pada Proses Absen Keluar",
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
                        text: "Unknown Error, Tidak Bisa Absen",
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
