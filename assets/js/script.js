$(document).ready(function(){


    /**
     * Cet objet contrôle la barre de navigation. Met en œuvre l'ajout et le retrait
     * Action sur les éléments de la barre de navigation que nous voulons changer.
     * @type {{flagAdd: boolean, elements: string[], add: Function, remove: Function}}
     */

    var myNavBar = {

        flagAdd: true,

        elements: [],

        init: function (elements) {
            this.elements = elements;
        },

        add : function() {
            $this = this;
            if($this.flagAdd) {
                for(var i=0; i < $this.elements.length; i++) {
                    document.getElementById($this.elements[i]).className += " fixed-theme";
                }
                $this.flagAdd = false;
            }
        },

        remove: function() {
            $this = this;
            for(var i=0; i < $this.elements.length; i++) {
                document.getElementById($this.elements[i]).className =
                        document.getElementById($this.elements[i]).className.replace( /(?:^|\s)fixed-theme(?!\S)/g , '' );
            }
            $this.flagAdd = true;
        }

    };


    /**
     * Cet objet contrôle l'animation Typed
     */
    var typed = {

        scroll: function (window_scroll, screen_height) {

            $('.typed').each(function () {

                $this = $(this);
                // Prend en parametre la position  de l'élément séléctionné
                var position_page = $this.offset().top - screen_height;
                // Vérifie si l'élément séléctionné est visible
                if( window_scroll >= position_page){
                    // Lancement de l'animation

                     if($this.attr('typed') == 'typed'){

                    $this = $(this);
                    // Correspond au nombre de phrase voulu (attribué dans l'HTML) 
                    var sentence = $this.attr('sentence');
                    // Si sentence n'est pas défini par défaut nous faisons l'effet sur 2 phrase
                    if(!sentence)
                        sentence = '2';

                    // Choix conséquence de la définition de sentence
                        switch (sentence) {
                            case '1':
                                /*     First, Second, Third sont défini dans les attribue de chacun    */
                                var first_sentence = $this.attr('first_sentence');
                                // Lancement du script typed
                                $this.typed({
                                    strings: [first_sentence],
                                    typeSpeed: 10,
                                    contentType: 'html'
                                });
                            break;
                            case '2':
                                /*     First, Second, Third sont défini dans les attribue de chacun    */
                                var first_sentence = $this.attr('first_sentence');
                                var second_sentence = $this.attr('second_sentence');
                                // Lancement du script typed
                                $this.typed({
                                    strings: [first_sentence, second_sentence],
                                    typeSpeed: 10,
                                    contentType: 'html'
                                });
                                break;
                            case '3':
                                var first_sentence = $this.attr('first_sentence');
                                var second_sentence = $this.attr('second_sentence');
                                var third_sentence = $this.attr('third_sentence');
                                // Lancement du script typed
                                $this.typed({
                                    strings: [first_sentence, second_sentence, third_sentence],
                                    typeSpeed: 10,
                                    contentType: 'html'
                                });
                                break;
                            default:
                                // Lancement du script typed
                                $this.typed({
                                    strings: ['ERROR'],
                                    typeSpeed: 10,
                                    contentType: 'html'
                                });
                                break;
                        }
                        // On retire l'attribu typed afin que le script ne tourne pas en rond
                        $this.attr('typed','');
                        // On attribue l'index de l'élément séléctionné
                        var index = $('.typed').index($this);
                        // récupère la taille du texte et l'attribue au "prompt"
                        var size = $this.css('font-size');
                        $(".typed:eq("+index+") + .typed-cursor").css('font-size', size);
                        
                    }
                }
            });

        },

        now : function() {

            $('.typed_now').each(function () {

                    $this = $(this);
                    // Correspond au nombre de phrase voulu (attribué dans l'HTML) 
                    var sentence = $this.attr('sentence');
                    // Si sentence n'est pas défini par défaut nous faisons l'effet sur 2 phrase
                    if(!sentence)
                        sentence = '2';

                    // Choix conséquence de la définition de sentence
                    switch (sentence) {
                        case '1':
                        /*     First, Second, Third sont défini dans les attribue de chacun    */
                        var first_sentence = $this.attr('first_sentence');
                        // Lancement du script typed
                        $this.typed({
                            strings: [first_sentence],
                            typeSpeed: 10,
                            contentType: 'html'
                        });
                        break;
                        case '2':
                            /*     First, Second, Third sont défini dans les attribue de chacun    */
                            var first_sentence = $this.attr('first_sentence');
                            var second_sentence = $this.attr('second_sentence');
                            // Lancement du script typed
                            $this.typed({
                                strings: [first_sentence, second_sentence],
                                typeSpeed: 10,
                                contentType: 'html'
                            });
                            break;
                        case '3':
                            var first_sentence = $this.attr('first_sentence');
                            var second_sentence = $this.attr('second_sentence');
                            var third_sentence = $this.attr('third_sentence');
                            // Lancement du script typed
                            $this.typed({
                                strings: [first_sentence, second_sentence, third_sentence],
                                typeSpeed: 10,
                                contentType: 'html'
                            });
                            break;
                        default:
                            // Lancement du script typed
                            $this.typed({
                                strings: ['ERROR'],
                                typeSpeed: 10,
                                contentType: 'html'
                            });
                            break;
                    }
                    // On retire l'attribu typed afin que le script ne tourne pas en rond
                    $this.attr('typed','');
                    // On attribue l'index de l'élément séléctionné
                    var index = $('.typed').index($this);
                    // récupère la taille du texte et l'attribue au "prompt"
                    var size = $this.css('font-size');
                    $(".typed:eq("+index+") + .typed-cursor").css('font-size', size);

            });
        },

        function: function() {

            $('.typed_function').each(function () {

                $this = $(this);
                // Correspond au nombre de phrase voulu (attribué dans l'HTML) 
                var sentence = $this.attr('sentence');
                // Si sentence n'est pas défini par défaut nous faisons l'effet sur 2 phrase
                if(!sentence)
                    sentence = '2';

                // Choix conséquence de la définition de sentence
                switch (sentence) {
                    case '1':
                        /*     First, Second, Third sont défini dans les attribue de chacun    */
                        var first_sentence = $this.attr('first_sentence');
                        // Lancement du script typed
                        $this.typed({
                            strings: [first_sentence],
                            typeSpeed: 10,
                            contentType: 'html'
                        });
                        break;
                    case '2':
                        /*     First, Second, Third sont défini dans les attribue de chacun    */
                        var first_sentence = $this.attr('first_sentence');
                        var second_sentence = $this.attr('second_sentence');
                        // Lancement du script typed
                        $this.typed({
                            strings: [first_sentence, second_sentence],
                            typeSpeed: 10,
                            contentType: 'html'
                        });
                        break;
                    case '3':
                        var first_sentence = $this.attr('first_sentence');
                        var second_sentence = $this.attr('second_sentence');
                        var third_sentence = $this.attr('third_sentence');
                        // Lancement du script typed
                        $this.typed({
                            strings: [first_sentence, second_sentence, third_sentence],
                            typeSpeed: 10,
                            contentType: 'html'
                        });
                        break;
                    default:
                        // Lancement du script typed
                        $this.typed({
                            strings: ['ERROR'],
                            typeSpeed: 10,
                            contentType: 'html'
                        });
                        break;
                }
                // On retire l'attribu typed afin que le script ne tourne pas en rond
                $this.attr('typed','');
                // On attribue l'index de l'élément séléctionné
                var index = $('.typed').index($this);
                // récupère la taille du texte et l'attribue au "prompt"
                var size = $this.css('font-size');
                $(".typed:eq("+index+") + .typed-cursor").css('font-size', size);

            });

        }

    };



    var anchor = {
        auto: function(window_scroll,screen_height) {

           if (window_scroll) 
           {
               $('.choix .division .title').each(function(iscroll) 
               {

                    $this = $(this);
                    // Prend en parametre la position  de l'élément séléctionné
                    var position_page = $this.offset().top - (screen_height/2);

                   if (window_scroll >= position_page) 
                   {
                       $('.nav-bar li').removeClass('active').eq(iscroll).addClass('active');
                   }
               });

           } 
           else {
                $('.project_link.project_link').removeClass('active').first().addClass('active');
           }
        }
    }

    // Format un number en fonction du compte voulu € ou %


    /**
     * Initie l'objet. Passe l'objet dans le tableau d'éléments
     * Que nous voulons changer lorsque le scroll descend
     */

    myNavBar.init(  [
        "header",
        "header-container",
        "brand"
    ]);

    $player = $('.sm2-bar-ui.fixed');

    /**
     * Fonction utilisé lors du défilement de la page
     */
    function offSetManager(){

        var yOffset = 0;

        // Prend en parametre le scroll de la page
        var currYOffSet = window.pageYOffset;

        // Prend en parametre la taille de l'écran 
        var screen_height = $(window).height();

        // Ajoute ou supprime 
        if(yOffset < currYOffSet) {
            myNavBar.add();  
            // $player.fadeIn('400');
        }
        else if(currYOffSet == yOffset){
            myNavBar.remove();
            // $player.fadeOut('400');
        }

        


    }


    /**
     * Backstretch
     */
    
    if(!!$('#page_inscription').length){

        // $.backstretch([
        //   "asset/img/connexion1.jpg",
        //   "asset/img/connexion2.jpg",
        //   "asset/img/connexion3.jpg"
        // ], {
        //     duration: 4000,
        //     transition: 'fade',
        //     transitionDuration: 1000
        // });
    }


    /**
     * Détection du scroll
     */

    window.onscroll = function(e) {

        // Appel de la fonction offSetManager
        offSetManager();
    }



    /**
     * Détection du scroll au rafraichissement de la page
     */
    offSetManager();






    // Transition vers les levées de fonds au click
    $('#transitiontoevent').click(function (){

        // Position de la section PME
        var top = $('#top').offset().top;

        $('body,html').animate(
            {
                scrollTop: top - 100
            }, 500);
        

    });
    

    /**
     * Carousel
     */
    $('.slider_home').slick({
        dots: false,
        infinite: true,
        autoplay:true,
        autoplaySpeed:5000,
        slidesToShow: 1,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
                dots: true
            }
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]
    });








    /**
     * Sticky
     */
    // $(window).resize(function(event) {
        // $size_screen = $(window).width();
        // if($size_screen > 1024){
        //     $("#bar_sticky").stick_in_parent({
        //         offset_top: 70
        //     });
        // }else{
        //     $("#bar_sticky").stick_in_parent({
        //         parent: '.entry-content'
        //     });
        // }
    // });



});

