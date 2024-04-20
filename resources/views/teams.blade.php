@extends('layouts.template')

@section('title', 'Info Teams')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">{{ __('Info Teams') }}</h1>
                    <a href="#" data-toggle="modal" data-target="#addTeamsModal"
                        class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-person-fill-add text-white-50" viewBox="0 0 16 16">
                            <path
                                d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0m-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                            <path
                                d="M2 13c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4" />
                        </svg> Add team
                    </a>
                    @include('layouts.template-components.modal.add-teams-modal')
                </div>

                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> {{ $message }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @elseif ($message = Session::get('danger'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> {{ $message }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="bg-light team1">
                    <div class="container">
                        <div class="row d-grid gap-3">
                            <!-- column  -->
                            @forelse ($teams as $team)
                                <div class="col-lg-12">
                                    <div class="card mb-3 d-grid gap-3 border-1 bg-gray shadow-1-strong"
                                        style="max-width: 540px;">
                                        <div class="row g-0">
                                            <div class="col-md-4">
                                                <img src="/images/{{ $team->image }}" class="img-fluid rounded-start"
                                                    alt="..." style="height: 187px;">
                                            </div>
                                            <div class="col-md-8">
                                                <button type="button"
                                                    class="position-absolute top-0 end-0 m-2 btn btn-outline-secondary border-0"
                                                    href="#" data-toggle="modal"
                                                    data-target="#showTeamsModal-{{ $team->id }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001" />
                                                    </svg>
                                                    <span class="visually-hidden">Button</span>
                                                </button>
                                                @include('layouts.template-components.modal.show-team-modal')
                                                <div class="card-body d-grid gap-2 mt-2">
                                                    <h6 class="card-title ml-3 font-weight-bold">
                                                        <span class="mr-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="currentColor"
                                                                class="mb-1 bi bi-person-fill" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                                                            </svg>
                                                        </span>
                                                        {{ $team->name }}

                                                    </h6>
                                                    <h6 class="card-title ml-3">
                                                        <span class="mr-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="currentColor"
                                                                class="mb-1 bi bi-buildings-fill" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M15 .5a.5.5 0 0 0-.724-.447l-8 4A.5.5 0 0 0 6 4.5v3.14L.342 9.526A.5.5 0 0 0 0 10v5.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V14h1v1.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5zM2 11h1v1H2zm2 0h1v1H4zm-1 2v1H2v-1zm1 0h1v1H4zm9-10v1h-1V3zM8 5h1v1H8zm1 2v1H8V7zM8 9h1v1H8zm2 0h1v1h-1zm-1 2v1H8v-1zm1 0h1v1h-1zm3-2v1h-1V9zm-1 2h1v1h-1zm-2-4h1v1h-1zm3 0v1h-1V7zm-2-2v1h-1V5zm1 0h1v1h-1z" />
                                                            </svg>
                                                        </span>
                                                        {{ $team->role }}
                                                    </h6>
                                                    <h6 class="card-title ml-3">
                                                        <span class="mr-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="currentColor"
                                                                class="mb-1 bi bi-mortarboard-fill" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917z" />
                                                                <path
                                                                    d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466z" />
                                                            </svg>
                                                        </span>
                                                        {{ $team->university }}
                                                    </h6>
                                                    <div class="card-title ml-3 d-flex gap-2">
                                                        <span>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="currentColor"
                                                                class="mb-3 bi bi-envelope-fill" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414zM0 4.697v7.104l5.803-3.558zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586zm3.436-.586L16 11.801V4.697z" />
                                                            </svg>
                                                        </span>
                                                        <h6 class="ml-1 text-muted">
                                                            {{ $team->email }}
                                                        </h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <h6 class="text-center text-muted">No Team Added</h6>
                            @endforelse
                            <nav aria-label="...">
                                <ul class="pagination">
                                    {{ $teams->links() }}
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
