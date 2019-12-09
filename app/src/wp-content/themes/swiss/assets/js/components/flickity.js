import Flickity from 'flickity-imagesloaded';
// http://flickity.metafizzy.co/options.html


// an example using an object liternal notation to encapsulate into a nice package
const flkty = {

    // create some properties
    elements: document.querySelectorAll('.js-flickity'),
    postElements: document.querySelectorAll('.js-post-slider'),
    ideaElements: document.querySelectorAll('.js-ideas-slider'),
    placeElements: document.querySelectorAll('.js-places-slider'),


    init() {
        this.setup();
    },

    setup() {
        this.setupGeneral();
        this.setupPostSlider();
        this.setupIdeasSlider();
        this.setupPlacesSlider();
    },

    setupGeneral() {
        if (this.elements.length > 0) {
            let flky = new Flickity('.js-flickity', {
                pageDots: false,
                wrapAround: true,
                adaptiveHeight: true,
                imagesLoaded: true
            });
        }
    },

    setupPostSlider() {
        if (this.postElements.length > 0) {
            let flky = new Flickity('.js-post-slider', {
                pageDots: false,
                wrapAround: false,
                adaptiveHeight: true,
                imagesLoaded: true,
                cellAlign: 'left',
                groupCells: true
            });
        }
    },

    setupIdeasSlider() {
        if (this.ideaElements.length > 0) {
            var groupCells = 1;
            var cellSelector = ".c-card-slider__card";
            if ( matchMedia('screen and (min-width: 768px)').matches ) {
                var groupCells = true;
                var cellSelector = '';
            }
            let flky = new Flickity('.js-ideas-slider', {
                pageDots: false,
                wrapAround: false,
                adaptiveHeight: true,
                imagesLoaded: true,
                cellAlign: 'left',
                groupCells: groupCells,
                cellSelector: cellSelector
            });
        }
    },

    setupPlacesSlider() {
        if (this.placeElements.length > 0) {
            let flky = new Flickity('.js-places-slider', {
                pageDots: false,
                wrapAround: false,
                adaptiveHeight: true,
                imagesLoaded: true,
                cellAlign: 'left',
                groupCells: true
            });
        }
    }

};

// finally boot the beast up
flkty.init();
