@extends('admin_template')
@section('content')

    {{-- {{ $clients->id }}
    {{ $clients->address }} --}}

    

    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Add participants
  </button>


  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Upload Participants Details</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <span>Please upload only in <span class="text-danger fw-bold">CSV</span> fromat</span>
            <form action="{{route('upload')}}" method="post" enctype="multipart/form-data">
                @csrf
            
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
            </div>
            <div class="custom-file">
              <input name="file" type="file" class="custom-file-input" id="inputGroupFile01"
                aria-describedby="inputGroupFileAddon01">
              <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
            </div>
            <input name="cid" type="hidden" value="{{$client->id}}">
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">upload</button>
        </div>
    </form>
      </div>
    </div>
  </div>
  

    <div class="d-flex justify-content-between">
        <h1 class="fw-bolder text-dark mb-3">List of Participants</h1>
        <div class="mb-3"><a href="{{ route('smail_csv', $client->link_code) }}" class="btn btn-primary text-decoration-none ">Send Mail
            </a></div>
    </div>
    <h4 style="color: red; font-size:15px;">*Report can be genereted <strong>ONLY</strong> if all participants has answered
    </h4>

    <div class="d-flex justify-content-end">
        {{-- @if ($countre == $countall)
            <a href="{{ route('Greport', $client->id) }}" class="btn btn-success text-decoration-none">Generate</a>
        @else
            <a href="{{ route('Greport', $client->id) }}" class="btn btn-success text-decoration-none disabled">Generate</a>
        @endif --}}

        <a href="{{ route('remainder', $client->link_code) }}" class="btn btn-success text-decoration-none">Notification</a>

            <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary ms-3" data-bs-toggle="modal" data-bs-target="#upload">
            upload Logo
        </button>

    </div>


  
  <!-- Modal -->
  <div class="modal fade" id="upload" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form method="POST" action="{{ route('image.store',$client->id) }}" enctype="multipart/form-data">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            
                @csrf
                <input type="file" class="form-control" name="image" />
                <input type="hidden" name="client" value={{$client->id}}>
                <input type="hidden" name="name" value={{$client->client}}>
    
                <button type="submit" class="btn btn-sm">Upload</button>
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </form>
      </div>
    </div>
  </div>
  




    <select class="ddown p-1" name="fetchval" id="fetchval">
        <option value=" ">Select department:</option>
        @foreach ($department as $d)
            <option value={{ $d->department }}>{{ $d->department }}</option>
        @endforeach


    </select>
    <div class="progress" style="margin-bottom: 20px; margin-top: 20px;">
        <div id="progress" class="progress-bar" role="progressbar" aria-label="Example with label" style="width: 25%;"
            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{ $var }}</div>
    </div>


    <table id="participants">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Department</th>
                <th>Status</th>
            </tr>

        </thead>
        <tbody id="myList3">
            @php
                $i = 1;
            @endphp

            @foreach ($participants as $participants)
                @php
                    $dp = DB::table('departments')
                        ->where('id', $participants->department_id)
                        ->first();
                    $dp = $dp->department;
                    // dd($participants->status);
                @endphp
                <tr>

                
                <td>{{ $participants->name }}</td>
                <td>{{ $participants->email }}</td>
                <td>{{ $dp }}</td>
                

                @if ($participants->status === 1 )
                    <td>
                        <div class="done">Done  </div>
                    </td>
                @elseif ($participants->status === 2)
                <td class="td-red">
                    <div class="undone">Uncompleted </div>
                </td>
                @elseif ($participants->status === 3)
                <td>
                    <div class="unregister">Acessor</div>
                </td>
                @elseif ($participants->status === 4)
                <td>
                    <div class="done">Acessor</div>
                </td>
                @else
                <td class="td-red">
                    <div class="unregister">Unregister </div>
                </td>
                @endif
            </tr>
            
            @endforeach
        </tbody>
    </table>
        

    <script type="text/javascript">
        $(document).ready(function() {
            $("#fetchval").on('change', function() {
                var val = $(this).val().toLowerCase();
                //console.log(val);
                //alert(val);
                $("#myList3 tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(val) > -1)
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("#progress").css('width', "<?php echo $var; ?>");

        });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
@endsection
