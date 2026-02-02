(function (blocks, element, i18n, blockEditor, components, serverSideRender) {
  var el = element.createElement;
  var registerBlockType = blocks.registerBlockType;
  var InspectorControls = blockEditor.InspectorControls;
  var PanelBody = components.PanelBody;
  var TextControl = components.TextControl;
  var ToggleControl = components.ToggleControl;
  var ServerSideRender = serverSideRender;
  var __ = i18n.__;

  registerBlockType('originative/contact-method-card', {
    edit: function (props) {
      var attributes = props.attributes;
      var setAttributes = props.setAttributes;

      return [
        el(
          InspectorControls,
          { key: 'controls' },
          el(
            PanelBody,
            { title: __('Contact Card Settings', 'scls-logistics'), initialOpen: true },
            el(TextControl, {
              label: __('Label', 'scls-logistics'),
              value: attributes.label,
              onChange: function (value) {
                setAttributes({ label: value });
              }
            }),
            el(TextControl, {
              label: __('Value', 'scls-logistics'),
              value: attributes.value,
              onChange: function (value) {
                setAttributes({ value: value });
              }
            }),
            el(TextControl, {
              label: __('URL (optional)', 'scls-logistics'),
              value: attributes.url,
              onChange: function (value) {
                setAttributes({ url: value });
              }
            }),
            el(TextControl, {
              label: __('Icon name', 'scls-logistics'),
              value: attributes.iconName,
              onChange: function (value) {
                setAttributes({ iconName: value });
              }
            }),
            el(ToggleControl, {
              label: __('Open link in new tab', 'scls-logistics'),
              checked: attributes.openInNew,
              onChange: function (value) {
                setAttributes({ openInNew: value });
              }
            })
          )
        ),
        el(ServerSideRender, {
          key: 'preview',
          block: 'originative/contact-method-card',
          attributes: attributes
        })
      ];
    },
    save: function () {
      return null;
    }
  });
})(window.wp.blocks, window.wp.element, window.wp.i18n, window.wp.blockEditor, window.wp.components, window.wp.serverSideRender);
