@extends('acc_template')
@section('content')
    <style>
        .dis-icon {
            color: grey;
            cursor: not-allowed;
            opacity: 0.5;
            pointer-events: none;
        }
    </style>
    <center>
        <h1>Accessor</h1>
    </center>



    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <span style="color: red">* please careful because if you delete from here it will delete from the database!!</span>
                    <table id="participants">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>action</th>
                            </tr>

                        </thead>
                        <tbody id="myList3">
                            @php
                                $i = 1;
                            @endphp

                            @foreach ($delete as $del)
                                
                                <tr>


                                    <td>{{ $del->name }}</td>
                                    <td>{{ $del->email }}</td>
                                    


                                    

                                    <td>
                                        <div class="row">
                                           
                                                <div class="col"><a href="{{ route('Urestore', $del->id) }}"
                                                        aria-disabled="true"><i class="fas fa-trash-restore "></i></a></div>
                                           
                                            
                                            <div class="col"><a href="{{ route('UDdelete', $del->id) }}"><i
                                                        class="fas fa-trash-alt igreen"></i></a></div>




                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>


    <div class="d-flex justify-content-between">

        <input id="myInput" type="text" placeholder="Search by name..">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Show deleted
        </button>

    </div>

    <h1>{{ $var }}</h1>
    <div class="progress mb-3" style="margin-bottom: 20px; margin-top: 20px;">
        <div id="progress" class="progress-bar" role="progressbar" aria-label="Example with label" style="width: 25%;"
            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{ $var }}</div>
    </div>
    {{-- <div class="d-flex justify-content-end">
        @if ($var === '100%')
            <button class="btn btn-primary mb-3">Download</button>
        @else
            <button class="btn btn-primary mb-3" disabled>Download</button>
        @endif
    </div> --}}



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
                            @if ($var === '100%')
                                <div class="col"><a href="{{ route('report_inv', $pax->id) }}" aria-disabled="true"><i
                                            class="fas fa-download "></i></a></div>
                            @else
                                <div class="col"><a href="{{ route('report_inv', $pax->id) }}" class="dis-icon"
                                        aria-disabled="true"><i class="fas fa-download dis-icon "></i></a></div>
                            @endif
                            <div class="col"><a href="{{ route('remarks', $pax->id) }}" aria-disabled="true"><i
                                        class="	fas fa-edit"></i></a></div>
                            <div class="col"><a href="{{ route('Udelete', $pax->id) }}"><i
                                        class="fas fa-trash-alt igreen"></i></a></div>




                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <script>
        $(document).ready(function() {
            $("#progress").css('width', "<?php echo $var; ?>");

            //cont
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myList3 tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });

        });
    </script>
@endsection
