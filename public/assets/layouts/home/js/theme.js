var readyState = function(callback)
{
    var body = document.body;
    
    if(body && body.readyState == 'loaded')
    {
        callback();
    }
    else
    {
        if (window.addEventListener)
        {
            window.addEventListener('load', callback, false);
        }
        else
        {
            window.attachEvent('onload', callback);
        }
    }   
}

readyState(function()
{
    /**
     * Scroll Page
     */
    function scrollPage(page)
    {
        $('#navigation a[data-nav="scroll"]').removeClass('active');

        $('#navigation a[href="#/' + page + '"]').addClass('active');

        scroll = false;

        $('html, body').animate({ scrollTop: $('#' + page).offset().top }, 800, function(){ scroll = true; });
    }

    /**
     * Hash helper
     */
    function parseHash(newHash, oldHash)
    {
        crossroads.parse(newHash);
    }

    /**
     * Position of the intro text
     */
    function introPos()
    {
        $('#intro').css({'margin-top':( ($('.box:first').height() /2) - $('#header').height() - ($('#intro').height() /2) )});
    }

    /**
     * Set Hash silently
     */
    function setHashSilently(hash){
        hasher.changed.active = false;
        hasher.setHash(hash);
        hasher.changed.active = true;
    }

    /**
     * Panel offset
     */
    $('.panel').css({'margin-top':$('#header').height()});

    /**
     * Crossroad
     */
    crossroads.addRoute('{page}', function(page)
    {
            scrollPage(page);
    });
    
    /**
     * Hasher
     */
    hasher.initialized.add(parseHash);
    hasher.changed.add(parseHash);
    hasher.init();
    
    introPos();

    $('#intro').fadeIn();

    /**
     * Window scroll
     */
    $(window).scroll(function()
    {
        var self = this;
        
        if(scroll)
        {
            $('.box').each(function()
            {
                    if(($(self).scrollTop() + $('#header').height()) >= $(this).position().top && ($(self).scrollTop() + $('#header').height()) < ($(this).position().top + $(this).height()))
                    {
                            $("#navigation a[href='#/"+$(this).attr('id') + "']").addClass('active');
                            setHashSilently($(this).attr('id'));
                    }
                    else
                    {
                            $("#navigation a[href='#/"+$(this).attr('id') + "']").removeClass('active');
                    }
            });
        }

        if ($(this).scrollTop() > 100)
        {
            $('#back-top').fadeIn();
        }
        else
        {
            $('#back-top').fadeOut();
        }
    });

    /**
     * Window resize
     */
    $(window).resize(function()
    {
        introPos();
    });

    /**
     * Scroll to top links
     */    
    $('#back-top').click(function(event)
    {
        $('#navigation a[data-nav="scroll"]').removeClass('active');

        var firstItem = $('#navigation a[data-nav="scroll"]:first');
        
        firstItem.addClass('active');

        hasher.setHash(firstItem.attr('href').replace('#/', ''));

        $('html, body').animate({ scrollTop: 0 }, 800);
        
        return false;
    });

    $('#logo').click(function(event)
    {
        $('#navigation a[data-nav="scroll"]').removeClass('active');

        var firstItem = $('#navigation a[data-nav="scroll"]:first');

        firstItem.addClass('active');

        hasher.setHash(firstItem.attr('href').replace('#/', ''));

        $('html, body').animate({ scrollTop: 0 }, 800);
        
        return false;
    });

    /**
     * Vegas background image slider
     */
    $.vegas('slideshow',
    {
        delay: 10000,
        backgrounds: [
            { src: 'http://antoniocarlosribeiro.smugmug.com/Paisagem/Rio-de-Janeiro/i-s52P2DB/0/X3/ACR-20101114-1000-X3.jpg', fade: 2000 },
            { src: 'http://antoniocarlosribeiro.smugmug.com/Paisagem/Rio-de-Janeiro/i-Lgjxgzn/0/X3/ACR-20101114-1014-X3.jpg', fade: 2000 },
            { src: 'http://antoniocarlosribeiro.smugmug.com/MusicaShows/0408-SlavasSnowshow/i-zvVc7XR/0/X3/ACR-20100804-1309-X3.jpg', fade: 2000 },
            { src: 'http://antoniocarlosribeiro.smugmug.com/MusicaShows/0406-Rio-das-Ostras-Jazz-Blues/i-VpSQV7F/0/X3/ACR-20100604-00005-98-X3.jpg', fade: 2000 },
            { src: 'http://antoniocarlosribeiro.smugmug.com/Paisagem/Rio-das-Ostras/i-QnDNv8k/0/X3/ACR-20100606-00006-230-X3.jpg', fade: 2000 },
            { src: 'http://antoniocarlosribeiro.smugmug.com/MusicaShows/1011TioSambaLancamento/i-Rmkzk8z/0/X3/ACR-20101110-0392-X3.jpg', fade: 2000 },
            { src: 'http://antoniocarlosribeiro.smugmug.com/MusicaShows/2304-EduKriegerVC2010/i-nV3qvGL/0/X3/ACR-20100424-01030-X3.jpg', fade: 2000 },
            { src: 'http://antoniocarlosribeiro.smugmug.com/Paisagem/Rio-de-Janeiro/i-Lgjxgzn/0/X3/ACR-20101114-1014-X3.jpg', fade: 2000 },
            { src: 'http://antoniocarlosribeiro.smugmug.com/MusicaShows/2304-EduKriegerVC2010/i-nV3qvGL/0/X3/ACR-20100424-01030-X3.jpg', fade: 2000 },
            { src: 'http://antoniocarlosribeiro.smugmug.com/Paisagem/Rio-de-Janeiro/i-Lgjxgzn/0/X3/ACR-20101114-1014-X3.jpg', fade: 2000 },
            { src: 'http://antoniocarlosribeiro.smugmug.com/Danca/0110-Aniversario5Anos/i-VkjpMdJ/0/X3/ACR-20101001-8519-X3.jpg', fade: 2000 },
            { src: 'http://antoniocarlosribeiro.smugmug.com/TamborCarioca/2901-Ensaio-do-Bloco-Tambor/i-4NNTgPx/2/X3/ACR-20100126-01050-X3.jpg', fade: 2000 },
            { src: 'http://antoniocarlosribeiro.smugmug.com/Viagens/NYC-20092010/i-mKmnsXG/1/X3/ACR-NY--20091225-00120-X3.jpg', fade: 2000 },
            { src: 'http://antoniocarlosribeiro.smugmug.com/TamborCarioca/2002-Apresentação-do-Grupo-e/i-Gqxsrkf/1/X3/ACR-20100220-01166-X3.jpg', fade: 2000 },
            { src: 'http://antoniocarlosribeiro.smugmug.com/MusicaShows/2001-Jane-Duboc-e-Victor/i-G6GMszS/0/X3/ACR-20100120-01058-X3.jpg', fade: 2000 },
            { src: 'http://antoniocarlosribeiro.smugmug.com/Viagens/2802Maceio/i-nZH2LG7/1/X3/ACR-20100301-01430-X3.jpg', fade: 2000 },
            { src: 'http://antoniocarlosribeiro.smugmug.com/MusicaShows/0110-Nicolas-Krassik-no/i-xGnzq4m/0/X3/ACR-20101002-8665-X3.jpg', fade: 2000 },
            { src: 'http://antoniocarlosribeiro.smugmug.com/Esporte/2703-Class-One-Brasil/i-pSm8jZG/0/X3/ACR-20100327-01209-X3.jpg', fade: 2000 }
        ]
    })('overlay');

    /**
     * Lightbox
     */

    $('#lightbox').on('click', function(event)
    {
        $('#lightbox').hide();
    });

    $('.lightbox_trigger').click(function(event)
    {
        event.preventDefault();
        
        $('#bigimg').attr({'src':$(this).attr("href")});
        $('#lightbox').show();
    });

    /**
     * Flexslider
     */
    $('.flexslider').flexslider();

});