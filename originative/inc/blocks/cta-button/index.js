(function (blocks, element, i18n, blockEditor, components, serverSideRender) {
  var el = element.createElement;
  var registerBlockType = blocks.registerBlockType;
  var InspectorControls = blockEditor.InspectorControls;
  var PanelBody = components.PanelBody;
  var TextControl = components.TextControl;
  var SelectControl = components.SelectControl;
  var ToggleControl = components.ToggleControl;
  var ServerSideRender = serverSideRender;
  var __ = i18n.__;

  registerBlockType('originative/cta-button', {
    edit: function (props) {
      var attributes = props.attributes;
      var setAttributes = props.setAttributes;

      return [
        el(
          InspectorControls,
          { key: 'controls' },
          el(
            PanelBody,
            { title: __('Button Settings', 'scls-logistics'), initialOpen: true },
            el(TextControl, {
              label: __('Text', 'scls-logistics'),
              value: attributes.text,
              onChange: function (value) {
                setAttributes({ text: value });
              }
            }),
            el(TextControl, {
              label: __('URL', 'scls-logistics'),
              value: attributes.url,
              onChange: function (value) {
                setAttributes({ url: value });
              }
            }),
            el(ToggleControl, {
              label: __('Open in new tab', 'scls-logistics'),
              checked: attributes.openInNewTab,
              onChange: function (value) {
                setAttributes({ openInNewTab: value });
              }
            }),
            el(SelectControl, {
              label: __('Variant', 'scls-logistics'),
              value: attributes.variant,
              options: [
                { label: __('Default', 'scls-logistics'), value: 'default' },
                { label: __('Accent', 'scls-logistics'), value: 'accent' }
              ],
              onChange: function (value) {
                setAttributes({ variant: value });
              }
            }),
            el(SelectControl, {
              label: __('Size', 'scls-logistics'),
              value: attributes.size,
              options: [
                { label: __('Default', 'scls-logistics'), value: 'default' },
                { label: __('Large', 'scls-logistics'), value: 'lg' },
                { label: __('Large + Text', 'scls-logistics'), value: 'lg-text' }
              ],
              onChange: function (value) {
                setAttributes({ size: value });
              }
            }),
            el(TextControl, {
              label: __('Icon name (optional)', 'scls-logistics'),
              value: attributes.iconName,
              onChange: function (value) {
                setAttributes({ iconName: value });
              }
            }),
            el(SelectControl, {
              label: __('Icon position', 'scls-logistics'),
              value: attributes.iconPosition,
              options: [
                { label: __('Right', 'scls-logistics'), value: 'right' },
                { label: __('Left', 'scls-logistics'), value: 'left' }
              ],
              onChange: function (value) {
                setAttributes({ iconPosition: value });
              }
            })
          )
        ),
        el(ServerSideRender, {
          key: 'preview',
          block: 'originative/cta-button',
          attributes: attributes
        })
      ];
    },
    save: function () {
      return null;
    }
  });
})(window.wp.blocks, window.wp.element, window.wp.i18n, window.wp.blockEditor, window.wp.components, window.wp.serverSideRender);
