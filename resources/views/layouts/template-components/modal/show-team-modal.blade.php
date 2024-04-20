<div class="modal fade" id="showTeamsModal-{{ $team->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Team</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="add-form" action="{{ route('team.update', $team->id) }}" method="POST" class="d-grid gap-3" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="name">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                            name="name" value="{{ $team->name }}" required autocomplete="name" placeholder="Name">

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="role">
                        <input id="role" type="text" class="form-control @error('role') is-invalid @enderror"
                            name="role" value="{{ $team->role }}" required autocomplete="role" placeholder="Role">

                        @error('role')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="university">
                        <input id="university" type="text"
                            class="form-control @error('university') is-invalid @enderror" name="university"
                            value="{{ $team->university }}" required autocomplete="university" placeholder="University">

                        @error('education')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="email">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ $team->email }}" required autocomplete="email"
                            placeholder="Email Address">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="image">
                        <label for="image">Image</label>
                        <div class="col-md-4">
                            <img src="/images/{{ $team->image }}" class="img-fluid rounded-start"
                                alt="..." style="height: 187px;">
                        </div>
                        <input id="image" type="file" class="form-control"
                            name="image" autocomplete="image"
                            placeholder="Image">
                            <span class="text-danger" style="font-size: 10px">Maximum Image Size: 2000MB</span>

                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
                <form action="{{ route('team.destroy', $team->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger position-absolute bottom-0" style="margin-bottom: 31px;">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
