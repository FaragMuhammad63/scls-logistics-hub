(function (blocks, element, i18n, blockEditor, components, serverSideRender) {
  var el = element.createElement;
  var registerBlockType = blocks.registerBlockType;
  var InspectorControls = blockEditor.InspectorControls;
  var PanelBody = components.PanelBody;
  var TextControl = components.TextControl;
  var TextareaControl = components.TextareaControl;
  var SelectControl = components.SelectControl;
  var ServerSideRender = serverSideRender;
  var __ = i18n.__;

  registerBlockType('originative/feature-card', {
    edit: function (props) {
      var attributes = props.attributes;
      var setAttributes = props.setAttributes;

      return [
        el(
          InspectorControls,
          { key: 'controls' },
          el(
            PanelBody,
            { title: __('Feature Card Settings', 'scls-logistics'), initialOpen: true },
            el(TextControl, {
              label: __('Title', 'scls-logistics'),
              value: attributes.title,
              onChange: function (value) {
                setAttributes({ title: value });
              }
            }),
            el(TextareaControl, {
              label: __('Description', 'scls-logistics'),
              value: attributes.body,
              onChange: function (value) {
                setAttributes({ body: value });
              }
            }),
            el(TextControl, {
              label: __('Icon name', 'scls-logistics'),
              value: attributes.iconName,
              onChange: function (value) {
                setAttributes({ iconName: value });
              }
            }),
            el(SelectControl, {
              label: __('Variant', 'scls-logistics'),
              value: attributes.variant,
              options: [
                { label: __('Light', 'scls-logistics'), value: 'light' },
                { label: __('Dark', 'scls-logistics'), value: 'dark' }
              ],
              onChange: function (value) {
                setAttributes({ variant: value });
              }
            })
          )
        ),
        el(ServerSideRender, {
          key: 'preview',
          block: 'originative/feature-card',
          attributes: attributes
        })
      ];
    },
    save: function () {
      return null;
    }
  });
})(window.wp.blocks, window.wp.element, window.wp.i18n, window.wp.blockEditor, window.wp.components, window.wp.serverSideRender);
