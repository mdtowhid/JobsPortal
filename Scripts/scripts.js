$(document).ready(function(){
    $(window).click(function(e){
        $customModal = $('.custom-modal');
        if(e.target.className === "signup-btn"){
            $customModal.toggleClass('active');
        }else{
            $customModal.removeClass('active');
        }
    });

    var nav = $('.wrapper nav');
    var navPosition = nav.position();
    $(window).scroll(() => {
        var scrollBarPos = $(window).scrollTop();
        if(scrollBarPos > 200){
            nav.addClass('shrinkNav');
        }else{
            nav.removeClass('shrinkNav'); 
        }
    })
});

$(document).ready(()=>{

    

    //user sign up validation
    $('#seekerCompanySameSubmitBtnId').click(function(){
        let password = $('#password').val();
        let confirmPassword = $('#confirmPassword').val();
        const errorBox = $('#notMachedPasswordErrorId');
        let phnNumb = $('#phnNumb').val();
        const phnNumbError = $('#phnNumbError');

        let nidNumberId = $('#nidNumberId').val();
        let nidNumberErrorId = $('#nidNumberErrorId');

        if(phnNumb.length === 0){
            phnNumbError.text("Phone Number Is Required.");
            return false;
        }else if(phnNumb.length < 11 || phnNumb.length > 11){
            phnNumbError.text("Invalid Phone Number.");
            return false;
        }else{
            phnNumbError.text("");
        }

        //NID Number Validation

        if(nidNumberId.length === 0){
            nidNumberErrorId.text("NID Number Is Required.");
            return false;
        }else if(nidNumberId.length < 9){
            nidNumberErrorId.text("NID Number Is Required.");
            return false;
        }else{
            nidNumberErrorId.text("");
        }

        if(confirmPassword !== password){
            errorBox.text("Password and Confirm Password Doesn't Matched.");
            return false;
        }else{
            $('#notMachedPasswordErrorId').text("");
            return true;
        }
    });

    var searcResultSlide = $('.search-result');
    var searcResultContentBox = $('.search-result-content');
    searcResultSlide.hide();
    $('.search-result-cancel-btn').click(()=>{
        $('.search-result').slideToggle('slow');
    });

    $('#searcBoxId').keyup((e)=>{
        var text = $('#searcBoxId').val();
        if(text.length > 1){
            searcResultSlide.slideDown('slow');
            searcResultContentBox.html(text);
            var action = "Load";

            searcResultContentBox.load('ajax.php', {
                searchString: text
            });
            
            
        }else{
            searcResultContentBox.html('');
            searcResultSlide.slideUp('slow');
        }
    });

    
});
