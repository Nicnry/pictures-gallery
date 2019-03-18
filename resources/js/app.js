
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

var randomString = function () {
    let str = Math.random().toString(36).replace('0.', '') + Math.random().toString(36).replace('0.', '')
    str += Math.random().toString(36).replace('0.', '') + Math.random().toString(36).replace('0.', '')
    return str
}

console.log(randomString())

$('#create-picture').click((e) => {

    e.preventDefault()
    let to = $(location).attr('href').lastIndexOf('/')
    to = to == -1 ? $(location).attr('href').length : to
    laraURL = $(location).attr('href').substring(0, to)

    to = laraURL.lastIndexOf('/')
    to = to == -1 ? laraURL.length : to
    redURL = laraURL.substring(0, to)

    let name = $("input[name*='title']").val()
    let image = document.getElementById('path').files[0]
    let awsURL = $("input[name*='picture-url']").val()
    let acl = $("input[name*='acl']").val()
    let redirect = $("input[name*='success_action_redirect']").val()
    let status = $("input[name*='success_action_status']").val()
    let policy = $("input[name*='policy']").val()
    let XamzCredential = $("input[name*='X-amz-credential']").val()
    let XamzAlgorithm = $("input[name*='X-amz-algorithm']").val()
    let XamzDate = $("input[name*='X-amz-date']").val()
    let XamzSignature = $("input[name*='X-amz-signature']").val()

    let fileInput = document.getElementById('path');
    let file = fileInput.files[0];
    let filename = file.name;

    filename = 'nh/pictures/' + randomString() + image.name

    let fd = new FormData()

    fd.append('key', filename)
    fd.append('Content-Type', '')
    fd.append('success_action_redirect', redirect)
    fd.append('success_action_status', status)
    fd.append('policy', policy)
    fd.append('acl', acl)
    fd.append('X-amz-credential', XamzCredential)
    fd.append('X-amz-algorithm', XamzAlgorithm)
    fd.append('X-amz-date', XamzDate)
    fd.append('X-amz-signature', XamzSignature)
    fd.append('file', file)

    
    $.ajax({
        type : 'POST',
        url : awsURL,
        data : fd,
        processData: false,
        contentType: false
    }).done(function (data) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: laraURL,
            dataType: 'json',
            data: {
                title : name,
                path : filename,
            }
        }).done(function (data) {
            
        })
        window.location.replace(laraURL)
    })
})
