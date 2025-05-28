function viewPYQ() {
    $.ajax({
        url: "/student/viewPYQs",
        success: function show(data) {
            $("#display-content").html(data);
            $("#show-pyq").DataTable();
        },
    });
}
$("#view-pyq").on("click", viewPYQ);
function viewQuantum() {
    $.ajax({
        url: "/student/viewQuantums",
        success: function show(data) {
            $("#display-content").html(data);
            $("#show-quantum").DataTable();
        },
    });
}
$("#view-quantums").on("click", viewQuantum);
const pdfModal = document.getElementById("pdfModal");
pdfModal.addEventListener("show.bs.modal", function (event) {
    const button = event.relatedTarget;
    const pdfUrl = button.getAttribute("data-url");
    const iframe = document.getElementById("pdfFrame");
    iframe.src = pdfUrl;
});

pdfModal.addEventListener("hidden.bs.modal", function () {
    document.getElementById("pdfFrame").src = "";
});
