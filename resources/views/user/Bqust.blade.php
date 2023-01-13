@extends('U_template')
@section('content')

<style>

</style>

    {{-- <div class="info-box">

        <div class="info-title">
            <span>Importance Notes</span>
        </div>
        <div class="info-list">

        </div>
        <ol class="text-dark">

            <li>Please answer <span class="text-danger fw-bold">all question</span>  before submit</li>
            <li>Do not refresh page before answer and submit the question</li>
            <li>Answer were situation is the best for you</li>

            </ol>
    </div> --}}

     <div class="row" >
        <div class="">
            <div class="col d-flex justify-content-center " style="margin-top: 150px">
                <div class="card  ">
                    <h5 class="card-header text-danger text-center">Important Notes</h5>
                    <div class="card-body">
                        <h4 class="card-title">Notes:</h4>

                            <ol class="text-dark">

                            <li>Please answer <span class="text-danger fw-bold">all question</span>before submit</li>
                            <li>Do not refresh page before answer and submit the question</li>
                            <li>Answer were situation is the best for you</li>

                            </ol>




                        <div class="row">
                            <div class="col-12 offset-0 d-flex justify-content-center"><a
                                    class="btn btn-primary text-center border rounded-pill bounce animated" role="button"
                                    href="{{ route('qz') }}">Take the Quiz</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


@endsection
