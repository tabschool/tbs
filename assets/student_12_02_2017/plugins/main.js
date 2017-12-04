(function() {
    var BASEURL='http://webmosk.com/tab/';
    $(".dropzone").dropzone({
        acceptedFiles: ".jpeg,.jpg,.png,.gif",
        url: BASEURL+'student/profile/profile_image_set/',
        margin: 20,
        maxFiles: 1, // Number of files at a time
        maxFilesize: 5, //in MB,
        uploadMultiple: false,
        success: function(res, index){
            var resp = $.parseJSON(res.response);
            if(resp.status==false && resp.error==1){
                alert('Error : '+resp.message);
                window.location.reload();
            }else{
               alert('Success : '+resp.message);
               window.location.href = BASEURL+"student/Profile";
            }
            return false;
        }
    })

    $(".dropzone2").dropzone({
        url: BASEURL+'student/profile/change_cover_image/',
        margin: 20,
        acceptedFiles: ".jpeg,.jpg,.png,.gif",
        params:{
            'action': 'save'
        },
        uploadOnDrop: true,
        uploadOnPreview: false,
        success: function(res, index){
            var resp = $.parseJSON(res.response);
            if(resp.status==false && resp.error==1){
                alert('Error : '+resp.message);
                window.location.reload();
            }else{
               alert('Success : '+resp.message);
               window.location.href = BASEURL+"student/Profile";
            }
            return false;
        }
    });
}());
