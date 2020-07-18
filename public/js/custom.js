// change colleague status
function changeStatus(e,Cid) {
    e.preventDefault();
    var btn = $(`#statusBtn-${Cid}`);
    btn.html(`
        <span class="material-icons">hourglass_top</span>
    `)
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