/**
 * Script for CTA Button Control
 */
const { __ } = wp.i18n;

const { Fragment } = wp.element;

const { addFilter } = wp.hooks;

const { PanelBody, TextControl } = wp.components;

/**
 * Control render in editor.
 */
addFilter("lzb.editor.control.Cta.render", "lzb.editor", (render, props) => {
  return (
    <div className="NAMESPACE-lzb-control_Cta">
      <TextControl
        label={props.data.label}
        help={props.data.help}
        value={props.getValue()}
        onChange={props.onChange}
      />
      <p>
        {__("Custom Control Attribute:", "TEXTDOMAIN")}{" "}
        {props.data.Cta_custom_attribute}
      </p>
    </div>
  );
});

/**
 * Control settings render in constructor.
 */
addFilter(
  "lzb.constructor.control.Cta.settings",
  "lzb.constructor",
  (render, props) => {
    const { updateData, data } = props;

    // console.log(props);

    return (
      <PanelBody>
        <TextControl
          label={__("Custom Attribute", "TEXTDOMAIN")}
          value={data.Cta_custom_attribute}
          onChange={(val) => {
            updateData({
              Cta_custom_attribute: val,
            });
          }}
        />
      </PanelBody>
    );
  }
);
