<div class="modal fade" id="editQuantum" tabindex="-1" aria-labelledby="editQuantumLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header py-2">
                <h5 class="modal-title fs-6" id="editQuantumLabel">Edit Quantum</h5>
                <button type="button" class="btn-close p-1" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form enctype="multipart/form-data" class="compact-form" id = "editForm">
                <div class="modal-body p-1">
                    <div id = "response" class="mb-auto text-center">

                    </div>
                    <!-- Subject Field -->
                    <div class="mb-0.5">
                        <label for="subject" class="form-label small">Subject</label>
                        <input type="text" class="form-control form-control-sm" id="subjectEdit" name="subject" required>
                    </div>
                    
                    <!-- Year Field -->
                    <div class="mb-0.5">
                        <label for="year" class="form-label small">Year</label>
                        <input type="number" class="form-control form-control-sm" id="yearEdit" name="year" min="1" max="4" required>
                    </div>
                    
                    <!-- Course Field -->
                    <div class="mb-0.5">
                        <label for="course" class="form-label small">Course</label>
                        <select class="form-select form-select-sm" id="courseEdit" name="course" required>
                            @foreach ($courses as $course)
                                <option value="{{ $course }}">{{ $course }} </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <!-- File Upload Field -->
                    <div class="mb-0.5">
                        <label for="fileUpload" class="form-label small">Replace File</label>
                        <input class="form-control form-control-sm" type="file" id="file" name="file">
                    </div>
                </div>
                <div class="modal-footer py-2">
                    <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-sm btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
