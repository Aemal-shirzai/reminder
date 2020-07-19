// change colleague status
function changeStatus(e,Cid) {
    e.preventDefault();
    var btn = $(`#statusBtn-${Cid}`);
    btn.html(`
        <span class="material-icons">hourglass_top</span>
    `)
    btn.removeAttr("onclick")
    btn.css('cursor','not-allowed')
    $.ajax({
        method: "PUT",
        url: changeStatusRoute,
        data:{id:Cid,_token:token}
    }).done(function(response){
        if (response.Cstatus == 1) {
            btn.after(`
                <a href="#" class="btn btn-success material-icons" style="padding:8px" 
                    onclick="changeStatus(event,${Cid})" id="statusBtn-${Cid}">
                        <span class="material-icons">check_circle</span>
                </a>
            `)
        } else {
            btn.after(`
                <a href="#" class="btn btn-warning material-icons" style="padding:8px" 
                    onclick="changeStatus(event,${Cid})" id="statusBtn-${Cid}">
                        <span class="material-icons">pending</span>
                </a>
            `)
        }
        btn.remove()
    }).fail(function(err) {
        btn.attr("onclick",`changeStatus(event,${Cid})`)
        btn.css('cursor','pointer')
        if (btn.hasClass('btn-success')) {
            btn.html(`
                <span class="material-icons">check_circle</span>
            `)
        } else {
            btn.html(`
                <span class="material-icons">pending</span>
            `)
        }
    })
}

//Colleagues delete modal
$("#CDeleteModal").on("show.bs.modal",function(event) {
    var button = $(event.relatedTarget); 
    var modal = $(this);
    var id = button.data("id");
    var deleteButton = modal.find(".modal-footer #colleageDeleteButton");
    deleteButton.attr("onclick",`deleteColleague(${id})`)
});

// delete Colleague
function deleteColleague(id) {
    event.preventDefault();
    $("#CDeleteDismissButton").click()
    var button = $(`#cDeleteButton-${id}`);
    addLoading(button)

    $.ajax({
        method: "DELETE",
        url: colleaguesDeleteRoute,
        data: { id:id, _token:token }
    }).done(function(response) {
        $(`#CRow-${id}`).remove();
    }).fail(function(err) {
        removeLoading(button)
    });


}

// colleagues full information
$("#CFullInfoModal").on("show.bs.modal",function(event){
    var button = $(event.relatedTarget);
    var modal = $(this);
    var body = modal.find(".modal-body");
    
    var id = button.data("id");
    var name = button.data("name");
    var country = button.data("country");
    var wcountry = button.data("wcountry");
    var position = button.data("position");
    var office = button.data("office");
    var phone1 = button.data("phone1");
    var phone2 = button.data("phone2");
    var phone3 = button.data("phone3");
    var address = button.data("address");
    var email = button.data("email");
    var website = button.data("website");
    var religion = button.data("religion");
    body.text("")
    body.append(`
        <div class="container">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h3 class="text-center font-weight-bold">
               ${name} <span class="text-muted" style="font-size: 10px;">(${religion})</span>
                <small class="d-block text-muted" style="font-size: 13px;">${position} In ${office}</small>
            </h3>
            <div style="font-size: 13px;">
                <p style="margin-bottom: 0px;margin-top:0px">
                    <strong>Address:</strong> ${address} | ${wcountry}
                </p>

                <div class="dropdown-divider"></div>
                <div class="">
                    <div class="row">
                        <strong class="col-4">Telephone:</strong> <span class="col-8">${phone1}</span>
                    </div>
                    <div class="row">
                        <strong class="col-4">Cell Phone:</strong> <span class="col-8">${phone2}</span>
                    </div>
                    <div class="row">
                        <strong class="col-4">Office Phone:</strong> <span class="col-8">${phone3}</span>
                    </div>
                </div>
                <div class="dropdown-divider"></div>
                <a href="mailTo:${email}"
                    style="color: lightblue;">${email}</a>
                <div class="row mt-2">
                    <div class="col-4 ">
                        <h4 class="font-weight-bold">${country}</h4>
                    </div>
                    <div class="col-8 text-right">
                        <a href="https://${website}" target="_blank" style="color: lightblue;"
                            class="">${website}</a>
                    </div>
                </div>
            </div>
        </div>
    `)   

});


function addLoading(button) {
    button.prop("disabled",true)
    button.css("cursor","not-allowed") 
    button.html(` <span class="material-icons">hourglass_top</span>`) 
}
function removeLoading(button) {
    button.removeProp("disabled")
    button.css("cursor","pointer") 
    button.html(` <span class="material-icons">delete</span>`) 
}