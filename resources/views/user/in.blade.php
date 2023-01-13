@extends('U_template')
@section('content')
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        /* Style the form */
        #regForm {

            margin: 100px auto;
            padding: 40px;
            width: 70%;
            min-width: 300px;
        }

        /* Style the input fields */
        input {
            padding: 10px;
            width: 100%;
            font-size: 17px;
            font-family: Raleway;
            border: 1px solid #aaaaaa;
        }

        /* Mark input boxes that gets an error on validation: */
        input.invalid {
            background-color: #ffdddd;
        }

        /* Hide all steps by default: */
        .tab {
            display: none;
        }

        /* Make circles that indicate the steps of the form: */
        .step {
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbbbbb;
            border: none;
            border-radius: 50%;
            display: inline-block;
            opacity: 0.5;
        }

        /* Mark the active step: */
        .step.active {
            opacity: 1;
        }

        /* Mark the steps that are finished and valid: */
        .step.finish {
            background-color: #04AA6D;
        }

        /* radio new */


        .radiobtn {
            position: relative;
            display: block;
        }

        .radiobtn label {
            display: block;
            background: #fee8c3;
            color: #444;
            border-radius: 5px;
            padding: 10px 20px;
            border: 2px solid #fdd591;
            margin-bottom: 5px;
            cursor: pointer;
        }

        .radiobtn label:after,
        .radiobtn label:before {
            /* content: ""; */
            position: absolute;
            right: 11px;
            top: 11px;
            width: 20px;
            height: 20px;
            border-radius: 3px;
            background: #fdcb77;
        }

        .radiobtn label:before {
            background: transparent;
            transition: 0.1s width cubic-bezier(0.075, 0.82, 0.165, 1) 0s, 0.3s height cubic-bezier(0.075, 0.82, 0.165, 2) 0.1s;
            z-index: 2;
            overflow: hidden;
            background-repeat: no-repeat;
            background-size: 13px;
            background-position: center;
            width: 0;
            height: 0;

        }

        .radiobtn input[type="radio"] {
            display: none;
            position: absolute;
            width: 100%;
            appearance: none;
        }

        .radiobtn input[type="radio"]:checked+label {
            background: #fdcb77;
            animation-name: blink;
            animation-duration: 1s;
            border-color: #fcae2c;
        }

        .radiobtn input[type="radio"]:checked+label:after {
            background: #fcae2c;
        }

        .radiobtn input[type="radio"]:checked+label:before {
            width: 20px;
            height: 20px;
        }

        @keyframes blink {
            0% {
                background-color: #fdcb77;
            }

            10% {
                background-color: #fdcb77;
            }

            11% {
                background-color: #fdd591;
            }

            29% {
                background-color: #fdd591;
            }

            30% {
                background-color: #fdcb77;
            }

            50% {
                background-color: #fdd591;
            }

            45% {
                background-color: #fdcb77;
            }

            50% {
                background-color: #fdd591;
            }

            100% {
                background-color: #fdcb77;
            }
        }
    </style>




    <h1 class="text-center text-white " style="margin-top: 50px"><strong>I</strong></h1>
    <form action="{{ route('StoreQuiz') }}" method="post" style="margin-top: 100px">
        @csrf
        @foreach ($groups as $groups)
            @php
                $grp = DB::table('questions')
                    ->where('group_id', $groups->id)
                    ->get();
            @endphp
            <div class="tab">
                <div class="card mb-3 p-3">
                    <div class="card-header">
                        <span>Question {{ $groups->id }} of {{ $countG }}</span>
                    </div>
                    <div class="card-body">



                        @foreach ($grp as $questions)
                            {{-- <div class="radiobtn">
                                <input type="radio" name="Q{{ $questions->group_id }}" id="Q{{ $questions->id }}"
                                    value="{{ $questions->value }}" />
                                <label for="Q{{ $questions->id }}">{{ $questions->question }}</label>
                            </div> --}}
                            <div class="radiobtn">
                                <input type="radio" name="Q{{ $questions->group_id }}" id="Q{{ $questions->id }}"
                                    value="value[]" />
                                <label for="Q{{ $questions->id }}">{{ $questions->question }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        @endforeach

        <div style="overflow:auto;">
            <div style="float:right;">


                <button class="btn btn-danger" type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                <button class="btn btn-primary" type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>

            </div>
        </div>

        <!-- Circles which indicates the steps of the form: -->
        <div style="text-align:center;margin-top:150px;">

            @for ($i = 0; $i < $countG; $i++)
                <span class="step"></span>
            @endfor





        </div>
    </form>
    <script>
        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab

        function showTab(n) {
            // This function will display the specified tab of the form ...
            var x = document.getElementsByClassName("tab");
            x[n].style.display = "block";
            // ... and fix the Previous/Next buttons:
            console.log(currentTab);
            console.log(x);
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
                event.preventDefault();
                document.getElementById("nextBtn").innerHTML = "Submit";
                document.getElementById("nextBtn").type = 'submit';
            } else {
                document.getElementById("nextBtn").innerHTML = "Next";
            }
            // ... and run a function that displays the correct step indicator:
            fixStepIndicator(n)
        }

        function nextPrev(n) {
            // This function will figure out which tab to display
            var x = document.getElementsByClassName("tab");
            // Exit the function if any field in the current tab is invalid:
            if (n == 1 && !validateForm()) return false;
            // Hide the current tab:
            x[currentTab].style.display = "none";
            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n;
            // if you have reached the end of the form... :
            if (currentTab >= x.length) {
                //...the form gets submitted:
                document.getElementById("regForm").submit();
                return false;
            }
            // Otherwise, display the correct tab:
            showTab(currentTab);
        }

        function validateForm() {
            // This function deals with validation of the form fields
            var x, y, i, valid = true;
            x = document.getElementsByClassName("tab");
            y = x[currentTab].getElementsByTagName("input");
            // A loop that checks every input field in the current tab:
            for (i = 0; i < y.length; i++) {
                // If a field is empty...
                if (y[i].value == "") {
                    // add an "invalid" class to the field:
                    y[i].className += " invalid";
                    // and set the current valid status to false:
                    valid = false;
                }
            }
            // If the valid status is true, mark the step as finished and valid:
            if (valid) {
                document.getElementsByClassName("step")[currentTab].className += " finish";
            }
            return valid; // return the valid status
        }

        function fixStepIndicator(n) {
            // This function removes the "active" class of all steps...
            var i, x = document.getElementsByClassName("step");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
            //... and adds the "active" class to the current step:
            x[n].className += " active";
        }
    </script>
@endsection
