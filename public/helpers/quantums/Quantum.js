//--------------------------ADDING QUANTUM---------------------------------------------------------//
function addQuantum() {
    $("#add-quantum").on("submit", function (e) {
        e.preventDefault();
        let formData = new FormData(this);
        // console.log([...new FormData($('#add-quantum')[0]).entries()]);

        $.ajax({
            url: "/admin/addQuantum",
            type: "POST",
            headers: {
                "X-CSRF-TOKEN": $('input[name="_token"]').val(), // CSRF token
            },
            data: formData,
            processData: false,
            contentType: false,
            success: function (data) {
                $("#addQuantumModal").modal("hide");
                $(".modal-backdrop").remove();
                $("body").removeClass("modal-open");
                $("body").css("overflow", "auto");
                Swal.fire({
                    title: "Success!",
                    text: "Quantum Added Successfully!",
                    icon: "success",
                    confirmButtonText: "OK",
                    customClass: {
                        confirmButton: "btn btn-success",
                    },
                    buttonsStyling: false,
                });
                loadQuantumTable();
            },
            error: function (xhr) {
                console.log("Validation errors:", xhr.responseJSON.data);
            },
        });
    });
}
//-----------------------------------DISPLAYING LIST OF QUANTUMS---------------------------------------//
function displayTable() {
    $("#view-quantums").on("click", function () {
        $.ajax({
            url: "/admin/viewQuantums",
            method: "GET",
            success: function (data) {
                $("#display-content").html(data);
                $(".deleteQuantum").each(function () {
                    $(this).on("submit", function (e) {
                        e.preventDefault(); // prevent form from submitting normally

                        let form = $(this);
                        let id = form.data("id");

                        $.ajax({
                            url: `/admin/deleteQuantum/${id}`,
                            type: "POST",
                            headers: {
                                "X-CSRF-TOKEN": $(
                                    'meta[name="csrf-token"]'
                                ).attr("content"),
                            },
                            data: "",
                            processData: false,
                            contentType: false,
                            success: function (response) {
                                loadQuantumTable();
                                Swal.fire({
                                    title: "Deleted!",
                                    text: "Quantum deleted successfully.",
                                    icon: "success",
                                    confirmButtonText: "OK",
                                    customClass: {
                                        confirmButton: "btn btn-success",
                                    },
                                    buttonsStyling: true,
                                });
                            },
                            error: function () {
                                Swal.fire(
                                    "Error",
                                    "Could not delete quantum",
                                    "error"
                                );
                            },
                        });
                    });
                });
                $("#tableViewQuantums").DataTable();

                // Bind delete handler to all .delete-quantum forms
            },
            error: function (err) {
                console.log("Error:", err.responseText);
            },
        });
    });
}

function loadQuantumTable() {
    $.ajax({
        url: "/admin/viewQuantums",
        method: "GET",
        success: function (data) {
            var currentPage = 0;
            if ($.fn.DataTable.isDataTable("#tableViewQuantums")) {
                currentPage = $("#tableViewQuantums").DataTable().page();
                $("#tableViewQuantums").DataTable().destroy();
            }
            $("#display-content").html(data);
            $(".deleteQuantum").each(function () {
                $(this).on("submit", function (e) {
                    e.preventDefault(); // prevent form from submitting normally

                    let form = $(this);
                    let id = form.data("id");

                    $.ajax({
                        url: `/admin/deleteQuantum/${id}`,
                        type: "POST",
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                                "content"
                            ),
                        },
                        success: function (response) {
                            loadQuantumTable();
                            Swal.fire({
                                title: "Deleted!",
                                text: "Quantum deleted successfully.",
                                icon: "success",
                                confirmButtonText: "OK",
                                customClass: {
                                    confirmButton: "btn btn-success",
                                },
                                buttonsStyling: true,
                            });
                        },
                        error: function () {
                            Swal.fire(
                                "Error",
                                "Could not delete quantum",
                                "error"
                            );
                        },
                    });
                });
            });
            var table = $("#tableViewQuantums").DataTable({
                order: [],
            });
            table.page(currentPage).draw(false);
        },
        error: function (err) {
            console.log("Error:", err.responseText);
        },
    });
}
//-------------------------AUTO-FILLING EDIT QUANTUM MODAL-------------------------------------------------//
function autoFill(button) {
    console.log("hellllllllllllllllllllll");

    let id = $(button).data("bs-id");
    let subject = $(button).data("bs-subject");
    let course = $(button).data("bs-course");
    let year = $(button).data("bs-year");
    $("#subjectEdit").val(subject);
    $("#yearEdit").val(year);
    $("#courseEdit").val(course);

    $("#editForm")
        .off("submit")
        .on("submit", function (event) {
            event.preventDefault();
            formData = new FormData(this);
            $.ajax({
                url: `admin/editQuantums/${id}`,
                type: "POST",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                data: formData,

                processData: false,
                contentType: false,
                success: function (response) {
                    $("#editQuantum").modal("hide");
                    $(".modal-backdrop").remove();
                    $("body").removeClass("modal-open");
                    $("body").css("overflow", "auto");
                    $("#editForm")[0].reset();
                    Swal.fire({
                        title: "Success!",
                        text: "Quantum Edited Successfully!",
                        icon: "success",
                        confirmButtonText: "OK",
                        customClass: {
                            confirmButton: "btn btn-success",
                        },
                        buttonsStyling: true,
                    });
                    loadQuantumTable();
                },
                error: function (xhr) {
                    $("#response").html(
                        '<p style="color:red;">An error occurred</p>'
                    );
                },
            });
        });
}
//-------------------------------FOR DELETING A QUANTUM----------------------------------------------//

$(document).ready(displayTable);
$(document).ready(addQuantum);
$("#editQuantum").on("show.bs.modal", function any(event) {
    autoFill(event.relatedTarget);
});
