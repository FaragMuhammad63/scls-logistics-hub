(function (blocks, element, i18n, blockEditor, components, serverSideRender) {
  var el = element.createElement;
  var registerBlockType = blocks.registerBlockType;
  var InspectorControls = blockEditor.InspectorControls;
  var PanelBody = components.PanelBody;
  var TextControl = components.TextControl;
  var ServerSideRender = serverSideRender;
  var __ = i18n.__;

  registerBlockType('originative/kpi-counter-card', {
    edit: function (props) {
      var attributes = props.attributes;
      var setAttributes = props.setAttributes;

      return [
        el(
          InspectorControls,
          { key: 'controls' },
          el(
            PanelBody,
            { title: __('KPI Card Settings', 'scls-logistics'), initialOpen: true },
            el(TextControl, {
              label: __('Icon name', 'scls-logistics'),
              value: attributes.iconName,
              onChange: function (value) {
                setAttributes({ iconName: value });
              }
            }),
            el(TextControl, {
              label: __('Value', 'scls-logistics'),
              value: attributes.value,
              onChange: function (value) {
                var parsed = parseInt(value, 10);
                setAttributes({ value: isNaN(parsed) ? 0 : parsed });
              }
            }),
            el(TextControl, {
              label: __('Suffix', 'scls-logistics'),
              value: attributes.suffix,
              onChange: function (value) {
                setAttributes({ suffix: value });
              }
            }),
            el(TextControl, {
              label: __('Label', 'scls-logistics'),
              value: attributes.label,
              onChange: function (value) {
                setAttributes({ label: value });
              }
            })
          )
        ),
        el(ServerSideRender, {
          key: 'preview',
          block: 'originative/kpi-counter-card',
          attributes: attributes
        })
      ];
    },
    save: function () {
      return null;
    }
  });
})(window.wp.blocks, window.wp.element, window.wp.i18n, window.wp.blockEditor, window.wp.components, window.wp.serverSideRender);
