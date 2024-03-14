$(function () {
    $("#form-absen").on("submit", function (e) {
        e.preventDefault();
        var route = $("#form-absen").data("route");
        var form_data_metaheader = $(this);
        var id_asisten = $("input[name=id_asisten]").val();
        var kelas = $("select[name=kelas]").val();
        var materi = $("select[name=materi]").val();
        var teaching_role = $("select[name=teaching_role]").val();
        var duration = $("select[name=duration]").val();
        var kode = $("input[name=code]").val();
        var formData = new FormData();
        formData.append("id_asisten", id_asisten);
        formData.append("kelas", kelas);
        formData.append("materi", materi);
        formData.append("teaching_role", teaching_role);
        formData.append("duration", duration);
        formData.append("code", kode);
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
                        text: "Anda Berhasil Absen Masuk, Jangan Lupa Untuk Absen Keluar Setelah Mengajar",
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
                        text: "Kode Absen Tidak Bisa Digunakan / Tidak Valid, Silahkan Minta PJ atau Staff Untuk Kode Absen Baru",
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
            .catch((err) => { });
    });
});
