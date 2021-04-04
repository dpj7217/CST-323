@extends('layouts.app')

@section('content')

    <table class="table table-stripped table-responsive ">

        <thead>
            <th>Name</th>
            <th>Email</th>
            <th>Is Admin?</th>
            <th></th>
        </thead>

        <tbody>
        @foreach($users as $user)

            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->isAdmin ? 'Yes' : 'No' }}</td>
                <td>
                    <a class="btn btn-primary" href="{{ route('adminShowUser', $user->id) }}">Details</a>
                </td>
            </tr>

        @endforeach
        </tbody>

    </table>

@endsection
