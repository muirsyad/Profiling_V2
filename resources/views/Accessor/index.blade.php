@extends('admin_template')
@section('content')
    <center>
        <h1>Accessor</h1>
    </center>

    <div class="progress mb-3" style="margin-bottom: 20px; margin-top: 20px;">
        <div id="progress" class="progress-bar" role="progressbar" aria-label="Example with label" style="width: 25%;"
            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{ $var }}</div>
    </div>
    <div class="d-flex justify-content-end">
        @if ($var === '100%')
            <button class="btn btn-primary mb-3">Download</button>
        @else
            <button class="btn btn-primary mb-3" disabled>Download</button>
        @endif
    </div>



    <table id="participants">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Department</th>
                <th>Status</th>
                <th>action</th>
            </tr>

        </thead>
        <tbody id="myList3">
            @php
                $i = 1;
            @endphp

            @foreach ($pax as $pax)
                @php
                    $dp = DB::table('departments')
                        ->where('id', $pax->department_id)
                        ->first();
                    $dp = $dp->department;
                    // dd($pax->status);
                @endphp
                <tr>


                    <td>{{ $pax->name }}</td>
                    <td>{{ $pax->email }}</td>
                    <td>{{ $dp }}</td>


                    @if ($pax->status === 1)
                        <td>
                            <div class="done">Done </div>
                        </td>
                    @elseif ($pax->status === 2)
                        <td class="td-red">
                            <div class="undone">Uncompleted </div>
                        </td>
                    @elseif ($pax->status === 3)
                        <td>
                            <div class="unregister">Acessor</div>
                        </td>
                    @elseif ($pax->status === 4)
                        <td>
                            <div class="done">Acessor</div>
                        </td>
                    @else
                        <td class="td-red">
                            <div class="unregister">Unregister </div>
                        </td>
                    @endif

                    <td>
                        <div class="row">
                            <div class="col"><a href="{{ route('report_inv', $pax->id) }}"><i
                                class="far fa-eye igreen"></i></a></div>
                            <div class="col"><a href="#"><i class="fas fa-trash-alt igreen"></i></a></div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <script>
        $(document).ready(function() {
            $("#progress").css('width', "<?php echo $var; ?>");

        });
    </script>
@endsection