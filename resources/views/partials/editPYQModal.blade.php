<!-- Bootstrap 5 Modal -->
<div class="modal fade" id="editPYQModal" tabindex="-1" aria-labelledby="addPyqModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content rounded-3 shadow">
            <div class="modal-header  text-white">
                <h5 class="modal-title" id="addPyqModalLabel">Add PYQ</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>

            <form id="edit-pyq" method="POST" enctype="multipart/form-data">
                <div class="modal-body">

                    <!-- Course Dropdown -->
                    <div class="mb-3">
                        <label for="course" class="form-label">Course</label>
                        <select class="form-select" id="courseE" name="course" required>
                            <option value="">Select a course</option>
                            <!-- Dynamically populate options via Blade or JS -->
                                @foreach($courses as $course)
                                    <option value="{{ $course }}">{{ $course }}</option>
                                @endforeach
                        </select>
                    </div>

                    <!-- Subject Input -->
                    <div class="mb-3">
                        <label for="subject" class="form-label">Subject</label>
                        <input type="text" class="form-control" id="subjectE" name="subject" required>
                    </div>

                    <!-- Course Year Dropdown -->
                    <div class="mb-3">
                        <label for="course_year" class="form-label">Course Year</label>
                        <select class="form-select" id="course_yearE" name="course_year" required>
                            <option value="">Select year</option>
                            @for($i = 1; $i <= 5; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>

                    <!-- Examination Year -->
                    <div class="mb-3">
                        <label for="examination_year" class="form-label">Examination Year</label>
                        <input type="number" class="form-control" id="examination_yearE" name="examination_year"
                            placeholder="e.g. 2023" required>
                    </div>

                    <div class="mb-3">
                        <label for="file" class="form-label">Upload PYQ</label>
                        <input type="file" class="form-control" id="file" name="file" placeholder="e.g. 2023" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Add PYQ</button>
                </div>
            </form>
        </div>
    </div>
</div>