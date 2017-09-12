var playlist = {

  add : function($this){
        $source = $($this).attr('source');
        $titre = $($this).attr('titre');
        $playlist = $('div.sm2-playlist-wrapper ul.sm2-playlist-bd');
        $playlist.append('<li><a href="'+$source+'">'+$titre+'</a></li>');
        $titre = $($this).attr('titre');
        notify.info($titre+" été ajouté à votre playlist");
  },

  remove: function(){

  }
}

var send = {

  form : function($this, $path, $function) {
    $result = $($this).serialize();

    $.ajax({
      url : $path,
      dataType: "html",
      type: "POST",
      data : $result + '& valide=' + 1,
      success: function(response){

        var $res = JSON.parse(response);

        switch ($res.status) {
          case "success":
            if(!!$res.message)
             notify.success($res.message);
            if ($function != 0)
              $function($res.data);
            break;
          case "error":
             notify.danger($res.message);
            break;
          default:
             notify.danger("Erreur inconnue");
            break;
        }


      }
    }).fail(function() {
      notify.danger("Erreur inconnue");
    });


},




  test : function($this, $path, $function) {
    $result = $($this).serialize();

    $.ajax({
      url : $path,
      dataType: "html",
      type: "POST",
      data : $result,
      success: function(response){
          console.dir(response);
        }
    }).fail(function() {
      notify.danger("Erreur inconnue");
    });
  }

};

/**
 * [file description] Envoi de fichier par JS !
 * String $id L'id du fichier
 * String $path chemin vers le formulaire d'envoi
 */


var file = {

    target : function($obj, $path){
            var fd = new FormData();
            for (value in obj){
              obj[value] = document.getElementById(value).files[0];
              console.dir(obj[value]);
              fd.append(value , obj[value]);
            }
            var xhr = new XMLHttpRequest();
            xhr.open('POST', $path, true);
            xhr.upload.onprogress = function(e) {
              if (e.lengthComputable) {
                var percentComplete = (e.loaded / e.total) * 100;
                console.log(percentComplete + '% uploaded');
              }
            };
            xhr.onload = function() {
              if (this.status == 200) {
                var resp = JSON.parse(this.response);
                console.log('Server got:', resp);
                if(!!resp)
                  return true;
              };
            };
            
            xhr.send(fd);
    }
};

/**
 * [$_GET description] Récupérer un parametre dans l'URL
 * @param  String param 
 * @return value
 */
function $_GET(param) {
  var vars = {};
  window.location.href.replace( location.hash, '' ).replace( 
    /[?&]+([^=&]+)=?([^&]*)?/gi, // regexp
    function( m, key, value ) { // callback
      vars[key] = value !== undefined ? value : '';
    }
  );

  if ( param ) {
    return vars[param] ? vars[param] : null;  
  }
  return vars;
};

/**
 * [insertParam description] Insert un paramètre dans l'URL
 * @param  {[type]} key   Paramètre d'url
 * @param  {[type]} value Value liée au paramètre
 * @return {[type]}       Fait une redirection
 */
function insertParam(key, value){
    var key = encodeURI(key); 
    var value = encodeURI(value);

    var kvp = document.location.search.substr(1).split('&');


    var i=kvp.length; var x; while(i--) 
    {
        x = kvp[i].split('=');

        if (x[0]==key)
        {
            x[1] = value;
            kvp[i] = x.join('=');
            break;
        }
    }

    if(i<0) {kvp[kvp.length] = [key,value].join('=');}

    //this will reload the page, it's likely better to store this until finished
    document.location.search = (document.location.search == "") ? kvp.join('') : kvp.join('&'); 
}


function addParameterToURL(param){
  _url = location.href;
  _url += (_url.split('?')[1] ? '&':'?') + param;
  return _url;
}


/**
 * Notifications (info, success, danger)
 * Ils prennent tous en paramètres un text
 */
var notify = {

  info : function($text){
    $.notify({
      // options
      icon: 'fa fa-info-circle',
    //  title: 'Bootstrap notify',
      message: $text,
      // url: $url,
    //  target: '_blank'
    },{
      // settings
      element: 'body',
      position: null,
      type: "info",
      allow_dismiss: true,
      newest_on_top: false,
      showProgressbar: false,
      placement: {
        from: "bottom",
        align: "right"
      },
      animate: {
        enter: 'animated fadeInDown',
        exit: 'animated fadeOutUp'
      },
      offset: 20,
      spacing: 10,
      z_index: 1031,
      delay: 2000,
      timer: 3000,
      url_target: '_blank',
      mouse_over: null,

    });
  },

  success : function($text){
    $.notify({
      // options
      icon: 'fa fa-info-circle',
    //  title: 'Bootstrap notify',
      message: $text,
      // url: $url,
    //  target: '_blank'
    },{
      // settings
      element: 'body',
      position: null,
      type: "success",
      allow_dismiss: true,
      newest_on_top: false,
      showProgressbar: false,
      placement: {
        from: "bottom",
        align: "right"
      },
      animate: {
        enter: 'animated fadeInDown',
        exit: 'animated fadeOutUp'
      },
      offset: 20,
      spacing: 10,
      z_index: 1031,
      delay: 2000,
      timer: 3000,
      url_target: '_blank',
      mouse_over: null,

    });
  },

  danger : function($text){
    $.notify({
      // options
      icon: 'fa fa-info-circle',
    //  title: 'Bootstrap notify',
      message: $text,
      // url: $url,
    //  target: '_blank'
    },{
      // settings
      element: 'body',
      position: null,
      type: "warning",
      allow_dismiss: true,
      newest_on_top: false,
      showProgressbar: false,
      placement: {
        from: "bottom",
        align: "right"
      },
      animate: {
        enter: 'animated fadeInDown',
        exit: 'animated fadeOutUp'
      },
      offset: 20,
      spacing: 10,
      z_index: 1031,
      delay: 2000,
      timer: 3000,
      url_target: '_blank',
      mouse_over: null,

    });
  }


}



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

    }
    

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



    $('#addSon').click(function(event) {

      $('.sidebar.right').show();

    });

    /**
     * Backstretch
     */
    
    if(!!$('#page_inscription').length){

        $.backstretch([
          "assets/img/slide1.jpg",
          "assets/img/slide3.jpg",
          "assets/img/slide4.jpg"
        ], {
            duration: 4000,
            transition: 'fade',
            transitionDuration: 1000
        });
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



    $("#cover, #music").fileinput({
        // initialPreview: [
        //     carteID
        // ],
        // initialPreviewAsData: true,
        // initialPreviewConfig: [
        //     {caption: "", size: "", width: "120px", key: 1, showDelete: false}
        // ],
        // deleteUrl: "/site/file-delete",
        overwriteInitial: true,
        language: 'fr',
        uploadUrl: '#',
        maxFileCount: 1,
        // maxFileSize: 200,
        showBrowse : false, // Booléen , Bouton browse
        autoReplace : true, // Booléen , de remplacer automatiquement les fichiers dans l'aperçu une fois que la maxFileCount
        browseOnZoneClick : true, // Booléen , que ce soit pour activer la recherche / sélection de fichiers en cliquant sur la zone de prévisualisation.
        showCaption: false, // Booléen , pour afficher la légende du fichier. Par défaut true.
        // showPreview : false, // Booléen , qu'il s'agisse d'afficher l'aperçu du fichier. Par défaut true.
        showRemove : false, // Booléen , qu'il apparaisse ou non le bouton de suppression / effacement du fichier. Par défaut true.
        showUpload: false, // Booléen , pour afficher le bouton de téléchargement du fichier. Par défaut true.
        showCancel: false, // Booléen , qu'il s'agisse d'afficher le bouton d'annulation du téléchargement du fichier. Par défaut true.
        showFermer: false, // Booléen , pour afficher l'icône de fermeture dans l'aperçu. Par défaut, «vrai». Cela ne sera analysé que s'il showPreviewest vrai ou lorsque vous utilisez la {close}balise dans vos modèles de prévisualisation.
    });

});

