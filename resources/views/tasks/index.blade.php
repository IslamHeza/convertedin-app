@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Task List</div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Assigned User</th>
                                <th>Admin Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tasks as $task)
                            <tr>
                                <td>{{ $task->title}}</td>
                                <td>{{ $task->description}}</td>
                                <td>{{ $task->assignedTo->name }}</td>
                                <td>{{ $task->assignedBy->name }}</td>
                            </tr>
                            @endforeach
                            @if($tasks->isEmpty())
                            <tr>
                                <td colspan="4" class="text-center">No records found</td>
                            </tr>
                            @endif
                            <!-- pagination -->
                            <tr>
                                <td colspan="4">
                                    {{ $tasks->links() }}
                                </td>
                            </tr>
                            
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
