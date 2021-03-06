var H5P = H5P || {};

/**
 * Standard Page module
 * @external {jQuery} $ H5P.jQuery
 */
H5P.StandardPage = (function ($, EventDispatcher) {
  "use strict";

  // CSS Classes:
  var MAIN_CONTAINER = 'h5p-standard-page';

  /**
   * Initialize module.
   * @param {Object} params Behavior settings
   * @param {Number} id Content identification
   * @returns {Object} StandardPage StandardPage instance
   */
  function StandardPage(params, id) {
    EventDispatcher.call(this);

    this.$ = $(this);
    this.id = id;

    // Set default behavior.
    this.params = $.extend({}, {
      title: 'Title',
      elementList: [],
      helpTextLabel: 'Read more',
      helpText: 'Help text'
    }, params);
  }

  // Setting up inheritance
  StandardPage.prototype = Object.create(EventDispatcher.prototype);
  StandardPage.prototype.constructor = StandardPage;

  /**
   * Attach function called by H5P framework to insert H5P content into page.
   *
   * @param {jQuery} $container The container which will be appended to.
   */
  StandardPage.prototype.attach = function ($container) {
    var self = this;

    this.$inner = $('<div>', {
      'class': MAIN_CONTAINER
    }).appendTo($container);

    var standardPageTemplate =
      '<div class="page-header" role="heading" tabindex="-1">' +
      ' <div class="page-title">{{{title}}}</div>' +
      ' <button class="page-help-text">{{{helpTextLabel}}}</button>' +
      '</div>';

    /*global Mustache */
    self.$inner.append(Mustache.render(standardPageTemplate, self.params));

    self.$pageTitle = self.$inner.find('.page-header');
    self.$helpButton = self.$inner.find('.page-help-text');

    self.createHelpTextButton();

    this.pageInstances = [];

    this.params.elementList.forEach(function (element) {
      var $elementContainer = $('<div>', {
        'class': 'h5p-standard-page-element'
      }).appendTo(self.$inner);

      var elementInstance = H5P.newRunnable(element, self.id);

      elementInstance.on('loaded', function () {
        self.trigger('resize');
      });

      elementInstance.attach($elementContainer);

      self.pageInstances.push(elementInstance);
    });
  };

  /**
   * Create help text functionality for reading more about the task
   */
  StandardPage.prototype.createHelpTextButton = function () {
    var self = this;

    if (this.params.helpText !== undefined && this.params.helpText.length) {
      self.$helpButton.on('click', function () {
        self.trigger('open-help-dialog', {
          title: self.params.title,
          helpText: self.params.helpText
        });
      });
    }
    else {
      self.$helpButton.remove();
    }
  };

  /**
   * Retrieves input array.
   */
  StandardPage.prototype.getInputArray = function () {
    var inputArray = [];
    this.pageInstances.forEach(function (elementInstance) {
      if (elementInstance.libraryInfo.machineName === 'H5P.TextInputField') {
        inputArray.push(elementInstance.getInput());
      }
    });

    return inputArray;
  };

  /**
   * Returns True if all required inputs are filled.
   * @returns {boolean} True if all required inputs are filled.
   */
  StandardPage.prototype.requiredInputsIsFilled = function () {
    var requiredInputsIsFilled = true;
    this.pageInstances.forEach(function (elementInstance) {
      if (elementInstance.libraryInfo.machineName === 'H5P.TextInputField') {
        if (!elementInstance.isRequiredInputFilled()) {
          requiredInputsIsFilled = false;
        }
      }
    });

    return requiredInputsIsFilled;
  };

  /**
   * Sets focus on page
   */
  StandardPage.prototype.focus = function () {
    this.$pageTitle.focus();
  };

  /**
   * Get page title
   * @returns {String} page title
   */
  StandardPage.prototype.getTitle = function () {
    return this.params.title;
  };

  return StandardPage;
}(H5P.jQuery, H5P.EventDispatcher));
