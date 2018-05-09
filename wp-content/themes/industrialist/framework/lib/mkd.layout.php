<?php

/*
   Interface: iIndustrialistMikadoLayoutNode
   A interface that implements Layout Node methods
*/

interface iIndustrialistMikadoLayoutNode
{
    public function hasChidren();

    public function getChild($key);

    public function addChild($key, $value);
}

/*
   Interface: iIndustrialistMikadoRender
   A interface that implements Render methods
*/

interface iIndustrialistMikadoRender
{
    public function render($factory);
}

/*
   Class: IndustrialistMikadoPanel
   A class that initializes Mikado Panel
*/

class IndustrialistMikadoPanel implements iIndustrialistMikadoLayoutNode, iIndustrialistMikadoRender
{

    public $children;
    public $title;
    public $name;
    public $hidden_property;
    public $hidden_value;
    public $hidden_values;

    function __construct($title = "", $name = "", $hidden_property = "", $hidden_value = "", $hidden_values = array()) {
        $this->children = array();
        $this->title = $title;
        $this->name = $name;
        $this->hidden_property = $hidden_property;
        $this->hidden_value = $hidden_value;
        $this->hidden_values = $hidden_values;
    }

    public function hasChidren() {
        return (count($this->children) > 0) ? true : false;
    }

    public function getChild($key) {
        return $this->children[$key];
    }

    public function addChild($key, $value) {
        $this->children[$key] = $value;
    }

    public function render($factory) {
        $hidden = false;
        if (!empty($this->hidden_property)) {
            if (industrialist_mikado_option_get_value($this->hidden_property) == $this->hidden_value)
                $hidden = true;
            else {
                foreach ($this->hidden_values as $value) {
                    if (industrialist_mikado_option_get_value($this->hidden_property) == $value)
                        $hidden = true;

                }
            }
        }
        ?>
        <div class="mkd-page-form-section-holder" id="mkd_<?php echo esc_attr($this->name); ?>"<?php if ($hidden) { ?> style="display: none"<?php } ?>>
            <h3 class="mkd-page-section-title"><?php echo esc_html($this->title); ?></h3>
            <?php
            foreach ($this->children as $child) {
                $this->renderChild($child, $factory);
            }
            ?>
        </div>
        <?php
    }

    public function renderChild(iIndustrialistMikadoRender $child, $factory) {
        $child->render($factory);
    }
}

/*
   Class: IndustrialistMikadoContainer
   A class that initializes Mikado Container
*/

class IndustrialistMikadoContainer implements iIndustrialistMikadoLayoutNode, iIndustrialistMikadoRender
{

    public $children;
    public $name;
    public $hidden_property;
    public $hidden_value;
    public $hidden_values;

    function __construct($name = "", $hidden_property = "", $hidden_value = "", $hidden_values = array()) {
        $this->children = array();
        $this->name = $name;
        $this->hidden_property = $hidden_property;
        $this->hidden_value = $hidden_value;
        $this->hidden_values = $hidden_values;
    }

    public function hasChidren() {
        return (count($this->children) > 0) ? true : false;
    }

    public function getChild($key) {
        return $this->children[$key];
    }

    public function addChild($key, $value) {
        $this->children[$key] = $value;
    }

    public function render($factory) {
        $hidden = false;
        if (!empty($this->hidden_property)) {
            if (industrialist_mikado_option_get_value($this->hidden_property) == $this->hidden_value)
                $hidden = true;
            else {
                foreach ($this->hidden_values as $value) {
                    if (industrialist_mikado_option_get_value($this->hidden_property) == $value)
                        $hidden = true;

                }
            }
        }
        ?>
        <div class="mkd-page-form-container-holder" id="mkd_<?php echo esc_attr($this->name); ?>"<?php if ($hidden) { ?> style="display: none"<?php } ?>>
            <?php
            foreach ($this->children as $child) {
                $this->renderChild($child, $factory);
            }
            ?>
        </div>
        <?php
    }

    public function renderChild(iIndustrialistMikadoRender $child, $factory) {
        $child->render($factory);
    }
}


/*
   Class: IndustrialistMikadoContainerNoStyle
   A class that initializes Mikado Container without css classes
*/

class IndustrialistMikadoContainerNoStyle implements iIndustrialistMikadoLayoutNode, iIndustrialistMikadoRender
{

    public $children;
    public $name;
    public $hidden_property;
    public $hidden_value;
    public $hidden_values;

    function __construct($name = "", $hidden_property = "", $hidden_value = "", $hidden_values = array()) {
        $this->children = array();
        $this->name = $name;
        $this->hidden_property = $hidden_property;
        $this->hidden_value = $hidden_value;
        $this->hidden_values = $hidden_values;
    }

    public function hasChidren() {
        return (count($this->children) > 0) ? true : false;
    }

    public function getChild($key) {
        return $this->children[$key];
    }

    public function addChild($key, $value) {
        $this->children[$key] = $value;
    }

    public function render($factory) {
        $hidden = false;
        if (!empty($this->hidden_property)) {
            if (industrialist_mikado_option_get_value($this->hidden_property) == $this->hidden_value)
                $hidden = true;
            else {
                foreach ($this->hidden_values as $value) {
                    if (industrialist_mikado_option_get_value($this->hidden_property) == $value)
                        $hidden = true;

                }
            }
        }
        ?>
        <div id="mkd_<?php echo esc_attr($this->name); ?>"<?php if ($hidden) { ?> style="display: none"<?php } ?>>
            <?php
            foreach ($this->children as $child) {
                $this->renderChild($child, $factory);
            }
            ?>
        </div>
        <?php
    }

    public function renderChild(iIndustrialistMikadoRender $child, $factory) {
        $child->render($factory);
    }
}

/*
   Class: IndustrialistMikadoGroup
   A class that initializes Mikado Group
*/

class IndustrialistMikadoGroup implements iIndustrialistMikadoLayoutNode, iIndustrialistMikadoRender
{

    public $children;
    public $title;
    public $description;

    function __construct($title = "", $description = "") {
        $this->children = array();
        $this->title = $title;
        $this->description = $description;
    }

    public function hasChidren() {
        return (count($this->children) > 0) ? true : false;
    }

    public function getChild($key) {
        return $this->children[$key];
    }

    public function addChild($key, $value) {
        $this->children[$key] = $value;
    }

    public function render($factory) {
        ?>

        <div class="mkd-page-form-section">


            <div class="mkd-field-desc">
                <h4><?php echo esc_html($this->title); ?></h4>

                <p><?php echo esc_html($this->description); ?></p>
            </div>
            <!-- close div.mkd-field-desc -->

            <div class="mkd-section-content">
                <div class="container-fluid">
                    <?php
                    foreach ($this->children as $child) {
                        $this->renderChild($child, $factory);
                    }
                    ?>
                </div>
            </div>
            <!-- close div.mkd-section-content -->

        </div>
        <?php
    }

    public function renderChild(iIndustrialistMikadoRender $child, $factory) {
        $child->render($factory);
    }
}

/*
   Class: IndustrialistMikadoNotice
   A class that initializes Mikado Notice
*/

class IndustrialistMikadoNotice implements iIndustrialistMikadoRender
{

    public $children;
    public $title;
    public $description;
    public $notice;
    public $hidden_property;
    public $hidden_value;
    public $hidden_values;

    function __construct($title = "", $description = "", $notice = "", $hidden_property = "", $hidden_value = "", $hidden_values = array()) {
        $this->children = array();
        $this->title = $title;
        $this->description = $description;
        $this->notice = $notice;
        $this->hidden_property = $hidden_property;
        $this->hidden_value = $hidden_value;
        $this->hidden_values = $hidden_values;
    }

    public function render($factory) {
        $hidden = false;
        if (!empty($this->hidden_property)) {
            if (industrialist_mikado_option_get_value($this->hidden_property) == $this->hidden_value)
                $hidden = true;
            else {
                foreach ($this->hidden_values as $value) {
                    if (industrialist_mikado_option_get_value($this->hidden_property) == $value)
                        $hidden = true;

                }
            }
        }
        ?>

        <div class="mkd-page-form-section"<?php if ($hidden) { ?> style="display: none"<?php } ?>>


            <div class="mkd-field-desc">
                <h4><?php echo esc_html($this->title); ?></h4>

                <p><?php echo esc_html($this->description); ?></p>
            </div>
            <!-- close div.mkd-field-desc -->

            <div class="mkd-section-content">
                <div class="container-fluid">
                    <div class="alert alert-warning">
                        <?php echo esc_html($this->notice); ?>
                    </div>
                </div>
            </div>
            <!-- close div.mkd-section-content -->

        </div>
        <?php
    }
}

/*
   Class: IndustrialistMikadoRow
   A class that initializes Mikado Row
*/

class IndustrialistMikadoRow implements iIndustrialistMikadoLayoutNode, iIndustrialistMikadoRender
{

    public $children;
    public $next;

    function __construct($next = false) {
        $this->children = array();
        $this->next = $next;
    }

    public function hasChidren() {
        return (count($this->children) > 0) ? true : false;
    }

    public function getChild($key) {
        return $this->children[$key];
    }

    public function addChild($key, $value) {
        $this->children[$key] = $value;
    }

    public function render($factory) {
        ?>
        <div class="row<?php if ($this->next) echo " next-row"; ?>">
            <?php
            foreach ($this->children as $child) {
                $this->renderChild($child, $factory);
            }
            ?>
        </div>
        <?php
    }

    public function renderChild(iIndustrialistMikadoRender $child, $factory) {
        $child->render($factory);
    }
}

/*
   Class: IndustrialistMikadoTitle
   A class that initializes Mikado Title
*/

class IndustrialistMikadoTitle implements iIndustrialistMikadoRender
{
    private $name;
    private $title;
    public $hidden_property;
    public $hidden_values = array();

    function __construct($name = "", $title = "", $hidden_property = "", $hidden_value = "") {
        $this->title = $title;
        $this->name = $name;
        $this->hidden_property = $hidden_property;
        $this->hidden_value = $hidden_value;
    }

    public function render($factory) {
        $hidden = false;
        if (!empty($this->hidden_property)) {
            if (industrialist_mikado_option_get_value($this->hidden_property) == $this->hidden_value)
                $hidden = true;
        }
        ?>
        <h5 class="mkd-page-section-subtitle" id="mkd_<?php echo esc_attr($this->name); ?>"<?php if ($hidden) { ?> style="display: none"<?php } ?>><?php echo esc_html($this->title); ?></h5>
        <?php
    }
}

/*
   Class: IndustrialistMikadoField
   A class that initializes Mikado Field
*/

class IndustrialistMikadoField implements iIndustrialistMikadoRender
{
    private $type;
    private $name;
    private $default_value;
    private $label;
    private $description;
    private $options = array();
    private $args = array();
    public $hidden_property;
    public $hidden_values = array();


    function __construct($type, $name, $default_value = "", $label = "", $description = "", $options = array(), $args = array(), $hidden_property = "", $hidden_values = array()) {
        global $industrialist_Framework;
        $this->type = $type;
        $this->name = $name;
        $this->default_value = $default_value;
        $this->label = $label;
        $this->description = $description;
        $this->options = $options;
        $this->args = $args;
        $this->hidden_property = $hidden_property;
        $this->hidden_values = $hidden_values;
        $industrialist_Framework->mkdOptions->addOption($this->name, $this->default_value, $type);
    }

    public function render($factory) {
        $hidden = false;
        if (!empty($this->hidden_property)) {
            foreach ($this->hidden_values as $value) {
                if (industrialist_mikado_option_get_value($this->hidden_property) == $value)
                    $hidden = true;

            }
        }
        $factory->render($this->type, $this->name, $this->label, $this->description, $this->options, $this->args, $hidden);
    }
}

/*
   Class: IndustrialistMikadoMetaField
   A class that initializes Mikado Meta Field
*/

class IndustrialistMikadoMetaField implements iIndustrialistMikadoRender
{
    private $type;
    private $name;
    private $default_value;
    private $label;
    private $description;
    private $options = array();
    private $args = array();
    public $hidden_property;
    public $hidden_values = array();


    function __construct($type, $name, $default_value = "", $label = "", $description = "", $options = array(), $args = array(), $hidden_property = "", $hidden_values = array()) {
        global $industrialist_Framework;
        $this->type = $type;
        $this->name = $name;
        $this->default_value = $default_value;
        $this->label = $label;
        $this->description = $description;
        $this->options = $options;
        $this->args = $args;
        $this->hidden_property = $hidden_property;
        $this->hidden_values = $hidden_values;
        $industrialist_Framework->mkdMetaBoxes->addOption($this->name, $this->default_value);
    }

    public function render($factory) {
        $hidden = false;
        if (!empty($this->hidden_property)) {
            foreach ($this->hidden_values as $value) {
                if (industrialist_mikado_option_get_value($this->hidden_property) == $value)
                    $hidden = true;

            }
        }
        $factory->render($this->type, $this->name, $this->label, $this->description, $this->options, $this->args, $hidden);
    }
}

abstract class IndustrialistMikadoFieldType
{

    abstract public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false);

}

class IndustrialistMikadoFieldText extends IndustrialistMikadoFieldType
{

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false, $repeat = array()) {
        $col_width = 12;
        if (isset($args["col_width"])) {
            $col_width = $args["col_width"];
        }

        $suffix = !empty($args['suffix']) ? $args['suffix'] : false;

        $class = '';

        if (!empty($repeat)) {
            $id = $name . '-' . $repeat['index'];
            $name .= '[]';
            $value = $repeat['value'];
            $class = 'mkd-repeater-field';
        } else {
            $id = $name;
            $value = industrialist_mikado_option_get_value($name);
        }

        ?>

        <div class="mkd-page-form-section <?php echo esc_attr($class); ?>" id="mkd_<?php echo esc_attr($id); ?>"<?php if ($hidden) { ?> style="display: none"<?php } ?>>


            <div class="mkd-field-desc">
                <h4><?php echo esc_html($label); ?></h4>

                <p><?php echo esc_html($description); ?></p>
            </div>
            <!-- close div.mkd-field-desc -->

            <div class="mkd-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-<?php echo esc_attr($col_width); ?>">
                            <?php if ($suffix) : ?>
                            <div class="input-group">
                                <?php endif; ?>
                                <input type="text"
                                    class="form-control mkd-input mkd-form-element"
                                    name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(htmlspecialchars($value)); ?>"
                                    placeholder=""/>
                                <?php if ($suffix) : ?>
                                    <div class="input-group-addon"><?php echo esc_html($args['suffix']); ?></div>
                                <?php endif; ?>
                                <?php if ($suffix) : ?>
                            </div>
                        <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.mkd-section-content -->

        </div>
        <?php

    }

}

class IndustrialistMikadoFieldTextSimple extends IndustrialistMikadoFieldType
{

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false, $repeat = array()) {

        $suffix = !empty($args['suffix']) ? $args['suffix'] : false;
        $class = '';

        if (!empty($repeat)) {
            $id = str_replace(array('[', ']'), '', $name) . '-' . rand();
            $name .= '[]';
            $value = $repeat['value'];
            $class = 'mkd-repeater-field';
        } else {
            $id = $name;
            $value = industrialist_mikado_option_get_value($name);
        }

        ?>


        <div class="col-lg-3 <?php echo esc_attr($class); ?>" id="mkd_<?php echo esc_attr($id); ?>"<?php if ($hidden) { ?> style="display: none"<?php } ?>>
            <em class="mkd-field-description"><?php echo esc_html($label); ?></em>
            <?php if ($suffix) : ?>
            <div class="input-group">
                <?php endif; ?>
                <input type="text"
                    class="form-control mkd-input mkd-form-element"
                    name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(htmlspecialchars($value)); ?>"
                    placeholder=""/>
                <?php if ($suffix) : ?>
                    <div class="input-group-addon"><?php echo esc_html($args['suffix']); ?></div>
                <?php endif; ?>
                <?php if ($suffix) : ?>
            </div>
        <?php endif; ?>
        </div>
        <?php

    }

}

class IndustrialistMikadoFieldTextArea extends IndustrialistMikadoFieldType
{

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false, $repeat = array()) {
        $class = '';

        if (!empty($repeat)) {
            $name .= '[]';
            $value = $repeat['value'];
            $class = 'mkd-repeater-field';
        } else {
            $value = industrialist_mikado_option_get_value($name);
        }

        ?>

        <div class="mkd-page-form-section">


            <div class="mkd-field-desc">
                <h4><?php echo esc_html($label); ?></h4>

                <p><?php echo esc_html($description); ?></p>
            </div>
            <!-- close div.mkd-field-desc -->


            <div class="mkd-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 <?php echo esc_attr($class); ?>">
							<textarea class="form-control mkd-form-element"
                                name="<?php echo esc_attr($name); ?>"
                                rows="5"><?php echo esc_html(htmlspecialchars($value)); ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.mkd-section-content -->

        </div>
        <?php

    }

}

class IndustrialistMikadoFieldTextAreaHtml extends IndustrialistMikadoFieldType
{

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false, $repeat = array()) {
        $class = '';

        if (!empty($repeat)) {
            $name .= '[]';
            $value = $repeat['value'];
            $class = 'mkd-repeater-field';
        } else {
            $value = industrialist_mikado_option_get_value($name);
        }

        ?>

        <div class="mkd-page-form-section">


            <div class="mkd-field-desc">
                <h4><?php echo esc_html($label); ?></h4>

                <p><?php echo esc_html($description); ?></p>
            </div>
            <!-- close div.mkd-field-desc -->


            <div class="mkd-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 <?php echo esc_attr($class); ?>">
                            <?php wp_editor($value, esc_attr($name)); ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.mkd-section-content -->

        </div>
        <?php

    }

}

class IndustrialistMikadoFieldTextAreaSimple extends IndustrialistMikadoFieldType
{

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false, $repeat = array()) {
        $class = '';

        if (!empty($repeat)) {
            $name .= '[]';
            $value = $repeat['value'];
            $class = 'mkd-repeater-field';
        } else {
            $value = industrialist_mikado_option_get_value($name);
        }

        ?>

        <div class="col-lg-3 <?php echo esc_attr($class); ?>">
            <em class="mkd-field-description"><?php echo esc_html($label); ?></em>
			<textarea class="form-control mkd-form-element"
                name="<?php echo esc_attr($name); ?>"
                rows="5"><?php echo esc_html($value); ?></textarea>
        </div>
        <?php

    }

}

class IndustrialistMikadoFieldColor extends IndustrialistMikadoFieldType
{

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false, $repeat = array()) {
        $class = '';

        if (!empty($repeat)) {
            $id = $name . '-' . $repeat['index'];
            $name .= '[]';
            $value = $repeat['value'];
            $class = 'mkd-repeater-field';
        } else {
            $id = $name;
            $value = industrialist_mikado_option_get_value($name);
        }

        ?>

        <div class="mkd-page-form-section <?php echo esc_attr($class); ?>" id="mkd_<?php echo esc_attr($id); ?>">


            <div class="mkd-field-desc">
                <h4><?php echo esc_html($label); ?></h4>

                <p><?php echo esc_html($description); ?></p>
            </div>
            <!-- close div.mkd-field-desc -->

            <div class="mkd-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <input type="text" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr($value); ?>" class="my-color-field"/>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.mkd-section-content -->

        </div>
        <?php

    }

}

class IndustrialistMikadoFieldColorSimple extends IndustrialistMikadoFieldType
{

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false, $repeat = array()) {
        $class = '';

        if (!empty($repeat)) {
            $id = $name . '-' . $repeat['index'];
            $name .= '[]';
            $value = $repeat['value'];
            $class = 'mkd-repeater-field';
        } else {
            $id = $name;
            $value = industrialist_mikado_option_get_value($name);
        }

        ?>

        <div class="col-lg-3 <?php echo esc_attr($class); ?>" id="mkd_<?php echo esc_attr($id); ?>"<?php if ($hidden) { ?> style="display: none"<?php } ?>>
            <em class="mkd-field-description"><?php echo esc_html($label); ?></em>
            <input type="text" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr($value); ?>" class="my-color-field"/>
        </div>
        <?php

    }

}

class IndustrialistMikadoFieldImage extends IndustrialistMikadoFieldType
{

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false, $repeat = array()) {
        $class = '';

        if (!empty($repeat)) {
            $name .= '[]';
            $value = $repeat['value'];
            $class = 'mkd-repeater-field';
            $has_value = empty($value) ? false : true;
        } else {
            $value = industrialist_mikado_option_get_value($name);
            $has_value = industrialist_mikado_option_has_value($name);
        }

        ?>

        <div class="mkd-page-form-section">


            <div class="mkd-field-desc">
                <h4><?php echo esc_html($label); ?></h4>

                <p><?php echo esc_html($description); ?></p>
            </div>
            <!-- close div.mkd-field-desc -->

            <div class="mkd-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 <?php echo esc_attr($class); ?>">
                            <div class="mkd-media-uploader">
                                <div<?php if (!$has_value) { ?> style="display: none"<?php } ?>
                                    class="mkd-media-image-holder">
                                    <img src="<?php if ($has_value) {
                                        echo esc_url(industrialist_mikado_get_attachment_thumb_url($value));
                                    } ?>" alt=""
                                        class="mkd-media-image img-thumbnail"/>
                                </div>
                                <div style="display: none"
                                    class="mkd-media-meta-fields">
                                    <input type="hidden" class="mkd-media-upload-url"
                                        name="<?php echo esc_attr($name); ?>"
                                        value="<?php echo esc_attr($value); ?>"/>
                                </div>
                                <a class="mkd-media-upload-btn btn btn-sm btn-primary"
                                    href="javascript:void(0)"
                                    data-frame-title="<?php esc_html_e('Select Image', 'industrialist'); ?>"
                                    data-frame-button-text="<?php esc_html_e('Select Image', 'industrialist'); ?>"><?php esc_html_e('Upload', 'industrialist'); ?></a>
                                <a style="display: none;" href="javascript: void(0)"
                                    class="mkd-media-remove-btn btn btn-default btn-sm"><?php esc_html_e('Remove', 'industrialist'); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.mkd-section-content -->

        </div>
        <?php

    }

}

class IndustrialistMikadoFieldImageSimple extends IndustrialistMikadoFieldType
{

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false, $repeat = array()) {
        $class = '';

        if (!empty($repeat)) {
            $id = $name . '-' . $repeat['index'];
            $name .= '[]';
            $value = $repeat['value'];
            $class = 'mkd-repeater-field';
            $has_value = empty($value) ? false : true;
        } else {
            $id = $name;
            $value = industrialist_mikado_option_get_value($name);
            $has_value = industrialist_mikado_option_has_value($name);
        }

        ?>


        <div class="col-lg-3 <?php echo esc_attr($class); ?>" id="mkd_<?php echo esc_attr($id); ?>"<?php if ($hidden) { ?> style="display: none"<?php } ?>>
            <em class="mkd-field-description"><?php echo esc_html($label); ?></em>
            <div class="mkd-media-uploader">
                <div<?php if (!$has_value) { ?> style="display: none"<?php } ?>
                    class="mkd-media-image-holder">
                    <img src="<?php if ($has_value) {
                        echo esc_url(industrialist_mikado_get_attachment_thumb_url($value));
                    } ?>" alt=""
                        class="mkd-media-image img-thumbnail"/>
                </div>
                <div style="display: none"
                    class="mkd-media-meta-fields">
                    <input type="hidden" class="mkd-media-upload-url"
                        name="<?php echo esc_attr($name); ?>"
                        value="<?php echo esc_attr($value); ?>"/>
                </div>
                <a class="mkd-media-upload-btn btn btn-sm btn-primary"
                    href="javascript:void(0)"
                    data-frame-title="<?php esc_html_e('Select Image', 'industrialist'); ?>"
                    data-frame-button-text="<?php esc_html_e('Select Image', 'industrialist'); ?>"><?php esc_html_e('Upload', 'industrialist'); ?></a>
                <a style="display: none;" href="javascript: void(0)"
                    class="mkd-media-remove-btn btn btn-default btn-sm"><?php esc_html_e('Remove', 'industrialist'); ?></a>
            </div>
        </div>
        <?php

    }

}

class IndustrialistMikadoFieldFont extends IndustrialistMikadoFieldType
{

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false, $repeat = array()) {
        global $industrialist_fonts_array;

        $class = '';

        if (!empty($repeat)) {
            $name .= '[]';
            $value = $repeat['value'];
            $class = 'mkd-repeater-field';
        } else {
            $value = industrialist_mikado_option_get_value($name);
        }
        ?>

        <div class="mkd-page-form-section">


            <div class="mkd-field-desc">
                <h4><?php echo esc_html($label); ?></h4>

                <p><?php echo esc_html($description); ?></p>
            </div>
            <!-- close div.mkd-field-desc -->


            <div class="mkd-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3 <?php echo esc_attr($class); ?>">
                            <select class="form-control mkd-form-element"
                                name="<?php echo esc_attr($name); ?>">
                                <option value="-1">Default</option>
                                <?php foreach ($industrialist_fonts_array as $fontArray) { ?>
                                    <option <?php if ($value == str_replace(' ', '+', $fontArray["family"])) {
                                        echo "selected='selected'";
                                    } ?> value="<?php echo esc_attr(str_replace(' ', '+', $fontArray["family"])); ?>"><?php echo esc_html($fontArray["family"]); ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.mkd-section-content -->

        </div>
        <?php

    }

}

class IndustrialistMikadoFieldFontSimple extends IndustrialistMikadoFieldType
{

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false, $repeat = array()) {
        global $industrialist_fonts_array;

        $class = '';

        if (!empty($repeat)) {
            $name .= '[]';
            $value = $repeat['value'];
            $class = 'mkd-repeater-field';
        } else {
            $value = industrialist_mikado_option_get_value($name);
        }
        ?>


        <div class="col-lg-3 <?php echo esc_attr($class); ?>">
            <em class="mkd-field-description"><?php echo esc_html($label); ?></em>
            <select class="form-control mkd-form-element"
                name="<?php echo esc_attr($name); ?>">
                <option value="-1"><?php esc_html_e('Default', 'industrialist'); ?></option>
                <?php foreach ($industrialist_fonts_array as $fontArray) { ?>
                    <option <?php if ($value == str_replace(' ', '+', $fontArray["family"])) {
                        echo "selected='selected'";
                    } ?> value="<?php echo esc_attr(str_replace(' ', '+', $fontArray["family"])); ?>"><?php echo esc_html($fontArray["family"]); ?></option>
                <?php } ?>
            </select>
        </div>
        <?php

    }

}

class IndustrialistMikadoFieldSelect extends IndustrialistMikadoFieldType
{

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false, $repeat = array()) {

        $class = '';

        if (!empty($repeat)) {
            $id = $name . '-' . $repeat['index'];
            $name .= '[]';
            $rvalue = $repeat['value'];
            $class = 'mkd-repeater-field';
        } else {
            $id = $name;
            $rvalue = industrialist_mikado_option_get_value($name);
        }

        $dependence = false;
        if (isset($args["dependence"]))
            $dependence = true;
        $show = array();
        if (isset($args["show"]))
            $show = $args["show"];
        $hide = array();
        if (isset($args["hide"]))
            $hide = $args["hide"];

        $select2 = '';
        if (isset($args['select2'])) {
            $select2 = ($args['select2']) ? 'mkd-select2' : '';
        }

        ?>

        <div class="mkd-page-form-section <?php echo esc_attr($class); ?>" id="mkd_<?php echo esc_attr($id); ?>" <?php if ($hidden) { ?> style="display: none"<?php } ?>>


            <div class="mkd-field-desc">
                <h4><?php echo esc_html($label); ?></h4>

                <p><?php echo esc_html($description); ?></p>
            </div>
            <!-- close div.mkd-field-desc -->


            <div class="mkd-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3">
                            <select class="<?php echo esc_attr($select2); ?> form-control mkd-form-element<?php if ($dependence) {
                                echo " dependence";
                            } ?>"
                                <?php foreach ($show as $key => $value) { ?>
                                    data-show-<?php echo str_replace(' ', '', $key); ?>="<?php echo esc_attr($value); ?>"
                                <?php } ?>
                                <?php foreach ($hide as $key => $value) { ?>
                                    data-hide-<?php echo str_replace(' ', '', $key); ?>="<?php echo esc_attr($value); ?>"
                                <?php } ?>
                                name="<?php echo esc_attr($name); ?>">
                                <?php foreach ($options as $key => $value) {
                                    if ($key == "-1") $key = ""; ?>
                                    <option <?php if ($rvalue == $key) {
                                        echo "selected='selected'";
                                    } ?> value="<?php echo esc_attr($key); ?>"><?php echo esc_html($value); ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.mkd-section-content -->

        </div>
        <?php

    }

}


class IndustrialistMikadoFieldSelectBlank extends IndustrialistMikadoFieldType
{

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false, $repeat = array()) {
        global $industrialist_options;

        $class = '';

        if (!empty($repeat)) {
            $name .= '[]';
            $rvalue = $repeat['value'];
            $class = 'mkd-repeater-field';
        } else {
            $rvalue = industrialist_mikado_option_get_value($name);
        }

        $dependence = false;
        if (isset($args["dependence"]))
            $dependence = true;
        $show = array();
        if (isset($args["show"]))
            $show = $args["show"];
        $hide = array();
        if (isset($args["hide"]))
            $hide = $args["hide"];

        $select2 = '';
        if (isset($args['select2'])) {
            $select2 = ($args['select2']) ? 'mkd-select2' : '';
        }

        ?>

        <div class="mkd-page-form-section"<?php if ($hidden) { ?> style="display: none"<?php } ?>>


            <div class="mkd-field-desc">
                <h4><?php echo esc_html($label); ?></h4>

                <p><?php echo esc_html($description); ?></p>
            </div>
            <!-- close div.mkd-field-desc -->


            <div class="mkd-section-content <?php echo esc_attr($class); ?>">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3">
                            <select class="<?php echo esc_attr($select2); ?> form-control mkd-form-element<?php if ($dependence) {
                                echo " dependence";
                            } ?>"
                                <?php foreach ($show as $key => $value) { ?>
                                    data-show-<?php echo str_replace(' ', '', $key); ?>="<?php echo esc_attr($value); ?>"
                                <?php } ?>
                                <?php foreach ($hide as $key => $value) { ?>
                                    data-hide-<?php echo str_replace(' ', '', $key); ?>="<?php echo esc_attr($value); ?>"
                                <?php } ?>
                                name="<?php echo esc_attr($name); ?>">
                                <option <?php if ($rvalue == "") {
                                    echo "selected='selected'";
                                } ?> value=""></option>
                                <?php foreach ($options as $key => $value) {
                                    if ($key == "-1") $key = ""; ?>
                                    <option <?php if ($rvalue == $key) {
                                        echo "selected='selected'";
                                    } ?> value="<?php echo esc_attr($key); ?>"><?php echo esc_html($value); ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.mkd-section-content -->

        </div>
        <?php

    }

}

class IndustrialistMikadoFieldSelectSimple extends IndustrialistMikadoFieldType
{

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false, $repeat = array()) {
        global $industrialist_options;

        $class = '';
        if (!empty($repeat)) {
            $name .= '[]';
            $rvalue = $repeat['value'];
            $class = 'mkd-repeater-field';
        } else {
            $rvalue = industrialist_mikado_option_get_value($name);
        }

        $dependence = false;
        if (isset($args["dependence"]))
            $dependence = true;
        $show = array();
        if (isset($args["show"]))
            $show = $args["show"];
        $hide = array();
        if (isset($args["hide"]))
            $hide = $args["hide"];
        ?>


        <div class="col-lg-3 <?php echo esc_attr($class); ?>" id="mkd_<?php echo esc_attr($name); ?>" <?php if ($hidden) { ?> style="display: none"<?php } ?>>
            <em class="mkd-field-description"><?php echo esc_html($label); ?></em>
            <select class="form-control mkd-form-element<?php if ($dependence) {
                echo " dependence";
            } ?>"
                <?php foreach ($show as $key => $value) { ?>
                    data-show-<?php echo str_replace(' ', '', $key); ?>="<?php echo esc_attr($value); ?>"
                <?php } ?>
                <?php foreach ($hide as $key => $value) { ?>
                    data-hide-<?php echo str_replace(' ', '', $key); ?>="<?php echo esc_attr($value); ?>"
                <?php } ?>
                name="<?php echo esc_attr($name); ?>">
                <option <?php if ($rvalue == "") {
                    echo "selected='selected'";
                } ?> value=""></option>
                <?php foreach ($options as $key => $value) {
                    if ($key == "-1") $key = ""; ?>
                    <option <?php if ($rvalue == $key) {
                        echo "selected='selected'";
                    } ?> value="<?php echo esc_attr($key); ?>"><?php echo esc_html($value); ?></option>
                <?php } ?>
            </select>
        </div>
        <?php

    }

}

class IndustrialistMikadoFieldSelectBlankSimple extends IndustrialistMikadoFieldType
{

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false, $repeat = array()) {
        global $industrialist_options;

        $class = '';
        if (!empty($repeat)) {
            $name .= '[]';
            $rvalue = $repeat['value'];
            $class = 'mkd-repeater-field';
        } else {
            $rvalue = industrialist_mikado_option_get_value($name);
        }

        $dependence = false;
        if (isset($args["dependence"]))
            $dependence = true;
        $show = array();
        if (isset($args["show"]))
            $show = $args["show"];
        $hide = array();
        if (isset($args["hide"]))
            $hide = $args["hide"];
        ?>


        <div class="col-lg-3 <?php echo esc_attr($class); ?>">
            <em class="mkd-field-description"><?php echo esc_html($label); ?></em>
            <select class="form-control mkd-form-element<?php if ($dependence) {
                echo " dependence";
            } ?>"
                <?php foreach ($show as $key => $value) { ?>
                    data-show-<?php echo str_replace(' ', '', $key); ?>="<?php echo esc_attr($value); ?>"
                <?php } ?>
                <?php foreach ($hide as $key => $value) { ?>
                    data-hide-<?php echo str_replace(' ', '', $key); ?>="<?php echo esc_attr($value); ?>"
                <?php } ?>
                name="<?php echo esc_attr($name); ?>">
                <option <?php if ($rvalue == "") {
                    echo "selected='selected'";
                } ?> value=""></option>
                <?php foreach ($options as $key => $value) {
                    if ($key == "-1") $key = ""; ?>
                    <option <?php if ($rvalue == $key) {
                        echo "selected='selected'";
                    } ?> value="<?php echo esc_attr($key); ?>"><?php echo esc_html($value); ?></option>
                <?php } ?>
            </select>
        </div>
        <?php

    }

}

class IndustrialistMikadoFieldYesNo extends IndustrialistMikadoFieldType
{

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false, $repeat = array()) {
        global $industrialist_options;

        $class = '';

        if (!empty($repeat)) {
            $id = $name . '-' . $repeat['index'];
            $name .= '[]';
            $rvalue = $repeat['value'];
            $class = 'mkd-repeater-field';
        } else {
            $id = $name;
            $rvalue = industrialist_mikado_option_get_value($name);
        }

        $dependence = false;
        if (isset($args["dependence"]))
            $dependence = true;
        $dependence_hide_on_yes = "";
        if (isset($args["dependence_hide_on_yes"]))
            $dependence_hide_on_yes = $args["dependence_hide_on_yes"];
        $dependence_show_on_yes = "";
        if (isset($args["dependence_show_on_yes"]))
            $dependence_show_on_yes = $args["dependence_show_on_yes"];
        ?>

        <div class="mkd-page-form-section" id="mkd_<?php echo esc_attr($id); ?>">


            <div class="mkd-field-desc">
                <h4><?php echo esc_html($label); ?></h4>

                <p><?php echo esc_html($description); ?></p>
            </div>
            <!-- close div.mkd-field-desc -->


            <div class="mkd-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 <?php echo esc_attr($class); ?>">
                            <p class="field switch">
                                <label data-hide="<?php echo esc_attr($dependence_hide_on_yes); ?>" data-show="<?php echo esc_attr($dependence_show_on_yes); ?>"
                                    class="cb-enable<?php if ($rvalue == "yes") {
                                        echo " selected";
                                    } ?><?php if ($dependence) {
                                        echo " dependence";
                                    } ?>"><span><?php esc_html_e('Yes', 'industrialist') ?></span></label>
                                <label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
                                    class="cb-disable<?php if ($rvalue == "no") {
                                        echo " selected";
                                    } ?><?php if ($dependence) {
                                        echo " dependence";
                                    } ?>"><span><?php esc_html_e('No', 'industrialist') ?></span></label>
                                <input type="checkbox" id="checkbox" class="checkbox"
                                    name="<?php echo esc_attr($name); ?>_yesno" value="yes"<?php if ($rvalue == "yes") {
                                    echo " selected";
                                } ?>/>
                                <input type="hidden" class="checkboxhidden_yesno" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr($rvalue); ?>"/>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.mkd-section-content -->

        </div>
        <?php

    }
}

class IndustrialistMikadoFieldYesNoSimple extends IndustrialistMikadoFieldType
{

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false, $repeat = array()) {
        global $industrialist_options;

        $class = '';

        if (!empty($repeat)) {
            $name .= '[]';
            $rvalue = $repeat['value'];
            $class = 'mkd-repeater-field';
        } else {
            $rvalue = industrialist_mikado_option_get_value($name);
        }

        $dependence = false;
        if (isset($args["dependence"]))
            $dependence = true;
        $dependence_hide_on_yes = "";
        if (isset($args["dependence_hide_on_yes"]))
            $dependence_hide_on_yes = $args["dependence_hide_on_yes"];
        $dependence_show_on_yes = "";
        if (isset($args["dependence_show_on_yes"]))
            $dependence_show_on_yes = $args["dependence_show_on_yes"];
        ?>

        <div class="col-lg-3 <?php echo esc_attr($class); ?>">
            <em class="mkd-field-description"><?php echo esc_html($label); ?></em>
            <p class="field switch">
                <label data-hide="<?php echo esc_attr($dependence_hide_on_yes); ?>" data-show="<?php echo esc_attr($dependence_show_on_yes); ?>"
                    class="cb-enable<?php if ($rvalue == "yes") {
                        echo " selected";
                    } ?><?php if ($dependence) {
                        echo " dependence";
                    } ?>"><span><?php esc_html_e('Yes', 'industrialist') ?></span></label>
                <label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
                    class="cb-disable<?php if ($rvalue == "no") {
                        echo " selected";
                    } ?><?php if ($dependence) {
                        echo " dependence";
                    } ?>"><span><?php esc_html_e('No', 'industrialist') ?></span></label>
                <input type="checkbox" id="checkbox" class="checkbox"
                    name="<?php echo esc_attr($name); ?>_yesno" value="yes"<?php if ($rvalue == "yes") {
                    echo " selected";
                } ?>/>
                <input type="hidden" class="checkboxhidden_yesno" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr($rvalue); ?>"/>
            </p>
        </div>
        <?php

    }
}

class IndustrialistMikadoFieldOnOff extends IndustrialistMikadoFieldType
{

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {
        global $industrialist_options;
        $dependence = false;
        if (isset($args["dependence"]))
            $dependence = true;
        $dependence_hide_on_yes = "";
        if (isset($args["dependence_hide_on_yes"]))
            $dependence_hide_on_yes = $args["dependence_hide_on_yes"];
        $dependence_show_on_yes = "";
        if (isset($args["dependence_show_on_yes"]))
            $dependence_show_on_yes = $args["dependence_show_on_yes"];
        ?>

        <div class="mkd-page-form-section" id="mkd_<?php echo esc_attr($name); ?>">


            <div class="mkd-field-desc">
                <h4><?php echo esc_html($label); ?></h4>

                <p><?php echo esc_html($description); ?></p>
            </div>
            <!-- close div.mkd-field-desc -->


            <div class="mkd-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">

                            <p class="field switch">
                                <label data-hide="<?php echo esc_attr($dependence_hide_on_yes); ?>" data-show="<?php echo esc_attr($dependence_show_on_yes); ?>"
                                    class="cb-enable<?php if (industrialist_mikado_option_get_value($name) == "on") {
                                        echo " selected";
                                    } ?><?php if ($dependence) {
                                        echo " dependence";
                                    } ?>"><span><?php esc_html_e('On', 'industrialist') ?></span></label>
                                <label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
                                    class="cb-disable<?php if (industrialist_mikado_option_get_value($name) == "off") {
                                        echo " selected";
                                    } ?><?php if ($dependence) {
                                        echo " dependence";
                                    } ?>"><span><?php esc_html_e('Off', 'industrialist') ?></span></label>
                                <input type="checkbox" id="checkbox" class="checkbox"
                                    name="<?php echo esc_attr($name); ?>_onoff" value="on"<?php if (industrialist_mikado_option_get_value($name) == "on") {
                                    echo " selected";
                                } ?>/>
                                <input type="hidden" class="checkboxhidden_onoff" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(industrialist_mikado_option_get_value($name)); ?>"/>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.mkd-section-content -->

        </div>
        <?php

    }

}

class IndustrialistMikadoFieldPortfolioFollow extends IndustrialistMikadoFieldType
{

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {
        global $industrialist_options;
        $dependence = false;
        if (isset($args["dependence"]))
            $dependence = true;
        $dependence_hide_on_yes = "";
        if (isset($args["dependence_hide_on_yes"]))
            $dependence_hide_on_yes = $args["dependence_hide_on_yes"];
        $dependence_show_on_yes = "";
        if (isset($args["dependence_show_on_yes"]))
            $dependence_show_on_yes = $args["dependence_show_on_yes"];
        ?>

        <div class="mkd-page-form-section" id="mkd_<?php echo esc_attr($name); ?>">


            <div class="mkd-field-desc">
                <h4><?php echo esc_html($label); ?></h4>

                <p><?php echo esc_html($description); ?></p>
            </div>
            <!-- close div.mkd-field-desc -->


            <div class="mkd-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="field switch">
                                <label data-hide="<?php echo esc_attr($dependence_hide_on_yes); ?>" data-show="<?php echo esc_attr($dependence_show_on_yes); ?>"
                                    class="cb-enable<?php if (industrialist_mikado_option_get_value($name) == "portfolio_single_follow") {
                                        echo " selected";
                                    } ?><?php if ($dependence) {
                                        echo " dependence";
                                    } ?>"><span><?php esc_html_e('Yes', 'industrialist') ?></span></label>
                                <label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
                                    class="cb-disable<?php if (industrialist_mikado_option_get_value($name) == "portfolio_single_no_follow") {
                                        echo " selected";
                                    } ?><?php if ($dependence) {
                                        echo " dependence";
                                    } ?>"><span><?php esc_html_e('No', 'industrialist') ?></span></label>
                                <input type="checkbox" id="checkbox" class="checkbox"
                                    name="<?php echo esc_attr($name); ?>_portfoliofollow" value="portfolio_single_follow"<?php if (industrialist_mikado_option_get_value($name) == "portfolio_single_follow") {
                                    echo " selected";
                                } ?>/>
                                <input type="hidden" class="checkboxhidden_portfoliofollow" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(industrialist_mikado_option_get_value($name)); ?>"/>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.mkd-section-content -->

        </div>
        <?php

    }

}

class IndustrialistMikadoFieldZeroOne extends IndustrialistMikadoFieldType
{

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {
        $dependence = false;
        if (isset($args["dependence"]))
            $dependence = true;
        $dependence_hide_on_yes = "";
        if (isset($args["dependence_hide_on_yes"]))
            $dependence_hide_on_yes = $args["dependence_hide_on_yes"];
        $dependence_show_on_yes = "";
        if (isset($args["dependence_show_on_yes"]))
            $dependence_show_on_yes = $args["dependence_show_on_yes"];
        ?>

        <div class="mkd-page-form-section" id="mkd_<?php echo esc_attr($name); ?>">


            <div class="mkd-field-desc">
                <h4><?php echo esc_html($label); ?></h4>

                <p><?php echo esc_html($description); ?></p>
            </div>
            <!-- close div.mkd-field-desc -->


            <div class="mkd-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">

                            <p class="field switch">
                                <label data-hide="<?php echo esc_attr($dependence_hide_on_yes); ?>" data-show="<?php echo esc_attr($dependence_show_on_yes); ?>"
                                    class="cb-enable<?php if (industrialist_mikado_option_get_value($name) == "1") {
                                        echo " selected";
                                    } ?><?php if ($dependence) {
                                        echo " dependence";
                                    } ?>"><span><?php esc_html_e('Yes', 'industrialist') ?></span></label>
                                <label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
                                    class="cb-disable<?php if (industrialist_mikado_option_get_value($name) == "0") {
                                        echo " selected";
                                    } ?><?php if ($dependence) {
                                        echo " dependence";
                                    } ?>"><span><?php esc_html_e('No', 'industrialist') ?></span></label>
                                <input type="checkbox" id="checkbox" class="checkbox"
                                    name="<?php echo esc_attr($name); ?>_zeroone" value="1"<?php if (industrialist_mikado_option_get_value($name) == "1") {
                                    echo " selected";
                                } ?>/>
                                <input type="hidden" class="checkboxhidden_zeroone" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(industrialist_mikado_option_get_value($name)); ?>"/>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.mkd-section-content -->

        </div>
        <?php

    }

}

class IndustrialistMikadoFieldImageVideo extends IndustrialistMikadoFieldType
{

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {
        global $industrialist_options;
        $dependence = false;
        if (isset($args["dependence"]))
            $dependence = true;
        $dependence_hide_on_yes = "";
        if (isset($args["dependence_hide_on_yes"]))
            $dependence_hide_on_yes = $args["dependence_hide_on_yes"];
        $dependence_show_on_yes = "";
        if (isset($args["dependence_show_on_yes"]))
            $dependence_show_on_yes = $args["dependence_show_on_yes"];
        ?>

        <div class="mkd-page-form-section" id="mkd_<?php echo esc_attr($name); ?>">


            <div class="mkd-field-desc">
                <h4><?php echo esc_html($label); ?></h4>

                <p><?php echo esc_html($description); ?></p>
            </div>
            <!-- close div.mkd-field-desc -->


            <div class="mkd-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="field switch switch-type">
                                <label data-hide="<?php echo esc_attr($dependence_hide_on_yes); ?>" data-show="<?php echo esc_attr($dependence_show_on_yes); ?>"
                                    class="cb-enable<?php if (industrialist_mikado_option_get_value($name) == "image") {
                                        echo " selected";
                                    } ?><?php if ($dependence) {
                                        echo " dependence";
                                    } ?>"><span><?php esc_html_e('Image', 'industrialist') ?></span></label>
                                <label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
                                    class="cb-disable<?php if (industrialist_mikado_option_get_value($name) == "video") {
                                        echo " selected";
                                    } ?><?php if ($dependence) {
                                        echo " dependence";
                                    } ?>"><span><?php esc_html_e('Video', 'industrialist') ?></span></label>
                                <input type="checkbox" id="checkbox" class="checkbox"
                                    name="<?php echo esc_attr($name); ?>_imagevideo" value="image"<?php if (industrialist_mikado_option_get_value($name) == "image") {
                                    echo " selected";
                                } ?>/>
                                <input type="hidden" class="checkboxhidden_imagevideo" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(industrialist_mikado_option_get_value($name)); ?>"/>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.mkd-section-content -->

        </div>
        <?php

    }

}

class IndustrialistMikadoFieldYesEmpty extends IndustrialistMikadoFieldType
{

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {
        global $industrialist_options;
        $dependence = false;
        if (isset($args["dependence"]))
            $dependence = true;
        $dependence_hide_on_yes = "";
        if (isset($args["dependence_hide_on_yes"]))
            $dependence_hide_on_yes = $args["dependence_hide_on_yes"];
        $dependence_show_on_yes = "";
        if (isset($args["dependence_show_on_yes"]))
            $dependence_show_on_yes = $args["dependence_show_on_yes"];
        ?>

        <div class="mkd-page-form-section" id="mkd_<?php echo esc_attr($name); ?>">


            <div class="mkd-field-desc">
                <h4><?php echo esc_html($label); ?></h4>

                <p><?php echo esc_html($description); ?></p>
            </div>
            <!-- close div.mkd-field-desc -->


            <div class="mkd-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="field switch">
                                <label data-hide="<?php echo esc_attr($dependence_hide_on_yes); ?>" data-show="<?php echo esc_attr($dependence_show_on_yes); ?>"
                                    class="cb-enable<?php if (industrialist_mikado_option_get_value($name) == "yes") {
                                        echo " selected";
                                    } ?><?php if ($dependence) {
                                        echo " dependence";
                                    } ?>"><span><?php esc_html_e('Yes', 'industrialist') ?></span></label>
                                <label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
                                    class="cb-disable<?php if (industrialist_mikado_option_get_value($name) == "") {
                                        echo " selected";
                                    } ?><?php if ($dependence) {
                                        echo " dependence";
                                    } ?>"><span><?php esc_html_e('No', 'industrialist') ?></span></label>
                                <input type="checkbox" id="checkbox" class="checkbox"
                                    name="<?php echo esc_attr($name); ?>_yesempty" value="yes"<?php if (industrialist_mikado_option_get_value($name) == "yes") {
                                    echo " selected";
                                } ?>/>
                                <input type="hidden" class="checkboxhidden_yesempty" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(industrialist_mikado_option_get_value($name)); ?>"/>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.mkd-section-content -->

        </div>
        <?php

    }

}

class IndustrialistMikadoFieldFlagPage extends IndustrialistMikadoFieldType
{

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {
        global $industrialist_options;
        $dependence = false;
        if (isset($args["dependence"]))
            $dependence = true;
        $dependence_hide_on_yes = "";
        if (isset($args["dependence_hide_on_yes"]))
            $dependence_hide_on_yes = $args["dependence_hide_on_yes"];
        $dependence_show_on_yes = "";
        if (isset($args["dependence_show_on_yes"]))
            $dependence_show_on_yes = $args["dependence_show_on_yes"];
        ?>

        <div class="mkd-page-form-section" id="mkd_<?php echo esc_attr($name); ?>">


            <div class="mkd-field-desc">
                <h4><?php echo esc_html($label); ?></h4>

                <p><?php echo esc_html($description); ?></p>
            </div>
            <!-- close div.mkd-field-desc -->


            <div class="mkd-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="field switch">
                                <label data-hide="<?php echo esc_attr($dependence_hide_on_yes); ?>" data-show="<?php echo esc_attr($dependence_show_on_yes); ?>"
                                    class="cb-enable<?php if (industrialist_mikado_option_get_value($name) == "page") {
                                        echo " selected";
                                    } ?><?php if ($dependence) {
                                        echo " dependence";
                                    } ?>"><span><?php esc_html_e('Yes', 'industrialist') ?></span></label>
                                <label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
                                    class="cb-disable<?php if (industrialist_mikado_option_get_value($name) == "") {
                                        echo " selected";
                                    } ?><?php if ($dependence) {
                                        echo " dependence";
                                    } ?>"><span><?php esc_html_e('No', 'industrialist') ?></span></label>
                                <input type="checkbox" id="checkbox" class="checkbox"
                                    name="<?php echo esc_attr($name); ?>_flagpage" value="page"<?php if (industrialist_mikado_option_get_value($name) == "page") {
                                    echo " selected";
                                } ?>/>
                                <input type="hidden" class="checkboxhidden_flagpage" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(industrialist_mikado_option_get_value($name)); ?>"/>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.mkd-section-content -->

        </div>
        <?php

    }

}

class IndustrialistMikadoFieldFlagPost extends IndustrialistMikadoFieldType
{

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {

        $dependence = false;
        if (isset($args["dependence"]))
            $dependence = true;
        $dependence_hide_on_yes = "";
        if (isset($args["dependence_hide_on_yes"]))
            $dependence_hide_on_yes = $args["dependence_hide_on_yes"];
        $dependence_show_on_yes = "";
        if (isset($args["dependence_show_on_yes"]))
            $dependence_show_on_yes = $args["dependence_show_on_yes"];
        ?>

        <div class="mkd-page-form-section" id="mkd_<?php echo esc_attr($name); ?>">


            <div class="mkd-field-desc">
                <h4><?php echo esc_html($label); ?></h4>

                <p><?php echo esc_html($description); ?></p>
            </div>
            <!-- close div.mkd-field-desc -->


            <div class="mkd-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="field switch">
                                <label data-hide="<?php echo esc_attr($dependence_hide_on_yes); ?>" data-show="<?php echo esc_attr($dependence_show_on_yes); ?>"
                                    class="cb-enable<?php if (industrialist_mikado_option_get_value($name) == "post") {
                                        echo " selected";
                                    } ?><?php if ($dependence) {
                                        echo " dependence";
                                    } ?>"><span><?php esc_html_e('Yes', 'industrialist') ?></span></label>
                                <label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
                                    class="cb-disable<?php if (industrialist_mikado_option_get_value($name) == "") {
                                        echo " selected";
                                    } ?><?php if ($dependence) {
                                        echo " dependence";
                                    } ?>"><span><?php esc_html_e('No', 'industrialist') ?></span></label>
                                <input type="checkbox" id="checkbox" class="checkbox"
                                    name="<?php echo esc_attr($name); ?>_flagpost" value="post"<?php if (industrialist_mikado_option_get_value($name) == "post") {
                                    echo " selected";
                                } ?>/>
                                <input type="hidden" class="checkboxhidden_flagpost" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(industrialist_mikado_option_get_value($name)); ?>"/>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.mkd-section-content -->

        </div>
        <?php

    }

}

class IndustrialistMikadoFieldFlagMedia extends IndustrialistMikadoFieldType
{

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {
        global $industrialist_options;
        $dependence = false;
        if (isset($args["dependence"]))
            $dependence = true;
        $dependence_hide_on_yes = "";
        if (isset($args["dependence_hide_on_yes"]))
            $dependence_hide_on_yes = $args["dependence_hide_on_yes"];
        $dependence_show_on_yes = "";
        if (isset($args["dependence_show_on_yes"]))
            $dependence_show_on_yes = $args["dependence_show_on_yes"];
        ?>

        <div class="mkd-page-form-section" id="mkd_<?php echo esc_attr($name); ?>">


            <div class="mkd-field-desc">
                <h4><?php echo esc_html($label); ?></h4>

                <p><?php echo esc_html($description); ?></p>
            </div>
            <!-- close div.mkd-field-desc -->


            <div class="mkd-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="field switch">
                                <label data-hide="<?php echo esc_attr($dependence_hide_on_yes); ?>" data-show="<?php echo esc_attr($dependence_show_on_yes); ?>"
                                    class="cb-enable<?php if (industrialist_mikado_option_get_value($name) == "attachment") {
                                        echo " selected";
                                    } ?><?php if ($dependence) {
                                        echo " dependence";
                                    } ?>"><span><?php esc_html_e('Yes', 'industrialist') ?></span></label>
                                <label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
                                    class="cb-disable<?php if (industrialist_mikado_option_get_value($name) == "") {
                                        echo " selected";
                                    } ?><?php if ($dependence) {
                                        echo " dependence";
                                    } ?>"><span><?php esc_html_e('No', 'industrialist') ?></span></label>
                                <input type="checkbox" id="checkbox" class="checkbox"
                                    name="<?php echo esc_attr($name); ?>_flagmedia" value="attachment"<?php if (industrialist_mikado_option_get_value($name) == "attachment") {
                                    echo " selected";
                                } ?>/>
                                <input type="hidden" class="checkboxhidden_flagmedia" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(industrialist_mikado_option_get_value($name)); ?>"/>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.mkd-section-content -->

        </div>
        <?php

    }

}

class IndustrialistMikadoFieldFlagPortfolio extends IndustrialistMikadoFieldType
{

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {
        global $industrialist_options;
        $dependence = false;
        if (isset($args["dependence"]))
            $dependence = true;
        $dependence_hide_on_yes = "";
        if (isset($args["dependence_hide_on_yes"]))
            $dependence_hide_on_yes = $args["dependence_hide_on_yes"];
        $dependence_show_on_yes = "";
        if (isset($args["dependence_show_on_yes"]))
            $dependence_show_on_yes = $args["dependence_show_on_yes"];
        ?>

        <div class="mkd-page-form-section" id="mkd_<?php echo esc_attr($name); ?>">


            <div class="mkd-field-desc">
                <h4><?php echo esc_html($label); ?></h4>

                <p><?php echo esc_html($description); ?></p>
            </div>
            <!-- close div.mkd-field-desc -->


            <div class="mkd-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="field switch">
                                <label data-hide="<?php echo esc_attr($dependence_hide_on_yes); ?>" data-show="<?php echo esc_attr($dependence_show_on_yes); ?>"
                                    class="cb-enable<?php if (industrialist_mikado_option_get_value($name) == "portfolio_page") {
                                        echo " selected";
                                    } ?><?php if ($dependence) {
                                        echo " dependence";
                                    } ?>"><span><?php esc_html_e('Yes', 'industrialist') ?></span></label>
                                <label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
                                    class="cb-disable<?php if (industrialist_mikado_option_get_value($name) == "") {
                                        echo " selected";
                                    } ?><?php if ($dependence) {
                                        echo " dependence";
                                    } ?>"><span><?php esc_html_e('No', 'industrialist') ?></span></label>
                                <input type="checkbox" id="checkbox" class="checkbox"
                                    name="<?php echo esc_attr($name); ?>_flagportfolio" value="portfolio_page"<?php if (industrialist_mikado_option_get_value($name) == "portfolio_page") {
                                    echo " selected";
                                } ?>/>
                                <input type="hidden" class="checkboxhidden_flagportfolio" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(industrialist_mikado_option_get_value($name)); ?>"/>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.mkd-section-content -->

        </div>
        <?php

    }

}

class IndustrialistMikadoFieldFlagProduct extends IndustrialistMikadoFieldType
{

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {
        global $industrialist_options;
        $dependence = false;
        if (isset($args["dependence"]))
            $dependence = true;
        $dependence_hide_on_yes = "";
        if (isset($args["dependence_hide_on_yes"]))
            $dependence_hide_on_yes = $args["dependence_hide_on_yes"];
        $dependence_show_on_yes = "";
        if (isset($args["dependence_show_on_yes"]))
            $dependence_show_on_yes = $args["dependence_show_on_yes"];
        ?>

        <div class="mkd-page-form-section" id="mkd_<?php echo esc_attr($name); ?>">


            <div class="mkd-field-desc">
                <h4><?php echo esc_html($label); ?></h4>

                <p><?php echo esc_html($description); ?></p>
            </div>
            <!-- close div.mkd-field-desc -->


            <div class="mkd-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="field switch">
                                <label data-hide="<?php echo esc_attr($dependence_hide_on_yes); ?>" data-show="<?php echo esc_attr($dependence_show_on_yes); ?>"
                                    class="cb-enable<?php if (industrialist_mikado_option_get_value($name) == "product") {
                                        echo " selected";
                                    } ?><?php if ($dependence) {
                                        echo " dependence";
                                    } ?>"><span><?php esc_html_e('Yes', 'industrialist') ?></span></label>
                                <label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
                                    class="cb-disable<?php if (industrialist_mikado_option_get_value($name) == "") {
                                        echo " selected";
                                    } ?><?php if ($dependence) {
                                        echo " dependence";
                                    } ?>"><span><?php esc_html_e('No', 'industrialist') ?></span></label>
                                <input type="checkbox" id="checkbox" class="checkbox"
                                    name="<?php echo esc_attr($name); ?>_flagproduct" value="product"<?php if (industrialist_mikado_option_get_value($name) == "product") {
                                    echo " selected";
                                } ?>/>
                                <input type="hidden" class="checkboxhidden_flagproduct" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(industrialist_mikado_option_get_value($name)); ?>"/>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.mkd-section-content -->

        </div>
        <?php

    }

}

class IndustrialistMikadoFieldRange extends IndustrialistMikadoFieldType
{

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {
        $range_min = 0;
        $range_max = 1;
        $range_step = 0.01;
        $range_decimals = 2;
        if (isset($args["range_min"]))
            $range_min = $args["range_min"];
        if (isset($args["range_max"]))
            $range_max = $args["range_max"];
        if (isset($args["range_step"]))
            $range_step = $args["range_step"];
        if (isset($args["range_decimals"]))
            $range_decimals = $args["range_decimals"];
        ?>

        <div class="mkd-page-form-section">


            <div class="mkd-field-desc">
                <h4><?php echo esc_html($label); ?></h4>

                <p><?php echo esc_html($description); ?></p>
            </div>
            <!-- close div.mkd-field-desc -->

            <div class="mkd-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mkd-slider-range-wrapper">
                                <div class="form-inline">
                                    <input type="text"
                                        class="form-control mkd-form-element mkd-form-element-xsmall pull-left mkd-slider-range-value"
                                        name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(industrialist_mikado_option_get_value($name)); ?>"/>

                                    <div class="mkd-slider-range small"
                                        data-step="<?php echo esc_attr($range_step); ?>" data-min="<?php echo esc_attr($range_min); ?>" data-max="<?php echo esc_attr($range_max); ?>" data-decimals="<?php echo esc_attr($range_decimals); ?>" data-start="<?php echo esc_attr(industrialist_mikado_option_get_value($name)); ?>"></div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.mkd-section-content -->

        </div>
        <?php

    }

}

class IndustrialistMikadoFieldRangeSimple extends IndustrialistMikadoFieldType
{

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {
        ?>

        <div class="col-lg-3" id="mkd_<?php echo esc_attr($name); ?>"<?php if ($hidden) { ?> style="display: none"<?php } ?>>
            <div class="mkd-slider-range-wrapper">
                <div class="form-inline">
                    <em class="mkd-field-description"><?php echo esc_html($label); ?></em>
                    <input type="text"
                        class="form-control mkd-form-element mkd-form-element-xxsmall pull-left mkd-slider-range-value"
                        name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(industrialist_mikado_option_get_value($name)); ?>"/>

                    <div class="mkd-slider-range xsmall"
                        data-step="0.01" data-max="1" data-start="<?php echo esc_attr(industrialist_mikado_option_get_value($name)); ?>"></div>
                </div>

            </div>
        </div>
        <?php

    }

}

class IndustrialistMikadoFieldRadio extends IndustrialistMikadoFieldType
{

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {

        $checked = "";
        if ($default_value == $value)
            $checked = "checked";
        $html = '<input type="radio" name="' . $name . '" value="' . $default_value . '" ' . $checked . ' /> ' . $label . '<br />';
        echo wp_kses($html, array(
            'input' => array(
                'type' => true,
                'name' => true,
                'value' => true,
                'checked' => true
            ),
            'br' => true
        ));

    }

}

class IndustrialistMikadoFieldRadioGroup extends IndustrialistMikadoFieldType
{

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {
        $dependence = isset($args["dependence"]) && $args["dependence"] ? true : false;
        $show = !empty($args["show"]) ? $args["show"] : array();
        $hide = !empty($args["hide"]) ? $args["hide"] : array();

        $use_images = isset($args["use_images"]) && $args["use_images"] ? true : false;
        $hide_labels = isset($args["hide_labels"]) && $args["hide_labels"] ? true : false;
        $hide_radios = $use_images ? 'display: none' : '';
        $checked_value = industrialist_mikado_option_get_value($name);
        ?>

        <div class="mkd-page-form-section" id="mkd_<?php echo esc_attr($name); ?>" <?php if ($hidden) { ?> style="display: none"<?php } ?>>

            <div class="mkd-field-desc">
                <h4><?php echo esc_html($label); ?></h4>

                <p><?php echo esc_html($description); ?></p>
            </div>
            <!-- close div.mkd-field-desc -->

            <div class="mkd-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php if (is_array($options) && count($options)) { ?>
                                <div class="mkd-radio-group-holder <?php if ($use_images) echo "with-images"; ?>">
                                    <?php foreach ($options as $key => $atts) {
                                        $selected = false;
                                        if ($checked_value == $key) {
                                            $selected = true;
                                        }

                                        $show_val = "";
                                        $hide_val = "";
                                        if ($dependence) {
                                            if (array_key_exists($key, $show)) {
                                                $show_val = $show[$key];
                                            }

                                            if (array_key_exists($key, $hide)) {
                                                $hide_val = $hide[$key];
                                            }
                                        }
                                        ?>
                                        <label class="radio-inline">
                                            <input
                                                <?php echo industrialist_mikado_get_inline_attr($show_val, 'data-show'); ?>
                                                <?php echo industrialist_mikado_get_inline_attr($hide_val, 'data-hide'); ?>
                                                <?php if ($selected) echo "checked"; ?> <?php industrialist_mikado_inline_style($hide_radios); ?>
                                                type="radio"
                                                name="<?php echo esc_attr($name); ?>"
                                                value="<?php echo esc_attr($key); ?>"
                                                <?php if ($dependence) industrialist_mikado_class_attribute("dependence"); ?>> <?php if (!empty($atts["label"]) && !$hide_labels) echo esc_attr($atts["label"]); ?>

                                            <?php if ($use_images) { ?>
                                                <img title="<?php if (!empty($atts["label"])) echo esc_attr($atts["label"]); ?>" src="<?php echo esc_url($atts['image']); ?>" alt="<?php echo esc_attr("$key image") ?>"/>
                                            <?php } ?>
                                        </label>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.mkd-section-content -->

        </div>
        <?php
    }

}

class IndustrialistMikadoFieldCheckBox extends IndustrialistMikadoFieldType
{

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {

        $checked = "";
        if ($default_value == $value)
            $checked = "checked";
        $html = '<input type="checkbox" name="' . $name . '" value="' . $default_value . '" ' . $checked . ' /> ' . $label . '<br />';
        echo wp_kses($html, array(
            'input' => array(
                'type' => true,
                'name' => true,
                'value' => true,
                'checked' => true
            ),
            'br' => true
        ));
    }
}

class IndustrialistMikadoFieldCheckBoxGroup extends IndustrialistMikadoFieldType
{

    public function render($name, $label = '', $description = '', $options = array(), $args = array(), $hidden = false) {
        if (!(is_array($options) && count($options))) {
            return;
        }

        $saved_value = industrialist_mikado_option_get_value($name);

        $enable_empty_checkbox = isset($args["enable_empty_checkbox"]) && $args["enable_empty_checkbox"] ? true : false;
        $inline_checkbox_class = isset($args["inline_checkbox_class"]) && $args["inline_checkbox_class"] ? 'checkbox-inline' : 'checkbox';
        ?>
        <div class="mkd-page-form-section" id="mkd_<?php echo esc_attr($name); ?>"<?php if ($hidden) { ?> style="display: none"<?php } ?>>


            <div class="mkd-field-desc">
                <h4><?php echo esc_html($label); ?></h4>

                <p><?php echo esc_html($description); ?></p>
            </div>
            <!-- close div.mkd-field-desc -->

            <div class="mkd-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mkd-checkbox-group-holder">
                                <?php if ($enable_empty_checkbox) { ?>
                                    <div class="<?php echo esc_attr($inline_checkbox_class); ?>" style="display: none">
                                        <label>
                                            <input checked type="checkbox" value="" name="<?php echo esc_attr($name . '[]'); ?>">
                                        </label>
                                    </div>
                                <?php } ?>
                                <?php foreach ($options as $option_key => $option_label) : ?>
                                    <?php
                                    $i = 1;
                                    $checked = is_array($saved_value) && in_array($option_key, $saved_value);
                                    $checked_attr = $checked ? 'checked' : '';
                                    ?>

                                    <div class="<?php echo esc_attr($inline_checkbox_class); ?>">
                                        <label>
                                            <input <?php echo esc_attr($checked_attr); ?> type="checkbox" id="<?php echo esc_attr($option_key) . '-' . $i; ?>" value="<?php echo esc_attr($option_key); ?>" name="<?php echo esc_attr($name . '[]'); ?>">
                                            <label for="<?php echo esc_attr($option_key) . '-' . $i; ?>"><?php echo esc_html($option_label); ?></label>
                                        </label>
                                    </div>
                                    <?php $i++; endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.mkd-section-content -->
        </div>
        <?php
    }
}

class IndustrialistMikadoFieldDate extends IndustrialistMikadoFieldType
{

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {
        $col_width = 2;
        if (isset($args["col_width"]))
            $col_width = $args["col_width"];
        ?>

        <div class="mkd-page-form-section" id="mkd_<?php echo esc_attr($name); ?>"<?php if ($hidden) { ?> style="display: none"<?php } ?>>


            <div class="mkd-field-desc">
                <h4><?php echo esc_html($label); ?></h4>

                <p><?php echo esc_html($description); ?></p>
            </div>
            <!-- close div.mkd-field-desc -->

            <div class="mkd-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-<?php echo esc_attr($col_width); ?>">
                            <input type="text"
                                id="portfolio_date"
                                class="datepicker form-control mkd-input mkd-form-element"
                                name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(industrialist_mikado_option_get_value($name)); ?>"
                            /></div>
                    </div>
                </div>
            </div>
            <!-- close div.mkd-section-content -->

        </div>
        <?php
    }
}

class IndustrialistMikadoFieldFactory
{

    public function render($field_type, $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false, $repeat = array()) {

        switch (strtolower($field_type)) {

            case 'text':
                $field = new IndustrialistMikadoFieldText();
                $field->render($name, $label, $description, $options, $args, $hidden, $repeat);
                break;
            case 'textsimple':
                $field = new IndustrialistMikadoFieldTextSimple();
                $field->render($name, $label, $description, $options, $args, $hidden, $repeat);
                break;
            case 'textarea':
                $field = new IndustrialistMikadoFieldTextArea();
                $field->render($name, $label, $description, $options, $args, $hidden, $repeat);
                break;
            case 'textareasimple':
                $field = new IndustrialistMikadoFieldTextAreaSimple();
                $field->render($name, $label, $description, $options, $args, $hidden, $repeat);
                break;
            case 'textareahtml':
                $field = new IndustrialistMikadoFieldTextAreaHtml();
                $field->render($name, $label, $description, $options, $args, $hidden, $repeat);
                break;
            case 'color':
                $field = new IndustrialistMikadoFieldColor();
                $field->render($name, $label, $description, $options, $args, $hidden, $repeat);
                break;
            case 'colorsimple':
                $field = new IndustrialistMikadoFieldColorSimple();
                $field->render($name, $label, $description, $options, $args, $hidden, $repeat);
                break;
            case 'image':
                $field = new IndustrialistMikadoFieldImage();
                $field->render($name, $label, $description, $options, $args, $hidden, $repeat);
                break;
            case 'imagesimple':
                $field = new IndustrialistMikadoFieldImageSimple();
                $field->render($name, $label, $description, $options, $args, $hidden, $repeat);
                break;
            case 'font':
                $field = new IndustrialistMikadoFieldFont();
                $field->render($name, $label, $description, $options, $args, $hidden, $repeat);
                break;
            case 'fontsimple':
                $field = new IndustrialistMikadoFieldFontSimple();
                $field->render($name, $label, $description, $options, $args, $hidden, $repeat);
                break;
            case 'select':
                $field = new IndustrialistMikadoFieldSelect();
                $field->render($name, $label, $description, $options, $args, $hidden, $repeat);
                break;
            case 'selectblank':
                $field = new IndustrialistMikadoFieldSelectBlank();
                $field->render($name, $label, $description, $options, $args, $hidden, $repeat);
                break;
            case 'selectsimple':
                $field = new IndustrialistMikadoFieldSelectSimple();
                $field->render($name, $label, $description, $options, $args, $hidden, $repeat);
                break;
            case 'selectblanksimple':
                $field = new IndustrialistMikadoFieldSelectBlankSimple();
                $field->render($name, $label, $description, $options, $args, $hidden, $repeat);
                break;
            case 'yesno':
                $field = new IndustrialistMikadoFieldYesNo();
                $field->render($name, $label, $description, $options, $args, $hidden, $repeat);
                break;
            case 'yesnosimple':
                $field = new IndustrialistMikadoFieldYesNoSimple();
                $field->render($name, $label, $description, $options, $args, $hidden, $repeat);
                break;
            case 'onoff':
                $field = new IndustrialistMikadoFieldOnOff();
                $field->render($name, $label, $description, $options, $args, $hidden, $repeat);
                break;
            case 'portfoliofollow':
                $field = new IndustrialistMikadoFieldPortfolioFollow();
                $field->render($name, $label, $description, $options, $args, $hidden, $repeat);
                break;
            case 'zeroone':
                $field = new IndustrialistMikadoFieldZeroOne();
                $field->render($name, $label, $description, $options, $args, $hidden, $repeat);
                break;
            case 'imagevideo':
                $field = new IndustrialistMikadoFieldImageVideo();
                $field->render($name, $label, $description, $options, $args, $hidden, $repeat);
                break;
            case 'yesempty':
                $field = new IndustrialistMikadoFieldYesEmpty();
                $field->render($name, $label, $description, $options, $args, $hidden, $repeat);
                break;
            case 'flagpost':
                $field = new IndustrialistMikadoFieldFlagPost();
                $field->render($name, $label, $description, $options, $args, $hidden, $repeat);
                break;
            case 'flagpage':
                $field = new IndustrialistMikadoFieldFlagPage();
                $field->render($name, $label, $description, $options, $args, $hidden, $repeat);
                break;
            case 'flagmedia':
                $field = new IndustrialistMikadoFieldFlagMedia();
                $field->render($name, $label, $description, $options, $args, $hidden, $repeat);
                break;
            case 'flagportfolio':
                $field = new IndustrialistMikadoFieldFlagPortfolio();
                $field->render($name, $label, $description, $options, $args, $hidden, $repeat);
                break;
            case 'flagproduct':
                $field = new IndustrialistMikadoFieldFlagProduct();
                $field->render($name, $label, $description, $options, $args, $hidden, $repeat);
                break;
            case 'range':
                $field = new IndustrialistMikadoFieldRange();
                $field->render($name, $label, $description, $options, $args, $hidden, $repeat);
                break;
            case 'rangesimple':
                $field = new IndustrialistMikadoFieldRangeSimple();
                $field->render($name, $label, $description, $options, $args, $hidden, $repeat);
                break;
            case 'radio':
                $field = new IndustrialistMikadoFieldRadio();
                $field->render($name, $label, $description, $options, $args, $hidden, $repeat);
                break;
            case 'checkbox':
                $field = new IndustrialistMikadoFieldCheckBox();
                $field->render($name, $label, $description, $options, $args, $hidden, $repeat);
                break;
            case 'date':
                $field = new IndustrialistMikadoFieldDate();
                $field->render($name, $label, $description, $options, $args, $hidden, $repeat);
                break;
            case 'radiogroup':
                $field = new IndustrialistMikadoFieldRadioGroup();
                $field->render($name, $label, $description, $options, $args, $hidden, $repeat);
                break;
            case 'checkboxgroup':
                $field = new IndustrialistMikadoFieldCheckBoxGroup();
                $field->render($name, $label, $description, $options, $args, $hidden, $repeat);
                break;
            default:
                break;
        }
    }
}

/*
   Class: IndustrialistMikadoMultipleImages
   A class that initializes Mikado Multiple Images
*/

class IndustrialistMikadoMultipleImages implements iIndustrialistMikadoRender
{
    private $name;
    private $label;
    private $description;


    function __construct($name, $label = "", $description = "") {
        global $industrialist_Framework;
        $this->name = $name;
        $this->label = $label;
        $this->description = $description;
        $industrialist_Framework->mkdMetaBoxes->addOption($this->name, "");
    }

    public function render($factory) {
        global $post;
        ?>

        <div class="mkd-page-form-section">


            <div class="mkd-field-desc">
                <h4><?php echo esc_html($this->label); ?></h4>

                <p><?php echo esc_html($this->description); ?></p>
            </div>
            <!-- close div.mkd-field-desc -->

            <div class="mkd-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="mkd-gallery-images-holder clearfix">
                                <?php
                                $image_gallery_val = get_post_meta($post->ID, $this->name, true);
                                if ($image_gallery_val != '') $image_gallery_array = explode(',', $image_gallery_val);

                                if (isset($image_gallery_array) && count($image_gallery_array) != 0):

                                    foreach ($image_gallery_array as $gimg_id):

                                        $gimage_wp = wp_get_attachment_image_src($gimg_id, 'thumbnail', true);
                                        echo '<li class="mkd-gallery-image-holder"><img src="' . esc_url($gimage_wp[0]) . '"/></li>';

                                    endforeach;

                                endif;
                                ?>
                            </ul>
                            <input type="hidden" value="<?php echo esc_attr($image_gallery_val); ?>" id="<?php echo esc_attr($this->name) ?>" name="<?php echo esc_attr($this->name) ?>">
                            <div class="mkd-gallery-uploader">
                                <a class="mkd-gallery-upload-btn btn btn-sm btn-primary"
                                    href="javascript:void(0)"><?php esc_html_e('Upload', 'industrialist'); ?></a>
                                <a class="mkd-gallery-clear-btn btn btn-sm btn-default pull-right"
                                    href="javascript:void(0)"><?php esc_html_e('Remove All', 'industrialist'); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.mkd-section-content -->

        </div>
        <?php

    }
}

/*
   Class: IndustrialistMikadoImagesVideos
   A class that initializes Mikado Images Videos
*/

class IndustrialistMikadoImagesVideos implements iIndustrialistMikadoRender
{
    private $label;
    private $description;


    function __construct($label = "", $description = "") {
        $this->label = $label;
        $this->description = $description;
    }

    public function render($factory) {
        global $post;
        ?>
        <div class="mkd_hidden_portfolio_images" style="display: none">
            <div class="mkd-page-form-section">


                <div class="mkd-field-desc">
                    <h4><?php echo esc_html($this->label); ?></h4>

                    <p><?php echo esc_html($this->description); ?></p>
                </div>
                <!-- close div.mkd-field-desc -->

                <div class="mkd-section-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-2">
                                <em class="mkd-field-description"><?php esc_html_e('Order Number', 'industrialist'); ?></em>
                                <input type="text"
                                    class="form-control mkd-input mkd-form-element"
                                    id="portfolioimgordernumber_x"
                                    name="portfolioimgordernumber_x"
                                    placeholder=""/></div>
                            <div class="col-lg-10">
                                <em class="mkd-field-description"><?php esc_html_e('Image/Video title (only for gallery layout - Portfolio Style 6)', 'industrialist'); ?>'</em>
                                <input type="text"
                                    class="form-control mkd-input mkd-form-element"
                                    id="portfoliotitle_x"
                                    name="portfoliotitle_x"
                                    placeholder=""/></div>
                        </div>
                        <div class="row next-row">
                            <div class="col-lg-12">
                                <em class="mkd-field-description"><?php esc_html_e('Image', 'industrialist'); ?></em>
                                <div class="mkd-media-uploader">
                                    <div style="display: none"
                                        class="mkd-media-image-holder">
                                        <img src="" alt=""
                                            class="mkd-media-image img-thumbnail"/>
                                    </div>
                                    <div style="display: none"
                                        class="mkd-media-meta-fields">
                                        <input type="hidden" class="mkd-media-upload-url"
                                            name="portfolioimg_x"
                                            id="portfolioimg_x"/>
                                        <input type="hidden"
                                            class="mkd-media-upload-height"
                                            name="mkd_options_theme[media-upload][height]"
                                            value=""/>
                                        <input type="hidden"
                                            class="mkd-media-upload-width"
                                            name="mkd_options_theme[media-upload][width]"
                                            value=""/>
                                    </div>
                                    <a class="mkd-media-upload-btn btn btn-sm btn-primary"
                                        href="javascript:void(0)"
                                        data-frame-title="<?php esc_html_e('Select Image', 'industrialist'); ?>"
                                        data-frame-button-text="<?php esc_html_e('Select Image', 'industrialist'); ?>"><?php esc_html_e('Upload', 'industrialist'); ?></a>
                                    <a style="display: none;" href="javascript: void(0)"
                                        class="mkd-media-remove-btn btn btn-default btn-sm"><?php esc_html_e('Remove', 'industrialist'); ?></a>
                                </div>
                            </div>
                        </div>
                        <div class="row next-row">
                            <div class="col-lg-3">
                                <em class="mkd-field-description"><?php esc_html_e('Video type', 'industrialist'); ?></em>
                                <select class="form-control mkd-form-element mkd-portfoliovideotype"
                                    name="portfoliovideotype_x" id="portfoliovideotype_x">
                                    <option value=""></option>
                                    <option value="youtube">Youtube</option>
                                    <option value="vimeo">Vimeo</option>
                                    <option value="self"><?php esc_html_e('Self hosted', 'industrialist'); ?></option>
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <em class="mkd-field-description">Video ID</em>
                                <input type="text"
                                    class="form-control mkd-input mkd-form-element"
                                    id="portfoliovideoid_x"
                                    name="portfoliovideoid_x"
                                    placeholder=""/></div>
                        </div>
                        <div class="row next-row">
                            <div class="col-lg-12">
                                <em class="mkd-field-description"><?php esc_html_e('Video image', 'industrialist'); ?></em>
                                <div class="mkd-media-uploader">
                                    <div style="display: none"
                                        class="mkd-media-image-holder">
                                        <img src="" alt=""
                                            class="mkd-media-image img-thumbnail"/>
                                    </div>
                                    <div style="display: none"
                                        class="mkd-media-meta-fields">
                                        <input type="hidden" class="mkd-media-upload-url"
                                            name="portfoliovideoimage_x"
                                            id="portfoliovideoimage_x"/>
                                        <input type="hidden"
                                            class="mkd-media-upload-height"
                                            name="mkd_options_theme[media-upload][height]"
                                            value=""/>
                                        <input type="hidden"
                                            class="mkd-media-upload-width"
                                            name="mkd_options_theme[media-upload][width]"
                                            value=""/>
                                    </div>
                                    <a class="mkd-media-upload-btn btn btn-sm btn-primary"
                                        href="javascript:void(0)"
                                        data-frame-title="<?php esc_html_e('Select Image', 'industrialist'); ?>"
                                        data-frame-button-text="<?php esc_html_e('Select Image', 'industrialist'); ?>"><?php esc_html_e('Upload', 'industrialist'); ?></a>
                                    <a style="display: none;" href="javascript: void(0)"
                                        class="mkd-media-remove-btn btn btn-default btn-sm"><?php esc_html_e('Remove', 'industrialist'); ?></a>
                                </div>
                            </div>
                        </div>
                        <div class="row next-row">
                            <div class="col-lg-4">
                                <em class="mkd-field-description">Video webm</em>
                                <input type="text"
                                    class="form-control mkd-input mkd-form-element"
                                    id="portfoliovideowebm_x"
                                    name="portfoliovideowebm_x"
                                    placeholder=""/></div>
                            <div class="col-lg-4">
                                <em class="mkd-field-description">Video mp4</em>
                                <input type="text"
                                    class="form-control mkd-input mkd-form-element"
                                    id="portfoliovideomp4_x"
                                    name="portfoliovideomp4_x"
                                    placeholder=""/></div>
                            <div class="col-lg-4">
                                <em class="mkd-field-description">Video ogv</em>
                                <input type="text"
                                    class="form-control mkd-input mkd-form-element"
                                    id="portfoliovideoogv_x"
                                    name="portfoliovideoogv_x"
                                    placeholder=""/></div>
                        </div>
                        <div class="row next-row">
                            <div class="col-lg-12">
                                <a class="mkd_remove_image btn btn-sm btn-primary" href="/" onclick="javascript: return false;"><?php esc_html_e('Remove portfolio image/video', 'industrialist'); ?></a>
                            </div>
                        </div>


                    </div>
                </div>
                <!-- close div.mkd-section-content -->

            </div>
        </div>

        <?php
        $no = 1;
        $portfolio_images = get_post_meta($post->ID, 'mkd_portfolio_images', true);
        if (count($portfolio_images) > 1) {
            usort($portfolio_images, "industrialist_mikado_compare_portfolio_videos");
        }
        while (isset($portfolio_images[$no - 1])) {
            $portfolio_image = $portfolio_images[$no - 1];
            ?>
            <div class="mkd_portfolio_image" rel="<?php echo esc_attr($no); ?>" style="display: block;">

                <div class="mkd-page-form-section">


                    <div class="mkd-field-desc">
                        <h4><?php echo esc_html($this->label); ?></h4>

                        <p><?php echo esc_html($this->description); ?></p>
                    </div>
                    <!-- close div.mkd-field-desc -->

                    <div class="mkd-section-content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-2">
                                    <em class="mkd-field-description"><?php esc_html_e('Order Number', 'industrialist'); ?></em>
                                    <input type="text"
                                        class="form-control mkd-input mkd-form-element"
                                        id="portfolioimgordernumber_<?php echo esc_attr($no); ?>"
                                        name="portfolioimgordernumber[]" value="<?php echo isset($portfolio_image['portfolioimgordernumber']) ? esc_attr(stripslashes($portfolio_image['portfolioimgordernumber'])) : ""; ?>"
                                        placeholder=""/></div>
                                <div class="col-lg-10">
                                    <em class="mkd-field-description"><?php esc_html_e('Image/Video title (only for gallery layout - Portfolio Style 6)', 'industrialist'); ?></em>
                                    <input type="text"
                                        class="form-control mkd-input mkd-form-element"
                                        id="portfoliotitle_<?php echo esc_attr($no); ?>"
                                        name="portfoliotitle[]" value="<?php echo isset($portfolio_image['portfoliotitle']) ? esc_attr(stripslashes($portfolio_image['portfoliotitle'])) : ""; ?>"
                                        placeholder=""/></div>
                            </div>
                            <div class="row next-row">
                                <div class="col-lg-12">
                                    <em class="mkd-field-description"><?php esc_html_e('Image', 'industrialist'); ?></em>
                                    <div class="mkd-media-uploader">
                                        <div<?php if (stripslashes($portfolio_image['portfolioimg']) == false) { ?> style="display: none"<?php } ?>
                                            class="mkd-media-image-holder">
                                            <img src="<?php if (stripslashes($portfolio_image['portfolioimg']) == true) {
                                                echo esc_url(industrialist_mikado_get_attachment_thumb_url(stripslashes($portfolio_image['portfolioimg']), get_option('thumbnail' . '_size_w'), get_option('thumbnail' . '_size_h')));
                                            } ?>" alt=""
                                                class="mkd-media-image img-thumbnail"/>
                                        </div>
                                        <div style="display: none"
                                            class="mkd-media-meta-fields">
                                            <input type="hidden" class="mkd-media-upload-url"
                                                name="portfolioimg[]"
                                                id="portfolioimg_<?php echo esc_attr($no); ?>"
                                                value="<?php echo stripslashes($portfolio_image['portfolioimg']); ?>"/>
                                            <input type="hidden"
                                                class="mkd-media-upload-height"
                                                name="mkd_options_theme[media-upload][height]"
                                                value=""/>
                                            <input type="hidden"
                                                class="mkd-media-upload-width"
                                                name="mkd_options_theme[media-upload][width]"
                                                value=""/>
                                        </div>
                                        <a class="mkd-media-upload-btn btn btn-sm btn-primary"
                                            href="javascript:void(0)"
                                            data-frame-title="<?php esc_html_e('Select Image', 'industrialist'); ?>"
                                            data-frame-button-text="<?php esc_html_e('Select Image', 'industrialist'); ?>"><?php esc_html_e('Upload', 'industrialist'); ?></a>
                                        <a style="display: none;" href="javascript: void(0)"
                                            class="mkd-media-remove-btn btn btn-default btn-sm"><?php esc_html_e('Remove', 'industrialist'); ?></a>
                                    </div>
                                </div>
                            </div>
                            <div class="row next-row">
                                <div class="col-lg-3">
                                    <em class="mkd-field-description"><?php esc_html_e('Video type', 'industrialist'); ?></em>
                                    <select class="form-control mkd-form-element mkd-portfoliovideotype"
                                        name="portfoliovideotype[]" id="portfoliovideotype_<?php echo esc_attr($no); ?>">
                                        <option value=""></option>
                                        <option <?php if ($portfolio_image['portfoliovideotype'] == "youtube") {
                                            echo "selected='selected'";
                                        } ?> value="youtube">Youtube
                                        </option>
                                        <option <?php if ($portfolio_image['portfoliovideotype'] == "vimeo") {
                                            echo "selected='selected'";
                                        } ?> value="vimeo">Vimeo
                                        </option>
                                        <option <?php if ($portfolio_image['portfoliovideotype'] == "self") {
                                            echo "selected='selected'";
                                        } ?> value="self"><?php esc_html_e('Self hosted', 'industrialist'); ?>
                                        </option>
                                    </select>
                                </div>
                                <div class="col-lg-3">
                                    <em class="mkd-field-description">Video ID</em>
                                    <input type="text"
                                        class="form-control mkd-input mkd-form-element"
                                        id="portfoliovideoid_<?php echo esc_attr($no); ?>"
                                        name="portfoliovideoid[]" value="<?php echo isset($portfolio_image['portfoliovideoid']) ? esc_attr(stripslashes($portfolio_image['portfoliovideoid'])) : ""; ?>"
                                        placeholder=""/></div>
                            </div>
                            <div class="row next-row">
                                <div class="col-lg-12">
                                    <em class="mkd-field-description"><?php esc_html_e('Video image', 'industrialist'); ?></em>
                                    <div class="mkd-media-uploader">
                                        <div<?php if (stripslashes($portfolio_image['portfoliovideoimage']) == false) { ?> style="display: none"<?php } ?>
                                            class="mkd-media-image-holder">
                                            <img src="<?php if (stripslashes($portfolio_image['portfoliovideoimage']) == true) {
                                                echo esc_url(industrialist_mikado_get_attachment_thumb_url(stripslashes($portfolio_image['portfoliovideoimage']), get_option('thumbnail' . '_size_w'), get_option('thumbnail' . '_size_h')));
                                            } ?>" alt=""
                                                class="mkd-media-image img-thumbnail"/>
                                        </div>
                                        <div style="display: none"
                                            class="mkd-media-meta-fields">
                                            <input type="hidden" class="mkd-media-upload-url"
                                                name="portfoliovideoimage[]"
                                                id="portfoliovideoimage_<?php echo esc_attr($no); ?>"
                                                value="<?php echo stripslashes($portfolio_image['portfoliovideoimage']); ?>"/>
                                            <input type="hidden"
                                                class="mkd-media-upload-height"
                                                name="mkd_options_theme[media-upload][height]"
                                                value=""/>
                                            <input type="hidden"
                                                class="mkd-media-upload-width"
                                                name="mkd_options_theme[media-upload][width]"
                                                value=""/>
                                        </div>
                                        <a class="mkd-media-upload-btn btn btn-sm btn-primary"
                                            href="javascript:void(0)"
                                            data-frame-title="<?php esc_html_e('Select Image', 'industrialist'); ?>"
                                            data-frame-button-text="<?php esc_html_e('Select Image', 'industrialist'); ?>"><?php esc_html_e('Upload', 'industrialist'); ?></a>
                                        <a style="display: none;" href="javascript: void(0)"
                                            class="mkd-media-remove-btn btn btn-default btn-sm"><?php esc_html_e('Remove', 'industrialist'); ?></a>
                                    </div>
                                </div>
                            </div>
                            <div class="row next-row">
                                <div class="col-lg-4">
                                    <em class="mkd-field-description">Video webm</em>
                                    <input type="text"
                                        class="form-control mkd-input mkd-form-element"
                                        id="portfoliovideowebm_<?php echo esc_attr($no); ?>"
                                        name="portfoliovideowebm[]" value="<?php echo isset($portfolio_image['portfoliovideowebm']) ? esc_attr(stripslashes($portfolio_image['portfoliovideowebm'])) : ""; ?>"
                                        placeholder=""/></div>
                                <div class="col-lg-4">
                                    <em class="mkd-field-description">Video mp4</em>
                                    <input type="text"
                                        class="form-control mkd-input mkd-form-element"
                                        id="portfoliovideomp4_<?php echo esc_attr($no); ?>"
                                        name="portfoliovideomp4[]" value="<?php echo isset($portfolio_image['portfoliovideomp4']) ? esc_attr(stripslashes($portfolio_image['portfoliovideomp4'])) : ""; ?>"
                                        placeholder=""/></div>
                                <div class="col-lg-4">
                                    <em class="mkd-field-description">Video ogv</em>
                                    <input type="text"
                                        class="form-control mkd-input mkd-form-element"
                                        id="portfoliovideoogv_<?php echo esc_attr($no); ?>"
                                        name="portfoliovideoogv[]" value="<?php echo isset($portfolio_image['portfoliovideoogv']) ? esc_attr(stripslashes($portfolio_image['portfoliovideoogv'])) : ""; ?>"
                                        placeholder=""/></div>
                            </div>
                            <div class="row next-row">
                                <div class="col-lg-12">
                                    <a class="mkd_remove_image btn btn-sm btn-primary" href="/" onclick="javascript: return false;"><?php esc_html__('Remove portfolio image/video', 'industrialist'); ?></a>
                                </div>
                            </div>


                        </div>
                    </div>
                    <!-- close div.mkd-section-content -->

                </div>
            </div>
            <?php
            $no++;
        }
        ?>
        <br/>
        <a class="mkd_add_image btn btn-sm btn-primary" onclick="javascript: return false;" href="/"><?php esc_html__('Add portfolio image/video', 'industrialist'); ?></a>
        <?php

    }
}


/*
   Class: IndustrialistMikadoImagesVideos
   A class that initializes Mikado Images Videos
*/

class IndustrialistMikadoImagesVideosFramework implements iIndustrialistMikadoRender
{
    private $label;
    private $description;


    function __construct($label = "", $description = "") {
        $this->label = $label;
        $this->description = $description;
    }

    public function render($factory) {
        global $post;
        ?>

        <!--Image hidden start-->
        <div class="mkd-hidden-portfolio-images" style="display: none">
            <div class="mkd-portfolio-toggle-holder">
                <div class="mkd-portfolio-toggle mkd-toggle-desc">
                    <span class="number">1</span><span class="mkd-toggle-inner"><?php esc_html_e('Image -', 'industrialist'); ?>
                        <em><?php esc_html_e('Order Number, Image Title)', 'industrialist'); ?></em></span>
                </div>
                <div class="mkd-portfolio-toggle mkd-portfolio-control">
                    <span class="toggle-portfolio-media"><i class="fa fa-caret-up"></i></span>
                    <a href="#" class="remove-portfolio-media"><i class="fa fa-times"></i></a>
                </div>
            </div>
            <div class="mkd-portfolio-toggle-content">
                <div class="mkd-page-form-section">
                    <div class="mkd-section-content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-2">
                                    <div class="mkd-media-uploader">
                                        <em class="mkd-field-description"><?php esc_html_e('Image', 'industrialist'); ?> </em>
                                        <div style="display: none" class="mkd-media-image-holder">
                                            <img src="" alt="" class="mkd-media-image img-thumbnail">
                                        </div>
                                        <div class="mkd-media-meta-fields">
                                            <input type="hidden" class="mkd-media-upload-url" name="portfolioimg_x" id="portfolioimg_x">
                                            <input type="hidden" class="mkd-media-upload-height" name="mkd_options_theme[media-upload][height]" value="">
                                            <input type="hidden" class="mkd-media-upload-width" name="mkd_options_theme[media-upload][width]" value="">
                                        </div>
                                        <a class="mkd-media-upload-btn btn btn-sm btn-primary" href="javascript:void(0)" data-frame-title="Select Image" data-frame-button-text="Select Image"><?php esc_html_e('Upload', 'industrialist'); ?></a>
                                        <a style="display: none;" href="javascript: void(0)" class="mkd-media-remove-btn btn btn-default btn-sm"><?php esc_html_e('Remove', 'industrialist'); ?></a>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <em class="mkd-field-description"><?php esc_html_e('Order Number', 'industrialist'); ?></em>
                                    <input type="text" class="form-control mkd-input mkd-form-element" id="portfolioimgordernumber_x" name="portfolioimgordernumber_x" placeholder="">
                                </div>
                                <div class="col-lg-8">
                                    <em class="mkd-field-description"><?php esc_html_e('Image Title (works only for Gallery portfolio type selected)', 'industrialist'); ?> </em>
                                    <input type="text" class="form-control mkd-input mkd-form-element" id="portfoliotitle_x" name="portfoliotitle_x" placeholder="">
                                </div>
                            </div>
                            <input type="hidden" name="portfoliovideoimage_x" id="portfoliovideoimage_x">
                            <input type="hidden" name="portfoliovideotype_x" id="portfoliovideotype_x">
                            <input type="hidden" name="portfoliovideoid_x" id="portfoliovideoid_x">
                            <input type="hidden" name="portfoliovideowebm_x" id="portfoliovideowebm_x">
                            <input type="hidden" name="portfoliovideomp4_x" id="portfoliovideomp4_x">
                            <input type="hidden" name="portfoliovideoogv_x" id="portfoliovideoogv_x">
                            <input type="hidden" name="portfolioimgtype_x" id="portfolioimgtype_x" value="image">

                        </div><!-- close div.container-fluid -->
                    </div><!-- close div.mkd-section-content -->
                </div>
            </div>
        </div>
        <!--Image hidden End-->

        <!--Video Hidden Start-->
        <div class="mkd-hidden-portfolio-videos" style="display: none">
            <div class="mkd-portfolio-toggle-holder">
                <div class="mkd-portfolio-toggle mkd-toggle-desc">
                    <span class="number">2</span><span class="mkd-toggle-inner"><?php esc_html_e('Video -', 'industrialist'); ?>
                        <em><?php esc_html_e('rder Number, Video Title)', 'industrialist'); ?></em></span>
                </div>
                <div class="mkd-portfolio-toggle mkd-portfolio-control">
                    <span class="toggle-portfolio-media"><i class="fa fa-caret-up"></i></span>
                    <a href="#" class="remove-portfolio-media"><i class="fa fa-times"></i></a>
                </div>
            </div>
            <div class="mkd-portfolio-toggle-content">
                <div class="mkd-page-form-section">
                    <div class="mkd-section-content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-2">
                                    <div class="mkd-media-uploader">
                                        <em class="mkd-field-description"><?php esc_html_e('Cover Video Image', 'industrialist'); ?> </em>
                                        <div style="display: none" class="mkd-media-image-holder">
                                            <img src="" alt="" class="mkd-media-image img-thumbnail">
                                        </div>
                                        <div style="display: none" class="mkd-media-meta-fields">
                                            <input type="hidden" class="mkd-media-upload-url" name="portfoliovideoimage_x" id="portfoliovideoimage_x">
                                            <input type="hidden" class="mkd-media-upload-height" name="mkd_options_theme[media-upload][height]" value="">
                                            <input type="hidden" class="mkd-media-upload-width" name="mkd_options_theme[media-upload][width]" value="">
                                        </div>
                                        <a class="mkd-media-upload-btn btn btn-sm btn-primary" href="javascript:void(0)" data-frame-title="Select Image" data-frame-button-text="Select Image"><?php esc_html_e('Upload', 'industrialist'); ?></a>
                                        <a style="display: none;" href="javascript: void(0)" class="mkd-media-remove-btn btn btn-default btn-sm"><?php esc_html_e('Remove', 'industrialist'); ?></a>
                                    </div>
                                </div>
                                <div class="col-lg-10">
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <em class="mkd-field-description"><?php esc_html_e('Order Number', 'industrialist'); ?></em>
                                            <input type="text" class="form-control mkd-input mkd-form-element" id="portfolioimgordernumber_x" name="portfolioimgordernumber_x" placeholder="">
                                        </div>
                                        <div class="col-lg-10">
                                            <em class="mkd-field-description"><?php esc_html_e('Video Title (works only for Gallery portfolio type selected)', 'industrialist'); ?></em>
                                            <input type="text" class="form-control mkd-input mkd-form-element" id="portfoliotitle_x" name="portfoliotitle_x" placeholder="">
                                        </div>
                                    </div>
                                    <div class="row next-row">
                                        <div class="col-lg-2">
                                            <em class="mkd-field-description"><?php esc_html_e('Video type', 'industrialist'); ?></em>
                                            <select class="form-control mkd-form-element mkd-portfoliovideotype" name="portfoliovideotype_x" id="portfoliovideotype_x">
                                                <option value=""></option>
                                                <option value="youtube">Youtube</option>
                                                <option value="vimeo">Vimeo</option>
                                                <option value="self"><?php esc_html_e('Self hosted', 'industrialist'); ?></option>
                                            </select>
                                        </div>
                                        <div class="col-lg-2 mkd-video-id-holder">
                                            <em class="mkd-field-description" id="videoId">Video ID</em>
                                            <input type="text" class="form-control mkd-input mkd-form-element" id="portfoliovideoid_x" name="portfoliovideoid_x" placeholder="">
                                        </div>
                                    </div>

                                    <div class="row next-row mkd-video-self-hosted-path-holder">
                                        <div class="col-lg-4">
                                            <em class="mkd-field-description">Video webm</em>
                                            <input type="text" class="form-control mkd-input mkd-form-element" id="portfoliovideowebm_x" name="portfoliovideowebm_x" placeholder="">
                                        </div>
                                        <div class="col-lg-4">
                                            <em class="mkd-field-description">Video mp4</em>
                                            <input type="text" class="form-control mkd-input mkd-form-element" id="portfoliovideomp4_x" name="portfoliovideomp4_x" placeholder="">
                                        </div>
                                        <div class="col-lg-4">
                                            <em class="mkd-field-description">Video ogv</em>
                                            <input type="text" class="form-control mkd-input mkd-form-element" id="portfoliovideoogv_x" name="portfoliovideoogv_x" placeholder="">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <input type="hidden" name="portfolioimg_x" id="portfolioimg_x">
                            <input type="hidden" name="portfolioimgtype_x" id="portfolioimgtype_x" value="video">
                        </div><!-- close div.container-fluid -->
                    </div><!-- close div.mkd-section-content -->
                </div>
            </div>
        </div>
        <!--Video Hidden End-->


        <?php
        $no = 1;
        $portfolio_images = get_post_meta($post->ID, 'mkd_portfolio_images', true);
        if (count($portfolio_images) > 1) {
            usort($portfolio_images, "industrialist_mikado_compare_portfolio_videos");
        }
        while (isset($portfolio_images[$no - 1])) {
            $portfolio_image = $portfolio_images[$no - 1];
            if (isset($portfolio_image['portfolioimgtype']))
                $portfolio_img_type = $portfolio_image['portfolioimgtype'];
            else {
                if (stripslashes($portfolio_image['portfolioimg']) == true)
                    $portfolio_img_type = "image";
                else
                    $portfolio_img_type = "video";
            }
            if ($portfolio_img_type == "image") {
                ?>

                <div class="mkd-portfolio-images mkd-portfolio-media" rel="<?php echo esc_attr($no); ?>">
                    <div class="mkd-portfolio-toggle-holder">
                        <div class="mkd-portfolio-toggle mkd-toggle-desc">
                            <span class="number"><?php echo esc_html($no); ?></span><span class="mkd-toggle-inner"><?php esc_html_e('Image -', 'industrialist'); ?>
                                <em>(<?php echo stripslashes($portfolio_image['portfolioimgordernumber']); ?>, <?php echo stripslashes($portfolio_image['portfoliotitle']); ?>)</em></span>
                        </div>
                        <div class="mkd-portfolio-toggle mkd-portfolio-control">
                            <a href="#" class="toggle-portfolio-media"><i class="fa fa-caret-down"></i></a>
                            <a href="#" class="remove-portfolio-media"><i class="fa fa-times"></i></a>
                        </div>
                    </div>
                    <div class="mkd-portfolio-toggle-content" style="display: none">
                        <div class="mkd-page-form-section">
                            <div class="mkd-section-content">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <div class="mkd-media-uploader">
                                                <em class="mkd-field-description"><?php esc_html_e('Image', 'industrialist'); ?> </em>
                                                <div<?php if (stripslashes($portfolio_image['portfolioimg']) == false) { ?> style="display: none"<?php } ?>
                                                    class="mkd-media-image-holder">
                                                    <img src="<?php if (stripslashes($portfolio_image['portfolioimg']) == true) {
                                                        echo esc_url(industrialist_mikado_get_attachment_thumb_url(stripslashes($portfolio_image['portfolioimg']), get_option('thumbnail' . '_size_w'), get_option('thumbnail' . '_size_h')));
                                                    } ?>" alt=""
                                                        class="mkd-media-image img-thumbnail"/>
                                                </div>
                                                <div style="display: none"
                                                    class="mkd-media-meta-fields">
                                                    <input type="hidden" class="mkd-media-upload-url"
                                                        name="portfolioimg[]"
                                                        id="portfolioimg_<?php echo esc_attr($no); ?>"
                                                        value="<?php echo stripslashes($portfolio_image['portfolioimg']); ?>"/>
                                                    <input type="hidden"
                                                        class="mkd-media-upload-height"
                                                        name="mkd_options_theme[media-upload][height]"
                                                        value=""/>
                                                    <input type="hidden"
                                                        class="mkd-media-upload-width"
                                                        name="mkd_options_theme[media-upload][width]"
                                                        value=""/>
                                                </div>
                                                <a class="mkd-media-upload-btn btn btn-sm btn-primary"
                                                    href="javascript:void(0)"
                                                    data-frame-title="<?php esc_html_e('Select Image', 'industrialist'); ?>"
                                                    data-frame-button-text="<?php esc_html_e('Select Image', 'industrialist'); ?>"><?php esc_html_e('Upload', 'industrialist'); ?></a>
                                                <a style="display: none;" href="javascript: void(0)"
                                                    class="mkd-media-remove-btn btn btn-default btn-sm"><?php esc_html_e('Remove', 'industrialist'); ?></a>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <em class="mkd-field-description"><?php esc_html_e('Order Number', 'industrialist'); ?></em>
                                            <input type="text" class="form-control mkd-input mkd-form-element" id="portfolioimgordernumber_<?php echo esc_attr($no); ?>" name="portfolioimgordernumber[]" value="<?php echo isset($portfolio_image['portfolioimgordernumber']) ? esc_attr(stripslashes($portfolio_image['portfolioimgordernumber'])) : ""; ?>" placeholder="">
                                        </div>
                                        <div class="col-lg-8">
                                            <em class="mkd-field-description"><?php esc_html_e('Image Title (works only for Gallery portfolio type selected)', 'industrialist'); ?> </em>
                                            <input type="text" class="form-control mkd-input mkd-form-element" id="portfoliotitle_<?php echo esc_attr($no); ?>" name="portfoliotitle[]" value="<?php echo isset($portfolio_image['portfoliotitle']) ? esc_attr(stripslashes($portfolio_image['portfoliotitle'])) : ""; ?>" placeholder="">
                                        </div>
                                    </div>
                                    <input type="hidden" id="portfoliovideoimage_<?php echo esc_attr($no); ?>" name="portfoliovideoimage[]">
                                    <input type="hidden" id="portfoliovideotype_<?php echo esc_attr($no); ?>" name="portfoliovideotype[]">
                                    <input type="hidden" id="portfoliovideoid_<?php echo esc_attr($no); ?>" name="portfoliovideoid[]">
                                    <input type="hidden" id="portfoliovideowebm_<?php echo esc_attr($no); ?>" name="portfoliovideowebm[]">
                                    <input type="hidden" id="portfoliovideomp4_<?php echo esc_attr($no); ?>" name="portfoliovideomp4[]">
                                    <input type="hidden" id="portfoliovideoogv_<?php echo esc_attr($no); ?>" name="portfoliovideoogv[]">
                                    <input type="hidden" id="portfolioimgtype_<?php echo esc_attr($no); ?>" name="portfolioimgtype[]" value="image">
                                </div><!-- close div.container-fluid -->
                            </div><!-- close div.mkd-section-content -->
                        </div>
                    </div>
                </div>

                <?php
            } else {
                ?>
                <div class="mkd-portfolio-videos mkd-portfolio-media" rel="<?php echo esc_attr($no); ?>">
                    <div class="mkd-portfolio-toggle-holder">
                        <div class="mkd-portfolio-toggle mkd-toggle-desc">
                            <span class="number"><?php echo esc_html($no); ?></span><span class="mkd-toggle-inner">Video - <em>(<?php echo stripslashes($portfolio_image['portfolioimgordernumber']); ?>, <?php echo stripslashes($portfolio_image['portfoliotitle']); ?></em>) </span>
                        </div>
                        <div class="mkd-portfolio-toggle mkd-portfolio-control">
                            <a href="#" class="toggle-portfolio-media"><i class="fa fa-caret-down"></i></a>
                            <a href="#" class="remove-portfolio-media"><i class="fa fa-times"></i></a>
                        </div>
                    </div>
                    <div class="mkd-portfolio-toggle-content" style="display: none">
                        <div class="mkd-page-form-section">
                            <div class="mkd-section-content">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <div class="mkd-media-uploader">
                                                <em class="mkd-field-description"><?php esc_html_e('Cover Video Image ', 'industrialist'); ?></em>
                                                <div<?php if (stripslashes($portfolio_image['portfoliovideoimage']) == false) { ?> style="display: none"<?php } ?>
                                                    class="mkd-media-image-holder">
                                                    <img src="<?php if (stripslashes($portfolio_image['portfoliovideoimage']) == true) {
                                                        echo esc_url(industrialist_mikado_get_attachment_thumb_url(stripslashes($portfolio_image['portfoliovideoimage']), get_option('thumbnail' . '_size_w'), get_option('thumbnail' . '_size_h')));
                                                    } ?>" alt=""
                                                        class="mkd-media-image img-thumbnail"/>
                                                </div>
                                                <div style="display: none"
                                                    class="mkd-media-meta-fields">
                                                    <input type="hidden" class="mkd-media-upload-url"
                                                        name="portfoliovideoimage[]"
                                                        id="portfoliovideoimage_<?php echo esc_attr($no); ?>"
                                                        value="<?php echo stripslashes($portfolio_image['portfoliovideoimage']); ?>"/>
                                                    <input type="hidden"
                                                        class="mkd-media-upload-height"
                                                        name="mkd_options_theme[media-upload][height]"
                                                        value=""/>
                                                    <input type="hidden"
                                                        class="mkd-media-upload-width"
                                                        name="mkd_options_theme[media-upload][width]"
                                                        value=""/>
                                                </div>
                                                <a class="mkd-media-upload-btn btn btn-sm btn-primary"
                                                    href="javascript:void(0)"
                                                    data-frame-title="<?php esc_html_e('Select Image', 'industrialist'); ?>"
                                                    data-frame-button-text="<?php esc_html_e('Select Image', 'industrialist'); ?>"><?php esc_html_e('Upload', 'industrialist'); ?></a>
                                                <a style="display: none;" href="javascript: void(0)"
                                                    class="mkd-media-remove-btn btn btn-default btn-sm"><?php esc_html_e('Remove', 'industrialist'); ?></a>
                                            </div>
                                        </div>
                                        <div class="col-lg-10">
                                            <div class="row">
                                                <div class="col-lg-2">
                                                    <em class="mkd-field-description"><?php esc_html_e('Order Number', 'industrialist'); ?></em>
                                                    <input type="text" class="form-control mkd-input mkd-form-element" id="portfolioimgordernumber_<?php echo esc_attr($no); ?>" name="portfolioimgordernumber[]" value="<?php echo isset($portfolio_image['portfolioimgordernumber']) ? esc_attr(stripslashes($portfolio_image['portfolioimgordernumber'])) : ""; ?>" placeholder="">
                                                </div>
                                                <div class="col-lg-10">
                                                    <em class="mkd-field-description"><?php esc_html_e('Video Title (works only for Gallery portfolio type selected)', 'industrialist'); ?> </em>
                                                    <input type="text" class="form-control mkd-input mkd-form-element" id="portfoliotitle_<?php echo esc_attr($no); ?>" name="portfoliotitle[]" value="<?php echo isset($portfolio_image['portfoliotitle']) ? esc_attr(stripslashes($portfolio_image['portfoliotitle'])) : ""; ?>" placeholder="">
                                                </div>
                                            </div>
                                            <div class="row next-row">
                                                <div class="col-lg-2">
                                                    <em class="mkd-field-description"><?php esc_html_e('Video Type', 'industrialist'); ?> </em>
                                                    <select class="form-control mkd-form-element mkd-portfoliovideotype"
                                                        name="portfoliovideotype[]" id="portfoliovideotype_<?php echo esc_attr($no); ?>">
                                                        <option value=""></option>
                                                        <option <?php if ($portfolio_image['portfoliovideotype'] == "youtube") {
                                                            echo "selected='selected'";
                                                        } ?> value="youtube">Youtube
                                                        </option>
                                                        <option <?php if ($portfolio_image['portfoliovideotype'] == "vimeo") {
                                                            echo "selected='selected'";
                                                        } ?> value="vimeo">Vimeo
                                                        </option>
                                                        <option <?php if ($portfolio_image['portfoliovideotype'] == "self") {
                                                            echo "selected='selected'";
                                                        } ?> value="self"><?php esc_html_e('Self hosted', 'industrialist'); ?>
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-2 mkd-video-id-holder">
                                                    <em class="mkd-field-description">Video ID</em>
                                                    <input type="text"
                                                        class="form-control mkd-input mkd-form-element"
                                                        id="portfoliovideoid_<?php echo esc_attr($no); ?>"
                                                        name="portfoliovideoid[]" value="<?php echo isset($portfolio_image['portfoliovideoid']) ? esc_attr(stripslashes($portfolio_image['portfoliovideoid'])) : ""; ?>"
                                                        placeholder=""/>
                                                </div>
                                            </div>

                                            <div class="row next-row mkd-video-self-hosted-path-holder">
                                                <div class="col-lg-4">
                                                    <em class="mkd-field-description">Video webm</em>
                                                    <input type="text"
                                                        class="form-control mkd-input mkd-form-element"
                                                        id="portfoliovideowebm_<?php echo esc_attr($no); ?>"
                                                        name="portfoliovideowebm[]" value="<?php echo isset($portfolio_image['portfoliovideowebm']) ? esc_attr(stripslashes($portfolio_image['portfoliovideowebm'])) : ""; ?>"
                                                        placeholder=""/></div>
                                                <div class="col-lg-4">
                                                    <em class="mkd-field-description">Video mp4</em>
                                                    <input type="text"
                                                        class="form-control mkd-input mkd-form-element"
                                                        id="portfoliovideomp4_<?php echo esc_attr($no); ?>"
                                                        name="portfoliovideomp4[]" value="<?php echo isset($portfolio_image['portfoliovideomp4']) ? esc_attr(stripslashes($portfolio_image['portfoliovideomp4'])) : ""; ?>"
                                                        placeholder=""/></div>
                                                <div class="col-lg-4">
                                                    <em class="mkd-field-description">Video ogv</em>
                                                    <input type="text"
                                                        class="form-control mkd-input mkd-form-element"
                                                        id="portfoliovideoogv_<?php echo esc_attr($no); ?>"
                                                        name="portfoliovideoogv[]" value="<?php echo isset($portfolio_image['portfoliovideoogv']) ? esc_attr(stripslashes($portfolio_image['portfoliovideoogv'])) : ""; ?>"
                                                        placeholder=""/></div>
                                            </div>
                                        </div>

                                    </div>
                                    <input type="hidden" id="portfolioimg_<?php echo esc_attr($no); ?>" name="portfolioimg[]">
                                    <input type="hidden" id="portfolioimgtype_<?php echo esc_attr($no); ?>" name="portfolioimgtype[]" value="video">
                                </div><!-- close div.container-fluid -->
                            </div><!-- close div.mkd-section-content -->
                        </div>
                    </div>
                </div>
                <?php
            }
            $no++;
        }
        ?>

        <div class="mkd-portfolio-add">
            <a class="mkd-add-image btn btn-sm btn-primary" href="#"><i class="fa fa-camera"></i><?php esc_html_e(' Add Image', 'industrialist'); ?>
            </a>
            <a class="mkd-add-video btn btn-sm btn-primary" href="#"><i class="fa fa-video-camera"></i><?php esc_html_e('  Add Video', 'industrialist'); ?>
            </a>

            <a class="mkd-toggle-all-media btn btn-sm btn-default pull-right" href="#"><?php esc_html_e('  Expand All', 'industrialist'); ?> </a>
            <?php /* <a class="mkd-remove-last-row-media btn btn-sm btn-default pull-right" href="#"> Remove last row</a> */ ?>
        </div>
        <?php

    }
}

class IndustrialistMikadoTwitterFramework implements iIndustrialistMikadoRender
{
    public function render($factory) {
        $twitterApi = MikadoTwitterApi::getInstance();
        $message = '';

        if (!empty($_GET['oauth_token']) && !empty($_GET['oauth_verifier'])) {
            if (!empty($_GET['oauth_token'])) {
                update_option($twitterApi::AUTHORIZE_TOKEN_FIELD, $_GET['oauth_token']);
            }

            if (!empty($_GET['oauth_verifier'])) {
                update_option($twitterApi::AUTHORIZE_VERIFIER_FIELD, $_GET['oauth_verifier']);
            }

            $responseObj = $twitterApi->obtainAccessToken();
            if ($responseObj->status) {
                $message = esc_html__('You have successfully connected with your Twitter account. If you have any issues fetching data from Twitter try reconnecting.', 'industrialist');
            } else {
                $message = $responseObj->message;
            }
        }

        $buttonText = $twitterApi->hasUserConnected() ? esc_html__('Re-connect with Twitter', 'industrialist') : esc_html__('Connect with Twitter', 'industrialist');
        ?>
        <?php if ($message !== '') { ?>
            <div class="alert alert-success" style="margin-top: 20px;">
                <span><?php echo esc_html($message); ?></span>
            </div>
        <?php } ?>
        <div class="mkd-page-form-section" id="mkd_enable_social_share_twitter">

            <div class="mkd-field-desc">
                <h4><?php esc_html_e('Connect with Twitter', 'industrialist'); ?></h4>

                <p><?php esc_html_e('Connecting with Twitter will enable you to show your latest tweets on your site', 'industrialist'); ?></p>
            </div>
            <!-- close div.mkd-field-desc -->

            <div class="mkd-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <a id="mkd-tw-request-token-btn" class="btn btn-primary" href="#"><?php echo esc_html($buttonText); ?></a>
                            <input type="hidden" data-name="current-page-url" value="<?php echo esc_url($twitterApi->buildCurrentPageURI()); ?>"/>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.mkd-section-content -->

        </div>
    <?php }
}

class IndustrialistMikadoInstagramFramework implements iIndustrialistMikadoRender
{
    public function render($factory) {
        $instagram_api = MikadoInstagramApi::getInstance();
        $message = '';

        //if code wasn't saved to database
        if (!get_option('mkd_instagram_code')) {
            //check if code parameter is set in URL. That means that user has connected with Instagram
            if (!empty($_GET['code'])) {
                //update code option so we can use it later
                $instagram_api->storeCode();
                $instagram_api->getAccessToken();
                $message = esc_html__('You have successfully connected with your Instagram account. If you have any issues fetching data from Instagram try reconnecting.', 'industrialist');

            } else {
                $instagram_api->storeCodeRequestURI();
            }
        }

        $buttonText = $instagram_api->hasUserConnected() ? esc_html__('Re-connect with Instagram', 'industrialist') : esc_html__('Connect with Instagram', 'industrialist');

        ?>
        <?php if ($message !== '') { ?>
            <div class="alert alert-success" style="margin-top: 20px;">
                <span><?php echo esc_html($message); ?></span>
            </div>
        <?php } ?>
        <div class="mkd-page-form-section" id="mkd_enable_social_share_instagram">

            <div class="mkd-field-desc">
                <h4><?php esc_html_e('Connect with Instagram', 'industrialist'); ?></h4>

                <p><?php esc_html_e('Connecting with Instagram will enable you to show your latest photos on your site', 'industrialist'); ?></p>
            </div>
            <!-- close div.mkd-field-desc -->

            <div class="mkd-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <a class="btn btn-primary" href="<?php echo esc_url($instagram_api->getAuthorizeUrl()); ?>"><?php echo esc_html($buttonText); ?></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.mkd-section-content -->

        </div>
    <?php }
}

/*
   Class: IndustrialistMikadoImagesVideos
   A class that initializes Mikado Images Videos
*/

class IndustrialistMikadoOptionsFramework implements iIndustrialistMikadoRender
{
    private $label;
    private $description;


    function __construct($label = "", $description = "") {
        $this->label = $label;
        $this->description = $description;
    }

    public function render($factory) {
        global $post;
        ?>

        <div class="mkd-portfolio-additional-item-holder" style="display: none">
            <div class="mkd-portfolio-toggle-holder">
                <div class="mkd-portfolio-toggle mkd-toggle-desc">
                    <span class="number">1</span><span class="mkd-toggle-inner"><?php esc_html_e('Additional Sidebar Item ', 'industrialist'); ?>
                        <em><?php esc_html_e('Order Number, Item Title)', 'industrialist'); ?> </em></span>
                </div>
                <div class="mkd-portfolio-toggle mkd-portfolio-control">
                    <span class="toggle-portfolio-item"><i class="fa fa-caret-up"></i></span>
                    <a href="#" class="remove-portfolio-item"><i class="fa fa-times"></i></a>
                </div>
            </div>
            <div class="mkd-portfolio-toggle-content">
                <div class="mkd-page-form-section">
                    <div class="mkd-section-content">
                        <div class="container-fluid">
                            <div class="row">

                                <div class="col-lg-2">
                                    <em class="mkd-field-description"><?php esc_html_e('Order Number', 'industrialist') ?></em>
                                    <input type="text" class="form-control mkd-input mkd-form-element" id="optionlabelordernumber_x" name="optionlabelordernumber_x" placeholder="">
                                </div>
                                <div class="col-lg-10">
                                    <em class="mkd-field-description"><?php esc_html_e('Item Titl', 'industrialist') ?>e </em>
                                    <input type="text" class="form-control mkd-input mkd-form-element" id="optionLabel_x" name="optionLabel_x" placeholder="">
                                </div>
                            </div>
                            <div class="row next-row">
                                <div class="col-lg-12">
                                    <em class="mkd-field-description"><?php esc_html_e('Item Text', 'industrialist') ?></em>
                                    <textarea class="form-control mkd-input mkd-form-element" id="optionValue_x" name="optionValue_x" placeholder=""></textarea>
                                </div>
                            </div>
                            <div class="row next-row">
                                <div class="col-lg-12">
                                    <em class="mkd-field-description"><?php esc_html_e('Enter Full URL for Item Text Link', 'industrialist') ?></em>
                                    <input type="text" class="form-control mkd-input mkd-form-element" id="optionUrl_x" name="optionUrl_x" placeholder="">
                                </div>
                            </div>
                        </div><!-- close div.mkd-section-content -->
                    </div><!-- close div.container-fluid -->
                </div>
            </div>
        </div>
        <?php
        $no = 1;
        $portfolios = get_post_meta($post->ID, 'mkd_portfolios', true);
        if (count($portfolios) > 1) {
            usort($portfolios, "industrialist_mikado_compare_portfolio_options");
        }
        while (isset($portfolios[$no - 1])) {
            $portfolio = $portfolios[$no - 1];
            ?>
            <div class="mkd-portfolio-additional-item" rel="<?php echo esc_attr($no); ?>">
                <div class="mkd-portfolio-toggle-holder">
                    <div class="mkd-portfolio-toggle mkd-toggle-desc">
                        <span class="number"><?php echo esc_html($no); ?></span><span class="mkd-toggle-inner"><?php esc_html_e('Additional Sidebar Item -', 'industrialist'); ?>
                            <em>(<?php echo stripslashes($portfolio['optionlabelordernumber']); ?>, <?php echo stripslashes($portfolio['optionLabel']); ?>)</em></span>
                    </div>
                    <div class="mkd-portfolio-toggle mkd-portfolio-control">
                        <span class="toggle-portfolio-item"><i class="fa fa-caret-down"></i></span>
                        <a href="#" class="remove-portfolio-item"><i class="fa fa-times"></i></a>
                    </div>
                </div>
                <div class="mkd-portfolio-toggle-content" style="display: none">
                    <div class="mkd-page-form-section">
                        <div class="mkd-section-content">
                            <div class="container-fluid">
                                <div class="row">

                                    <div class="col-lg-2">
                                        <em class="mkd-field-description"><?php esc_html_e('Order Number', 'industrialist'); ?></em>
                                        <input type="text" class="form-control mkd-input mkd-form-element" id="optionlabelordernumber_<?php echo esc_attr($no); ?>" name="optionlabelordernumber[]" value="<?php echo isset($portfolio['optionlabelordernumber']) ? esc_attr(stripslashes($portfolio['optionlabelordernumber'])) : ""; ?>" placeholder="">
                                    </div>
                                    <div class="col-lg-10">
                                        <em class="mkd-field-description"><?php esc_html_e('Item Title', 'industrialist'); ?> </em>
                                        <input type="text" class="form-control mkd-input mkd-form-element" id="optionLabel_<?php echo esc_attr($no); ?>" name="optionLabel[]" value="<?php echo esc_attr(stripslashes($portfolio['optionLabel'])); ?>" placeholder="">
                                    </div>
                                </div>
                                <div class="row next-row">
                                    <div class="col-lg-12">
                                        <em class="mkd-field-description"><?php esc_html_e('Item Text', 'industrialist'); ?></em>
                                        <textarea class="form-control mkd-input mkd-form-element" id="optionValue_<?php echo esc_attr($no); ?>" name="optionValue[]" placeholder=""><?php echo esc_attr(stripslashes($portfolio['optionValue'])); ?></textarea>
                                    </div>
                                </div>
                                <div class="row next-row">
                                    <div class="col-lg-12">
                                        <em class="mkd-field-description"><?php esc_html_e('Enter Full URL for Item Text Link', 'industrialist'); ?></em>
                                        <input type="text" class="form-control mkd-input mkd-form-element" id="optionUrl_<?php echo esc_attr($no); ?>" name="optionUrl[]" value="<?php echo stripslashes($portfolio['optionUrl']); ?>" placeholder="">
                                    </div>
                                </div>
                            </div><!-- close div.mkd-section-content -->
                        </div><!-- close div.container-fluid -->
                    </div>
                </div>
            </div>
            <?php
            $no++;
        }
        ?>

        <div class="mkd-portfolio-add">
            <a class="mkd-add-item btn btn-sm btn-primary" href="#"> <?php esc_html_e('Add New Item', 'industrialist'); ?></a>


            <a class="mkd-toggle-all-item btn btn-sm btn-default pull-right" href="#"> <?php esc_html_e('Expand All', 'industrialist'); ?></a>
            <?php /* <a class="mkd-remove-last-item-row btn btn-sm btn-default pull-right" href="#"> Remove Last Row</a> */ ?>
        </div>


        <?php

    }
}

class IndustrialistMikadoRepeater implements iIndustrialistMikadoRender
{
    private $label;
    private $description;
    private $name;
    private $fields;
    private $num_of_rows;
    private $button_text;

    function __construct($fields, $name, $label = '', $description = '', $button_text = '') {
        global $industrialist_Framework;

        $this->label = $label;
        $this->description = $description;
        $this->fields = $fields;
        $this->name = $name;
        $this->num_of_rows = 1;
        $this->button_text = !empty($button_text) ? $button_text : 'Add New Item';

        $counter = 0;
        foreach ($this->fields as $field) {
            if (!isset($this->fields[$counter]['options'])) {
                $this->fields[$counter]['options'] = array();
            }
            if (!isset($this->fields[$counter]['args'])) {
                $this->fields[$counter]['args'] = array();
            }
            if (!isset($this->fields[$counter]['hidden'])) {
                $this->fields[$counter]['hidden'] = false;
            }
            if (!isset($this->fields[$counter]['label'])) {
                $this->fields[$counter]['label'] = '';
            }
            if (!isset($this->fields[$counter]['description'])) {
                $this->fields[$counter]['description'] = '';
            }
            if (!isset($this->fields[$counter]['default_value'])) {
                $this->fields[$counter]['default_value'] = '';
            }

            $industrialist_Framework->mkdMetaBoxes->addOption($this->fields[$counter]['name'], $this->fields[$counter]['default_value']);
            $counter++;
        }
    }

    public function render($factory, $row_fields_num = -1) {
        global $post;

        $clones = array();

        if (!empty($post)) {
            $clones = get_post_meta($post->ID, $this->fields[0]['name'], true);
        }

        ?>
        <div class="mkd-repeater-wrapper">
            <div class="mkd-repeater-fields-holder clearfix">
                <?php if (empty($clones)) { //first time
                    if ($row_fields_num === -1) {
                        ?>
                        <div class="mkd-repeater-fields-row">
                        <?php
                    }
                    $counter = 0;
                    foreach ($this->fields as $field) {
                        if ($row_fields_num !== -1 && $counter % $row_fields_num === 0) { ?>
                            <div class="mkd-repeater-fields-row">
                            <?php
                        }
                        $factory->render($field['type'], $field['name'], $field['label'], $field['description'], $field['options'], $field['args'], $field['hidden'], array('index' => 0, 'value' => $field['default_value']));
                        $counter++;
                        if ($row_fields_num !== -1 && $counter % $row_fields_num === 0) { ?>
                            <div class="mkd-repeater-remove">
                                <a class="mkd-clone-remove" href="#"><i class="fa fa-times"></i></a></div>
                            </div>
                            <?php
                        }
                    }
                    if ($row_fields_num === -1) {
                        ?>
                        <div class="mkd-repeater-remove">
                            <a class="mkd-clone-remove" href="#"><i class="fa fa-times"></i></a></div>
                        </div>
                        <?php
                    }
                } else {
                    $j = 0;
                    $index = 0;
                    $values = array();
                    foreach ($this->fields as $field) {
                        if ($j++ === 0) { // avoid unnecessary get_post_meta call
                            $values[] = $clones;
                        } else {
                            $values[] = get_post_meta($post->ID, $field['name'], true);
                        }
                    }
                    while (isset($clones[$index])) { // rows
                        $count = 0;
                        if ($row_fields_num === -1) {
                            ?>
                            <div class="mkd-repeater-fields-row ">
                            <?php
                        }
                        foreach ($this->fields as $field) { // columns
                            if ($row_fields_num !== -1 && $count % $row_fields_num === 0) { ?>
                                <div class="mkd-repeater-fields-row">
                                <?php
                            }

                            $factory->render($field['type'], $field['name'], $field['label'], $field['description'], $field['options'], $field['args'], $field['hidden'], array('index' => $index, 'value' => $values[$count][$index]));
                            if ($row_fields_num !== -1 && $count % $row_fields_num === 0) { ?>
                                <div class="mkd-repeater-remove"><a class="mkd-clone-remove" href="#"><i
                                            class="fa fa-times"></i></a></div>
                                </div>
                                <?php
                            }
                            $count++;
                        }
                        if ($row_fields_num === -1) {
                            ?>
                            <div class="mkd-repeater-remove">
                                <a title="<?php esc_html_e('Remove section', 'industrialist'); ?>" class="mkd-clone-remove" href="#">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                            </div>
                            <?php
                        }
                        ++$index;
                    }
                    $this->num_of_rows = $index;
                }
                ?>
            </div>
            <div class="mkd-repeater-add">
                <a class="mkd-clone btn btn-sm btn-primary"
                    data-count="<?php echo esc_attr($this->num_of_rows) ?>"
                    href="#"><?php echo esc_html($this->button_text); ?></a>
            </div>
        </div>


        <?php

    }
}