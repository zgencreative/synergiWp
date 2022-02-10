/* globals _, jQuery, wp, mfn_cm */
/* jshint esversion: 6 */

// (function($) {

//   "use strict";

  var MfnFieldTextarea = (function($) {

    /**
     * The Editor
     */

    let __editor = {

      instance: undefined,
      domLocation: undefined,

      methods: {

        mfn_textarea_actions: (actionName) => mfn_textarea_actions(actionName),

        addImage: _ => {
          const mediaWindow = wp.media({
            title: 'Insert a media',
            multiple: false,
            library : {type: 'image'},
            button: {text: 'Insert'}
          });

          mediaWindow.on('select', function() {
            const informations = mediaWindow.state().get('selection').first().toJSON();
            __editor.methods.addCodeIntoTextArea(`<img class="scale-with-grid" src="${informations.url}" alt="${informations.alt}" />`);
            updateView();
          });

          mediaWindow.open();
          return false;
        },

        redo: _ => __editor.instance.codemirror.doc.redo(),
        undo: _ => __editor.instance.codemirror.doc.undo(),
        getText: ({lineFrom, lineTo}, {chFrom, chTo}) => __editor.instance.codemirror.doc.getRange({line:lineFrom, ch:chFrom}, {line:lineTo, ch:chTo}),
        removeText: ({lineFrom, lineTo}, {chFrom, chTo}) => __editor.instance.codemirror.doc.replaceRange('', {line:lineFrom, ch:chFrom}, {line:lineTo, ch:chTo}),
        getSelectedText: _ =>  __editor.instance.codemirror.doc.getSelections(),
        getPosOfTextCursor: _ => __editor.instance.codemirror.doc.getCursor(),
        addCodeIntoTextArea: (code) => __editor.instance.codemirror.doc.replaceRange(code, __editor.methods.getPosOfTextCursor() ),
        wrapTextIntoShortcode: (startSc, endSc) => __editor.instance.codemirror.doc.replaceSelections( [startSc + __editor.methods.getSelectedText() + endSc], __editor.methods.getPosOfTextCursor() ),

      },

    };


    /**
     * Shortcodes lint
     */

    let __scLinter = {

      shortcodes:{

        content: ['alert', 'blockquote', 'dropcap', 'highlight', 'tooltip', 'tooltip_image', 'heading', 'google_font', 'alert', 'idea', 'popup', 'code'],
        noContent: ['button', 'icon_block', 'fancy_link', 'image', 'idea_block', 'progress_icons', 'hr',  'content_link', 'icon_bar', 'divider', 'icon', 'countdown_inline', 'counter_inline', 'sharebox'],

        inTextarea: [],
        highlighted: [],
        focused: [],

        regex: /\[(.*?)?\](?:([^\[]+)?\[\/\])?/,

        css: {
          highlight:{
            on:  'background:rgba(253, 250, 233, .5); color:#C68A05; cursor:pointer',
            off: 'background:transparent; color:unset; cursor:unset'
          },
          focus: {
            on: 'background:#FBF6DD; padding:1px .5px',
            off: 'background:transparent; padding:unset'
          }
        }

      },

      methods:{

        removeSlash: (name) => _.without(name, '/').join('').toString(),
        checkIfHasContent: (name) => _.contains(__scLinter.shortcodes.content, __scLinter.methods.removeSlash(name)),

        /* Change the colors */
        toggleFocus: (shortcode) => {
          if(!shortcode){
            _.each(__scLinter.shortcodes.focused, (focusedSC) => {
              try{
                let {from, to} = focusedSC.find();
                __editor.instance.codemirror.doc.markText(
                  {line: from.line, ch: from.ch},
                  {line: to.line, ch: to.ch},
                  {css: __scLinter.shortcodes.css.focus.off}
                );
              }catch(err){
                //
              }
            });
            __scLinter.shortcodes.focused = [];
          }else{
              __scLinter.shortcodes.focused.push(
                __editor.instance.codemirror.doc.markText(
                  {line: shortcode.line, ch: shortcode.bracket1},
                  {line: shortcode.line, ch: shortcode.bracket2},
                  {css: __scLinter.shortcodes.css.focus.on}
                )
              );
          }
        },
        toggleHighlight: (highlight) => {
          if(!highlight){
            _.each(__scLinter.shortcodes.highlighted, (shortcode) => {
              try{
                let {from, to} = shortcode.find();
                __editor.instance.codemirror.doc.markText(
                  {line: from.line, ch: from.ch},
                  {line: to.line, ch: to.ch},
                  {css: __scLinter.shortcodes.css.highlight.off}
                );
              }catch(err){
                //
              }
            });
          }else{
            __scLinter.shortcodes.highlighted = [];
            _.each(__scLinter.shortcodes.inTextarea, (shortcode) => {
              __scLinter.shortcodes.highlighted.push(
                __editor.instance.codemirror.doc.markText(
                  {line: shortcode.line, ch: shortcode.bracket1},
                  {line: shortcode.line, ch: shortcode.bracket2},
                  {css: __scLinter.shortcodes.css.highlight.on}
                )
              );
            });
          }
        },
        /* EO change the colors*/

        parseScFromLines: (line, lineNr) => {
          //parser, check by letter
          let shortcode = {line: lineNr, bracket1: undefined, bracket2: undefined, content: '', attributes: []},
              bracketOpen = false,
              spacePressed = false,
              attributesString = '';

          _.each(line.text, function(letter, pos) {
            switch(true){
              case ('[' === letter && !bracketOpen):
                bracketOpen = true;
                shortcode.bracket1 = pos;
                break;
              case ('[' === letter && bracketOpen):
                shortcode.bracket1 = pos;
                shortcode.content = '';
                break;
              case (' ' === letter && bracketOpen && !spacePressed):
                spacePressed = true;
                break;
              case (spacePressed && letter === ']' && !_.contains( _.flatten([__scLinter.shortcodes.content, __scLinter.shortcodes.noContent]), shortcode.content)):
                spacePressed = false;
                bracketOpen = false;
                shortcode = {...shortcode, bracket1: undefined, bracket2: undefined, content: ''};
                attributesString = '';
                break;
              case (' ' === letter && !bracketOpen):
                break;
              case ('/' === letter && !spacePressed):
              case(bracketOpen && !_.contains([ ']', '[', ' '], letter) && !spacePressed):
                shortcode.content += letter;
                break;
              case (']' === letter && _.contains( _.flatten([__scLinter.shortcodes.content, __scLinter.shortcodes.noContent]), shortcode.content)):
              case ('/' === shortcode.content[0] &&  _.contains(__scLinter.shortcodes.content, __scLinter.methods.removeSlash(shortcode.content))):
              case (']' === letter && spacePressed &&  _.contains(__scLinter.shortcodes.noContent, shortcode.content)):
                shortcode.attributes = __scLinter.methods.getAttributes(attributesString);
                shortcode.bracket2 = pos+1;
                __scLinter.shortcodes.inTextarea.push(shortcode);

                bracketOpen = false;
                spacePressed = false;
                attributesString = '';
                shortcode = {...shortcode, bracket1: undefined, bracket2: undefined, content: ''};
                break;
              case (spacePressed && bracketOpen):
                attributesString += letter;
                break;
              default:
                bracketOpen = false;
                shortcode = {...shortcode, bracket1: undefined, bracket2: undefined, content: ''};
                break;
            }
          });
        },

        getAttributes: (attributesString) => {
          //for parser (function above), just get the attributes from shortcodes in CM
          const attributes = [];
          let attribute = {isOpened: false, name:'', value: ''},
              quoteCount = 0;


          _.each(attributesString, (letter) => {
            switch(true){
              case (!_.contains(['=', ' '], letter)&& !attribute.isOpened):
                attribute.name += letter;
                break;
              case ('=' === letter):
                attribute.isOpened = true;
                break;
              case (attribute.isOpened):
                if('"' == letter || letter == "'") quoteCount++;
                if(quoteCount === 2) {
                  attributes.push({name: attribute.name, value: attribute.value });

                  attribute.isOpened = false;
                  attribute.value = '';
                  attribute.name = '';
                  quoteCount = 0;
                }else if('"' != letter && letter != "'"){
                  attribute.value += letter;
                }

                break;
            }
          });

          return attributes;
        },

        fillScArray: _ => {
          let lineNr = 0;
          __scLinter.shortcodes.inTextarea = [];

          __editor.instance.codemirror.doc.eachLine(function(line){
            if(__scLinter.shortcodes.regex.test(line.text)){
              __scLinter.methods.parseScFromLines(line, lineNr);
            }
            lineNr++;
          });

        },

        changeWatcher: () => {
          const highlighting =
            _.debounce(function(){
              __scLinter.methods.fillScArray();
              __scLinter.methods.toggleHighlight(false);
              __scLinter.methods.toggleHighlight(true);

              //for refreshing shortcodes -- properly removing highlights
              __scLinter.methods.toggleFocus(false);
            }, 150);

          __editor.instance.codemirror.on('change', highlighting);
        },

      }

    };

    /**
     * Shortcodes editor
     */

    let __scEditor = {
      shortcodeParentDOM : $('.mfn-sc-editor'),
      shortcode: {
        focusedBrackets1: {line:0, bracket1: 0, bracket2:0, content: '', attributes:[]},
        focusedBrackets2: {line:0, bracket1: 0, bracket2:0, content: '', attributes:[]}
      },

      methods:{

        tooltip:{

          toggle: () => {

            let shortcodeFocused = __scEditor.shortcode.focusedBrackets1,
              tooltip = $('.mfn-form-row.mfn-fr-show').find('.editor-content .mfn-tooltip-sc-editor').clone().get(0),
              tooltipCM = $('.CodeMirror .mfn-tooltip-sc-editor');

            if(!shortcodeFocused && tooltipCM || shortcodeFocused && tooltipCM){
              $('.CodeMirror .mfn-tooltip-sc-editor').remove();
            }

            if(!shortcodeFocused){
              return;
            }else{
              switch(true){
                case __scLinter.methods.checkIfHasContent(shortcodeFocused.content) && !__scEditor.shortcode.focusedBrackets2.content:
                  $(tooltip).html('No matching tags');
                  break;
                case _.contains(['sharebox'], shortcodeFocused.content):
                  //Shortcodes which does not have params
                  return;
                default:
                  break;
              }

              __editor.instance.codemirror.addWidget({line: shortcodeFocused.line, ch: shortcodeFocused.bracket1}, tooltip);
              tooltipCM = $('.CodeMirror .mfn-tooltip-sc-editor');
              $(tooltipCM).fadeIn();

              __scEditor.methods.tooltip.turnEventsOn(tooltipCM);
            }

          },

          turnEventsOn: (tooltipCM) => {

            $(tooltipCM).find('a').click(function(e){

              let tooltipEvent = $(e.currentTarget).attr('data-type');

              switch (tooltipEvent){
                case 'edit':
                  //We need the name without "/" and uppercased first letter (fields.php && textarea.php)

                  let clickedSc = __scEditor.shortcode.focusedBrackets1.content,
                      scName = clickedSc[0] !== "/"
                        ? clickedSc.charAt(0)+ clickedSc.slice(1)
                        : clickedSc.charAt(1) + clickedSc.slice(2),
                      dropdownShortcode = $('.mfn-form-row .dropdown-megamenu').find(`[data-type="${scName}"]`);

                  $(dropdownShortcode).trigger('click');

                  let shortcodeDOM = $(__scEditor.shortcodeParentDOM).find(`.mfn-isc-builder-${scName}`);
                  __scEditor.methods.modal.prepareToEdit(shortcodeDOM);
                  break;
                case 'remove':
                  let {first, second} = __scEditor.methods.getFromToPos();
                  __editor.methods.removeText(
                    {lineFrom: first.line, lineTo: second.line},
                    {chFrom: first.bracket1, chTo: second.bracket2}
                  );
                  break;
              }

            });

          },

          acceptButtonWatcher: (modal) => {

            const acceptButton = $(modal).closest('.mfn-modal:not(.mfn-lipsum)').find('.btn-modal-close');

            const acceptButtonFooter = $(modal).closest('.mfn-modal:not(.mfn-lipsum)').find('.modalbox-footer .btn-modal-close');

            acceptButtonFooter.html('Update');

            $(acceptButton).one('click', function(e){
                try{
                  //get name, attrs of actual shortcode
                  let {first, second} = __scEditor.methods.getFromToPos();
                  const shortcodeName = $(__scEditor.shortcodeParentDOM).find('[data-shortcode]').attr('data-shortcode');
                  const shortcodeAttributes = $(__scEditor.shortcodeParentDOM).find('input[data-name], select[data-name], textarea[data-name]');

                  //for security reasons, prevent making [undefined]
                  if(!shortcodeName) return;

                  //replace old shortcode
                  __editor.instance.codemirror.doc.replaceRange(
                    __scEditor.methods.modal.createShortcode(shortcodeName, shortcodeAttributes),
                    {line: first.line, ch: first.bracket1},
                    {line: second.line, ch: second.bracket2}
                  )

                  //reverse html change
                  acceptButtonFooter.html('Add shortcode');

                  //$('.mfn-modal.show').removeClass('show');

                  var it = $('.mfn-form-row.content.mfn-fr-show').data('element');
                  var val = __editor.instance.codemirror.getValue();
                  re_render_content(val, it);

                  //important! it prevents further event bubbling.
                  return false;
                }catch(e){
                  //
                }
            });
          }

        },

        modal: {

          prepareToEdit: (modal) => {

            let modalInputs = $(modal).find(`select, input, textarea`),
                shortcodeAttr = _.isEmpty(__scEditor.shortcode.focusedBrackets1.attributes)
                  ? __scEditor.shortcode.focusedBrackets2.attributes
                  : __scEditor.shortcode.focusedBrackets1.attributes;

            //for each attribute, you have to set the existing value
            _.each(shortcodeAttr, (attr) => {

              let modalAttr = $(modalInputs).closest(`[data-name="${attr.name}"]`)[0];

              //not existing attrs, must be avoided
              if(!modalAttr) {
                $(modalAttr).val('').trigger('change');
                return;
              }

              switch(true){
                case 'checkbox' === modalAttr.type:
                  const liParent = $(modalAttr).closest('.segmented-options'),
                        newActiveLi = liParent.find(`[value="${attr.value}"]`);

                  //remove default li and attach the one from shortcode
                  liParent.find('.active').removeClass();
                  newActiveLi.prop('checked', 'checked');
                  newActiveLi.closest('li').addClass('active');
                  break;

                case _.contains(['type', 'icon'], $(modalAttr).attr('data-name')):
                  const parent = $(modalAttr).closest('.browse-icon');
                        parent.find('i').removeClass().addClass(attr.value);

                  $(modalAttr).val(attr.value).trigger('change');
                  break;

                case _.contains(['font_color', 'color', 'background'], $(modalAttr).attr('data-name')):
                  $(modalAttr).closest('.color-picker-group').find('input.has-colorpicker').val(attr.value); //alpha, not visible input
                  $(modalAttr).closest('.color-picker-group').find('input[data-name]').val(attr.value); // just in case fill the visible input too
                  $(modalAttr).closest('.color-picker-group').find('.color-picker-open span').css('background-color', attr.value); //for not-alpha colors
                  break;

                case _.contains(['image', 'link_image', 'src'], $(modalAttr).attr('data-name')):
                  const parentLocation = $(modalAttr).closest('.browse-image');
                  parentLocation.removeClass('empty');
                  parentLocation.find('.selected-image').html(`<img src="${attr.value}" alt="" />`);
                  parentLocation.find('.mfn-form-input').val(attr.value);
                  break;

                default:
                  if(attr.value){
                    $(modalAttr).val(attr.value);
                    $(modalAttr).attr('value', attr.value);
                  }else{
                    //
                  }

                  break;

              }

            });

            //if shortcode has content
            if( $(modalInputs).closest('textarea') ){
              let {first, second} = __scEditor.methods.getFromToPos();

              let content = __editor.methods.getText(
                {lineFrom: first.line, lineTo: second.line},
                {chFrom: first.bracket2, chTo: second.bracket1}
              );

              $(modalInputs).closest('textarea').val(content);
            }

            $(document).trigger('mfn:vb:edit', $(modal).closest('.mfn-modalbox'));

            __scEditor.methods.tooltip.acceptButtonWatcher(modal);

          },

          createShortcode: (shortcodeName, shortcodeAttributes) => {
            //create ready HTML shortcode structure
            let scPrepareCode,
            scParam,
            textareaContent;

            scPrepareCode = `[${shortcodeName}`;
            $(shortcodeAttributes).each(function(){
              scParam = $(this)[0];

              if( (!_.contains(['textarea', 'checkbox'], $(scParam).prop('type')) && $(scParam).val() || $(scParam).prop('checked') && $(scParam).val()) && $(scParam).val() !== 0 && $(scParam).val() !== '0' ){
                //name has the lbracket and rbracket, remove them
                scPrepareCode += ` ${ $(scParam).attr('data-name') }="${ $(scParam).val() }"`;
              }else if($(scParam).prop('type') == 'textarea'){
                //Even if the textarea field is empty, assign value for it to close the tag
                textareaContent = $(scParam).val() ? $(scParam).val() : '\t' ;
              }
            });

            scPrepareCode += ']';

            if(textareaContent){
              scPrepareCode += `${textareaContent}[/${shortcodeName}]`;
            }

            //update after saving!
            __scLinter.methods.fillScArray();
            __scLinter.methods.toggleHighlight(true);

            return scPrepareCode;
          },

        },

        focus: {
        //highlight focused(cursor above) shortcode
          brackets1: _ => {
            __scEditor.methods.getTriggeredShortcode();
            __scLinter.methods.toggleFocus(false);
            __scEditor.shortcode.focusedBrackets2 = {line:0, bracket1: 0, bracket2:0, content: '', attributes:[]};

            if(!__scEditor.shortcode.focusedBrackets1) return;

            __scLinter.methods.toggleFocus(__scEditor.shortcode.focusedBrackets1);
            __scEditor.methods.focus.brackets2(__scEditor.shortcode.focusedBrackets1);
          },

          brackets2: (shortcode) => {
            //if sc has the content, then find his ending (second bracket)
            let similarScFound = 0;

            if(_.contains(__scLinter.shortcodes.content, shortcode.content)){
              let similarSc = _.filter(__scLinter.shortcodes.inTextarea, ({content}) => `/${shortcode.content}` === content || shortcode.content === content),
                  focusedScPos = _.indexOf(similarSc, shortcode) + 1,
                  nextShortcodes = _.last(similarSc, similarSc.length - focusedScPos);

              _.find(nextShortcodes, function(nextShortcode){
                if(shortcode.content === nextShortcode.content) similarScFound++;
                if('/' === nextShortcode.content[0] && similarScFound === 0) return __scEditor.shortcode.focusedBrackets2 = nextShortcode;
                if('/' === nextShortcode.content[0] ) similarScFound--;
              });

              __scLinter.methods.toggleFocus(__scEditor.shortcode.focusedBrackets2);
            }else if(shortcode.content[0] === '/'){
              let scName = __scLinter.methods.removeSlash(shortcode.content),
                  similarSc = _.filter(__scLinter.shortcodes.inTextarea, ({content}) => content === `/${scName}` || content === scName),
                  focusedScPos = _.indexOf(similarSc, shortcode),
                  nextShortcodes = _.first(similarSc, focusedScPos);

              _.find(nextShortcodes.reverse(), function(nextShortcode){
                if('/' === nextShortcode.content[0]) similarScFound++;
                if(scName === nextShortcode.content && similarScFound === 0) return __scEditor.shortcode.focusedBrackets2 = nextShortcode;
                if(scName === nextShortcode.content) similarScFound--;
              });

              __scLinter.methods.toggleFocus(__scEditor.shortcode.focusedBrackets2);
            }
          }

        },

        getFromToPos: _ => {
          /**
           * set proper position of shortcodes (to know, where it started and ended)
           * (if you need to remove something using cm, then you have to start from earlier position 0 -> 9 not 9 -> 0)
          */
          var first  = __scEditor.shortcode.focusedBrackets1,
              second = __scEditor.shortcode.focusedBrackets2;

          if(!second.content){
            second = first;
          }else
          if(second.line < first.line || (second.line === first.line && second.bracket1 < first.bracket1) || (second.line === first.line &&  second.bracket2 < first.bracket2) ){
            second = __scEditor.shortcode.focusedBrackets1;
            first  = __scEditor.shortcode.focusedBrackets2;
          }

          return {first, second};
        },

        getTriggeredShortcode: () => {
          //get info about focused shortcode
          const cursorPos = {
            x: __editor.instance.codemirror.doc.getCursor().ch,
            line: __editor.instance.codemirror.doc.getCursor().line
          };

          let shortcode = _.findIndex(__scLinter.shortcodes.inTextarea, function(index){
            if(index.bracket1 <= cursorPos.x && index.bracket2 >= cursorPos.x && index.line === cursorPos.line){
              return index;
            }
          });

          __scEditor.shortcode.focusedBrackets1 = __scLinter.shortcodes.inTextarea[shortcode];

          return __scLinter.shortcodes.inTextarea[shortcode];
        },

        moveWatcher: () => {
          const focusing =
            _.debounce(function(){
              __scEditor.methods.focus.brackets1();
              __scEditor.methods.tooltip.toggle();
            }, 150);

          __editor.instance.codemirror.on('cursorActivity', focusing);
        }

      }

    };

    /**
     * Lipsum generator | Lorem ipsum ...
     */

    let __lipsum = {

      loremWords: ["a", "ac", "accumsan", "ad", "adipiscing", "aenean", "aenean", "aliquam", "aliquam", "aliquet", "amet", "ante", "aptent", "arcu",
      "at", "auctor", "augue", "bibendum", "blandit", "class", "commodo", "condimentum", "congue", "consectetur", "consequat", "conubia", "convallis",
      "cras", "cubilia", "curabitur", "curabitur", "curae", "cursus", "dapibus", "diam", "dictum", "dictumst", "dolor", "donec", "donec", "dui", "duis",
      "egestas", "eget", "eleifend", "elementum", "elit", "enim", "erat", "eros", "est", "et", "etiam", "etiam", "eu", "euismod", "facilisis", "fames", "faucibus",
      "felis", "fermentum", "feugiat", "fringilla", "fusce", "gravida", "habitant", "habitasse", "hac", "hendrerit", "himenaeos", "iaculis", "id", "imperdiet", "in",
      "inceptos", "integer", "interdum", "ipsum", "justo", "lacinia", "lacus", "laoreet", "lectus", "leo", "libero", "ligula", "litora", "lobortis", "lorem", "luctus",
      "maecenas", "magna", "malesuada", "massa", "mattis", "mauris", "metus", "mi", "molestie", "mollis", "morbi", "nam", "nec", "neque", "netus", "nibh", "nisi", "nisl",
      "non", "nostra", "nulla", "nullam", "nunc", "odio", "orci", "ornare", "pellentesque", "per", "pharetra", "phasellus", "placerat", "platea", "porta", "porttitor",
      "posuere", "potenti", "praesent", "pretium", "primis", "proin", "pulvinar", "purus", "quam", "quis", "quisque", "quisque", "rhoncus", "risus", "rutrum", "sagittis",
      "sapien", "scelerisque", "sed", "sem", "semper", "senectus", "sit", "sociosqu", "sodales", "sollicitudin", "suscipit", "suspendisse", "taciti", "tellus", "tempor",
      "tempus", "tincidunt", "torquent", "tortor", "tristique", "turpis", "ullamcorper", "ultrices", "ultricies", "urna", "ut", "ut", "varius", "vehicula", "vel", "velit",
      "venenatis", "vestibulum", "vitae", "vivamus", "viverra", "volutpat", "vulputate"],

      methods: {

        getRandomWord: _ => __lipsum.loremWords[Math.floor(Math.random() * ((__lipsum.loremWords.length-1) - 1 + 1) + 1)],

        getInputs: _ =>  $('.modal-add-shortcode .modalbox-content').find('input[data-name], select[data-name], textarea[data-name]'),

        getProperValuesFromInputs: () => {
          let values = {rows_amount:3, type: 'paragraphs', min_words_amount: 5, max_words_amount: 5};

          _.each(__lipsum.methods.getInputs(), function(input){
            if(input.type != 'checkbox' || $(input).prop('checked')){
              values[ $(input).attr('data-name') ] = $(input).val();
            }
          });

          return values;
        },

        rollWords: (min_words_amount, max_words_amount) => {
          let lorem = '';
          let rolledValue = _.random( parseInt(min_words_amount), parseInt(max_words_amount));
          let flag = 0;

          for(flag; rolledValue > flag; flag++){
            lorem += `${__lipsum.methods.getRandomWord()} `;
          }

          //big letter
          var firstLetter = lorem.charAt(0).toUpperCase();
          lorem = lorem.slice( 1 );
          lorem = firstLetter + lorem;

          //dot at end
          lorem = lorem.slice( 0, -1 );
          lorem += '.';

          return lorem;
        }

      },

      createLorem: (type, rows_amount, min_words_amount, max_words_amount) => {

        let loremCreated = '';

        if(!rows_amount || !min_words_amount || !max_words_amount || !type ){
          //missing parameter overwrite all of them.
          var {rows_amount, type, min_words_amount, max_words_amount} = __lipsum.methods.getProperValuesFromInputs();
        }


        let liAmount = rows_amount;
        switch (type){
          case 'paragraphs':
            while(liAmount > 0){
              loremCreated += '<p>'+__lipsum.methods.rollWords(min_words_amount, max_words_amount)+'</p>\n';
              liAmount--;
            }
            break;
          case 'lists':
            loremCreated += '<ul>';
            while(liAmount > 0){
              loremCreated += '\n\t<li>'+__lipsum.methods.rollWords(min_words_amount, max_words_amount)+'</li>';
              liAmount--;
            }
            loremCreated += '\n</ul>';
          break;
        }

        return loremCreated;

      }

    };


    /**
     * HTML table generator
     */

    let __table = {

      tabInfo: { xMax:0, yMax: 0, x: 0, y: 0 },
      domLocation: undefined,

      build: (xMax, yMax, attachCoords) => {

        let x, y;
        let tableContent = {};
        let buildedHTML = '';

        function Row(y){
          this.y = parseInt(y);
          this.type = (function(){return y === 1 ? 'thead' : 'tbody';})();
          this.children = [];
        }

        function Cell(x, y){
          this.x = parseInt(x);
          this.y = parseInt(y);
          this.type = (function(){return y === 1 ? 'th' : 'td';})();x
        }

        //prepare array of rows and cells
        for(y = 0; y < yMax; y++){
          tableContent[y+1] = new Row(y+1);
          for(x = 0; x < xMax; x++){
            tableContent[y+1].children.push(new Cell(x+1, y+1));
          }
        }

        _.each(tableContent, function(row){

          //open table rows and thead/tbody
          buildedHTML = row.y === 1 || row.y === 2 ? buildedHTML+'\n\t<'+row.type+'>\n\t\t<tr>' : buildedHTML+'\n\t\t<tr>';

          //content
          _.each(row.children, function(cell) {
            if(attachCoords){
              buildedHTML = row.y === 1 ? buildedHTML+'<th x='+cell.x+' y='+row.y+'>' : buildedHTML+'<td x='+cell.x+' y='+row.y+'>';
            }else{
              buildedHTML = row.y === 1 ? buildedHTML+'\n\t\t\t<th>' : buildedHTML+'\n\t\t\t<td>';
            }

            buildedHTML = row.y === 1 ? buildedHTML+'</th>' : buildedHTML+'</td>';
          });

          //close table rows and thead/tbody
          buildedHTML = row.y === 1 || row.y === yMax ? buildedHTML+'\n\t\t</tr>\n\t</'+row.type+'>' : buildedHTML+'\n\t\t</tr>';

        });

        return buildedHTML;
      },

      hover_highlight: (location) => {

        __table.domLocation = location.closest('.mfn-table-creator-btn').get(0);

        $(location).find('td, th').on('mouseover', function(){

          __table.tabInfo.xMax = parseInt($(this).attr('x'));
          __table.tabInfo.yMax = parseInt($(this).attr('y'));

          $(location).find('td, th').removeClass('mfn-table-hovered');

          //highlighting
          for( __table.tabInfo.y = __table.tabInfo.yMax; __table.tabInfo.y > 0; __table.tabInfo.y-- ){
            __table.tabInfo.yRow = $(location).children()[__table.tabInfo.y-1];

            for( __table.tabInfo.x = __table.tabInfo.xMax; __table.tabInfo.x > 0; __table.tabInfo.x-- ){
              var el = $(__table.tabInfo.yRow).children().closest('[x='+__table.tabInfo.x+"]").get(0);
              $(el).addClass('mfn-table-hovered');
            }
          }

        });

      },

      displayTooltip: (el, list) => {

        if ($(el).hasClass('focus')) {
          $(el).removeClass('focus');
          $(list).html('');
        } else {
          $(el).addClass('focus');
          $(list).html( __table.build(10, 10, true) );
          __table.hover_highlight( $(list).children() );
        }

      },

      toTextArea: _ => {

        __editor.methods.addCodeIntoTextArea( '<table>' + __table.build(__table.tabInfo.xMax, __table.tabInfo.yMax, false) + '\n</table>');

      }

    };

    /**
     * Colorpicker popup
     */

    let __cpTooltip = {

      domLocation: undefined,

      toggle: _ => {

        __cpTooltip.domLocation = $('.mfn-form-row.mfn-fr-show').find('.mfn-color-tooltip-picker');
        __cpTooltip.domLocation.toggleClass('focus');

        //open whole menu on start!
        setTimeout(function(){
          __cpTooltip.domLocation.find('.button.wp-color-result').trigger('click');
          __cpTooltip.domLocation.find('.mfn-form-input').attr('placeholder', '#000');
        }, 0);

        //attach event, to look for behavior
        if(__cpTooltip.domLocation.hasClass('focus')){

          $(document).bind('click', __cpTooltip.watchForOutsideClick);
          $content.find('body').bind('click', __cpTooltip.watchForOutsideClick);

          //to prevent changing line on editor click
          $('.mfn-form-row.mfn-fr-show .CodeMirror').addClass('preventClick');
        }
      },

      watchForOutsideClick: (e) => {

        let color = $(__cpTooltip.domLocation).find('input.mfn-form-input').val();

        if($(e.target).hasClass('mfn-icon-textcolor')){
          $('.mfn-form-row.mfn-fr-show .CodeMirror').removeClass('preventClick');
          return $('.panel-edit-item').unbind('click', __cpTooltip.watchForOutsideClick);
        }else if( $(e.target).hasClass('mfn-form-input') ){
          return;
        }else if(!color){
          return __cpTooltip.domLocation.removeClass('focus');
        }

        __editor.methods.wrapTextIntoShortcode(`<span style="color:${color}">`, `</span>`);
        __cpTooltip.domLocation.removeClass('focus');

        $('.mfn-form-row.mfn-fr-show .CodeMirror').removeClass('preventClick');
        $(document).unbind('click', __cpTooltip.watchForOutsideClick);
        $content.find('body').unbind('click', __cpTooltip.watchForOutsideClick);

        setTimeout(updateView, 100);

      }

    };

    /**
     * Shortcode Editor
     */

    var shortcodeEditor = {

      $popupPath: $('.modal-add-shortcode'),

      // .mfn-sc-editor is always __scEditor.shortcodeParentDOM (__scEditor.shortcodeParentDOM) -- field_textarea.js
      $placeToCopy: $('.mfn-sc-editor').find('.modalbox-content'),

      createShortcodeBuilder( buttonName, closestDomLocation ){

        if( 'share_box' == buttonName ){

          __editor.methods.addCodeIntoTextArea('[sharebox]');

        } else {

          if( 'lorem' == buttonName ){
            $(shortcodeEditor.$popupPath).find('.modalbox-title').html('Text generator');
            $(shortcodeEditor.$popupPath).find('.modalbox-footer .btn-modal-close').html('Generate');
          }else{
            $(shortcodeEditor.$popupPath).find('.modalbox-title').html('Shortcode');
            $(shortcodeEditor.$popupPath).find('.modalbox-footer .btn-modal-close').html('Add shortcode');
          }

          shortcodeEditor.modal.add(closestDomLocation);
        }

      },

      modal: {

        // shortcodeEditor.modal.add()

        add: function($el){
          shortcodeEditor.modal.clear();
          $el.clone(true).appendTo(shortcodeEditor.$placeToCopy);
          //modal.open(shortcodeEditor.$popupPath);
          $('body').addClass('mfn-modal-open');
          $('.modal-add-shortcode').addClass('show');

          $(document).trigger('mfn:vb:sc:edit');

        },

        // shortcodeEditor.modal.clear()

        clear: function(){
          $('.modal-add-shortcode').removeClass('mfn-lipsum');
          $(shortcodeEditor.$placeToCopy).empty();
        }

      },

      toTextEditor: function(){

        const shortcodeName = $(shortcodeEditor.$placeToCopy).find('div[data-shortcode]').attr('data-shortcode');
        const shortcodeAttributes = $(shortcodeEditor.$placeToCopy).find('input[data-name], select[data-name], textarea[data-name]');

        let readyCode = __scEditor.methods.modal.createShortcode(shortcodeName, shortcodeAttributes);
        __editor.methods.addCodeIntoTextArea(readyCode);

      }

    };





    /**
     * Textarea button functions
     * Recognize what to do
     */

    function mfn_textarea_actions ( actionName ){

      if( ! actionName ){
        return;
      }

      switch( true ){

        case (actionName === 'undo'):
          __editor.methods.undo();
          break;

        case (actionName === 'redo'):
          __editor.methods.redo();
          break;

        ///Tags which require single letter
        case ( _.contains(['bold', 'italic', 'underline', 'paragraph'], actionName) ):
          __editor.methods.wrapTextIntoShortcode(`<${actionName[0]}>`, `</${actionName[0]}>`);
          break;

        //Tags which require full names (or more than 1 letter to open)
        case (actionName[0] === 'h'):
        case (actionName === 'code'):
          __editor.methods.wrapTextIntoShortcode(`<${actionName}>`, `</${actionName}>`);
          break;

        //Unusual elements

        case (actionName === 'big'):
          __editor.methods.wrapTextIntoShortcode(`<p class="big">`, `</p>`);
          break;
        case (actionName === 'link'):
          __editor.methods.wrapTextIntoShortcode(`<a href="#">`, `</a>`);
          break;

        case (actionName === 'text color'):
          __cpTooltip.toggle();
          break;

        case (actionName === 'list ordered'):
          __editor.methods.addCodeIntoTextArea(`<ol>\n\t<li></li>\n\t<li></li>\n</ol>`);
          break;

        case (actionName === 'list unordered'):
          __editor.methods.addCodeIntoTextArea(`<ul>\n\t<li></li>\n\t<li></li>\n</ul>`);
          break;

        case (actionName === 'break'):
          __editor.methods.addCodeIntoTextArea(`<br/>`);
          break;

        case (actionName === 'divider'):
          __editor.methods.addCodeIntoTextArea(`[divider height="15"]`);
          break;

        case ( _.contains(['table', 'lorem'], actionName) ):
          break;

        case (actionName == 'media'):
          __editor.methods.addImage();
          break;

        default:
          console.error('CodeMirror textarea action not recognized');
      }
      __editor.instance.codemirror.focus();
      setTimeout(updateView, 10);

    }




    function create() {

        try {
          __editor.domLocation = $('.mfn-fr-show .mfn-form-textarea[data-editor]').get(0);
          cmOn();
        } catch (err){
          //
        }

    }

    function cmOn(){

      $('.panel-edit-item').off();
      $('.mfn-sc-editor').off();
      $('.CodeMirror-wrap').remove();

      wp.codeEditor.defaultSettings.codemirror.mode = 'text/html';

      __editor.instance = wp.codeEditor.initialize(__editor.domLocation, mfn_cm.html);

      __scLinter.methods.changeWatcher();
      __scEditor.methods.moveWatcher();

      // highlight shortcodes on launch

      __scLinter.methods.fillScArray();
      __scLinter.methods.toggleHighlight(true);

      __editor.instance.codemirror.setOption( 'lint', true );
      __editor.instance.codemirror.setOption( 'lineNumbers', false );
      __editor.instance.codemirror.setOption( 'autoRefresh', true );
      __editor.instance.codemirror.refresh();

      if($('.sidebar-wrapper .mfn-form-row.content.mfn-fr-show .preview-contentinput').siblings('.CodeMirror').length > 1){
          $('.sidebar-wrapper .mfn-form-row.content.mfn-fr-show .preview-contentinput').siblings('.CodeMirror').last().remove();
      }

      $('.panel-edit-item').on('click', '.mfn-fr-show .editor-header .mfn-option-btn', function(e){
          e.preventDefault();
          var buttonName = $(e.currentTarget).attr('data-type') ? $(e.currentTarget).attr('data-type') : false;
          __editor.methods.mfn_textarea_actions(buttonName);
      });

      $('.panel-edit-item').on('click', '.mfn-fr-show .editor-header .mfn-option-dropdown .mfn-dropdown-item', function(e){
        e.preventDefault();
        var buttonName = $(this).attr('data-type');
        var isItSCEditor = $(this).closest('.mfn-option-dropdown').hasClass('dropdown-megamenu');

        if(isItSCEditor){
          var closestDomLocation = $('.modal-add-shortcode .mfn-isc-builder').find('.mfn-isc-builder-'+buttonName+'');
          shortcodeEditor.createShortcodeBuilder(buttonName, closestDomLocation);
        }else{
          __editor.methods.mfn_textarea_actions(buttonName);
        }

      });

      $('.panel-edit-item').on('click', '.mfn-lorem-creator-btn', function(e) {

        var buttonName = $(e.currentTarget).attr('data-type') ? $(e.currentTarget).attr('data-type') : false;
        var closestDomLocation = $('.mfn-isc-builder').find('.mfn-isc-builder-'+buttonName+'');

        shortcodeEditor.createShortcodeBuilder(buttonName, closestDomLocation);
        $('.modal-add-shortcode').addClass('mfn-lipsum');

      });

      // table generator

      $('.panel-edit-item').on('click', '.mfn-table-creator-btn', function() {

        var el = $(this).get(0);
        var list = $(el).closest('.mfn-option-btn').find('.mfn-table-creator');

        __table.displayTooltip(el, list);

      });

      $('.panel-edit-item').on('click', '.mfn-table-creator td, .mfn-table-creator-btn th', function() {

        __table.toTextArea();
        updateView();

      });

      $('.mfn-sc-editor').on('click', '.btn-modal-close', function(e){

        if( $('.modal-add-shortcode').hasClass('mfn-lipsum') ){
          __editor.methods.addCodeIntoTextArea( __lipsum.createLorem() );
        }else{
          shortcodeEditor.toTextEditor();
        }
        setTimeout(updateView, 100);
        __editor.instance.codemirror.focus();

      });

      var blurWatcher;

      $(document).mousedown(function(e) {
          blurWatcher = $(e.target);
      });

      $(document).mouseup(function(e) {
          blurWatcher = null;
      });

      __editor.instance.codemirror.on('blur', function(cMirror) {
          var container = $('.mfn-form-row.content.mfn-fr-show');
          var it = $('.mfn-form-row.content.mfn-fr-show').data('element');
          if( !container.is(blurWatcher) && container.has(blurWatcher).length === 0 ){
            let val = cMirror.getValue();
            $('.sidebar-wrapper .mfn-form-row.content.mfn-fr-show .preview-contentinput').val(val);
            re_render_content(val, it);
          }
      });


      __editor.instance.codemirror.on('keyup',function(cMirror){
        $('.sidebar-wrapper .mfn-form-row.content.mfn-fr-show .editor-content .preview-contentinput').val( cMirror.getValue() );
        updateView();
      });

    }

    function re_render_content(val, it) {
      $('.sidebar-wrapper .mfn-form-row.content.mfn-fr-show .preview-contentinput').val(val);
        $.ajax({
            url: MfnVbApp.ajaxurl,
            data: {
                action: 'rendercontent',
                'mfn-builder-nonce': MfnVbApp.wpnonce,
                val: val
            },
            type: 'POST',
            success: function(response){
                updateView(response, it);
                setTimeout(function() {
                  MfnVbApp.addHistory();
                }, 100);
            }
        });
    }

    function updateView(val, it){

      val ? val = val : val = __editor.instance.codemirror.getValue();
      it ? it = it : it = $('.sidebar-wrapper .content.mfn-form-row.content.mfn-fr-show').data('element');

      if($content.find('.'+it).hasClass('column_blockquote')){
          // blockquote
          $content.find('.'+it+' blockquote').html(val);
      }else if($content.find('.'+it).hasClass('column_column')){
          // column
          $content.find('.'+it+' .column_attr').html(val);
      }

      MfnVbApp.enableBeforeUnload();

    }

    /**
     * Destroy Tiny MCE instance
     * Prepare data to save in WP friendly format
     */

    function destroy() {

        try {
          $(__editor.domLocation).removeClass('mfn-textarea-validator-active');
          cmOff();
        } catch (err) {
          //
        }

    }

    /**
     * CodeMirror create
     */

    function cmOff(){

      __editor.instance.codemirror.toTextArea();
      __editor.instance.codemirror.getTextArea();

      $('.panel-edit-item').off();
      $('.mfn-sc-editor').off();

      $('.CodeMirror-wrap').remove();
    }

    /**
     * Bind events
     */

    function bind() {

      // event fired after popup created, before show

      // $(document).on('mfn:builder:edit', function( $this, modal ) {
      //   create(modal);
      //   alert('ok');
      // });

      //$('.mfn-ui .mfn-form .form-group.html-editor').each(function() {
      $(document).on('mfn:vb:edit', function() {
        create();
      });

      //create($('.mfn-ui .mfn-form .form-group.html-editor'));

      //alert('ok2');

      // event fired after popup close, before destroy

      $(document).on('mfn:vb:close', function() {
        destroy();
      });

    }

    /**
     * Initialize default CodeMirror in Theme Options and Page Options
     */

    function initForCSSandJS(){

      var $group = $('.mfn-ui .form-group.html-editor');

      $( 'textarea[data-cm]', $group ).each( function( index ){

        var $codeEditor,
          $editor = $(this);

        var type = $editor.data('cm'),
          id = 'custom-' + type + '-' + index;

        $editor.attr( 'id', id );

        wp.codeEditor.defaultSettings.codemirror.mode = 'text/'+ type;

        $codeEditor = wp.codeEditor.initialize( id, mfn_cm[type] );
        $codeEditor.codemirror.setOption( 'lint', true );
        $codeEditor.codemirror.refresh();

        $codeEditor.codemirror.on('change', function(cm, change){
          $editor.val( cm.getValue() );
        });

      });

    }


    /**
     * Initialize
     */

    function init() {

      if( wp.codeEditor === undefined ){
        return true;
      }

      __editor = __editor;

      bind();

    }

    /**
     * Return
     * Method to start the closure
     */

    return {
      init: init,
      destroy: destroy,
      create: create,
    };

  })(jQuery);


  MfnFieldTextarea.init();
  /**
   * $(document).ready
   * Specify a function to execute when the DOM is fully loaded.
   */

//   $(function() {
//       MfnFieldTextarea.init();
//   });

// })(jQuery);
