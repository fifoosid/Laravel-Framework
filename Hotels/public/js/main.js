(function() {
    //Change active links
    let pathname = window.location.pathname;
    
    $('.selector').children().removeClass('active');
    if(pathname === '/hotels/all'){
        $('.selector > li').first().addClass('active');
    }
    else if(pathname === '/about') {
        $('.selector > li:nth-child(3)').addClass('active');
    }
    else if(pathname === '/hotels/create'){
        console.log(2);
        $('.selector > li:nth-child(4)').addClass('active');
    }
    //For random hotel(stands alone, because it is redirecting, so we can't the same way)
    else if( !($('.selector > li').first().hasClass('active') ||
        $('.selector > li:nth-child(3)').hasClass('active') ||
        $('.selector > li:nth-child(4)').hasClass('active')))
        {
            $('.selector > li:nth-child(2)').addClass('active');
            console.log(document.referrer);
        }
})()