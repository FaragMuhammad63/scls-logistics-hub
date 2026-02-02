(function (blocks, element, i18n, blockEditor, components, serverSideRender) {
  var el = element.createElement;
  var registerBlockType = blocks.registerBlockType;
  var InspectorControls = blockEditor.InspectorControls;
  var PanelBody = components.PanelBody;
  var TextControl = components.TextControl;
  var TextareaControl = components.TextareaControl;
  var ServerSideRender = serverSideRender;
  var __ = i18n.__;

  registerBlockType('originative/service-card-detailed', {
    edit: function (props) {
      var attributes = props.attributes;
      var setAttributes = props.setAttributes;
      var tagsText = Array.isArray(attributes.tags) ? attributes.tags.join(', ') : '';

      return [
        el(
          InspectorControls,
          { key: 'controls' },
          el(
            PanelBody,
            { title: __('Service Card Settings', 'scls-logistics'), initialOpen: true },
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
              label: __('URL', 'scls-logistics'),
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
            el(TextControl, {
              label: __('Link label', 'scls-logistics'),
              value: attributes.linkLabel,
              onChange: function (value) {
                setAttributes({ linkLabel: value });
              }
            }),
            el(TextControl, {
              label: __('Tags (comma separated)', 'scls-logistics'),
              value: tagsText,
              onChange: function (value) {
                var tags = value.split(',').map(function (item) {
                  return item.trim();
                }).filter(function (item) {
                  return item.length > 0;
                });
                setAttributes({ tags: tags });
              }
            })
          )
        ),
        el(ServerSideRender, {
          key: 'preview',
          block: 'originative/service-card-detailed',
          attributes: attributes
        })
      ];
    },
    save: function () {
      return null;
    }
  });
})(window.wp.blocks, window.wp.element, window.wp.i18n, window.wp.blockEditor, window.wp.components, window.wp.serverSideRender);
