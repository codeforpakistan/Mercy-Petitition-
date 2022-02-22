




    <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons table_id">
  <thead>
  <tr>
    <th class="p-3 mb-2 bg-success text-white" style="width: 80px;">ID</th>
    <th class="p-3 mb-2 bg-success text-white">Name</th>
    <th class="p-3 mb-2 bg-success text-white">Father Name</th>


    <th class="p-3 mb-2 bg-success text-white">Nationality</th>
    <th class="p-3 mb-2 bg-success text-white">Confined in jail</th>
    <th class="p-3 mb-2 bg-success text-white">Status</th>

  </tr>
  </thead>
  <tbody>

  @foreach ($petitions as $key=>$petition)
    <tr>
        <td class="text-center font-size-sm">{{$key+1}}</td>
        <td>{{ $petition->name }}</td>
        <td>{{ $petition->f_name }}</td>
        <td>{{ $petition->nationality }}</td>
        <td>{{ $petition->confined_in_jail }}</td>
        <td>{{ $petition->status }}</td>

        {{-- <td class="text-600 text-orange-d2"><img src="{{url('/myfiles/'.$employe->PicturePath)}}" class="user-image" alt="User Image" width = "60px" ></td> --}}



    </tr>
  @endforeach
  </tbody>
</table>



{{-- @endsection --}}
