<div class="table-responsive">
    <table class="table" id="show-pyq">
        <thead class="table-light">
            <tr>
                <th>Course</th>
                <th>Subject</th>
                <th>Course Year</th>
                <th>Examination Year</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pyqs as $ele)
                <tr class="align-middle">
                    <td>{{$ele->course}}</td>
                    <td>{{$ele->subject}}</td>
                    <td>{{$ele->course_year}}</td>
                    <td>{{$ele->examination_year}}</td>
                    <td>
                        <div class="d-flex gap-2 align-items-center">

                            <!-- Edit Button -->
                            <button type="button" class="btn btn-outline-primary btn-sm d-flex align-items-center"
                                data-id="{{ $ele->id }}" 
                                data-course="{{ $ele->course }}" 
                                data-subject="{{ $ele->subject }}"
                                data-course_year="{{ $ele->course_year }}"
                                data-examination_year="{{ $ele->examination_year }}"
                                data-bs-toggle="modal" data-bs-target = "#editPYQModal">
                                <i class="bi bi-pencil-square me-1"></i> Edit
                            </button>

                            <!-- Delete Button in Form -->
                            <form method="POST" class="delete-pyq" data-id="{{ $ele->id }}">
                                <button type="submit" class="btn btn-outline-danger btn-sm d-flex align-items-center">
                                    <i class="bi bi-trash me-1"></i> Delete
                                </button>
                            </form>

                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>