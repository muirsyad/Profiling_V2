@extends('admin_template')
{{-- @extends('adtemp') --}}
@section('content')
    {{ date('m') }}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <div class="d-sm-flex justify-content-between align-items-center mb-4">
        <h3 class="text-dark mb-0">Dashboard</h3>
        {{-- <a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button"
            href="#"><i class="fas fa-download fa-sm text-white-50"></i>&nbsp;Generate Report</a> --}}
    </div>
    <div class="row">
        <div class="col-md-6 col-xl-3 mb-4">
            <div class="card shadow border-start-primary py-2">
                <div class="card-body">
                    <div class="row align-items-center no-gutters">
                        <div class="col me-2">
                            <div class="text-uppercase text-primary fw-bold text-xs mb-1"><span>Total Complete CLients</span></div>
                            <div class="text-dark fw-bold h5 mb-0"><span>{{ $complete }}</span></div>
                        </div>
                        <div class="col-auto"><i class="fas fa-calendar fa-2x text-gray-300"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3 mb-4">
            <div class="card shadow border-start-success py-2">
                <div class="card-body">
                    <div class="row align-items-center no-gutters">
                        <div class="col me-2">
                            <div class="text-uppercase text-success fw-bold text-xs mb-1"><span>Total Uncomplete clients
                                    </span></div>
                            <div class="text-dark fw-bold h5 mb-0"><span>{{ $uncomplete }}</span></div>
                        </div>
                        <div class="col-auto"><i class="fas fa-dollar-sign fa-2x text-gray-300"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3 mb-4">
            <div class="card shadow border-start-info py-2">
                <div class="card-body">
                    <div class="row align-items-center no-gutters">
                        <div class="col me-2">
                            <div class="text-uppercase text-info fw-bold text-xs mb-1"><span>Total Clients</span></div>
                            <span>{{ $totClients }}</span>
                        </div>
                        <div class="col-auto"><i class="fas fa-clipboard-list fa-2x text-gray-300"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3 mb-4">
            <div class="card shadow border-start-warning py-2">
                <div class="card-body">
                    <div class="row align-items-center no-gutters">
                        <div class="col me-2">
                            <div class="text-uppercase text-warning fw-bold text-xs mb-1"><span>Total 
                                    participants</span></div>
                            <div class="text-dark fw-bold h5 mb-0"><span>{{ $pax }}</span></div>
                        </div>
                        <div class="col-auto"><i class="fas fa-comments fa-2x text-gray-300"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-xl-12">
            <div class="card shadow mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="text-primary fw-bold m-0">List Uncomplete Clients</h6>

                </div>
                <div class="card-body">
                    {{-- <canvas id="myChart" style="height:35vh; width:70vw"></canvas> --}}

                    {{-- <script>
                        const ctx = document.getElementById('myChart').getContext('2d');

                        // <block:setup:1>
                        // const labels = Utils.months({
                        //     count: 7
                        // });
                        const data = {

                            labels: ['January', 'Febuary', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October',
                                'November', 'December'
                            ],
                            datasets: [{
                                    label: 'Participants',
                                    data: [{{ $year[0] }}, {{ $year[1] }}, {{ $year[2] }}, {{ $year[3] }}, {{ $year[4] }},{{ $year[5] }}, {{ $year[6] }}, {{ $year[7] }}, {{ $year[8] }}, {{ $year[9] }}, {{ $year[10] }}, {{ $year[11] }}],
                                    fill: false,
                                    borderColor: 'rgb(52, 68, 84)',
                                    tension: 0.5
                                },



                            ]
                        };




                        // </block:setup>

                        // <block:config:0>
                        const config = {
                            type: 'line',
                            data: data,

                            // options: options,
                        };
                        // </block:config>


                        const myChart = new Chart(ctx, config);
                    </script> --}}

                    <table id="participants" class="participants-index">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Date</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 0;
                            @endphp
                            @foreach ($clients as $clients)
                                @php
                                    $i++;
                                    
                                    
                                @endphp
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{$clients->created_at}}</td>
                                    <td>{{ $clients->client }}</td>
                                    
                                    {{-- @php
                                    $answer_all = DB::table('users')->where('client_id',$clients->id)->count();
                                    $answer = DB::table('users')->where('client_id',$clients->id)->where('status',1)->count();
                                    if($answer == $answer_all){
                                        $complete=1;
                                    }
                                    else {
                                        $complete=0;
                                    }
                                    @endphp
                                    @if ($complete == 1)
                                        <td><div class="done">Done</div></td>
                                    @else
                                    <td><div class="undone">Uncompleted</div></td>
                                    @endif --}}
                                    @if ($clients->status == 1)
                                    <td><div class="done">Done</div></td>
                                    @else
                                    <td><div class="undone">Uncompleted</div></td>
                                    @endif
                                    <td>
                
                                        <div class="row">
                                            <div class="col"><a href="{{ route('Cdetails', $clients->id) }}"><i
                                                        class="far fa-eye igreen"></i></a></div>

                                        </div>
                
                                    </td>
                                    <div class="modal fade" id="updatemodel{{ $i }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Update Clients</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    {{-- <form method="post" action="/admin/clients/change/{{ $clients->id }}"> --}}
                                                    <form method="post" action="{{ route('Cupdate', $clients->id) }}">
                
                                                        @csrf
                                                        <div class="mb-3"><input class="form-control" type="text" id="name-2"
                                                                name="client" placeholder="Name" value="{{ $clients->client }}"></div>
                                                        <div class="mb-3"><input class="form-control" type="email" id="email-2"
                                                                name="email" placeholder="Email" value="{{ $clients->email }}"></div>
                                                        <div class="mb-3"><input class="form-control" type="text" id="address-1"
                                                                name="address" placeholder="Address" value="{{ $clients->address }}">
                                                        </div>
                                                        <div class="mb-3"></div>
                
                
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
