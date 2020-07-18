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