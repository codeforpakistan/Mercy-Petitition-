




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
        <td>{{ $petition->id }}</td>
        <td>{{ $petition->name }}</td>
        <td>{{ $petition->f_name }}</td>
        <td>{{ $petition->nationality }}</td>
        <td>{{ $petition->gender }}</td>
        <td>{{ $petition->section_id }}</td>
        <td>{{ $petition->province_id }}</td>
        <td>{{ $petition->file_in_department }}</td>
        <td>{{ $petition->physicalstatus_id }}</td>
        <td>{{ $petition->status }}</td>
        <td>{{ $petition->sentence_in_court }}</td>
        <td>{{ $petition->user_id }}</td>
        <td class='d-none d-sm-table-cell'>
            <span class='badge badge-sm bgc-warning-d1 text-white pb-1 px-25'><img
                    src="{{ asset('/assets/image/' . $petion->prisoner_image) }}"
                    width="50" height="50" alt="pic" /></span>

        </td>

        {{-- <td class="text-600 text-orange-d2"><img src="{{url('/myfiles/'.$employe->PicturePath)}}" class="user-image" alt="User Image" width = "60px" ></td> --}}



    </tr>
  @endforeach
  </tbody>
</table>



{{-- @endsection --}}
