@extends('layouts.app') @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Task</div>
                <div class="card-body">
                    <form action="{{ route('tasks.store') }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <label
                                for="assigned_to"
                                class="form-label"
                                data-bs-toggle="dropdown"
                                data-bs-auto-close="inside"
                                >Assigned To</label
                            >

                            <div class="col-10">
                                <div>
                                    <select
                                        class="form-select"
                                        id="assigned_to"
                                        name="assigned_to_id"
                                        required
                                    >
                                        <option value="">Select a user</option>
                                        @foreach($users as $user)
                                        <option value="{{ $user->id }}">
                                            {{ $user->name }}
                                        </option>

                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-2">
                                @if ($users->hasMorePages())
                                <div class="text-center">
                                    <button
                                        class="btn btn-secondary"
                                        id="loadMoreUsers"
                                        type="button"
                                    >
                                        Load More
                                    </button>
                                </div>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input
                                type="text"
                                class="form-control"
                                id="title"
                                name="title"
                                required
                            />
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label"
                                >Description</label
                            >
                            <textarea
                                class="form-control"
                                id="description"
                                name="description"
                                required
                            ></textarea>
                        </div>

                        <div class="row mb-3">
                            <label
                                for="assigned_by"
                                class="form-label"
                                data-bs-toggle="dropdown"
                                data-bs-auto-close="inside"
                                >Assigned By</label
                            >

                            <div class="col-10">
                                <div>
                                    <select
                                        class="form-select"
                                        id="assigned_by"
                                        name="assigned_by_id"
                                        required
                                    >
                                        <option value="">Select an admin</option>
                                        @foreach($admins as $admin)
                                        <option value="{{ $admin->id }}">
                                            {{ $admin->name }}
                                        </option>

                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-2">
                                @if ($admins->hasMorePages())
                                <div class="text-center">
                                    <button
                                        class="btn btn-secondary"
                                        id="loadMoreAdmins"
                                        type="button"
                                    >
                                        Load More
                                    </button>
                                </div>
                                @endif
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            Create Task
                        </button>

                        <!-- list errors -->
                        @if ($errors->any())
                        <div class="alert alert-danger mt-3">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function loadMoreData(url, targetId) {
        fetch(url)
            .then((response) => response.text())
            .then((html) => {
                const tempDiv = document.createElement("div");
                tempDiv.innerHTML = html;

                tempDiv.querySelectorAll("option").forEach((option) => {
                    document.getElementById(targetId).appendChild(option);
                });
            });
    }

    document
        .getElementById("loadMoreUsers")
        .addEventListener("click", function () {
            const nextPageUrl = "{{ $users->nextPageUrl() }}";
            if (nextPageUrl) {
                loadMoreData(nextPageUrl, "assigned_to");
            }
        });

    document
        .getElementById("loadMoreAdmins")
        .addEventListener("click", function () {
            const nextPageUrl = "{{ $admins->nextPageUrl() }}";
            if (nextPageUrl) {
                loadMoreData(nextPageUrl, "assigned_by");
            }
        });
</script>

@endsection
