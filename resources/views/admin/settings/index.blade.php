@extends('layouts.master')
@section('title')
    Settings
@endsection
@section('content')
    @if($settings)
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Settings data</h3>
                    <a href="{{ route('admin.settings.edit') }}" class="btn btn-primary">edit</a>
                </div>
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>System name</th>
                                <th>address</th>
                                <th>phone</th>
                                <th>status</th>
                                <th>added by</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{ $settings['system_name'] }}</td>
                                <td>{{ $settings['address']}}</td>
                                <td>{{ $settings['phone'] }}</td>
                                <td>{{ $settings['status'] == 1 ? 'active' : 'inactive' }}</td>
                                <td>{{ $settings['added_by'] }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </div>
    @else
        <span>there's no data to show</span>
@endif

@endsection
