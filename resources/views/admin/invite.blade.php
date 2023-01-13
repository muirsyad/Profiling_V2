@extends('admin_template')
@section('content')
<form action="{{ route('smail', $clients->link_code) }}" method="post" id="form_email">
    @csrf
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-9 col-xl-9 col-xxl-7">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div id="inputcon" class="example p-5">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Email address</label>
                                        <input type="email" class="form-control" id="exampleFormControlInput1"
                                            placeholder="name@example.com" name="email1">
                                    </div>



                                </div>

                            </div>
                            <div class="col-lg-12 p-4">
                                <button type="button" class="btn btn-primary" onclick="addrow()">Add row</button>
                                <button type="button" class="btn btn-secondary">Submit</button>
                                <button type="submit" class="btn btn-primary" form="form_email">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>



    <script>
        var count = 1

        function addrow() {
            count += 1;
            console.log(count);

            const newrow = document.querySelector('.example');
            //create element
            const newdiv = document.createElement('div');
            newdiv.className = 'mb-3';
            const newlabel = document.createElement('label');
            newlabel.className = 'form-label'
            newlabel.innerText = 'Email Address';
            const newinput = document.createElement('input');
            newinput.className = 'form-control';
            // newinput.name="email"+count;
            newinput.name="email"+count;


            newrow.appendChild(newdiv);
            newdiv.appendChild(newlabel);
            newdiv.appendChild(newinput);

        }
        var cunt = 0;

        // function addro() {
        //     cunt += 1;
        //     console.log(cunt);
        //     const newrow = document.querySelector('.row');
        //     newrow.className = 'row';
        //     const newdiv = document.createElement('div');
        //     newdiv.className = 'col-12'
        //     const newdiv2 = document.createElement('div');
        //     newdiv2.className = 'mb-3'
        //     const newlabel = document.createElement('label');
        //     newlabel.className = 'form-label'
        //     const newinput = document.createElement('input');
        //     newinput.className = 'form-control';

        //     newrow.appendChild(newdiv);
        //     newdiv.appendChild(newdiv2);
        //     newdiv2.appendChild(newlabel);
        //     newlabel.appendChild(newinput);

        // }
    </script>
@endsection
