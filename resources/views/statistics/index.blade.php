@extends('layouts.app') @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Statistics</div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>User</th>
                                <th>Total Tasks</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($statistics as $index => $record)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $record->user->name }}</td>
                                <td>{{ $record->total_tasks ?? 0 }}</td>
                            </tr>
                            @endforeach
                            @if($statistics->isEmpty())
                            <tr>
                                <td colspan="3" class="text-center">No records found</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
