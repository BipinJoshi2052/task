$( document ).ready(function() {
    $(".product-edit").on('click',function (e) {
        if(!$('.loading').hasClass('hidden')){
            $('.loading').addClass('hidden');
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token`"]').attr('content')
            }
        });

        e.preventDefault();
        
        var	cid =  $(this).data('id');

        var type = "GET";
        var ajaxurl = '/products/edit/'+cid;

        $.ajax({
            type: type,
            url: ajaxurl,
            // data: {
            //     "cid": cid,
            // },
            dataType: 'json',
            beforeSend: function() {
            },
            success: function (data) {
                $('.loading').addClass('hidden');
                $('.remodal-content').append(data);
                // $(".remodal-content").html("Request Sent");
            },
            error: function (data) {
                $('.loading').addClass('hidden');
                // console.log(url);
                // $(".list-"+cid).removeClass("disabled");
                toastr.error('Error',data.responseText);
            }
        });
    });
   
    $(".reject-request").on('click',function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        
        e.preventDefault();
        
        var	cid =  $(this).data('id');
        var	requestId =  $(this).data('requestid');

        var type = "POST";
        var ajaxurl = '/friends/reject-request';
        var interval = null;

        $.ajax({
            type: type,
            url: ajaxurl,
            data: {
                "cid": requestId,
            },
            dataType: 'json',
            beforeSend: function() {
                i = 0;
                $(".reject-"+cid).addClass("disabled");
                interval = setInterval(function() {
                    i = ++i % 4;
                    $(".reject-"+cid).html("Rejecting"+Array(i+1).join("."));
                }, 500);
            },
            success: function (data) {
                setTimeout(function () {
                    clearInterval(interval);
                    $(".reject-"+cid).removeClass("reject-request");
                    $(".accept-"+cid).removeClass("accept-request");
                    $(".accept-"+cid).addClass("hidden");
                    toastr.success('Success',data);
                    $(".reject-"+cid).html("Rejected");

                    // $(".reject-"+cid).addClass("btn-danger");
                    // toastr.success('Success',data);
                    // $(".reject-"+cid).html("Rejected");
                }, 1000);
            },
            error: function (data) {
                clearInterval(interval);
                $(".reject-"+cid).removeClass("disabled");
                toastr.error('Error',data.responseText);
                console.log('error in friend request send');
            }
        });
    });
    
    $("#self_paid").on('change',function (e) {
        if(this.value == '1'){            
            if($('.pay_members_div').hasClass('hidden')){
                $('.pay_members_div').removeClass('hidden');
            }
        }else{
            $('.pay_members_div').addClass('hidden');
        }    
        
        e.preventDefault();
        
        var	roomId =  $(this).data('roomid');

        addPayMembers(roomId);  
    });
    
    $(document).on('click',".remove-pay-member",function (e) {
        e.preventDefault();

        $(this).closest('.pay_members').remove();

       
    });
    $(document).on('click',".add-pay-members",function (e) {
        e.preventDefault();

        var	roomId =  $(this).data('roomid');
        
        addPayMembers(roomId);

       
    });
    function addPayMembers(roomId){
        var type = "POST";
        var ajaxurl = '/room-expense/add-pay-members';

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: type,
            url: ajaxurl,
            data: {
                "roomId": roomId,
            },
            dataType: 'json',
            success: function (data) {
                $('.pay_members_row').append(data);
            },
            error: function (data) {
                toastr.error('Error',data.responseText);
            }
        });
        
    }

    $('.delete-form').on('click',function(e) {
        e.preventDefault();
        Swal.fire({
        title: 'Are you sure you want to delete this?',
        showDenyButton: true,
        showCancelButton: true,
        showConfirmButton: false,
        // confirmButtonText: 'Save',
          denyButtonText: `Delete`,
        }).then((result) => {
            if (result.isConfirmed) {
            } 
            else if (result.isDenied) {
                // window.location = link;
            }
        });
    });
});