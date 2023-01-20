@extends('admin_template')
@section('content')


                    <h1 class="fw-bolder text-dark mb-0">List of Qustion</h1>
                    <div class="card" id="TableSorterCard">
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table table-striped table tablesorter" id="ipi-table">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th class="text-center">Question</th>
                                                <th class="text-center">Behaviour types Value</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">

                                            @foreach ( $questions as $i => $questions )
                                                <tr>
                                                    <td>{{ $questions->id }}</td>
                                                    <td>{{ $questions->question }}</td>
                                                    <td>{{ $questions->value }}</td>

                                                </tr>

                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>


                    @endsection
