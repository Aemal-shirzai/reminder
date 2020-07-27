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
               <span id="fullInfoName">  </span> <span class="text-muted" style="font-size: 10px;" id="fullInfoReligion"></span>
                <small class="d-block text-muted" style="font-size: 13px;" id="fullInfoPositionOffice"></small>
            </h3>
            <div style="font-size: 13px;">
                <p style="margin-bottom: 0px;margin-top:0px">
                    <strong>Address:</strong> <span id="fullInfoAddressAndWCountry"></span>
                </p>

                <div class="dropdown-divider"></div>
                <div class="">
                    <div class="row">
                        <strong class="col-4">Telephone:</strong> <span class="col-8" id="fullInfoPhone1"></span>
                    </div>
                    <div class="row">
                        <strong class="col-4">Cell Phone:</strong> <span class="col-8" id="fullInfoPhone2"></span>
                    </div>
                    <div class="row">
                        <strong class="col-4">Office Phone:</strong> <span class="col-8" id="fullInfoPhone3"></span>
                    </div>
                </div>
                <div class="dropdown-divider"></div>
                <a href="" style="color: lightblue;" id="fullInfoEmail"></a>
                <div class="row mt-2">
                    <div class="col-4 ">
                        <h4 class="font-weight-bold" id="fullInfoCountry"></h4>
                    </div>
                    <div class="col-8 text-right">
                        <a href="" target="_blank" style="color: lightblue;" id="fullInfoWebsite"
                            class=""></a>
                    </div>
                </div>
            </div>
        </div>
    `)   

    $("#fullInfoAddressAndWCountry").text(`${address} | ${wcountry} `)
    $("#fullInfoWebsite").text(website).attr("href",`https://${website}`)
    $("#fullInfoEmail").text(email).attr("href",`mailTo:${email}`)
    $("#fullInfoCountry").text(country)
    $("#fullInfoPhone1").text(phone1)
    $("#fullInfoPhone2").text(phone2)
    $("#fullInfoPhone3").text(phone3)
    $("#fullInfoName").text(name)
    $("#fullInfoPositionOffice").text(`${position} In ${office} `)
    $("#fullInfoReligion").text(`(${religion})`)
    
});

// search for colleagues
function searchColleagues() {
    var value = $("#searchForField").val().trim()
    var by = $("#searchType").val()
    var statusType = $("#statusType").val()
    var placeholder = $("#placholderForSearch");
    placeholder.text("")
    placeholder.html(`
        <tr>
            <td colspan="8">
                <div class="m-4 p-4 text-center">
                    <span class="material-icons">hourglass_top</span>
                    searching...
                 </div>
            </td>
        </tr>
    `)

    $.ajax({
        method: "GET",
        url:colleaguesSearch,
        data:{ value:value, by:by , statusType:statusType , _token:token  }
    }).done(function(response){
        placeholder.text('')

        if(response.result){
            response.result.forEach(res => {
                placeholder.append(`
                    <tr id="CRow-${res.id}">
                        <td id="colID-${res.id}"></td>
                        <td id="colName-${res.id}"></td>
                        <td id="colCountry-${res.id}"></td>
                        <td id="colOffice-${res.id}"></td>
                        <td id="colPosition-${res.id}"></td>
                        <td id="colReligion-${res.id}"></td>
                        <td>
                            <a href="colleagues/${res.id}/edit" class="btn btn-info"
                                style="padding:8px"><span class="material-icons">edit</span></a>

                            <a href="javascript:void(0)" class="btn btn-danger" style="padding:8px" data-toggle="modal"
                                data-target="#CDeleteModal" data-id="${res.id}"
                                id="cDeleteButton-${res.id}">
                                <span class="material-icons">delete</span>
                            </a>

                            <a href="javascript:void(0)"
                                class="btn ${ (res.status == 1 ? 'btn-success' : 'btn-warning') }"
                                style="padding:8px" onclick="changeStatus(event, '${res.id}')"
                                id="statusBtn-${res.id}">
                                ${ (res.status == 1 ? '<span class="material-icons">check_circle</span>' : '<span class="material-icons">pending</span>') }
                            </a>
                        </td>
                        <td>
                            <a href="#" data-toggle="modal" data-target="#CFullInfoModal" data-id="${res.id}"
                                data-name="${res.full_name}" data-country="${res.country}"
                                data-wcountry="${res.work_country}" data-office="${res.office_name}"
                                data-position="${res.position}" data-phone1="${ (res.phone1 ? res.phone1 : '')}"
                                data-phone2="${(res.phone2 ? res.phone2 : '')}" data-phone3="${(res.phone3 ? res.phone3 : '')}"
                                data-email="${res.email}" data-website="${(res.website ? res.website : '')}"
                                data-address="${res.address}" data-status="${res.status}"
                                data-religion="${res.religion.name}">
                                Full Info
                            </a>
                        </td>
                    </tr>
                `);
                $(`#colID-${res.id}`).text(res.id)
                $(`#colName-${res.id}`).text(res.full_name)
                $(`#colCountry-${res.id}`).text(res.country)
                $(`#colOffice-${res.id}`).text(res.office_name)
                $(`#colPosition-${res.id}`).text(res.position)
                $(`#colReligion-${res.id}`).text(res.religion.name)
            })
        }else if(response.empty){
            placeholder.text("")
            placeholder.html(`
            <tr>
                <td colspan="8">
                    <div class="m-4 p-4 text-center">
                        Not Found!
                     </div>
                </td>
            </tr>
        `)
        }

        
    }).fail(function(err){
        placeholder.text("")
        placeholder.html(`
        <tr>
            <td colspan="8">
                <div class="m-4 p-4 text-center">
                   Someting Went Wrong! Please try again
                 </div>
            </td>
        </tr>
    `)
    })

}

// events delete modal
$("#EDeleteModal").on("show.bs.modal",function(event){
    var button = $(event.relatedTarget);
    var modal = $(this);
    var deleteBtn = $("#eventsModalDeleteBtn");
    var id = button.data('id');
    deleteBtn.attr("onclick",`deleteEvents(${id})`)
});
// events delete function
function deleteEvents(id){
    event.preventDefault()
    $("#eventsModalDeleteClose").click()
    var btn = $(`#eDeleteBtn-${id}`)
    addLoading(btn)

    $.ajax({
        method:"DELETE",
        url:eventsDeleteRoute,
        data:{id:id, _token:token}
    }).done(function(response){
        removeLoading(btn)
        $(`#eventDiv-${id}`).remove()
    }).fail(function(err){
        removeLoading(btn)
    })
}


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


// event full info
$("#eventFullInfoModal").on("show.bs.modal", function (event) {
    var button = $(event.relatedTarget)
    var modal = $(this);
    var body = modal.find(".modal-body");
    var title = button.data("title");
    var date = button.data("date");
    var religion = button.data("religion");
    var message = button.data("message");

    // placeholders
    var titleP = modal.find(".modal-body #titleP");
    var dateP = modal.find(".modal-body #dateP");
    var religionP = modal.find(".modal-body #religionP");
    var messageP = modal.find(".modal-body #messageP");
    titleP.text("")
    dateP.text("")
    religionP.text("")
    messageP.text("")

    titleP.text(title)
    dateP.text(date)
    religionP.text(religion)
    messageP.html(message)

})
