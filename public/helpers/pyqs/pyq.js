//----------------------------------DISPLAYING THE PYQs--------------------------------------------------//

function viewPYQ() {
    $.ajax({
        url: "/admin/viewPYQs",
        success: function show(data) {
            $("#display-content").html(data);
            deleteEventAdder();
            $("#show-pyq").DataTable();
        },
    });
}
$("#view-pyq").on("click", viewPYQ);

//----------------Applying 'delete' functionality on each button-------------------------------------//

function deleteEventAdder() {
    $(".delete-pyq").each(function () {
        const $form = $(this);

        $form.off("submit").on("submit", function (e) {
            e.preventDefault(); // Stop the form from submitting normally

            const id = $(this).data("id");
            const formData = new FormData(this);

            $.ajax({
                url: `/admin/deletePYQ/${id}`,
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                success: function () {
                    viewPYQ(); // Refresh the table or view

                    Swal.fire({
                        title: "Deleted!",
                        text: "PYQ deleted successfully.",
                        icon: "success",
                        confirmButtonText: "OK",
                        customClass: {
                            confirmButton: "btn btn-success",
                        },
                        buttonsStyling: true,
                    });
                },
                error: function (xhr) {
                    Swal.fire("Error", "Could not delete the PYQ.", "error");
                }
            });
        });
    });
}


//--------------------------------ADDING THE PYQs----------------------------------------------------//
function addPYQs() {
    $("#add-pyq").off('submit').on("submit", function adder(e) {
        e.preventDefault();
        $.ajax({
            url: `/admin/addPYQ`,
            type: "POST",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            processData: false,
            contentType: false,
            data:new FormData(this),
            success: function adding() {
                viewPYQ();
                $("#add-pyq")[0].reset();
                const modal = bootstrap.Modal.getInstance(document.getElementById('addPYQModal'));
                modal.hide();
                Swal.fire({
                    title: "ADDED..!",
                    text: "PYQ added successfully.",
                    icon: "success",
                    confirmButtonText: "OK",
                    customClass: {
                        confirmButton: "btn btn-success",
                    },
                    buttonsStyling: true,
                });
                
            },
        });
    });
}

//----------------------------------EDITING THE PYQs AND AUTO FILLING--------------------------------//

function autofill(button) {
    let course = button.dataset.course;
    let course_year = button.dataset.course_year;
    let examination_year = button.dataset.examination_year;
    let subject = button.dataset.subject;
    let id = button.dataset.id;
    console.log(course,subject,examination_year,course_year);
    
    $("#courseE").val(course);
    $("#subjectE").val(subject);
    $("#examination_yearE").val(examination_year);
    $("#course_yearE").val(course_year);

    $("#edit-pyq").off('submit').on("submit", function editor(e) {
        e.preventDefault();
        this.ajax({
            url: `admin/editPYQs/${id}`,
            type: "POST",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data : new FormData(this),
            processData: false,
            contentType: false,
            success: function onEdit() {
                viewPYQ();
                Swal.fire({
                    title: "Edited!",
                    text: "PYQ edited successfully.",
                    icon: "success",
                    confirmButtonText: "OK",
                    customClass: {
                        confirmButton: "btn btn-success",
                    },
                    buttonsStyling: true,
                });
            },
        });
    });
}
$("#addPYQModal").on("show.bs.modal", addPYQs);
$('#editPYQModal').on('show.bs.modal',function (event){
    button = event.relatedTarget;
    autofill(button);
});
