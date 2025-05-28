<div class="container mt-4">
    <div class="table-responsive">
        <table class="table table-bordered table-hover" id = "show-quantum">
            <thead class="table-dark">
                <tr>
                    <th scope="col">S.No</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($quantums as $quantum)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$quantum->subject}}</td>
                    <td>
                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#pdfModal" data-url="{{ $quantum->location }}">
                            View
                        </button>
                        <a href="{{ $quantum->location }}" class="btn btn-success btn-sm" download>
                            Download
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
