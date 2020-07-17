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
                    <tr>
                        <td>{{ $colleague->id }}</td>
                        <td>{{ $colleague->full_name }}</td>
                        <td>{{ $colleague->country }}</td>
                        <td>{{ $colleague->office_name }}</td>
                        <td>{{ $colleague->position }}</td>
                        <td>{{ $colleague->religion->name }}</td>
                        <td>
                            <a href="{{route('colleagues.edit',$colleague->id)}}" class="btn btn-info" style="padding:8px"><span
                                    class="material-icons">edit</span></a>
                            <a href="#" class="btn btn-danger" style="padding:8px" data-toggle="modal"
                                data-target="#CDeleteModal"><span class="material-icons">delete</span></a>
                            <a href="#" class="btn btn-success" style="padding:8px"><span
                                    class="material-icons">check_circle</span></a>
                        </td>
                        <td><a href="#" data-toggle="modal" data-target="#CFullInfoModal">Full Info</a></td>
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