const block = {

    // create some properties
    elements: [],
    y: false,

    init: function () {
        this.capture();
    },

    capture: function () {
        this.elements = document.querySelectorAll('.b-example');
        return this.elements;
    }

};

// finally boot the beast up
block.init();
