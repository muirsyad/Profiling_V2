@extends('TLD.LR_template')
@section('content')


    <form action="{{route('auth')}}" method="POST">
        @csrf
        <div class="relative mx-auto w-80 sm:w-1 md:w-32 md:w-[32rem] lg:w-[40rem] top-4 lg:top-10  p-8  rounded-lg bg-slate-50 ">
            <h1 class="text-center py-10 drop-shadow-xl text-xl font-bold">Login</h1>
            <form action="#">
                @csrf
                <img class=" mx-auto h-60 w-60" src="{{ URL::asset('assets/img/lhi.png') }}" alt="logo">
                <div class="mb-4 ">
                    <p for="#" class="font-bold mb-2.5 ml-4">Email address</p>
                    <input name="email" class="w-full border-2 border-emerald-800 rounded-full p-3" type="email" placeholder="Your Email...">
                </div>
                <div class="mb-4 ">
                    <p for="#" class="font-bold mb-2.5 ml-4">Password</p>
                    <input id="floatingPassword" name="password" class="w-full border-2 border-emerald-800 rounded-full p-3" type="password" placeholder="**************************">
                </div>
                <div class="form-floating mb-3">
                    <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                    <span>Show Password</span>
                </div>
                <div>
                    <input id="shcheck" type="checkbox">
                    <label id="passwordtxt" for="">Show Password</label>
                </div>
                <div class="mb-4 flex justify-center">
                    <button class="px-4 py-2 rounded-full text-slate-50 bg-green-500">Submit</button>
                </div>
            </form>
        </div>
    </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $("#vehicle1").click(function() {
            
            if ($(this).is(':checked')) {
               
                console.log('checkked');
                $("#floatingPassword").attr("type", "text");
                
            }
            else{
                console.log('unckecked');
                $("#floatingPassword").attr("type", "password");
               
            }

        });
</script>
@endsection
