(function (blocks, element, i18n, blockEditor, components, serverSideRender, data) {
  var el = element.createElement;
  var registerBlockType = blocks.registerBlockType;
  var InspectorControls = blockEditor.InspectorControls;
  var PanelBody = components.PanelBody;
  var SelectControl = components.SelectControl;
  var RangeControl = components.RangeControl;
  var ToggleControl = components.ToggleControl;
  var TextControl = components.TextControl;
  var Button = components.Button;
  var MediaUpload = blockEditor.MediaUpload;
  var MediaUploadCheck = blockEditor.MediaUploadCheck;
  var ColorPalette = blockEditor.ColorPalette;
  var ServerSideRender = serverSideRender;
  var __ = i18n.__;
  var select = data && data.select ? data.select : null;

  function getPaletteColors() {
    if (!select) {
      return [];
    }

    var settings = select('core/block-editor').getSettings();
    if (settings && settings.colors) {
      return settings.colors;
    }

    return [];
  }

  registerBlockType('originative/hero-background', {
    edit: function (props) {
      var attributes = props.attributes;
      var setAttributes = props.setAttributes;
      var colors = getPaletteColors();

      function onSelectImage(media) {
        if (!media || !media.url) {
          setAttributes({ imageId: 0, imageUrl: '', imageAlt: '' });
          return;
        }

        setAttributes({
          imageId: media.id || 0,
          imageUrl: media.url,
          imageAlt: media.alt || ''
        });
      }

      return [
        el(
          InspectorControls,
          { key: 'controls' },
          el(
            PanelBody,
            { title: __('Hero Background Settings', 'scls-logistics'), initialOpen: true },
            el(SelectControl, {
              label: __('Mode', 'scls-logistics'),
              value: attributes.mode,
              options: [
                { label: __('Color / Gradient', 'scls-logistics'), value: 'color' },
                { label: __('Background Image', 'scls-logistics'), value: 'image' }
              ],
              onChange: function (value) {
                setAttributes({ mode: value });
              }
            }),
            attributes.mode === 'image' &&
              el(
                MediaUploadCheck,
                null,
                el(MediaUpload, {
                  onSelect: onSelectImage,
                  allowedTypes: ['image'],
                  value: attributes.imageId,
                  render: function (obj) {
                    return el(
                      Button,
                      { onClick: obj.open, isSecondary: true },
                      attributes.imageUrl
                        ? __('Replace image', 'scls-logistics')
                        : __('Select image', 'scls-logistics')
                    );
                  }
                })
              ),
            attributes.mode === 'image' &&
              attributes.imageUrl &&
              el(
                Button,
                {
                  isLink: true,
                  isDestructive: true,
                  onClick: function () {
                    setAttributes({ imageId: 0, imageUrl: '', imageAlt: '' });
                  }
                },
                __('Remove image', 'scls-logistics')
              ),
            attributes.mode === 'image' &&
              el(TextControl, {
                label: __('Image alt text', 'scls-logistics'),
                value: attributes.imageAlt,
                onChange: function (value) {
                  setAttributes({ imageAlt: value });
                }
              }),
            attributes.mode === 'image' &&
              el(RangeControl, {
                label: __('Overlay opacity (%)', 'scls-logistics'),
                value: attributes.overlayOpacity,
                min: 0,
                max: 80,
                onChange: function (value) {
                  setAttributes({ overlayOpacity: value });
                }
              }),
            attributes.mode === 'image' &&
              el(
                'div',
                { className: 'originative-hero-bg-color' },
                el(
                  'p',
                  { className: 'components-base-control__label' },
                  __('Overlay color', 'scls-logistics')
                ),
                el(ColorPalette, {
                  colors: colors,
                  value: attributes.overlayColor,
                  onChange: function (value) {
                    setAttributes({ overlayColor: value });
                  }
                })
              ),
            el(RangeControl, {
              label: __('Pattern opacity (%)', 'scls-logistics'),
              value: attributes.patternOpacity,
              min: 0,
              max: 100,
              onChange: function (value) {
                setAttributes({ patternOpacity: value });
              }
            }),
            el(ToggleControl, {
              label: __('Show blur blobs', 'scls-logistics'),
              checked: attributes.showBlobs,
              onChange: function (value) {
                setAttributes({ showBlobs: value });
              }
            })
          )
        ),
        el(ServerSideRender, {
          key: 'preview',
          block: 'originative/hero-background',
          attributes: attributes
        })
      ];
    },
    save: function () {
      return null;
    }
  });
})(window.wp.blocks, window.wp.element, window.wp.i18n, window.wp.blockEditor, window.wp.components, window.wp.serverSideRender, window.wp.data);
