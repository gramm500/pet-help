require('./bootstrap');

$ = window.$

$(function () {

    $(".deleteButton").click(function (e) {

        e.preventDefault();
        let id = e.currentTarget.id
        let header = $('meta[name="csrf-token"]').attr('content')
        $.ajaxSetup({
            headers:
                {'X-CSRF-TOKEN': header}
        });
        let url = 'http://localhost:8080/delete/' + id

        $.ajax({
            'url' : url,
            'type' : 'POST',
            'success' : function(data) {
                alert('Data: '+data);
            },
            'error' : function(request,error)
            {
                alert("Request: "+JSON.stringify(request));
            }
        });
    });
})