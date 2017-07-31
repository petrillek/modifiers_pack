/**
 * @file
 * Initializes modification based on provided configuration.
 */

(function (AbsoluteHeightModifier) {

  'use strict';

  AbsoluteHeightModifier.apply = function (selector, config) {

    var element = document.querySelector(selector);

    setHeight(element, config.media, config.height);

    window.addEventListener('resize', function () {
      setHeight(element, config.media, config.height);
    });

  };

  function setHeight(element, media, height) {

    if (window.matchMedia(media).matches) {
      element.style.height = (window.innerHeight * parseFloat(height) / 100) + 'px';
    }
    else {
      element.style.height = '';
    }

  }

})(window.AbsoluteHeightModifier = window.AbsoluteHeightModifier || {});