<div class="modal fade text-left" id="addQuantumModal" tabindex="-1" aria-labelledby="myModalLabel33" >
  <div class="modal-dialog modal-dialog-centered modal-lg"> <!-- centered & larger width -->
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel33">ADD QUANTUMS</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form method="POST" id="add-quantum">
        @csrf
        <div class="modal-body">
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label fw-bold">Course:</label>
              <select name="course" class="form-select border-primary" required>
                @foreach($courses as $course)
                  <option value="{{ $course }}">{{ $course }}</option>
                @endforeach
              </select>
            </div>

            <div class="col-md-6">
              <label class="form-label fw-bold">Subject:</label>
              <input type="text" name="subject" placeholder="Subject" class="form-control" required>
            </div>

            <div class="col-md-6">
              <label class="form-label fw-bold">Year:</label>
              <input type="number" name="year" placeholder="Year" class="form-control" max="5" required>
            </div>

            <div class="col-md-6">
              <label class="form-label fw-bold">File:</label>
              <input type="file" name="file" class="form-control" required>
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-outline-primary">Submit</button>
        </div>
      </form>

    </div>
  </div>
</div>
