$(document).ready(function() {

    var editor = grapesjs.init({
        height: '100%',
        showOffsets: 1,
        noticeOnUnload: 0,
        storageManager: {
            id: 'gjs-',             // Prefix identifier that will be used inside storing and loading
            type: 'local',          // Type of the storage
            autosave: true,         // Store data automatically
            autoload: true,         // Autoload stored data on init
            stepsBeforeSave: 1,     // If autosave enabled, indicates how many changes are necessary before store method is triggered
            storeComponents: true,  // Enable/Disable storing of components in JSON format
            storeStyles: true,      // Enable/Disable storing of rules in JSON format
            storeHtml: true,        // Enable/Disable storing of components as HTML string
            storeCss: true,         // Enable/Disable storing of rules as CSS string
          },
        container: '#gjs',
        fromElement: true,
        canvas: {
          scripts: [
          'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js'
          ]
        },
        plugins: ['gjs-preset-webpage'],
        pluginsOpts: {
          'gjs-preset-webpage': {}
        }
      });

      editor.BlockManager.add('test-block', {
        label: 'Test block',
        attributes: {class: 'fa fa-text'},
        content: {
          script: "alert('Hi'); console.log('the element', this)",
          // Add some style just to make the component visible
          style: {
            width: '100px',
            height: '100px',
            'background-color': 'red',
          }
        }
      });
      



      var blockManager = editor.BlockManager;

           

      blockManager.add('slider', {
        label: 'Slider',
        category: 'Custom',
        content:{
          script: function () {
            var el = this;
            var initMySLider = function() {
              $('.sliders').slick({
                infinite: true,
                dots: true,
                speed: 300,
                autoplay: true,
                autoplaySpeed: 2000,
                slidesToShow: 3,
                slidesToScroll: 1
              });
            }
            var isSlickLoaded = (typeof $.fn.Slick !== 'undefined');
            if (!isSlickLoaded) {
              var script = document.createElement('script');
              script.onload = initMySLider;
              script.src = 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js';
              document.body.appendChild(script);
              $('head').append('<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">');
            }
          },
          content:`
          <div class='sliders>
              <div><img src="https://placeimg.com/300/200/any" width=300 height=300></div>
              <div><img src="https://placeimg.com/300/200/any" width=300 height=300></div>
              <div><img src="https://placeimg.com/300/200/any" width=300 height=300></div>
              <div><img src="https://placeimg.com/300/200/any" width=300 height=300></div>
            </div>`
          }
      });
// Get DomComponents module
      var comps = editor.DomComponents;

      // Get the model and the view from the default Component type
      var defaultType = comps.getType('default');
      var defaultModel = defaultType.model;
      var defaultView = defaultType.view;

      var inputTypes = [
        {value: 'text', name: 'Text'},
        {value: 'email', name: 'Email'},
        {value: 'password', name: 'Password'},
        {value: 'number', name: 'Number'},
      ];
// The `input` will be the Component type ID
      comps.addType('sliders', {
        // Define the Model
        model: defaultModel.extend({
          // Extend default properties
          defaults: Object.assign({}, defaultModel.prototype.defaults, {
            // Can be dropped only inside `form` elements
            // Can't drop other elements inside it
            droppable: false,
            // Traits (Settings)
            traits: ['name', 'placeholder', {
                // Change the type of the input (text, password, email, etc.)
                type: 'select',
                label: 'Type',
                name: 'type',
                options: inputTypes,
              },{
                // Can make it required for the form
                type: 'checkbox',
                label: 'Required',
                name: 'required',
            }],
          }),
        },
        // The second argument of .extend are static methods and we'll put inside our
        // isComponent() method. As you're putting a new Component type on top of the stack,
        // not declaring isComponent() might probably break stuff, especially if you extend
        // the default one.
        {
          isComponent: function(el) {
            console.log(el.tagName,el.className,el.tagName == 'DIV',/sliders/.test(el.className))
            if(el.tagName == 'DIV' && /sliders/.test(el.className)) {
              alert("Type found")
              return {type: 'sliders'};
            }
          },
        }),
        view:defaultView.view,
    });

});