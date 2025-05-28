<div class="table-responsive">
  <table class="table table-bordered" id="tableViewQuantums">
    <thead class="table-dark">
      <tr>
        <th>Course</th>
        <th>Subject</th>
        <th>Year</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($quantums as $ele)
      <tr>
      <td>{{$ele->course}}</td>
      <td>{{$ele->subject}}</td>
      <td>{{$ele->year}}</td>
      <td>
        <div class="btn-group" role="group">
        <!-- Edit Button -->
        <a href="" class="btn btn-primary btn-sm" data-bs-course="{{ $ele->course }}"
          data-bs-subject="{{ $ele->subject }}" data-bs-year="{{ $ele->year }}" data-bs-id="{{ $ele->id }}"
          data-bs-toggle="modal" data-bs-target="#editQuantum">
          <i class="bi bi-pencil-fill me-1"></i> Edit
        </a>

        <!-- Delete Button -->
        <form method="POST" data-id="{{$ele->id}}" class="d-inline deleteQuantum">
          <button  type="submit" class="btn btn-danger btn-sm ms-2">
          <i class="bi bi-trash-fill me-1"></i> Delete
          </button>
        </form>
        </div>
      </td>
      </tr>
    @endforeach
    </tbody>
  </table>
</div>