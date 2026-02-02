(function (blocks, element, i18n, blockEditor, components, serverSideRender) {
  var el = element.createElement;
  var registerBlockType = blocks.registerBlockType;
  var InspectorControls = blockEditor.InspectorControls;
  var PanelBody = components.PanelBody;
  var TextControl = components.TextControl;
  var SelectControl = components.SelectControl;
  var ServerSideRender = serverSideRender;
  var __ = i18n.__;

  registerBlockType('originative/badge-pill', {
    edit: function (props) {
      var attributes = props.attributes;
      var setAttributes = props.setAttributes;

      return [
        el(
          InspectorControls,
          { key: 'controls' },
          el(
            PanelBody,
            { title: __('Badge/Pill Settings', 'scls-logistics'), initialOpen: true },
            el(TextControl, {
              label: __('Text', 'scls-logistics'),
              value: attributes.text,
              onChange: function (value) {
                setAttributes({ text: value });
              }
            }),
            el(TextControl, {
              label: __('Icon name (optional)', 'scls-logistics'),
              value: attributes.iconName,
              onChange: function (value) {
                setAttributes({ iconName: value });
              },
              help: __('Use SCLS icon names like "zap", "shield", "phone".', 'scls-logistics')
            }),
            el(SelectControl, {
              label: __('Variant', 'scls-logistics'),
              value: attributes.variant,
              options: [
                { label: __('Accent Soft', 'scls-logistics'), value: 'accent-soft' },
                { label: __('Accent Strong', 'scls-logistics'), value: 'accent-strong' },
                { label: __('Secondary', 'scls-logistics'), value: 'secondary' },
                { label: __('Glass', 'scls-logistics'), value: 'glass' }
              ],
              onChange: function (value) {
                setAttributes({ variant: value });
              }
            }),
            el(SelectControl, {
              label: __('Size', 'scls-logistics'),
              value: attributes.size,
              options: [
                { label: __('Small', 'scls-logistics'), value: 'sm' },
                { label: __('Medium', 'scls-logistics'), value: 'md' },
                { label: __('Large', 'scls-logistics'), value: 'lg' }
              ],
              onChange: function (value) {
                setAttributes({ size: value });
              }
            })
          )
        ),
        el(ServerSideRender, {
          key: 'preview',
          block: 'originative/badge-pill',
          attributes: attributes
        })
      ];
    },
    save: function () {
      return null;
    }
  });
})(window.wp.blocks, window.wp.element, window.wp.i18n, window.wp.blockEditor, window.wp.components, window.wp.serverSideRender);
