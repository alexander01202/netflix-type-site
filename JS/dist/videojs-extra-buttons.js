/*! @name videojs-extra-buttons @version 0.1.5 @license MIT */
(function (global, factory) {
    typeof exports === 'object' && typeof module !== 'undefined' ? module.exports = factory(require('video.js')) :
    typeof define === 'function' && define.amd ? define(['video.js'], factory) :
    (global.videojsExtraButtons = factory(global.videojs));
  }(this, (function (videojs) { 'use strict';
  
    videojs = videojs && videojs.hasOwnProperty('default') ? videojs['default'] : videojs;
  
    function _inheritsLoose(subClass, superClass) {
      subClass.prototype = Object.create(superClass.prototype);
      subClass.prototype.constructor = subClass;
      subClass.__proto__ = superClass;
    }
  
    var version = "0.1.5";
  
    var defaults = {}; // Cross-compatibility for Video.js 5 and 6.
  
    var registerPlugin = videojs.registerPlugin || videojs.plugin; // const dom = videojs.dom || videojs;
  
    var AbstractButton = videojs.getComponent("Button");
    var AbstractMenuButton = videojs.getComponent("MenuButton");
    var AbstractMenuItem = videojs.getComponent("MenuItem");
  
    var QuickBackwardButton =
    /*#__PURE__*/
    function (_AbstractButton) {
      _inheritsLoose(QuickBackwardButton, _AbstractButton);
  
      function QuickBackwardButton(player, backwardSecond) {
        var _this;
  
        _this = _AbstractButton.call(this, player, {
          title: "快退",
          name: "QuickBackwardButton"
        }) || this;
        _this.player = player;
        _this.step = backwardSecond || 10;
        return _this;
      }
  
      var _proto = QuickBackwardButton.prototype;
  
      _proto.handleClick = function handleClick() {
        var currentTime = this.player.currentTime();
        var backTo = currentTime - this.step;
        this.player.currentTime(backTo > 0 ? backTo : 0);
      };
  
      return QuickBackwardButton;
    }(AbstractButton);
  
    var QuickForwardButton =
    /*#__PURE__*/
    function (_AbstractButton2) {
      _inheritsLoose(QuickForwardButton, _AbstractButton2);
  
      function QuickForwardButton(player, forwardSecond) {
        var _this2;
  
        _this2 = _AbstractButton2.call(this, player, {
          title: "快进",
          name: "QuickForwardButton"
        }) || this;
        _this2.player = player;
        _this2.step = forwardSecond || 10;
        return _this2;
      }
  
      var _proto2 = QuickForwardButton.prototype;
  
      _proto2.handleClick = function handleClick() {
        var currentTime = this.player.currentTime();
        var duration = this.player.duration();
        var goTo = currentTime + this.step;
        this.player.currentTime(goTo < duration ? goTo : duration);
      };
  
      return QuickForwardButton;
    }(AbstractButton);
  
    var QualityMenuItem =
    /*#__PURE__*/
    function (_AbstractMenuItem) {
      _inheritsLoose(QualityMenuItem, _AbstractMenuItem);
  
      function QualityMenuItem(player, menuButton, label, selected, lv) {
        var _this3;
  
        _this3 = _AbstractMenuItem.call(this, player, {
          label: label,
          selectable: true,
          selected: selected
        }) || this;
        _this3.player = player;
        _this3.menuButton = menuButton;
        _this3.label = label;
        _this3.qualitiId = lv.id;
        _this3.bitrate = lv.bitrate;
        return _this3;
      }
  
      var _proto3 = QualityMenuItem.prototype;
  
      _proto3.handleClick = function handleClick() {
        var player = this.player;
        this.menuButton.unselectAll();
        this.selected(true);
        this.menuButton.$(".vjs-icon-placeholder").innerText = this.label;
        var lvs = player.qualityLevels().levels_ || [];
  
        for (var _iterator = lvs, _isArray = Array.isArray(_iterator), _i = 0, _iterator = _isArray ? _iterator : _iterator[Symbol.iterator]();;) {
          var _ref2;
  
          if (_isArray) {
            if (_i >= _iterator.length) break;
            _ref2 = _iterator[_i++];
          } else {
            _i = _iterator.next();
            if (_i.done) break;
            _ref2 = _i.value;
          }
  
          var lv = _ref2;
          lv.enabled = lv.id === this.qualitiId || this.qualitiId === "AUTO";
        }
  
        this.menuButton.unpressButton();
      };
  
      return QualityMenuItem;
    }(AbstractMenuItem);
    /**
     * createItems() method will be called in super phase, so it is imposible to set the sources after super().
     * and you cannot use `this` before super(), so I have no other sulution and have to use a wrapper function.
     * what a fxxk design!
     * @param {*} player 
     * @param {*} qualitySelect
     */
  
  
    function QualitySelectMenuButtonWrapper(player, qualitySelect) {
      var QualitySelectMenuButton =
      /*#__PURE__*/
      function (_AbstractMenuButton) {
        _inheritsLoose(QualitySelectMenuButton, _AbstractMenuButton);
  
        function QualitySelectMenuButton() {
          return _AbstractMenuButton.call(this, player, {
            title: "",
            name: "QualitySelectMenuButton"
          }) || this;
        }
  
        var _proto4 = QualitySelectMenuButton.prototype;
  
        _proto4.unselectAll = function unselectAll() {};
  
        _proto4.createItems = function createItems() {
          return [];
        };
  
        return QualitySelectMenuButton;
      }(AbstractMenuButton);
  
      var btn = new QualitySelectMenuButton();
      var label = "AUTO";
      btn.$(".vjs-icon-placeholder").innerText = label;
      var autoSrcAbsolutePath = getAbsoluteUrl(player.currentSrc()).href;
      player.qualityLevels().on('addqualitylevel', function () {
        var lvs = player.qualityLevels().levels_ || [];
        if (lvs.length <= 1) return;
        var _items = [];
  
        _items.push(new QualityMenuItem(player, btn, label, true, {
          id: "AUTO"
        }));
  
        for (var _iterator2 = lvs, _isArray2 = Array.isArray(_iterator2), _i2 = 0, _iterator2 = _isArray2 ? _iterator2 : _iterator2[Symbol.iterator]();;) {
          var _ref3;
  
          if (_isArray2) {
            if (_i2 >= _iterator2.length) break;
            _ref3 = _iterator2[_i2++];
          } else {
            _i2 = _iterator2.next();
            if (_i2.done) break;
            _ref3 = _i2.value;
          }
  
          var lv = _ref3;
          var url = getAbsoluteUrl(lv.id, autoSrcAbsolutePath);
          var name$$1 = url.searchParams.get("__name");
  
          if (Array.isArray(qualitySelect) && qualitySelect.length > 0) {
            qualitySelect.sort(function (a, b) {
              if (!a.bandwidth && b.bandwidth) return -1;
              if (a.bandwidth && !b.bandwidth) return 1;
              if (!a.bandwidth && !b.bandwidth) return -1;
              return a.bandwidth - b.bandwidth;
            });
  
            for (var _iterator3 = qualitySelect, _isArray3 = Array.isArray(_iterator3), _i4 = 0, _iterator3 = _isArray3 ? _iterator3 : _iterator3[Symbol.iterator]();;) {
              var _ref4;
  
              if (_isArray3) {
                if (_i4 >= _iterator3.length) break;
                _ref4 = _iterator3[_i4++];
              } else {
                _i4 = _iterator3.next();
                if (_i4.done) break;
                _ref4 = _i4.value;
              }
  
              var q = _ref4;
  
              if (lv.bitrate && q.bandwidth && lv.bitrate <= q.bandwidth) {
                name$$1 = q.name;
                break;
              }
            }
  
            if (!name$$1) {
              name$$1 = qualitySelect[qualitySelect.length - 1].name;
            }
          }
  
          if (!name$$1) {
            if (lv.height) name$$1 = lv.height + "P";else if (lv.bitrate) {
              var kb = lv.bitrate / 1024;
              if (kb < 1) name$$1 = lv.bitrate + "bit";else {
                var mb = kb / 1024;
                if (mb > 1) name$$1 = Math.round(mb) + "Mb";else name$$1 = Math.round(kb) + "Kb";
              }
            } else name$$1 = url.pathname.substring(url.pathname.lastIndexOf("/") + 1);
          }
  
          name$$1 = decodeURIComponent(name$$1);
  
          _items.push(new QualityMenuItem(player, btn, name$$1, false, lv));
        }
  
        _items.sort(function (a, b) {
          if (!a.bitrate && !b.bitrate) return 1;
          if (a.bitrate && !b.bitrate) return 1;
          if (!a.bitrate && b.bitrate) return -1;
          return b.bitrate - a.bitrate;
        });
  
        btn.createItems = function () {
          return _items;
        };
  
        btn.unselectAll = function () {
          for (var _i3 = 0; _i3 < _items.length; _i3++) {
            var item = _items[_i3];
            if (item) item.selected(false);
          }
        };
  
        btn.update();
      });
      return btn;
    }
  
    function getAbsoluteUrl(url, _ref) {
      var ref = _ref;
      if (!ref) ref = window.location.origin + window.location.pathname;
      return new URL(url, ref);
    }
  
    var PlaybackRateMenuItem =
    /*#__PURE__*/
    function (_AbstractMenuItem2) {
      _inheritsLoose(PlaybackRateMenuItem, _AbstractMenuItem2);
  
      function PlaybackRateMenuItem(player, menuButton, rate) {
        var _this4;
  
        var label = rate + "X";
        var selected = player.playbackRate() == rate;
        _this4 = _AbstractMenuItem2.call(this, player, {
          label: label,
          selectable: true,
          selected: selected
        }) || this;
        _this4.player = player;
        _this4.menuButton = menuButton;
        _this4.rate = rate;
        _this4.label = label;
        return _this4;
      }
  
      var _proto5 = PlaybackRateMenuItem.prototype;
  
      _proto5.handleClick = function handleClick() {
        this.menuButton.unselectAll();
        this.selected(true);
        this.menuButton.$(".vjs-icon-placeholder").innerText = this.label;
        this.player.playbackRate(this.rate);
      };
  
      return PlaybackRateMenuItem;
    }(AbstractMenuItem);
  
    function PlaybackRateSelectMenuButtonWrapper(player, playbackRates) {
      var menuItems = [];
  
      var PlaybackRateSelectMenuButton =
      /*#__PURE__*/
      function (_AbstractMenuButton2) {
        _inheritsLoose(PlaybackRateSelectMenuButton, _AbstractMenuButton2);
  
        function PlaybackRateSelectMenuButton() {
          return _AbstractMenuButton2.call(this, player, {
            title: "",
            name: "PlaybackRateSelectMenuButton"
          }) || this;
        }
  
        var _proto6 = PlaybackRateSelectMenuButton.prototype;
  
        _proto6.unselectAll = function unselectAll() {
          for (var _i5 = 0; _i5 < menuItems.length; _i5++) {
            var item = menuItems[_i5];
            item.selected(false);
          }
        };
  
        _proto6.createItems = function createItems() {
          if (menuItems.length) menuItems.splice(0, menuItems.length);
  
          for (var _iterator4 = playbackRates, _isArray4 = Array.isArray(_iterator4), _i6 = 0, _iterator4 = _isArray4 ? _iterator4 : _iterator4[Symbol.iterator]();;) {
            var _ref5;
  
            if (_isArray4) {
              if (_i6 >= _iterator4.length) break;
              _ref5 = _iterator4[_i6++];
            } else {
              _i6 = _iterator4.next();
              if (_i6.done) break;
              _ref5 = _i6.value;
            }
  
            var rate = _ref5;
            menuItems.push(new PlaybackRateMenuItem(player, this, rate));
          }
  
          return menuItems;
        };
  
        return PlaybackRateSelectMenuButton;
      }(AbstractMenuButton);
  
      var btn = new PlaybackRateSelectMenuButton();
      btn.$(".vjs-icon-placeholder").innerText = player.playbackRate() + "X";
      return btn;
    }
  
    var ExtraButtonsPlugin =
    /*#__PURE__*/
    function () {
      function ExtraButtonsPlugin(player, options) {
        this.player = player;
        this.opts = {};
        this.opts.qualitySelect = options.qualitySelect;
        this.opts.playbackRateSelect = options.playbackRateSelect || [];
        this.opts.quickBackward = options.quickBackward || false;
        this.opts.quickForward = options.quickForward || false;
        this.createQuickBackwardButton_();
        this.createQuickForwardButton_();
        this.createQualitySelectButton_();
        this.createPlaybackRateSelectButton_();
        this.onSrcChange_();
      }
  
      var _proto7 = ExtraButtonsPlugin.prototype;
  
      _proto7.setOption = function setOption(type, opt) {
        this.opts[type] = opt;
  
        switch (type) {
          case "qualitySelect":
            this.createQualitySelectButton_();
            break;
  
          case "playbackRateSelect":
            this.createPlaybackRateSelectButton_();
            break;
  
          case "quickBackward":
            this.createQuickBackwardButton_();
            break;
  
          case "quickForward":
            this.createQuickForwardButton_();
            break;
  
          default:
            console.error("do not support option [" + type + "]");
        }
      };
  
      _proto7.onSrcChange_ = function onSrcChange_() {
        var self = this;
        this.player.on("loadstart", function (e) {
          self.createQualitySelectButton_();
        });
      };
  
      _proto7.createQuickBackwardButton_ = function createQuickBackwardButton_() {
        var player = this.player;
  
        if (this.quickBackwardButton) {
          this.quickBackwardButton.dispose();
          player.controlBar.removeChild(this.quickBackwardButton);
          this.quickBackwardButton = null;
        }
  
        if (!this.opts.quickBackward) return;
        this.quickBackwardButton = new QuickBackwardButton(player, this.opts.quickBackward.seconds);
        var playBtn = player.controlBar.getChild("PlayToggle");
        var idx = player.controlBar.children().indexOf(playBtn);
        var backwardBtn = player.controlBar.addChild(this.quickBackwardButton, {
          "componentClass": "QuickBackwardButton"
        }, idx);
        backwardBtn.removeClass("vjs-hidden");
        backwardBtn.addClass("vjs-quick-backward");
      };
  
      _proto7.createQuickForwardButton_ = function createQuickForwardButton_() {
        var player = this.player;
  
        if (this.quickForwardButton) {
          this.quickForwardButton.dispose();
          player.controlBar.removeChild(this.quickForwardButton);
          this.quickForwardButton = null;
        }
  
        if (!this.opts.quickForward) return;
        this.quickForwardButton = new QuickForwardButton(player, this.opts.quickForward.seconds);
        var playBtn = player.controlBar.getChild("PlayToggle");
        var idx = player.controlBar.children().indexOf(playBtn) + 1;
        var forwardBtn = player.controlBar.addChild(this.quickForwardButton, {
          "componentClass": "QuickForwardButton"
        }, idx);
        forwardBtn.removeClass("vjs-hidden");
        forwardBtn.addClass("vjs-quick-forward");
      };
  
      _proto7.createQualitySelectButton_ = function createQualitySelectButton_() {
        var player = this.player;
  
        if (this.qualitySelectButton) {
          this.qualitySelectButton.dispose();
          player.controlBar.removeChild(this.qualitySelectButton);
          this.qualitySelectButton = null;
        }
  
        if (!this.opts || !this.opts.qualitySelect) return;
        if (!player.qualityLevels || !player.tech({
          IWillNotUseThisInPlugins: true
        }).hls) return;
        this.qualitySelectButton = QualitySelectMenuButtonWrapper(player, this.opts.qualitySelect);
        if (!this.qualitySelectButton) return;
        var fullScreenBtn = player.controlBar.getChild("FullscreenToggle");
        var idx = player.controlBar.children().indexOf(fullScreenBtn);
        if (idx == -1) idx = player.controlBar.children().length;
        var qualitySelectButton = player.controlBar.addChild(this.qualitySelectButton, {
          "componentClass": "QualitySelectMenuButton"
        }, idx);
        qualitySelectButton.removeClass("vjs-hidden");
        qualitySelectButton.addClass("vjs-quality-select");
      };
  
      _proto7.createPlaybackRateSelectButton_ = function createPlaybackRateSelectButton_() {
        var player = this.player;
  
        if (this.playbackRateSelectButton) {
          this.playbackRateSelectButton.dispose();
          player.controlBar.removeChild(this.playbackRateSelectButton);
          this.playbackRateSelectButton = null;
        }
  
        if (!this.opts.playbackRateSelect || this.opts.playbackRateSelect.length == 0) return;
        this.playbackRateSelectButton = PlaybackRateSelectMenuButtonWrapper(player, this.opts.playbackRateSelect);
        var fullScreenBtn = player.controlBar.getChild("FullscreenToggle");
        var idx = player.controlBar.children().indexOf(fullScreenBtn);
        if (idx == -1) idx = player.controlBar.children().length;
        var playbackRateSelectButton = player.controlBar.addChild(this.playbackRateSelectButton, {
          "componentClass": "PlaybackRateSelectButton"
        }, idx);
        playbackRateSelectButton.removeClass("vjs-hidden");
        playbackRateSelectButton.addClass("vjs-quality-select");
      };
  
      return ExtraButtonsPlugin;
    }();
    /**
     * Function to invoke when the player is ready.
     *
     * This is a great place for your plugin to initialize itself. When this
     * function is called, the player will have its DOM and child components
     * in place.
     *
     * @function onPlayerReady
     * @param    {Player} player
     *           A Video.js player object.
     *
     * @param    {Object} [options={}]
     *           A plain object containing options for the plugin.
     */
  
  
    var onPlayerReady = function onPlayerReady(player, options) {
      player.addClass('vjs-extra-buttons');
      player.extraButtons = new ExtraButtonsPlugin(player, options);
    };
    /**
     * A video.js plugin.
     *
     * In the plugin function, the value of `this` is a video.js `Player`
     * instance. You cannot rely on the player being in a "ready" state here,
     * depending on how the plugin is invoked. This may or may not be important
     * to you; if not, remove the wait for "ready"!
     *
     * @function extraButtons
     * @param    {Object} [options={}]
     *           An object of options left to the plugin author to define.
     */
  
  
    var extraButtons = function extraButtons(options) {
      var _this5 = this;
  
      this.ready(function () {
        onPlayerReady(_this5, videojs.mergeOptions(defaults, options));
      });
    }; // Register the plugin with video.js.
  
  
    registerPlugin('extraButtons', extraButtons); // Include the version number.
  
    extraButtons.VERSION = version;
  
    return extraButtons;
  
  })));
  