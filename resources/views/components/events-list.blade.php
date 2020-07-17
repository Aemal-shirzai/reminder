<div class="card">
    <div class="card-header card-header-primary">
        <h4 class="card-title ">List Of EVents</h4>
        <p class="card-category"> Here Is The List Of All Events Registered To System</p>
    </div>
    <div class="card-body">
        <div class="row">
            @for($a = 0; $a <= 10;$a++)
                <div class="col-md-4">
                    <div class="card card-profile">
                        <div class="card-body">
                            <h6 class="card-category text-gray">Title For The Events <br><span>2020-May-4</span></h6>
                            <h4 class="card-title">Islam</h4>
                            <p class="card-description">
                                Don't be scared of the truth because we need to restart the human foundation in
                                truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but
                                the back is...
                            </p>
                            <a href="{{route('events.edit',1)}}" class="btn btn-info" style="padding:8px"><span class="material-icons">edit</span></a>
                            <a href="#" class="btn btn-danger" style="padding:8px" data-toggle="modal" data-target="#EDeleteModal"><span class="material-icons">delete</span></a>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>
</div>