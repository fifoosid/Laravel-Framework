(function() {
    //Change active links
    function changeActiveLinks()
    {
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
    }

    //Change avatar
    function AttachChangeAvatar()
    {
        const button = document.getElementsByClassName('profile-picture')[0];
        const hoverImage =  document.getElementsByClassName('avatar-wrapper')[0];

        button.addEventListener('mouseover', () => {
            if(hoverImage.style.display === 'none')
            {
                hoverImage.setAttribute('style', 'display: block;');
            }
            else
            {
                hoverImage.setAttribute('style', 'display: none;');
            }
        });

    }

    document.addEventListener('DOMContentLoaded', () => {
        console.log('aaa');
        changeActiveLinks();
        AttachChangeAvatar();
    });
   
})()