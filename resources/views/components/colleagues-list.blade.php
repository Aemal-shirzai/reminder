<div class="card">
    <div class="card-header card-header-primary">
        <h4 class="card-title ">Colleagues</h4>
        <p class="card-category"> Here Is The List Of All Colleagues Registered To System</p>
    </div>
    <div class="card-body">
        @if($colleagues->count() > 0)
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class=" text-primary">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Country</th>
                    <th>Office</th>
                    <th>Position</th>
                    <th>Religion</th>
                    <th>Actions</th>
                    <th>More</th>
                </thead>
                <tbody>
                    @foreach($colleagues as $colleague)
                    <tr id="CRow-{{$colleague->id}}">
                        <td>{{ $colleague->id }}</td>
                        <td>{{ $colleague->full_name }}</td>
                        <td>{{ $colleague->country }}</td>
                        <td>{{ $colleague->office_name }}</td>
                        <td>{{ $colleague->position }}</td>
                        <td>{{ $colleague->religion->name }}</td>
                        <td>
                            <a href="{{route('colleagues.edit',$colleague->id)}}" class="btn btn-info" style="padding:8px"><span
                                    class="material-icons">edit</span></a>

                            <a href="javascript:void(0)" class="btn btn-danger" style="padding:8px" data-toggle="modal" data-target="#CDeleteModal" 
                                data-id="{{ $colleague->id }}" id="cDeleteButton-{{$colleague->id}}">
                                <span class="material-icons">delete</span>
                            </a>

                            <a href="javascript:void(0)" class="btn {{ ($colleague->status == 1 ? 'btn-success' : 'btn-warning') }}" style="padding:8px"
                                onclick="changeStatus(event, '{{ $colleague->id }}')" id="statusBtn-{{$colleague->id}}">
                                @if($colleague->status == 1)
                                <span class="material-icons">check_circle</span>
                                @else
                                <span class="material-icons">pending</span>
                                @endif
                            </a>
                        </td>
                        <td>
                            <a href="#" data-toggle="modal" data-target="#CFullInfoModal" data-id="{{$colleague->id}}" data-name="{{$colleague->full_name}}"
                                    data-country="{{$colleague->country}}" data-wcountry="{{$colleague->work_country}}" data-office="{{$colleague->office_name}}" 
                                    data-position="{{$colleague->position}}" data-phone1="{{$colleague->phone1}}" data-phone2="{{$colleague->phone2}}" 
                                    data-phone3="{{$colleague->phone3}}" data-email="{{$colleague->email}}" data-website="{{$colleague->website}}" 
                                    data-address="{{$colleague->address}}" data-status="{{$colleague->status}}" data-religion="{{$colleague->religion->name}}">
                                Full Info
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
            <h4 class="text-center p-4 mt-4">
                No Colleagues Data Availible!
            </h4>
        @endif
    </div>
</div>