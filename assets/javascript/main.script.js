$(document).ready(function() {
	
	setTimeout(function(){
		$('body').addClass('loaded');
		$('h1').css('color','#222222');
	}, 3000);
	
});

$('.menu-toggle button').on('click', function(){
    var status = $('.header-nav-wrap').css('display');
    if(status == 'none'){
        $('.header-nav-wrap').fadeIn(500);
        $(this).children('i').removeClass('fa-bars').addClass('fa-window-close');
    }
    else{
        $('.header-nav-wrap').fadeOut(500);
        $(this).children('i').removeClass('fa-window-close').addClass('fa-bars');
    }
})

$('#search-btn').on('click', function(){
    $('#search').slideDown(700);
})

$('#search_close').on('click',function(){
    $('#search').slideUp(700);
})
$(document).on('scroll', function(){
    if($(this).scrollTop() > 0)
    {
        $('header').addClass('fixed');
    }
    else{
        $('header').removeClass('fixed');
    }
})


function login() {
    $('#login').width('350');
    $('.login-wrapper').fadeIn(1000);
}

function closeLogin() {
    $('.login-wrapper').hide();
    $('#login').width('0');
    $('body').css('margin-left','0');
} 

function register() {
    $('#register').width('350');
    $('.register-wrapper').fadeIn(1000);
}

function closeRegister() {
    $('.register-wrapper').hide();
    $('#register').width('0');
    $('body').css('margin-left','0');
} 
function logout() {
    $('body').prepend(
        '<div id="logout" class="modal"><p>Are you sure you want to Sign-out?</p>'+
        '<form action="/farmorders_beta/index.php/users/logout" method="post">'+
            '<div> <input style="margin-right:10px; margin-bottom:20px;" name="od_logout" value="yes" id="od_logout" type="checkbox">Logout from other devices </div>' +
            '<button type="submit" name="submit" class="btn btn-danger text-center">Sign-out</button>'+
        '</form>'+
        '<p id="logout-info" style="color:rgb(160, 18, 18);"></p>');
    $('#logout').modal('show');
}

$('.register-link').on('click', function(){
    closeLogin();
    register();
})

$('.login-link').on('click', function(){
    closeRegister();
    login();
})

//script to run when a user clicks submit on login form displayed on sweet alert modal plugin
$(document).on('submit', '#login form', function(e){
    e.preventDefault();
    $(this).ajaxSubmit(
        { 
            target:   '#login-info', //where to show login info

            beforeSubmit: function()
            {
                $("#login-info").html('<div class="lds-dual-ring"></div>');
            },

            success:function ()
            {
                //reload page
                if($('#login-info').text() == "Success"){
                    window.location.assign('/handymen/index.php/explore/');
                }
            },
            resetForm:  false
        }
    );
});

//script to run when a user clicks submit on logout form 
$(document).on('submit', '#logout form', function(e){
    e.preventDefault();
    $(this).ajaxSubmit(
        { 
            target:   '#logout-info', //where to show login info

            beforeSubmit: function()
            {
                $("#logout-info").html('<div class="lds-dual-ring"></div>');
            },

            success:function ()
            {
                //reload page
                if($('#logout-info').text() == "Success"){
                    location.reload();
                }
            },
            resetForm:  false
        }
    );
});

//script to run when a user clicks submit on registration form displayed on sweet alert modal plugin
$(document).on('submit', '#register form', function(e){
    e.preventDefault();
    $(this).ajaxSubmit(
        { 
            target:   '#register-info', //where to show registration info

            beforeSubmit: function()
            {
                $("#register-info").html('<div class="lds-dual-ring"></div>'); //show a loader
            },

            success:function ()
            {
                //alert success
                if($('#register-info').text() == "Success"){
                    window.location.assign('/handymen/index.php/users/login/');
                }
            },
            resetForm:  false
        }
    );
});

$(document).on('submit', '.contact-form form', function(e){
    e.preventDefault();
    $(this).ajaxSubmit(
        { 
            target:   '#mail-info', //where to show login info

            beforeSubmit: function()
            {
                $("#mail-info").html('<div class="lds-dual-ring"></div>');
            },

            success:function ()
            {
                //reload page
                if($('#mail-info').text() == "Success"){
                    //location.reload();
                    aler('success');
                }
            },
            resetForm:  false
        }
    );
});


//display scroll up button when user scroll above 250px
$(document).on('scroll', function(){
    if($(this).scrollTop() > 250)
    {
        $('.pull_up').show();
    }
    else{
        $('.pull_up').hide();
    }
})


//scroll document to top when scroll up button clicked
$('.pull_up').on('click', function(){
    $('html,body').animate({scrollTop:0},700);
})
    
//show password change field
$('.password_change').on('click', function(e){
    e.preventDefault();
    $('.password_change_block').show();
    $('.password_change').hide();
});

//hide password change field
$('.cancel_password_change').on('click', function(e){
    e.preventDefault();
    $('.password_change_block').hide();
    $('.password_change').show(); 
    $('.password').val('');
});

//show entered password in text format
$('.show_password').on('click', function(){
    $('.password').attr('type','text');
    $('.show_password').hide();
    $('.hide_password').show();
});

//show entered password in password format
$('.hide_password').on('click', function(){
    $('.password').attr('type','password');
    $('.show_password').show();
    $('.hide_password').hide();
});

//---------------------------------------------------------------------------------------------------

$('.explore-cat option').on('click', function(){
    cat = $(this).attr('value');
    if(cat=="All")
    {
        window.location.assign('/handymen/index.php/explore/');
    }
    else
    {
        window.location.assign('/handymen/index.php/explore/filter/'+cat);
    }
})

var current_explorer_filter = $("#current_filter").val();
$("option[value='"+current_explorer_filter+"']").attr('selected','selected');


//function to read selected image for upload
function readURL(input){
    if(input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#account_dp').attr('src', e.target.result); //set temp src for image while uploading
            $('#account_dp').attr('alt', input.files[0].name); //set temp alt for image while uploading
            $('.account-header').css('background-image','linear-gradient( rgba(3, 44, 17, 0.6), rgba(47, 184, 19, 0.6)), url("'+e.target.result+'")');
        };
        reader.readAsDataURL(input.files[0]);
    }
}



//prepend new Dom's image container to show upload progress and upload new media via ajax when a media is selected
$('#user_dp').change(function(){
    $('#targetLayer').prepend(
        '<div style="margin-top:10px;" class="progress"><div class="progress-bar"></div></div>'
    );
    //read selected image to show temp image from browser
    readURL(this);

    //start uploading via ajax
    $('#upload_form').ajaxSubmit(
        { 
            target:   '#targetLayer', //where to show upload info from uploading php script

            //set initial progress bar width to 0
            beforeSubmit: function()
            {
              $(".progress-bar").width('0%');
            },

            //show uploading progress by increasing progressbar width by percentComplete
            uploadProgress: function (event, position, total, percentComplete)
            {	
                
                $(".progress-bar").width(percentComplete + '%');
                $(".progress-bar").html(percentComplete +'%');
            },

            //after successful upload refresh image_container to display new uploaded file
            success:function ()
            {
               $('#targetLayer').text('changed!');

            },
            resetForm: true 
        }
    );

    });
