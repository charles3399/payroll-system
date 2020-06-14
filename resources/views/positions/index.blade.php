@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3>Positions</h3>
                <a class="btn btn-primary" href="{{ route('home') }}" role="button"><span>Back to dashboard</span></a>
            </div>
            <div class="card-body">
                <table class="table" id="myTable">
                    <thead>
                        <tr>
                            <th>Position name</th>
                            <th>Basic pay (per hour)</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    @foreach ($positions as $position)
                        <tbody>
                            <tr>
                                <td><a href="{{route('positions.show', $position->id)}}">{{ $position->name }}</a></td>
                                <td>₱{{ $position->basic_pay }}</td>
                                <td class="d-flex justify-content-between"><a href="{{route('positions.edit', $position->id)}}"><button class="btn btn-outline-primary">Edit</button></a>
                                    <form action="{{ route('positions.destroy', $position->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-outline-danger" type="submit">Delete</button>
                                    </form>
                                </td>

                            </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>
@endsection